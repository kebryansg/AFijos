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
            $('#findOrdenCompra table[search]').bootstrapTable("destroy");
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
                    field: "id",
                    class: "col-md-1"
                },
                {
                    title: "Fecha",
                    field: "fecha",
                    formatter: "defaultFecha"
                },
                {
                    title: "Área",
                    field: "area"
                },
                {
                    title: "Acción",
                    class: "col-md-1",
                    formatter: "btnSelecionOrdenPedido",
                    events: "evtInputComponent"
                }
            ];
            break;
        case "Proveedor":
            columns = [
                {
                    title: "Cod.",
                    field: "id",
                    class: "col-md-1"
                },
                {
                    title: "Nombres",
                    field: "nombre"
                },
                {
                    title: "Acción",
                    class: "col-md-1",
                    formatter: "btnSelecionProveedor",
                    events: "evtInputComponent"
                }
            ];
            break;
        case "":
            break;
    }

    return columns;
}


function btnSelecionOrdenPedido() {
    return '<button OrdenPedido class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Seleccionar</button>';
}
function btnSelecionProveedor() {
    return '<button Proveedor class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Seleccionar</button>';
}

window.evtInputComponent = {
    "click button[OrdenPedido]": function (e, value, row, index) {
        modal = $(this).closest(".modal");
        btnRef = $(modal).data("ref");
        $(modal).modal("hide");

        div = $(btnRef).closest(".inputComponent");
        /*$(div).find("input[type='hidden']").val(row.id);
        $(div).find("input[type='text']").val(row.area);*/

    },
    "click button[Proveedor]": function (e, value, row, index) {
        modal = $(this).closest(".modal");
        btnRef = $(modal).data("ref");
        $(modal).modal("hide");

        div = $(btnRef).closest(".inputComponent");
        $(div).find("input[type='hidden']").val(row.id);
        $(div).find("input[type='text']").val(row.nombre);

    }

};

function getOrdenPedido(id){
    getJson(id);
}