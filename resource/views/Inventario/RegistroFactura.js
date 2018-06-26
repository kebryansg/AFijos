$(function () {
    initialComponents();
    $("table").bootstrapTable();

    $("input[codigoFactura]").keypress(function (e) {
        if (e.keyCode === 13) {
            getDetalleCompra();
        }

    });
    $("button[save]").click(function () {
        dt = $("table").bootstrapTable("getData").filter(row => convertFloat(row.ingreso) !== 0);
        console.log(dt);
        
    });
    $("button[codigoFactura]").click(function () {
        getDetalleCompra();
    });
});

function imaskMinMax(value, rowData, index) {
    return '<input myDecimalMinMax d-min="0" d-max="' + rowData.saldo + '" field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(rowData.ingreso) + '">';
}

function getDetalleCompra() {
    dt = getJson({
        url: getURL("_compras"),
        data: {
            op: "detalle.compras",
            accion: "list",
            codigo: $("input[codigoFactura]").val()
        }
    });
    $("table").bootstrapTable("load", dt);
}