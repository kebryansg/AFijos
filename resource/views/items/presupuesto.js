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
                acumulador += convertFloat(rw.precio);
        });
        presupuestoInicial = convertFloat($("input[name='presupuestoInicial']").val());

        bandera = !(presupuestoInicial - acumulador < 0);
        if (bandera) {
            row.precio = valor_update;
            $("#tbDetallePresupuesto").bootstrapTable('updateRow', {
                index: index,
                row: row
            });
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
function get() {
    if ($('input[name="año"]').val() !== "" &&  !$.isEmptyObject($("select[name='idDepartamento']").selectpicker("val"))) {
        $.ajax({
            url: "servidor/sCompras.php",
            cache: false,
            type: 'POST',
            async: false,
            dataType: 'json',
            data: {
                accion: "get",
                op: "presupuesto",
                fecha: $('input[name="año"]').getFecha(),
                departamento: $("select[name='idDepartamento']").selectpicker("val")// "1"
            },
            success: function (response) {
                if (response.status) {
                    $("form[save]").edit(response.get);
                    $("#tbDetallePresupuesto").bootstrapTable("load", JSON.parse(response.get.meses));

                } else {
                    MsgError({
                        title: "No se encontro datos",
                        content: ""
                    });
                    clear();
                }
            }
        });
    }
}

$(function () {

    initialComponents();

    $("#tbDetallePresupuesto").bootstrapTable();

    //$("select[name='idDepartamento']").selectpicker("val", -1);

//    datos = JSON.parse(JSON.stringify(rows));
//    $("#tbDetallePresupuesto").bootstrapTable("load", datos);



    $('input[data-tipo="fecha"]').on("changeDate", function (e) {
        get();
    });
    $('select[name="idDepartamento"]').on("changed.bs.select", function (e) {
        get();
    });


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
                    setearMyDecimal(input);
                    $(input).focus();
                }
            });
            //Mensaje
            //setearMyDecimal(this);
        }

    });

    $("button[cancelar]").click(function () {
        clear();
    });

    $("#btnGet").click(function (e) {
        fecha = $('input[name="año"]').datepicker("getDate");
        console.log(formatSave(fecha));
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
    $("form[save]").clear();
    datos = JSON.parse(JSON.stringify(rows));
    $("#tbDetallePresupuesto").bootstrapTable("load", datos);
}

function getDatos() {
    form = "form[save]";
    dt = JSON.parse($(form).serializeObject_KBSG());
    dt["meses"] = JSON.stringify($("#tbDetallePresupuesto").bootstrapTable("getData"));
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: JSON.stringify(dt)
        }
    };
    return datos;
}