op = "rol";
table = $("#Listado table");
selections = [];

$(function () {
    initialComponents();
    $("form").submit(function (e) {
        e.preventDefault();
        
    });

});

function loadGruposPermisos() {
    $.ajax({
        url: "servidor/sAdministracion.php",
        type: "POST",
        dataType: "json",
        data: {
            op: "grupo_permiso"
        },
        success: function (response) {
            $("#tbgrupo_permiso").bootstrapTable("load", response);
            $("#tbgrupo_permiso").bootstrapTable("resetView");
        }
    });
}
function getPermisos() {
    rows = $.map($("#tbgrupo_permiso").bootstrapTable("getSelections"), function (row) {
        return row.id;
    });
    return JSON.stringify(rows);
}


function clearPage() {
    $("#frmRoles").removeData("id");
    $("input[type='text']").val("");
    $("textarea").val("");
    $("#tbgrupo_permiso").bootstrapTable("uncheckAll");
}