op = "area";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function () {
    initialComponents();

});

function edit(datos) {
    $("form").data("id", datos.ID);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("select[name='estado']").selectpicker("val", datos.estado);
}

function delet(datos){
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
