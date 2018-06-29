op = "bodega";
url = "servidor/sCatalogo.php";
//table = $("#Listado table");

$(function(){
    initialComponents();
    
});

function edit(datos) {
    form = "form[save]";
    $(form).edit(datos);
}
