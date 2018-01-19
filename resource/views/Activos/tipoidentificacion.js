op = "TipoIdentificacion";
table = $("#Listado table");

$(function(){
    initialComponents();
//    $("button[name='btn_add']").click();
});
function getDatos(){
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
}

function edit(datos){
    $("#div-registro form").data("id", datos.ID);
    for(var clave in datos){
        $("#div-registro form [name='"+ clave +"']").val(datos[clave]);
    }
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
