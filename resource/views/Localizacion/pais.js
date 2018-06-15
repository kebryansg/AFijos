op = "pais";
table = $("#Listado table");
//selections = [];

$(function () {
    initialComponents();
});

function edit(datos) {
    $("form[save]").edit(datos);
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