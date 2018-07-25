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

$.fn.setDate = function(date){
    $(this).val(formatView(date));
    $(this).data("date",date.format(fecha_format.save));
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

/* Get Datos */
$.fn.serializeObject_KBSG = function (json = false) {
    value = {};
    components = $(this).find("[name]:not([exclud])");
    value["id"] = ($.isEmptyObject($(this).data("id"))) ? 0 : $(this).data("id");
    $.each(components, function (i, component) {
        tagName = $(component).prop("tagName");
        name = $(component).attr("name");
        val = "";
        switch (tagName) {
            case "SELECT":
                val = $(component).selectpicker("val");
                break;
            case "TEXTAREA":
                val = $(component).val();
                break;
            case "INPUT":
                tipo = $(component).attr("data-tipo");
                switch (tipo) {
                    case "myDecimal":
                        val = $(component).getFloat();
                        break;
                    case "fechaView":
                        val = $(component).data("date");
                        break;
                    case "fecha":
                        val = $(component).getFecha();
                        break;
                    case "checkbox":
                        val = $(component).prop("checked");
                        break;
                    default:
                        val = $(component).val();
                        break;
                }
                break;
        }
        value[name] = val;
    });
    return (json) ? value : JSON.stringify(value);
};

/* Validacion de Form */
$.fn.validate = function () {
    bandera = true;
    $.each($(this).find("[required]"), function (i, input) {
        if (bandera) {
            switch ($(input).prop("tagName")) {
                case "INPUT":
                    tipo = $(input).attr("data-tipo");
                    switch (tipo) {
                        case "myDecimal":
                            val = $(input).getFloat();
                            bandera = val > 0;
                            break;
                        case "fecha":
                            bandera = $(input).val() !== "";
                            break;
                        default:
                            bandera = $(input).val() !== "";
                            break;
                    }
                    break;
            }
        }
    });
    return bandera;
};

/* Llenar un contenedor */
$.fn.edit = function (datos) {
    claves = JSON_Clave(datos);
    $(this).data("id", datos.id);
    $.each($(this).find("[name]"), function (i, component) {
        name = $(component).attr("name");
        if ($.inArray(name.toUpperCase(), claves) !== -1) {
            tagName = $(component).prop("tagName");
            switch (tagName) {
                case "SELECT":
                    $(component).selectpicker("val", datos[name]);
                    $(component).change();
                    //alert();
                    break;
                case "TEXTAREA":
                    val = $(component).val(datos[name]);
                    break;
                case "INPUT":
                    tipo = $(component).attr("data-tipo");
                    switch (tipo) {
                        case "myDecimal":
                            $(component).setFloat(datos[name]);
                            break;
                        case "fechaView":
                            $(component).val(formatView(datos[name]).toUpperCase());
                            break;
                        case "fecha":
                            $(component).datepicker("update", fechaMoment(datos[name]).toDate());
                            break;
                        case "checkbox":
                            $(component).prop('checked', parseInt(datos[name]));
                            break;
                        default:
                            $(component).val(datos[name]);
                            break;
                    }
                    break;
            }
        }
    });
};

/* Limpiar Contenedor */
$.fn.clear = function () {
    $(this).removeData("id");
    $(this).find("select").selectpicker("val", -1);
    $(this).find("input:not([data-tipo='myDecimal'])").val("");
    $(this).find("input[data-tipo='myDecimal']").setFloat(0);
    $(this).find("input[data-tipo='myPorcentaje']").setPorcent(0);
};

/* Tomar Fecha */
$.fn.getFecha = function () {
    tipo = $(this).attr("dt-tipo");
    fecha = fechaMoment($(this).val(), fecha_format.view);
    switch (tipo) {
        case "year":
            fecha = moment({year: fecha.year(), month: 0, day: 0});
            break;
        case "month":
            fecha = moment({year: fecha.year(), month: fecha.month(), day: 0});
            break;
    }
    return formatSave(fecha);
};

/* Parse Float */
function convertFloat(valor) {
    return parseFloat(valor.toString().replace(/[^\d\.\-]/g, ""));
    ;
}

/* Inputmask format*/
function formatInputMask(value) {
    return Inputmask.format(value, "myDecimal");
}

$.fn.refreshSelect = function () {
    fnc = $(this).attr("data-fn");
    datos = self[fnc]();
    loadCbo(datos, this);
};

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

$.fn.setPorcent = function (value) {
    $(this).inputmask('remove');
    $(this).val(value);
    $(this).inputmask("myPorcentaje");
};

/* Cargar Datos a un select */
function loadCbo(data, select) {
    $(select).html("");
    $.each(data.rows, function (i, row) {
        option = document.createElement("option");
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
    result = null;
    $.ajax({
        url: datos.url,
        cache: false,
        type: 'POST',
        async: false,
        dataType: 'json',
        data: datos.dt,
        success: function (response) {
            result = response;
        }
    });
    return result;
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
function MsgSuccess(data) {
    $.alert({
        title: data.title,
        backgroundDismiss: true,
        icon: 'fa fa-check-square',
        type: 'green',
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
                op += '<li><a href="' + row.ruta + '"><i class="fa fa-' + row.icon + ' fa-fw"></i> ' + row.descripcion + '</a></li>';
            }
        });
        return op;
    } else {
        return '<li><a href="' + rows.ruta + '"><i class="fa fa-' + rows.icon + ' fa-fw"></i> ' + rows.descripcion + '</a></li>';
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
