/* Cargar Datos a un select */
function loadCbo(data, select) {
    $(select).html("");
    $.each(data.rows, function (i, row) {
        option = document.createElement("option");
        $(option).attr("value", row.ID);
        $(option).html(row.descripcion);
        $(select).append(option);
    });
    $(select).selectpicker("refresh");
}
/* Obtener un array JSON */
function getJson(params) {
    result = {};
    $.ajax({
        url: params.url,
        async: false,
        type: 'POST',
        dataType: 'json',
        data: params.data,
        success: function (response) {
            result = response;
        }
    });
    return result;
}

/* Guardar Registro's */
function save_global(datos) {
    $.ajax({
        url: datos.url,
        cache: false,
        type: 'POST',
        async: false,
        dataType: 'json',
        data: datos.dt,
        success: function (response) {
            //loadTable();
            //$(table).bootstrapTable("refresh");
            //hideRegistro();
        }
    });
}
/* Mostrar Div Registro */
function showRegistro() {
    $("#Listado").fadeOut();
    $("#Listado").addClass("hidden");
    $("#div-registro").fadeIn("slow");
    $("#div-registro").removeClass("hidden");

    $("input[fecha]").val(formatView(moment()));
    //$("input[myDecimal]").inputmask("myDecimal");

}
/* Ocultar Div Registro */
function hideRegistro() {
    $("#div-registro").fadeOut();
    $("#div-registro").addClass("hidden");
    /*
     if ($("#div-registro table").length > 0) {
     $("#div-registro table").bootstrapTable("removeAll");
     }
     */
    $("#Listado").fadeIn("slow");
    $("#Listado").removeClass("hidden");
    $("#div-registro form").removeData("id");
    $("#div-registro select.selectpicker").selectpicker("val", -1);
    $('#div-registro select.selectpicker').selectpicker('refresh');


}

/* Formatos de Fechas */
function formatView(data) {
    fecha = moment(data, "YYYY-MM-DD HH:mm:ss");
    return fecha.format('MMMM D, YYYY');
}
function formatSave(data) {
    fecha = moment(data, 'MMMM D, YYYY');
    return fecha.format("YYYY-MM-DD HH:mm:ss");
}

/* Formatos fechas para inicializar DATEPICKER */
function getParamsFecha(dt) {
    init_fecha = {
        autoclose: true,
        language: "es",
        format: 'MM dd, yyyy'
    };
    switch (dt) {
        case "year":
            return $.extend({}, init_fecha, {
                minViewMode: 2
            });
            break;
        case "month":
            return $.extend({}, init_fecha, {
                minViewMode: 1
            });
            break;
        case "day":
            return $.extend({}, init_fecha, {
                todayBtn: true,
                todayHighlight: true
            });
            break;
    }
}