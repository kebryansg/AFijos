op = "subclases";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function () {
    initialComponents();
    //$("#modal-find").modal();
});


function edit(datos) {
    $("input[name='IDClase']").val(datos.idclase);
    $("input[descripcion_find]").val(datos.clase);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("select[name='estado']").selectpicker("val", datos.estado);
    $("form").data("id", datos.ID);
}
function delet(datos) {
    $.ajax({
        url: url,
        type: "POST",
        async: false,
        data: {
            accion: "delete",
            op: op,
            id: datos.ID
        }
    });
    $(table).bootstrapTable("refresh");
}
