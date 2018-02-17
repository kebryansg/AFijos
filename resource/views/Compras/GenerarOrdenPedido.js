$(function () {
    $("#tbDetalleOrden").bootstrapTable();

    //$("#tbFind_Pag").bootstrapTable();



    $('#findOrdenCompra').on({
        'show.bs.modal': function (e) {
            dataAjax = $(e.relatedTarget).attr("data-ajax");
            dataColumns = $(e.relatedTarget).attr("data-columns");
            $(this).data("ref", $(e.relatedTarget));
            
            
            $('#findOrdenCompra table[search]').bootstrapTable($.extend({}, TablePaginationDefault, {
                columns: tableColumns(dataColumns),
                ajax: dataAjax
            }));

        }
        , 'hidden.bs.modal': function (e) {
            $("table[search]").bootstrapTable("destroy");
        }
        /*, 'dbl-click-row.bs.table': function (e, row, $element) {
         action_seleccion_v2(row);
         }*/
    });
});

function tableColumns(op) {
    columns = [];
    switch (op) {
        case "OrdenPedido":
            columns = [
                {
                    title: "Cod.",
                    field: "id"
                },
                {
                    title: "Fecha",
                    field: "fecha",
                    formatter: "defaultFecha"
                },
                {
                    title: "Área",
                    field: "area"
                }
            ];
            break;
        case "Proveedor":
            columns = [
                {
                    title: "Cod.",
                    field: "id"
                },
                {
                    title: "Nombres",
                    field: "nombre"
                }
            ];
            break;
        case "":
            break;
    }
    return columns;
}