op = "fabricante";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function(){
    initialComponents();
    //$("#modal-find").modal();
});


function edit(datos) {
    $("form").data("id", datos.ID);
    $("input[name='identificacion']").val(datos.identificacion);
    $("input[name='nombre']").val(datos.nombre);
    $("input[name='email']").val(datos.email);
    $("input[name='website']").val(datos.website);
    $("input[name='telefono']").val(datos.telefono);
    $("textarea[name='direccion']").val(datos.direccion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("select[name='estado']").selectpicker("val", datos.estado);
    $("input[descripcion_find]").val(datos.pais);
    $("input[name='IDPais']").val(datos.idpais);
    
    $("input[name='contacto']").val(datos.contacto);
    $("input[name='contactoemail']").val(datos.contactoemail);
    $("input[name='contactotelefono']").val(datos.contactotelefono);
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
