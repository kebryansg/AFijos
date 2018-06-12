
$(function () {
    initialComponents();
    $("#tbDetalleOrdenCompraFaltante").bootstrapTable();
//    $("select[name='idproveedor']").selectpicker("val", -1);

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
    
    $("button[save]").click(function () {
        datos = JSON.parse($("div[OCompra]").serializeObject_KBSG());
        RFactura = $("div[RFactura]").serializeObject_KBSG(true);
        delete RFactura["id"];
        datos.detallefactura = JSON.stringify(RFactura);

        dt = {
            url: getURL("_compras"),
            dt:{
                accion : "save",
                op: "facturar.compra.orden",
                datos: JSON.stringify(datos),
                rows: JSON.stringify($("#tbDetalleOrdenCompraFaltante").bootstrapTable("getData"))
            }
        };
        result = save_global(dt);
        if(result.status){
            $("button[cancelar]").click();
        }
    });
    $("button[cancelar]").click(function () {
        $("form[save]").clear();
        $("#Listado table").bootstrapTable("refresh");
        $("#tbDetalleOrdenCompraFaltante").bootstrapTable("removeAll");
        hideRegistro();
    });
});

function btnSelecionProveedor() {
    return '<button Proveedor class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Seleccionar</button>';
}

function bAccion(value,row, index){
    return '<button factura class="btn btn-info btn-sm"><i class="fa fa-edit"></i> </button>';
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
    "click button[factura]": function (e, value, row, index) {
        showRegistro();
        $("div[OCompra]").edit(row);
        $("div[OCompra]").removeData("id");
        $("div[RFactura] input[name='idproveedor']").val(row);
        datos = getJson({
            data: {
                op: "detalle.orden.compra",
                accion: "list",
                id: row.id
            },
            url: getURL("_compras")
        });
        $("#tbDetalleOrdenCompraFaltante").bootstrapTable("load", datos.map(function(row){
            row.iddetalleordencompra = row.id;
            delete row["id"];
            delete row["iddetalleordenpedido"];
            return row;
        }));
    },
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

