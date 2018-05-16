op = "usuario";
url = "servidor/sAdministracion.php";
table = $("#Listado table");

$(function () {
    initialComponents();
});

function getDatos() {
    form = "form[save]";
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject_KBSG()
        }
    };
    //console.log(datos);
    return datos;
}
function edit(datos){
    dt = getJson({
        url : getURL("_administracion"),
        data:{
            accion: "get",
            op: "usuario",
            id: datos.id
        }
    });
    
    $("form").edit(dt.persona);
    $("form").edit(dt.usuario);
}