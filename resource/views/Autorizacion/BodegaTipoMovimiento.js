$(function () {
    initialComponents();

    $("#tbPermisoMovimiento").bootstrapTable({
        clickToSelect: true
    });

    $("select[name='idbodega']").selectpicker("val", -1);

    loadTMovimiento();

    $("select[name='idbodega']").on('changed.bs.select', function (e) {
        
        
    });




});

function loadTMovimiento() {
    json_data = {
        data: {
            op: "tipoMovimiento",
            accion: "list"
        },
        url: getURL("_autorizacion")
    };
    datos = getJson(json_data);
    $("#tbPermisoMovimiento").bootstrapTable("load", datos.rows);
}