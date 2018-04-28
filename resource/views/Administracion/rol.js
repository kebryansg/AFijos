op = "rol";
// url = "servidor/sAdministracion.php";
table = $("#Listado table");

$(function () {
    initialComponents();
    
    
    $("#tbPermisoRol").bootstrapTable();
    
    $("#tbPermisoRol").bootstrapTable("resetView");
});


function getDatos() {
    form = "form[save]";
    permisos = $("#tbPermisoRol").bootstrapTable("getSelections").map(row => row.id);
    datos = {
        url: $(form).attr("action"),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject_KBSG(),
            permisos: JSON.stringify(permisos)
        }
    };
    console.log(datos);
    return datos;
}

function edit(datos) {
    form = "form[save]";
    $(form).edit(datos);
    $("#tbPermisoRol").bootstrapTable("uncheckAll");
    if (datos.submodulos !== null)
        $("#tbPermisoRol").bootstrapTable("checkBy", {field: "id", values: datos.submodulos.split(",")});
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

function finRegistro(){
    $("#tbPermisoRol").bootstrapTable("uncheckAll");
}