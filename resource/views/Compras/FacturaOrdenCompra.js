$(function () {
    initialComponents();

    $("#tbDetalleOrdenCompraFaltante").bootstrapTable();
    $("select[name='idproveedor']").selectpicker("val", -1);

    $("#file-6").fileinput({
        overwriteInitial: false,
        validateInitialCount: true,
        hideThumbnailContent: true,
        showUpload: false,
        theme: "gly",
        language: 'es',
        maxFileCount: 3

    });


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
    });

    $("button[removeProveedor]").click(function () {
        $("#tbDetalleOrdenCompraFaltante").bootstrapTable("removeAll");
        $("form[save]").clear();
    });
});

function btnSelecionProveedor() {
    return '<button Proveedor class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Seleccionar</button>';
}

function imaskMinMax(value, rowData, index) {
//    value = ($.isEmptyObject(value)) ? 1 : value;
    return '<input myDecimalMinMax d-max="' + rowData.saldo + '" field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
}

function tableColumns(op) {
    columns = [];
    switch (op) {
        case "Proveedor":
            columns = [
                {
                    title: "Cod.",
                    field: "id",
                    class: "col-md-1",
                    align: "center"
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

window.evtInputComponent = {
    "click button[Proveedor]": function (e, value, row, index) {
        modal = $(this).closest(".modal");
        btnRef = $(modal).data("ref");
        $(modal).modal("hide");

        div = $(btnRef).closest(".inputComponent");
        $(div).find("input[type='hidden']").val(row.id);
        $(div).find("input[type='text']").val(row.nombre);


        /* Detalle Compras */
        datos = getJson({
            data: {
                op: "proveedorDetalleOrdenCompra",
                accion: "list",
                proveedor: row.id
            },
            url: getURL("_compras")
        });
        $.each(datos, function (i, row) {
            row["cantidad"] = 1;
        });

        $("#tbDetalleOrdenCompraFaltante").bootstrapTable("load", datos);


    }
};

