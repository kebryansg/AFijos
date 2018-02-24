op = "ordenPedido";
//url = "servidor/sPedido.php";
table = $("#Listado table");
selections = [];

columns_edit = [
    {
        field: 'state',
        checkbox: true,
        sortable: false
    },
    {
        field: "cantidad",
        class: "col-md-1",
        title: "Cant.",
        sortable: false,
        formatter: "imask",
        events: "event_input_default"
    },
    {
        field: "descripcion",
        title: "Descripción",
        sortable: false
    },
    {
        field: "precioref",
        class: "col-md-1",
        title: "Precio Unit.",
        sortable: false,
        formatter: "imask",
        events: "event_input_default"
    }
];
columns_edit_v2 = [
    {
        field: 'state',
        checkbox: true,
        sortable: false
    },
    {
        field: "cantidad",
        class: "col-md-1",
        title: "Cant.",
        sortable: false,
        formatter: "imask",
        events: "event_input_default"
    },
    {
        field: "descripcion",
        title: "Descripción",
        sortable: false,
        formatter: "inputProducto",
        events: "event_input_default"
    },
    {
        field: "precioref",
        class: "col-md-1",
        title: "Precio Unit.",
        sortable: false,
        formatter: "imask",
        events: "event_input_default"
    }
];
columns = [
    {
        field: "cantidad",
        title: "Cant.",
        align: "center",
        class: "col-md-1",
        sortable: false
    },
    {
        field: "descripcion",
        title: "Descripción",
        sortable: false
    },
    {
        field: "precioref",
        title: "Precio Unit.",
        align: "center",
        class: "col-md-1",
        sortable: false
    }
];

function initRegistro() {
    $('input[name="fecha"]').datepicker('update', new Date());

    $("#tbOrdenPedido").bootstrapTable('refreshOptions', {
        columns: columns_edit_v2
    });
}

$(function () {
    initialComponents();

    //$("button[name=btn_add]").click();

    $("button[delete_local]").click(function (e) {
        div_id = $(this).closest("div[toolbar]").attr("id");
        tableSelect = $("table[data-toolbar='#" + div_id + "']");

        // Retornar Ids diferentes a 0
        ids = $(tableSelect).bootstrapTable("getSelections").filter(row => parseInt(row.id) !== 0);
        id_delete = $.map($(ids), function (row) {
            return row.id;
        });

        if ($.isEmptyObject($(this).data("ids"))) {
            $(this).data("ids", id_delete);
        } else {
            _new = $.merge($(this).data("ids"), id_delete);
            console.log(_new);
        }

        state = $(tableSelect).bootstrapTable("getSelections").map(row => row.state);
        $(tableSelect).bootstrapTable("remove", {field: 'state', values: state});

    });

    $("#tbOrdenPedido").bootstrapTable();
    $("#modal-find-items table").bootstrapTable(TablePaginationDefault);


    $("button[add]").click(function (e) {
        $("#tbOrdenPedido").bootstrapTable("append", {
            id: 0,
            cantidad: 1,
            descripcion: "",
            precioref: 0,
            observacion: ""
        });
    });

    $("#modal-find-items").on({
        'show.bs.modal': function (e) {
            $(this).find("table").bootstrapTable("refresh");
        }
    });

    $("button[DeleteIndividual]").click(function (e) {
        div_id = $(this).closest("div[toolbar]").attr("id");
        tableSelect = $("table[data-toolbar='#" + div_id + "']");
        states = $(tableSelect).bootstrapTable("getSelections").map(row => row.state);
        $(tableSelect).bootstrapTable("remove", {field: 'state', values: states});
    });

});


function getDatos() {
    form = "form[save]";
    //dt = JSON.parse($(form).serializeObject());
    dt = JSON.parse($(form).serializeObject_KBSG());
    dt.fecha = formatSave(dt.fecha);
    items_delete = $.isEmptyObject($("button[delete_local]").data("ids")) ? [] : $("button[delete_local]").data("ids");
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: JSON.stringify(dt), //$(form).serializeObject(),
            items: JSON.stringify($("#tbOrdenPedido").bootstrapTable("getData")),
            items_delete: JSON.stringify(items_delete)
        }
    };
    //console.log(datos);
    return datos;
}
function clear() {
    $("#tbOrdenPedido").bootstrapTable("removeAll");
    $("button[delete_local]").removeData("ids");
}


function edit(datos) {
    $("form[save]").edit(datos);
    $("#div-registro input[area]").val(datos.area);
    $("#div-registro input[departamento]").val(datos.departamento);
    $("#div-registro input[usuario]").val(datos.usuario);
    $("#div-registro input[estado]").val(getEstado_OrdenPedido(datos.estado));


    /* Verificar el estado 
     * Lectura o Editar
     * */
    if (datos.estado === "PEN" || datos.estado === "DEV") {
        $("#tbOrdenPedido").bootstrapTable('refreshOptions', {
            columns: columns_edit
        });
    } else {
        $("#tbOrdenPedido").bootstrapTable('refreshOptions', {
            columns: columns
        });
    }

    //DetalleOrdenPedido
    dt = {
        url: getURL("_pedido"),
        data: {
            accion: "list",
            op: "DetalleordenPedido",
            OrdenPedido: datos.id
        }
    };




    $("#tbOrdenPedido").bootstrapTable("load", getJson(dt));
}

function BtnAccion(value, rowData, index) {
    return '<div class="btn-group" name="shows">' +
            '<button type="button" class="btn btn-default dropdown-toggle btn-sm"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
            ' <i class="fa fa-fw fa-align-justify"></i>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-left" >' +
            '<li name="edit"><a href="#"> <i class="fa fa-edit"></i> Editar</a></li>' +
            ' <li name="delete" ><a href="#"> <i class="fa fa-trash"></i> Eliminar</a></li>' +
            '</ul>' +
            '</div>';
}

function inputProducto(value, row, index) {
    if (row.id === 0) {
        return "<input data-field='" + this.field + "' value='" + value + "' class='form-control input-sm' type='text' text >";
    } else {
        return row.descripcion;
    }
}



window.event_OPedido = {
    "click button[name='seleccion']": function (e, value, row, index) {
        $("#modal-find-items").modal("hide");
        $("#tbOrdenPedido").bootstrapTable("append", {
            id: row.id,
            cantidad: 1,
            descripcion: row.descripcion,
            precioref: 0,
            observacion: ""
        });
    }
};