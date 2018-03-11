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
    /*$("#icono").attr("class", "fa fa-folder-open fa-4x");
     $("input[name='icon']").val("folder-open");*/
    alert();
    $("#cboIcon").selectpicker("val", "folder-open");//.change();
}

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

function formatIcon(value)  {
    return '<i class="fa fa-' + value + '"></i>';
}

function edit(datos) {
    $("form[save]").edit(datos);
    console.log(datos);
    $("#cboIcon").selectpicker("val", datos.icon);//.change();
    
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
