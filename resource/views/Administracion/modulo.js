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
    $("form").data("id", datos.ID);
    $("input[name='descripcion']").val(datos.descripcion);
    $("textarea[name='observacion']").val(datos.observacion);
    $("select[name='estado']").selectpicker("val", datos.estado);
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
