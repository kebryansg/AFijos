op = "TipoEmisor";
table = $("#Listado table");

$(function(){
    initialComponents();
//    $("button[name='btn_add']").click();
});

function edit(datos){
    console.log(datos);
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