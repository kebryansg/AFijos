op = "Contribuyente";
table = $("#Listado table");

$(function () {
    initialComponents();
//    $("button[name='btn_add']").click();
});
function getDatos() {
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