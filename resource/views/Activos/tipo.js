op = "tipo";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function(){
    initialComponents();
    $("input[data-tipo='myDecimal']").setFloat(0);
    
});

function edit(datos) {
    console.log(datos);
    $("form[save]").edit(datos);
//    $("form").data("id", datos.ID);
//    $("input[name='descripcion']").val(datos.descripcion);
//    $("textarea[name='observacion']").val(datos.observacion);
//    $("input[name='vidautil']").val(datos.vidautil);
//    $("input[name='depreciable']").prop('checked', parseInt(datos.depreciable));
//    $("select[name='estado']").selectpicker("val", datos.estado);
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