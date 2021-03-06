var TablePaginationDefault = {
    classes: "table table-striped table-bordered table-hover",
    pageSize: 10,
    search: true,
    pageList: [5, 10, 15, 20],
    cache: false,
    showRefresh: true,
    pagination: true,
    sidePagination: "server"
};

var TableFull = {
    clickToSelect: true,
    cache: false,
    showRefresh: true
};

/* Formato Presentacion Fecha */
function defaultFecha(value, rowData, index) {
    return formatView(value).toUpperCase();
}

function formatterDepreciable(value) {
    return (parseInt(value)) ? "Si" : "No";
}

/* Aplicar el TRUE check rows  */
function responseHandler(res) {
    $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.ID, selections) !== -1;
    });
    return res;
}

/* Formato Estados Generales */
function estadoFormat(value) {
    result = "";
    switch (value) {
        case "PEN":
            result = "Pendiente";
            break;
        case "ACT":
            result = "Activo";
            break;
        case "INA":
            result = "Inactivo";
            break;
        case "BLO":
            result = "Bloqueado";
            break;
    }
    return result.toUpperCase();
}

/* Aplicar formato de estado */
function estadoOrdenPedido(value) {
    result = "";
    switch (value) {
        case "PEN":
            result = "Pendiente";
            break;
        case "APR":
            result = "Aprobado";
            break;
        case "DEV":
            result = "Devuelto";
            break;
        case "REC":
            result = "Rechazado";
            break;
    }
    return result.toUpperCase();
}

/* Asignacion de eventos a boton accion default */
window.event_accion_default = {
    "click li[name='edit']": function (e, value, row, index) {
        showRegistro();
        edit(row);
    },
    "click li[name='delete']": function (e, value, row, index) {
        alertEliminarRegistro(row);
    },
    "click button[name='seleccion']": function (e, value, row, index) {
        action_seleccion_v2(row);
    }
};

window.event_input_default = {
    "change input[text]": function (e, value, row, index) {
        //field = $(this).attr("field");
        field = $(this).attr("data-field");
        row[field] = $(e.target).val();
        table = $(this).closest("table");
        $(table).bootstrapTable('updateRow', {
            index: index,
            row: row
        });
    },
    "change input[myDecimal]": function (e, value, row, index) {
        input = $(e.target);
        field = $(input).attr("field");
        row[field] = $(input).getFloat();//.val();
        table = $(input).closest("table");
        $(table).bootstrapTable('updateRow', {
            index: index,
            row: row
        });
        if($(input).attr("data-fn")){
            self[$(input).attr("data-fn")]();
        }
    },
    "change input[myDecimalMinMax]": function (e, value, row, index) {
        input = $(e.target);
        field = $(input).attr("field");
        row[field] = $(input).getFloat();//.val();
        table = $(input).closest("table");
        $(table).bootstrapTable('updateRow', {
            index: index,
            row: row
        });
    },
    "click input[text]": function (e, value, row, index) {
        $(this).focus();
    },
    'focus input[myDecimal]': function (e, value, row, index) {
        $(this).inputmask("myDecimal");
        $(this).select();
    },
    'focus input[myDecimalMinMax]': function (e, value, row, index) {
        max = $(this).attr("d-max");
        min = $.isEmptyObject($(this).attr("d-min"))? 1 : $(this).attr("d-min") ;
        $(this).inputmask($.extend({}, myDecimalMinMax, {max: max, min: min}));
        $(this).select();
    }
};


/* Lista por defecto boton Accion */
function defaultBtnAccion(value, rowData, index) {
    return '<div class="btn-group" name="shows">' +
            '<button type="button" class="btn btn-default dropdown-toggle btn-sm"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
            ' <i class="fa fa-fw fa-align-justify"></i>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-left" >' +
            '<li name="edit"><a href="#"> <i class="fa fa-edit"></i> Editar</a></li>' +
            ' <li name="delete" ><a href="#"> <i class="fa fa-trash"></i> Eliminar</a></li>' +
            '</ul>' +
            '</div>';
}

function btnSeleccion(value) {
    return '<button name="seleccion" class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Seleccionar</button>';
}

/* Formato para Texto */
function defaultInput(value, rowData, index) {
    return '<input text data-field="' + this.field + '" class="form-control input-sm" type="text" value="' + value + '">';
}

/* Formato Generar N° Filas */
function rowCount(value, row, index) {
    return index + 1;
}

/* Formato para Cajas de Numeros Decimales */
function imask(value, rowData, index) {
    //value = $.isEmptyObject(value) ? 0 : value;
    value = value !== undefined ? value : 0;
    return '<input myDecimal field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
}

function mask(value, rowData, index) {
    value = $.isEmptyObject(value) ? 0 : value;
    return formatInputMask(value);
}



