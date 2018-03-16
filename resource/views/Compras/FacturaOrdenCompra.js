$(function () {
    initialComponents();

    $("#tbDetalleOrdenCompraFaltante").bootstrapTable();
    $("select[name='idproveedor']").selectpicker("val", -1);

    $("select[name='idproveedor']").on('changed.bs.select', function (e) {
        datos = getJson({
            data: {
                op: "proveedorDetalleOrdenCompra",
                accion: "list",
                proveedor: $(this).selectpicker("val")
            },
            url: getURL("_compras")
        });

        $("#tbDetalleOrdenCompraFaltante").bootstrapTable("load", datos);

    });
});