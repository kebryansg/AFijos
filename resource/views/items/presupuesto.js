table = $("#Listado table");
rows = [
    {mes: "ENERO", precio: 0},
    {mes: "FEBRERO", precio: 0},
    {mes: "MARZO", precio: 0},
    {mes: "ABRIL", precio: 0},
    {mes: "MAYO", precio: 0},
    {mes: "JUNIO", precio: 0},
    {mes: "JULIO", precio: 0},
    {mes: "AGOSTO", precio: 0},
    {mes: "SEPTIEMBRE", precio: 0},
    {mes: "OCTUBRE", precio: 0},
    {mes: "NOVIEMBRE", precio: 0},
    {mes: "DICIEMBRE", precio: 0}
];

window.event_input = {
    "change input[myDecimal]": function (e, value, row, index) {
        valor_update = convertFloat($(e.target).val());
        acumulador = valor_update;
        
        $.each($("#tbDetallePresupuesto").bootstrapTable("getData"), function (i, rw) {
            if (index !== i)
                acumulador += rw.precio;
        });
        presupuestoInicial = convertFloat($("input[name='presupuestoInicial']").val());

        bandera = !(presupuestoInicial - acumulador < 0);
        if (bandera) {
            row.precio = valor_update;
            $("#tbDetallePresupuesto").bootstrapTable('updateRow', {
                index: index,
                row: row
            });
            $("span[total]").html(formatInputMask(acumulador));
        } else {
            //Mensaje
            MsgError({
                title: "Error <small>Presupuesto insuficiente</small>",
                content: ["Presupuesto Inicial: <strong>" + presupuestoInicial + "</strong>", "Valor Insertado: <strong>" + formatInputMask(valor_update) + "</strong>"]
            });

            row.precio = 0;
            $("#tbDetallePresupuesto").bootstrapTable('updateRow', {
                index: index,
                row: row
            });
        }
    },
    'focus input[myDecimal]': function (e, value, row, index) {
        $(this).inputmask("myDecimal");
        $(this).select();
    }
};

$(function () {
    initialComponents();

    $('input[data-tipo="fecha"]').on("changeDate", function (e) {
        get();
    });
    $('select[name="idDepartamento"]').on("changed.bs.select", function (e) {
        get();
    });

    $("#tbDetallePresupuesto").bootstrapTable();

    $('input[name="presupuestoInicial"]').focusout(function (e) {
        acumulador = 0;
        $.each($("#tbDetallePresupuesto").bootstrapTable("getData"), function (i, rw) {
            acumulador += convertFloat(rw.precio);
        });

        presupuestoInicial = convertFloat($("input[name='presupuestoInicial']").val());
        bandera = (presupuestoInicial - acumulador < 0);
        if (bandera) {
            input = $(this);
            MsgConfirmation({
                title: "PRESUPUESTO INICIAL INSUFICIENTE",
                content: ["Continuar el proceso implica el reseteo de los valores en los meses ", "Estás seguro de continuar?"],
                continuar: function () {
                    $("#tbDetallePresupuesto").bootstrapTable("load", rows);
                },
                cancel: function () {
                    $(input).setFloat(0);
                    $(input).focus();
                }
            });
        }
    });

    $("button[cancelar]").click(function () {
        clear();
    });

    $("button[save]").click(function () {
        dt = {
            url: getURL("_compras"),
            dt: getDatos()
        };
        result = save_global(dt);
        
        if(result.status){
            MsgSuccess({
                title : "Datos guardados correctamente",
                content: ""
            });
            clear();
        }
        
    });

    $.each($('input[data-tipo="fecha"]'), function (i, input) {
        config = getParamsFecha($(input).attr("dt-tipo"));
        $(input).datepicker(config);
        //$(input).datepicker('update', $(input).getFecha());
    });
    clear();

    $('input[data-tipo="myDecimal"]').inputmask("myDecimal");
});

function clear() {
    $("div[datos_generales]").clear();
    $("span[total]").html(formatInputMask(0));
    datos = JSON.parse(JSON.stringify(rows));
    $("#tbDetallePresupuesto").bootstrapTable("load", datos);
}

function getDatos() {
    dt = JSON.parse($("div[datos_generales]").serializeObject_KBSG());
    dt["meses"] = JSON.stringify($("#tbDetallePresupuesto").bootstrapTable("getData"));
    datos = {
        accion: "save",
        op: 'presupuesto',
        datos: JSON.stringify(dt)
    };
    return (datos);
}

function get() {
    if ($('input[name="año"]').val() !== "" && !$.isEmptyObject($("select[name='idDepartamento']").selectpicker("val"))) {

        dt = getJson({
            url: getURL("_compras"),
            data: {
                accion: "get",
                op: "presupuesto",
                fecha: $('input[name="año"]').getFecha(),
                departamento: $("select[name='idDepartamento']").selectpicker("val")
            }
        });
        if (dt.status) {
            $("div[valores]").edit(dt.get);
            $("div[datos_generales]").data("id", dt.get.id);
            sum = JSON.parse(dt.get.meses).reduce((a, b) => a + b.precio, 0);
            $("span[total]").html(formatInputMask(sum));
            $("#tbDetallePresupuesto").bootstrapTable("load", JSON.parse(dt.get.meses));
            MsgSuccess({
                title: "Datos cargados correctamente.",
                content: ""
            });
        } else {
            $("div[valores]").clear();
            datos = JSON.parse(JSON.stringify(rows));
            $("#tbDetallePresupuesto").bootstrapTable("load", datos);
            MsgError({
                title: "No se encontro datos",
                content: ""
            });
            
        }
    }
}