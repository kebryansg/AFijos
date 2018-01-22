/* Formato Presentacion Fecha */
function defaultFecha(value, rowData, index) {
    return formatView(value).toUpperCase();
}

/* Aplicar el TRUE check rows  */
function responseHandler(res) {
    $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.ID, selections) !== -1;
    });
    return res;
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

function defaultDescripcion(value, rowData, index) {
    if (rowData.id === 0) {
        return '<input descripcion class="form-control input-sm" type="text" value="' + value + '">';
    } else {
        return value;
    }
}