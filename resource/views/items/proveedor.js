url_local = "servidor/sCompras.php"
op = "proveedor";
table = $("#Listado table");
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
    $("#div-registro form").data("id", datos.ID);
    for (var clave in datos) {
        switch ($("#div-registro form [name='" + clave + "']").prop("tagName")) {
            case "SELECT":
                $("#div-registro form [name='" + clave + "']").selectpicker("val", datos[clave]);
                break;
            default:
                $("#div-registro form [name='" + clave + "']").val(datos[clave]);
                break;
        }
    }
}

function delet(datos) {
    $.ajax({
        url: url_local,
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