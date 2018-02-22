op = "grupos";
url = "servidor/sCatalogo.php";
table = $("#Listado table");

$(function () {
    initialComponents();
    $("#tbDetalle").bootstrapTable();


    $.confirm({
        title: '¿Qué acción desea tomar?',
//        content: 'Its smooth to do multiple confirms at a time. <br> Click confirm or cancel for another modal',<option value=""></option>
        content: '<select class="selectpicker form-control"><option value="ACT">Activo</option></select>',
        icon: 'fa fa-question-circle',
        animation: 'scale',
        closeAnimation: 'scale',
        opacity: 0.5,
        buttons: {
            'ACT': {
                text: 'Activo',
                btnClass: 'btn-blue',
                action: function () {
//                    $.confirm({
//                        title: 'This maybe critical',
//                        content: 'Critical actions can have multiple confirmations like this one.',
//                        icon: 'fa fa-warning',
//                        animation: 'scale',
//                        closeAnimation: 'zoom',
//                        buttons: {
//                            confirm: {
//                                text: 'Yes, sure!',
//                                btnClass: 'btn-orange',
//                                action: function () {
//                                    $.alert('A very critical action <strong>triggered!</strong>');
//                                }
//                            },
//                            cancel: function () {
//                                $.alert('you clicked on <strong>cancel</strong>');
//                            }
//                        }
//                    });
                }
            },
            INA: {
                text: 'Inactivo',
                action: function () {
//                    $.alert('you clicked on <strong>something else</strong>');
                }
            },
            ELI: {
                text: 'Eliminado',
                action: function () {
//                    $.alert('you clicked on <strong>something else</strong>');
                }
            },
            BLO: {
                text: 'Bloqueado',
                action: function () {
//                    $.alert('you clicked on <strong>something else</strong>');
                }
            },
        }
    });

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
