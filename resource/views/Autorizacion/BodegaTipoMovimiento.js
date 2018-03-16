$(function () {
    initialComponents();

    $("#tbPermisoMovimiento").bootstrapTable();
    
    loadTMovimiento();




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