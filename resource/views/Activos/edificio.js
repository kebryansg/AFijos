op = "edificio";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function () {
    initialComponents();
    //$("#modal-find").modal();
});

function edit(datos) {
    $("form").data("id", datos.ID);
    $("input[name='nombre']").val(datos.nombre);
    $("input[name='telefono']").val(datos.telefono);
    $("textarea[name='direccion']").val(datos.direccion);
    $("select[name='estado']").selectpicker("val", datos.estado);
    $("input[descripcion_find]").val(datos.ciudad);
    $("input[name='IDCiudad']").val(datos.idciudad);
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