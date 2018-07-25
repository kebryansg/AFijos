select = {
    items: [],
    proveedor: []
};
$(function () {
    initialComponents();

    $("#tbDetalleOrden, table[Proveedor]").bootstrapTable({
        pagination: true,
        sidePagination: "server",
        clickToSelect: true
    });

//    $("input[name='fechaFin']").initDate();

    $("#tbDetalleOrden, table[Proveedor]").on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function (e, rows) {
        _table = $(e.target).attr("data-count");
        var ids = $.map(!$.isArray(rows) ? [rows] : rows, row => row.id);
        if ($.inArray(e.type, ['check', 'check-all']) > -1) {
            //Add
            $.each(ids, function (i, id) {
                if ($.inArray(id, select[_table]) === -1) {
                    select[_table].push(id);
                }
            });
        } else {
            //Delete
            $.each(ids, function (i, id) {
                if ($.inArray(id, select[_table]) > -1) {
                    select[_table].splice($.inArray(id, select[_table]), 1);
                }
            });
        }
        $("span[" + _table + "]").html(select[_table].length);
    });


});

function loadAprobDetPedido(params) {
    json_data = {
        data: $.extend({}, {
            accion: "list",
            op: "aprobacion.detalle.pedido"
        }, params.data),
        url: getURL("_pedido")
    };
    params.success(getJson(json_data));
}

function getDatos(form) {
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: "cotizacion",
            datos: $(form).serializeObject_KBSG(),
            selects: JSON.stringify(select)
        }
    };
    return datos;
}

function initRegistro() {
    $("input[name='fecha']").setDate(moment());
}
function clear() {
    select = {
        items: [],
        proveedor: []
    };
}
