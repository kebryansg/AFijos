op = "bodega";
url = "servidor/sCatalogo.php";
//table = $("#Listado table");

$(function(){
    initialComponents();
    
});


function edit(datos) {
    form = "form[save]";
    console.log(datos);
    $(form).edit(datos);
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