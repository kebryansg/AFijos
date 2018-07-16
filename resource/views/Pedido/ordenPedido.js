function sumP(res) {
    console.log(res);
    return res;
}
op = "ordenPedido";
var data = null;
var dataFormatter = null;
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


function queryParams(params) {
    params.user = data.usuario.id;
    return params;
}

function initRegistro() {
    $("div[datos]").edit(dataFormatter);
    $('input[name="fecha"]').initDate();

    $('input[name="fecha"]').datepicker('update', new Date());
    $("#tbOrdenPedido").bootstrapTable("refreshOptions",{
        columns: columns_edit_v2
    });
}

$(function () {
    dat = getJson({
        url: getURL("_configuracion"),
        data: {
            op: "USUARIO.LOGIN",
            accion: "get"
        }
    });
    data = dat;
    departamento = dat.departamento;
    usuario = dat.usuario;
    dataFormatter = dt = {
        id: usuario.id,
        usuario: ([usuario.apellidopaterno, usuario.apellidomaterno, usuario.primernombre].join(" ")).toUpperCase(),
        departamento: departamento.descripcion,
        iddepartamento: departamento.id
    };

    initialComponents();

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
        }

        state = $(tableSelect).bootstrapTable("getSelections").map(row => row.state);
        $(tableSelect).bootstrapTable("remove", {field: 'state', values: state});

    });

    $("#tbOrdenPedido").bootstrapTable();
    
    $("#tbOrdenPedido").on('pre-body.bs.table', function (e, data) {
        total = data.reduce((a, b) => a + (b.cantidad * b.precioref), 0);
        $("b[total]").html(formatInputMask(total));
    });


    $("button[add]").click(function (e) {
        $("#tbOrdenPedido").bootstrapTable("append", {
            id: 0,
            idItem: 0,
            cantidad: 1,
            descripcion: "",
            precioref: 0,
            observacion: ""
        });
    });

    $("#modal-find-items").on({
        'show.bs.modal': function (e) {
            $(this).find("table").bootstrapTable(TablePaginationDefault);
        },
        'hidden.bs.modal': function (e) {
            $(this).find("table").bootstrapTable("destroy");
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
    dt = JSON.parse($(form).serializeObject_KBSG());
    items_delete = $.isEmptyObject($("button[delete_local]").data("ids")) ? [] : $("button[delete_local]").data("ids");
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: JSON.stringify(dt),
            items: JSON.stringify($("#tbOrdenPedido").bootstrapTable("getData")),
            items_delete: JSON.stringify(items_delete)
        }
    };
    return datos;
}

function clear() {
    $("#tbOrdenPedido").bootstrapTable("removeAll");
    $("button[delete_local]").removeData("ids");
    $("b[total]").html(formatInputMask(0));
}

function edit(datos) {
    $("form[save]").edit(datos);
    $("#div-registro input[estado]").val(getEstado_OrdenPedido(datos.estado));
    $("#tbOrdenPedido").bootstrapTable("destroy");

    /* Verificar el estado 
     * Lectura o Editar
     */
    options = {};
    if (datos.estado === "PEN" || datos.estado === "DEV") {
        options.columns = columns_edit;
    } else {
        options.columns = columns;
    }
    $("#tbOrdenPedido").bootstrapTable(options);

    //DetalleOrdenPedido
    dt = {
        url: getURL("_pedido"),
        data: {
            accion: "list",
            op: "DetalleordenPedido",
            OrdenPedido: datos.id
        }
    };
    rows = getJson(dt);
    $("#tbOrdenPedido").bootstrapTable("load", getJson(dt));
//    sumTotal();
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
    if (parseInt(row.idItem) === 0) {
        return "<input data-field='" + this.field + "' value='" + value + "' class='form-control input-sm' type='text' text >";
    } else {
        return row.descripcion;
    }
}

window.event_OPedido = {
    "click button[name='seleccion']": function (e, value, row, index) {
        $("#modal-find-items").modal("hide");
        $("#tbOrdenPedido").bootstrapTable("append", {
            id: 0,
            idItem: row.id,
            cantidad: 1,
            descripcion: row.descripcion,
            precioref: 0,
            observacion: ""
        });
    }
};

function _imask(value, rowData, index) {
    value = value !== undefined ? value : 0;
//    return '<input myDecimal data-fn="sumTotal" field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
    return '<input myDecimal field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
}