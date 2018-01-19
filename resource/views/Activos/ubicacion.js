op = "ubicacion";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function(){
    initialComponents();
    
});



function edit(datos) {
    $("form").data("id", datos.ID);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("select[name='estado']").selectpicker("val", datos.estado);
    
    $("input[descripcion_find]").val(datos.bodega);
    $("input[name='IDBodega']").val(datos.idbodega);
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