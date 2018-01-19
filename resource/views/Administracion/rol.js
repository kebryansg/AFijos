op = "rol";
// url = "servidor/sAdministracion.php";
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
            datos: $(form).serializeObject(),
            permisos: getPermisos()
        }
    };
    return datos;
}

function edit(datos) {
    form = "form[save]";
    $(form).data("id", datos.ID);
    for (var clave in datos) {
        $(form + " [name='" + clave + "']").val(datos[clave]);
    }
    $("#tbPermisoRol").bootstrapTable("uncheckAll");
    $("#tbPermisoRol").bootstrapTable("checkBy",{field: "ID", values: datos.submodulos.split(",") });
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

function getPermisos() {
    rows = $.map($("#tbPermisoRol").bootstrapTable("getSelections"), function (row) {
        return row.ID;
    });
    return JSON.stringify(rows);
}
