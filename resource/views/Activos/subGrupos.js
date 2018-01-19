op = "subgrupos";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function () {
    initialComponents();

});


function edit(datos) {
    $("input[name='IDGrupo']").val(datos.idgrupo);
    $("input[descripcion_find]").val(datos.grupo);
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
