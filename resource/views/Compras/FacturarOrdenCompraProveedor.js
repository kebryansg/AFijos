$(function(){
    initialComponents();
    $("#tbDetalleOrdenCompraFaltante").bootstrapTable();
    $("#file-6").fileinput({
        overwriteInitial: false,
        validateInitialCount: true,
        hideThumbnailContent: true,
        showUpload: false,
        theme: "gly",
        language: 'es',
        maxFileCount: 3
    });
    
    $("select[proveedor]").change(function(e){
        $("#tbDetalleOrdenCompraFaltante").bootstrapTable("refresh");
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
                rows: JSON.stringify($("#tbDetalleOrdenCompraFaltante").bootstrapTable("getSelections"))
            }
        };
        result = save_global(dt);
        if(result.status){
            $("button[cancelar]").click();
        }
    });
    
    $("button[cancelar]").click(function () {
        $("form[save]").clear();
        $("select[proveedor]").refreshSelect();
        $("#tbDetalleOrdenCompraFaltante").bootstrapTable("refresh");
    });
    
});
function fnParams(params){
    params.proveedor = $("select[proveedor]").selectpicker("val");
    return params;
}

function imaskMinMax(value, rowData, index) {
    //return '<input myDecimalMinMax d-max="' + rowData.saldo + '" field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
    return '<input myDecimalMinMax d-max="' + rowData.saldo + '" field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
}