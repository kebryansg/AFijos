// url_local = "servidor/sCompras.php"
op = "proveedor";
table = $("#Listado table");
$(function () {
    initialComponents();
});

function edit(datos) {
    $("#div-registro form").edit(datos);
}

//function delet(datos) {
//    $.ajax({
//        url: url_local,
//        type: "POST",
//        async: false,
//        data: {
//            accion: "delete",
//            op: op,
//            id: datos.ID
//        }
//    });
//    $(table).bootstrapTable("refresh");
//}