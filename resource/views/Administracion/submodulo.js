op = "submodulo";
url = "servidor/sAdministracion.php";
table = $("#Listado table");
//selections = [];

$(function () {
    initialComponents();

    $("#cboIcon").change(function () {
        icon = $(this).selectpicker("val");
        $("#icono").removeAttr("class");
        $("input[name='icon']").val(icon);
        $("#icono").attr("class", "fa fa-4x fa-" + icon);
    });

});


function initRegistro() {
    $("form[save]").clear();
    $("#cboIcon").selectpicker("val", "folder-open").change();
}

function formatIcon(value)  {
    return '<i class="fa fa-' + value + '"></i>';
}

function edit(datos) {
    $("form[save]").edit(datos);
    $("#cboIcon").selectpicker("val", datos.icon);//.change();
    $("#cboIcon").change();
    
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
