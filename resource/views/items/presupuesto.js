table = $("#Listado table");

$(function () {

    initialComponents();

    $("#btnGet").click(function (e) {
        fecha = $('#datepicker').datepicker("getDate");

        console.log(formatSave(fecha));
    });

    $.each($('input[fecha]'), function (i, input) {
        config = getParamsFecha($(input).attr("dt-tipo"));
        $(input).datepicker(config);
    });



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