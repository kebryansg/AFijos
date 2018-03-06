op = "modulo";
url = "servidor/sAdministracion.php";
table = $("#Listado table");

function formatIcon(value) {
    return '<i class="fa fa-' + value + '"></i>';
}

$(function () {
    initialComponents();
    $("#tbDetalle").bootstrapTable();

    $("#cboIcon").change(function () {
        icon = $(this).selectpicker("val");
        $("#icono").removeAttr("class");
        $("input[name='icon']").val(icon);
        $("#icono").attr("class", "fa fa-4x fa-" + icon);
    });
    
    $("button[add]").click(function(){
        btnGroup = $(this).closest(".btn-group").attr("id");
        row = {
            id: 0,
            descripcion: "",
            observacion: "",
            estado: "ACT"
        };
        table = $("table[data-toolbar='#" + btnGroup + "']");
        $(table).bootstrapTable("append", row);
    });
    

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
    return datos;
}


function edit(datos) {
    $("form[save]").edit(datos);
    $("#cboIcon").selectpicker("val", datos.icon).change();
}

function delet(datos) {
    $.ajax({
        url: url,
        type: "POST",
        async: false,
        data: {
            accion: "delete",
            op: op,
            id: datos.id
        }
    });
    $(table).bootstrapTable("refresh");
}
