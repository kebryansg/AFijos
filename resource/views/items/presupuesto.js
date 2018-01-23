table = $("#Listado table");

function rowCount(valu, row, index){
    return index + 1;
}
function imask(value, rowData, index) {
    return '<input myDecimal field="' + this.field + '" type="text" class="form-control input-sm" value="' + value + '">';
}

$(function () {


    rows = [
        {mes: "ENERO", precio: 0.00},
        {mes: "FEBRERO", precio: 0.00},
        {mes: "MARZO", precio: 0.00},
        {mes: "ABRIL", precio: 0.00},
        {mes: "MAYO", precio: 0.00},
        {mes: "JUNIO", precio: 0.00},
        {mes: "JULIO", precio: 0.00},
        {mes: "AGOSTO", precio: 0.00},
        {mes: "SEPTIEMBRE", precio: 0.00},
        {mes: "NOVIEMBRE", precio: 0.00},
        {mes: "DICIEMBRE", precio: 0.00}
    ];

    initialComponents();
    $("#tbDetallePresupuesto").bootstrapTable();
    $("#tbDetallePresupuesto").bootstrapTable("load", rows);


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