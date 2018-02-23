op = "grupos";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function () {
    initialComponents();
    $("#tbDetalle").bootstrapTable();


    //$('button[name="btn_add"]').click();


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
        if (rows.length > 0)
            $.confirm({
                title: '¿Qué acción desea tomar?',
//        content: 'Its smooth to do multiple confirms at a time. <br> Click confirm or cancel for another modal',<option value=""></option>
                icon: 'fa fa-question-circle',
                animation: 'scale',
                closeAnimation: 'scale',
                opacity: 0.5,
                buttons: {
                    'ACT': {
                        text: 'Activar',
                        btnClass: 'btn-green',
                        action: function () {
                            changeEstadoSubGrupo(rows, "ACT");
                        }
                    },
                    INA: {
                        text: 'Inactivar',
                        btnClass: 'btn-danger',
                        action: function () {
                            changeEstadoSubGrupo(rows, "INA");

                        }
                    },
                    'Cancel': {
                        text: 'Cancelar',
                        action: function () {

                        }
                    }
                }
            });
    });
});

function changeEstadoSubGrupo(rows, estado) {
    $.each(rows, function (i, row) {
        row.estado = estado;
        $("#tbDetalle").bootstrapTable("updateRow", {
            index: row.index,
            row: row
        });
    });
    ids = rows.map(row => row.id);
    $("#tbDetalle").bootstrapTable('uncheckBy', {field: 'id', values: ids});
}

function getDatos() {
    form = "form[save]";
    rows = $("#tbDetalle").bootstrapTable("getData").filter(row => row.descripcion !== "");
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject_KBSG(), //JSON.stringify(dt),
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
            grupo: datos.id
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

function finRegistro() {
    $("#tbDetalle").bootstrapTable("removeAll");
}
