function getForm(form) {
    value = {};
    components = $(form).find("[name]");
    $.each(components, function (i, component) {
        tagName = $(component).prop("tagName");
        name = $(component).attr("name");
        val = "";
        switch (tagName) {
            case "SELECT":
                val = $(component).selectpicker("val");
                break;
            case "INPUT":
                if ($(component).attr("myDecimal") === "") {
                    val = $(component).getFloat();
                } else if ($(component).attr("fecha") === "") {
                    val = $(component).val();
                }

                break;
        }
        value[name] = val;
    });
    return value;
}

$.fn.iniciarTable = function () {
    tb = $(this).attr("tb-tipo");

    switch (tb) {
        case "pagination":
            $(this).bootstrapTable(TablePaginationDefault);
            break;
        case "full":
            $(this).bootstrapTable(TableFull);
            break;
    }


};


$.fn.initDate = function () {
    dt = $(this).attr("dt-tipo");
    init_fecha = {
        autoclose: true,
        orientation: "bottom auto",
        language: "es"
    };
    switch (dt) {
        case "year":
            $.extend(init_fecha, {
                minViewMode: 2,
                format: 'yyyy'
            });
            break;
        case "month":
            $.extend(init_fecha, {
                minViewMode: 1,
                format: 'MM, yyyy'
            });
            break;
        case "day":
            $.extend(init_fecha, {
                todayBtn: true,
                todayHighlight: true,
                format: 'MM dd, yyyy'
            });
            break;
    }

    $(this).datepicker(init_fecha);
};

$.fn.getFloat = function () {
    return parseFloat($(this).val().toString().replace(/[^\d\.\-]/g, ""));// $(component).val();
};

/* Array Claves JSON */
function JSON_Clave(obj) {
    claves = [];
    for (var clave in obj) {
        claves.push(clave.toUpperCase());
    }
    return claves;
}
;

/* Validacion de Form */

function validateForm(form) {
    bandera = true;
    $.each($(form).find("[required]"), function (i, input) {
        if (bandera) {
            switch ($(input).prop("tagName")) {
                case "INPUT":
                    if ($(input).attr("myDecimal") === "") {
                        value = (convertFloat($(input).val()));
                        bandera = value > 0;
                    } else if ($(input).attr("fecha") === "") {
                        bandera = $(input).val() !== "";
                    }
                    break;
            }
        }
    });
    return bandera;
}



/* Parse Float */
function convertFloat(valor) {
    value = parseFloat(valor.toString().replace(/[^\d\.\-]/g, ""));
    return value;
}

/* Inputmask format*/
function formatInputMask(value) {
    return Inputmask.format(value, "myDecimal");
}


/* Setear INPUT[myDecimal] */
function setearMyDecimal(input) {
    $(input).inputmask('remove');
    $(input).val("0.00");
    $(input).inputmask("myDecimal");
}
$.fn.setFloat = function (value) {
    $(this).inputmask('remove');
    $(this).val(value);
    $(this).inputmask("myDecimal");
};



/* Cargar Datos a un select */
function loadCbo(data, select) {
    console.log(data);
    $(select).html("");
    $.each(data.rows, function (i, row) {
    //$.each(data, function (i, row) {
        //console.log(row);
        option = document.createElement("option");
        //$(option).attr("value", row.ID);
        $(option).attr("value", row.id);
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

    if (typeof window.finRegistro === 'function') {
        finRegistro();
    }

    $("#div-registro").fadeOut();
    $("#div-registro").addClass("hidden");

    $("#Listado").fadeIn("slow");
    $("#Listado").removeClass("hidden");
    $("#div-registro form").removeData("id");
    /*$("#div-registro select.selectpicker").selectpicker("val", -1);
     $('#div-registro select.selectpicker').selectpicker('refresh');*/

}

/* Formatos de Fechas */
function formatView(data) {
    fecha = moment(data, fecha_format.save);//"YYYY-MM-DD HH:mm:ss"
    return fecha.format(fecha_format.view);
}
function formatSave(data) {
    fecha = moment(data, fecha_format.view); // 'MMMM D, YYYY'
    return fecha.format(fecha_format.save);
}
/*function fechaMoment(data) {
 return moment(data, 'MMMM D, YYYY');
 }*/
function fechaMoment(data, format) {
    return moment(data, format);
}

/* Formatos fechas para inicializar DATEPICKER */
function getParamsFecha(dt) {
    init_fecha = {
        autoclose: true,
        orientation: "bottom auto",
        language: "es"
    };
    switch (dt) {
        case "year":
            return $.extend({}, init_fecha, {
                minViewMode: 2,
                format: 'yyyy'
            });
            break;
        case "month":
            return $.extend({}, init_fecha, {
                minViewMode: 1,
                format: 'MM, yyyy'
            });
            break;
        case "day":
            return $.extend({}, init_fecha, {
                todayBtn: true,
                todayHighlight: true,
                format: 'MM dd, yyyy'
            });
            break;
    }
}
// Array, Text
function MsgError(data) {
    $.alert({
        title: data.title,
        backgroundDismiss: true,
        icon: 'fa fa-exclamation-triangle',
        type: 'orange',
        content: $.isArray(data.content) ? data.content.join("<br>") : data.content
    });
}

function MsgConfirmation(data) {
    $.confirm({
        theme: "modern",
        escapeKey: "cancelAction",
        icon: 'fa fa-exclamation-triangle',
        type: 'orange',
        title: data.title,
        content: $.isArray(data.content) ? data.content.join("<br>") : data.content,
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Continuar',
                keys: ['enter'],
                action: data.continuar
            },
            cancelAction: {
                text: "Cancelar",
                action: data.cancel
            }
        }
    });
}


function getEstado_OrdenPedido(value) {
    switch (value) {
        case "PEN":
            return "Pendiente";
            break;
        case "APR":
            return "Aprobado";
            break;
        case "DEV":
            return "Devuelto";
            break;
        case "REC":
            return "Rechazado";
            break;
    }
}

function recorrerModulos(rows) {
    if ($.isArray(rows)) {
        op = '';
        $.each(rows, function (i, row) {
            clave = JSON_Clave(row);
            if ($.inArray("SUB", clave) !== -1) {
                if ($.isArray(row.sub)) {
                    op += '<li class="treeview">' +
                            '<a href="#">' +
                            '<i class="fa fa-' + row.icon + '"></i> <span>' + row.descripcion + '</span>' +
                            '<span class="pull-right-container"> <i class="fa fa-angle-left pull-right loco"></i> </span>' +
                            '</a>' +
                            '<ul class="treeview-menu">' + recorrerModulos(row.sub) + '</ul>' +
                            '</li>';
                }
            } else {
                op += '<li><a href="mvc/views/Pedido/ordenPedido.php"><i class="fa fa-' + row.icon + ' fa-fw"></i> ' + row.descripcion + '</a></li>';
            }
        });
        return op;
    } else {
        return '<li><a href="mvc/views/Pedido/ordenPedido.php"><i class="fa fa-' + rows.icon + ' fa-fw"></i> ' + rows.descripcion + '</a></li>';
    }
}

function genMenu() {
    dt = {
        url: getURL("_administracion"),
        data: {
            accion: "list",
            op: "Menu"
        }
    };
    return recorrerModulos(getJson(dt));
}