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
//                if ($.inArray(id, bodegaSelect) > -1) {
//                    bodegaSelect.splice($.inArray(id, bodegaSelect), 1);
//                }
            });
        }
    });
    
    $("button[cancelar]").click(function(){
        bodegaSelect = [];
        $("table").bootstrapTable("refresh");
    });




    $("table").bootstrapTable({
        classes: "table table-striped table-bordered table-hover",
        pageSize: 5,
        pageList: [5, 10, 15, 20],
        cache: false,
        showRefresh: true,
        pagination: true,
        sidePagination: "server",
        responseHandler: "sBodegaUsuario",
        clickToSelect: true
    });

    initialComponents();

});

function sBodegaUsuario(res) {
    $(res.rows).each(function (i, row) {
        row.state = $.inArray(row.id, bodegaSelect) !== -1;
    });
    return res;
}