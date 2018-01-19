op = "usuario";
url = "servidor/sAdministracion.php";
table = $("#Listado table");

$(function () {
    initialComponents();
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

}