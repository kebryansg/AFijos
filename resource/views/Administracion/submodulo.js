op = "submodulo";
url = "servidor/sAdministracion.php";
table = $("#Listado table");
//selections = [];

$(function () {
    initialComponents();

});

/*function getDatos() {
    form = "form[save]";
    datos = {
        url: $(form).attr("action"),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject()
        }
    };
    return datos;
}*/



function edit(datos) {
    $("form[save]").edit(datos);
    
    
    /*$("form").data("id", datos.ID);
    $("input[name='IDModulo']").val(datos.idmodulo);
    $("input[descripcion_find]").val(datos.modulo);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("select[name='estado']").selectpicker("val", datos.estado);*/
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
