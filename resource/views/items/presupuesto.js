table = $("#Listado table");

function rowCount(valu, row, index) {
    return index + 1;
}
function imask(value, rowData, index) {
    return '<input myDecimal field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
}
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

    initialComponents();
    $("#tbDetallePresupuesto").bootstrapTable();
    $("#tbDetallePresupuesto").bootstrapTable("load", rows);



    $('input[name="presupuestoInicial"]').change(function (e) {
        acumulador = 0;
        $.each($("#tbDetallePresupuesto").bootstrapTable("getData"), function (i, rw) {
                acumulador += convertFloat(rw.precio);
        });
        
        presupuestoInicial = convertFloat($("input[name='presupuestoInicial']").val());
        bandera = (presupuestoInicial - acumulador < 0);
        if(bandera){
            //Mensaje
            setearMyDecimal(this);
        }
        
    });
    


    $("#btnGet").click(function (e) {
        fecha = $('input[name="año"]').datepicker("getDate");
        console.log(formatSave(fecha));
    });

    $.each($('input[fecha]'), function (i, input) {
        config = getParamsFecha($(input).attr("dt-tipo"));
        $(input).datepicker(config);
    });


    $('input[myDecimal]').inputmask("myDecimal");



});

function getDatos() {
    form = "form[save]";
    dt = JSON.parse($(form).serializeObject());
    dt.año = formatSave(dt.año);
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