op = "grupos";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function () {
    initialComponents();
    $("#tbDetalle").bootstrapTable();

    $("button[add]").click(function () {
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

    $("button[remove]").click(function () {
        btnGroup = $(this).closest(".btn-group").attr("id");
        table = $("table[data-toolbar='#" + btnGroup + "']");
        rows = $(table).bootstrapTable("getSelections");

    });
});

function getDatos() {
    form = "form[save]";
    rows = $("#tbDetalle").bootstrapTable("getData").filter(row => row.descripcion !== "");
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject_KBSG(),//JSON.stringify(dt),
            subGrupos: JSON.stringify(rows)
        }
    };
    return datos;
}

function edit(datos) {
    form = "form[save]";
    $(form).edit(datos);
    dt = {
        url: getURL("_catalogo"),
        data: {
            accion: "list",
            op: "subgruposXgrupo",
            grupo : datos.id
        }
    };
    $("#tbDetalle").bootstrapTable("load", getJson(dt));
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
    $("#tbDetalle").bootstrapTable("removeAll");
}
