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
        if (row.id === 0 && estado === "INA") {
            row.id = -1;
        } else {
            row.estado = estado;
            $("#tbDetalle").bootstrapTable("updateRow", {
                index: row.index,
                row: row
            });
        }

    });
    ids_remove = rows.filter(row => row.id === -1);
    ids = ids_remove.map(row => row.id);
    $("#tbDetalle").bootstrapTable("remove", {field: 'id', values: ids});

    ids = rows.map(row => row.id);
    $("#tbDetalle").bootstrapTable('uncheckBy', {field: 'id', values: ids});
}

function getDatos() {
    form = "form[save]";
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject_KBSG(),
            subModulos: JSON.stringify($("#tbDetalle").bootstrapTable("getData"))
        }
    };
    return datos;
}


function edit(datos) {
    $("form[save]").edit(datos);
    $("#cboIcon").selectpicker("val", datos.icon).change();
    
    dt = {
        url: getURL("_administracion"),
        data: {
            accion: "list",
            op: "submoduloXmodulo",
            modulo: datos.id
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
            id: datos.id
        }
    });
    $(table).bootstrapTable("refresh");
}

function finRegistro() {
    $("#tbDetalle").bootstrapTable("removeAll");
}