op = "ciudad";
table = $("#Listado table");

$(function () {
    initialComponents();

});


function edit(datos) {
    $("form[save]").edit(datos);
}
