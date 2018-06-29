TipoMovimientoSelect = [];

$(function () {
    $("table").on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function (e, rows) {
        var ids = $.map(!$.isArray(rows) ? [rows] : rows, row => row.id);
        if ($.inArray(e.type, ['check', 'check-all']) > -1) {
            ids = ids.filter(id => ($.inArray(id, TipoMovimientoSelect) === -1));
            TipoMovimientoSelect = $.merge(TipoMovimientoSelect, ids);
        } else {
            $.each(ids, function (i, id) {
                TipoMovimientoSelect.splice($.inArray(id, TipoMovimientoSelect), 1);
            });
        }
    });

    $("button[save]").click(function () {
        dt = {
            url: getURL("_autorizacion"),
            dt: {
                accion: "save",
                op: "TipoMovimiento.usuario",
                usuario: $("div[usuario]").data("id"),
                TipoMovimientos: JSON.stringify(TipoMovimientoSelect)
            }
        };
        save_global(dt);
        $("button[cancelar]").click();
    });
    $("button[cancelar]").click(function () {
        TipoMovimientoSelect = [];
        $("div[usuario]").clear();
        $("table[TipoMovimiento]").bootstrapTable("refresh");
    });

    $("table[TipoMovimiento]").bootstrapTable($.extend({}, TablePaginationDefault, {
        search: false,
        pageSize: 5,
        responseHandler: "sTipoMovimientoUsuario",
        clickToSelect: true
    }));

    initialComponents();

    $('#findUsuario').on({
        'show.bs.modal': function (e) {
            dataAjax = $(e.relatedTarget).attr("data-ajax");
            $(this).find('table[search]').bootstrapTable($.extend({}, TablePaginationDefault, {
                ajax: dataAjax
            }));
        }
        , 'hidden.bs.modal': function (e) {
            $(this).find('table[search]').bootstrapTable("destroy");
        }
    });

});

function sTipoMovimientoUsuario(res) {
    $(res.rows).each(function (i, row) {
        row.state = $.inArray(row.id, TipoMovimientoSelect) !== -1;
    });
    return res;
}

function btnAccion() {
    return '<button select class="btn btn-info btn-sm"><i class="fa fa-arrow-right"></i> </button>';
}
function getTipo(value){
    return (value === "I")? "Ingreso": "Egreso"; 
}

window.event_UsuarioSelect = {
    "click button[select]": function (e, value, row, index) {
        $("div[usuario]").edit(row);
        $(".modal").modal("hide");

        dt = getJson({
            url: getURL("_usuarios"),
            data: {
                accion: "list",
                op: "usuario.TipoMovimiento",
                usuario: row.id
            }
        });

        TipoMovimientoSelect = $.map(dt, row => row.idtipomovimiento);
        $("table[TipoMovimiento]").bootstrapTable("refresh");
    }
};