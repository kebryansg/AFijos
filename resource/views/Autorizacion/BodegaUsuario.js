bodegaSelect = [];

$(function () {
    $("table").on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function (e, rows) {
        var ids = $.map(!$.isArray(rows) ? [rows] : rows, row => row.id);
        if ($.inArray(e.type, ['check', 'check-all']) > -1) {
            ids = ids.filter(id => ($.inArray(id, bodegaSelect) === -1));
            bodegaSelect = $.merge(bodegaSelect, ids);
        } else {
            $.each(ids, function (i, id) {
                bodegaSelect.splice($.inArray(id, bodegaSelect), 1);
            });
        }
    });

    $("button[save]").click(function () {
        dt = {
            url: getURL("_autorizacion"),
            dt: {
                accion: "save",
                op: "bodega.usuario",
                usuario: $("div[usuario]").data("id"),
                bodegas: JSON.stringify(bodegaSelect)
            }
        };
        save_global(dt);
        $("button[cancelar]").click();
    });

    $("button[cancelar]").click(function () {
        bodegaSelect = [];
        $("div[usuario]").clear();
        $("table[bodega]").bootstrapTable("refresh");
    });

    $("table[bodega]").bootstrapTable($.extend({}, TablePaginationDefault, {
        search: false,
        pageSize: 5,
        responseHandler: "sBodegaUsuario",
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

function sBodegaUsuario(res) {
    $(res.rows).each(function (i, row) {
        row.state = $.inArray(row.id, bodegaSelect) !== -1;
    });
    return res;
}

function btnAccion() {
    return '<button select class="btn btn-info btn-sm"><i class="fa fa-arrow-right"></i> </button>';
}

window.event_UsuarioSelect = {
    "click button[select]": function (e, value, row, index) {
        $("div[usuario]").edit(row);
        $(".modal").modal("hide");

        dt = getJson({
            url: getURL("_usuarios"),
            data: {
                accion: "list",
                op: "usuario.bodega",
                usuario: row.id
            }
        });

        bodegaSelect = $.map(dt, row => row.idbodega);
        $("table[bodega]").bootstrapTable("refresh");
    }
};