op = "ordenPedido";
//url = "servidor/sPedido.php";
table = $("#Listado table");
selections = [];




$(function () {
    initialComponents();

    $("#tbOrdenPedido").bootstrapTable();
    $("#modal-find-items table").bootstrapTable(TablePaginationDefault);


//    $("button[name=btn_add]").click();

    $("button[add]").click(function (e) {
        $("#tbOrdenPedido").bootstrapTable("append", {
            ID: 0,
            cantidad: parseFloat(1).toFixed(2),
            descripcion: "",
            precioref: parseFloat(0).toFixed(2),
            observacion: ""
        });
    });

    $("#modal-find-items").on({
        'show.bs.modal': function (e) {
            $(this).find("table").bootstrapTable("refresh");
        }
    });


    /*$("#items-registro").on({
     'hidden.bs.modal': function (e) {
     $("table[full]").bootstrapTable("resetView");
     }
     });*/

    $("button[DeleteIndividual]").click(function (e) {
        div_id = $(this).closest("div[toolbar]").attr("id");
        tableSelect = $("table[data-toolbar='#" + div_id + "']");
        ids = $(tableSelect).bootstrapTable("getSelections").map(row => row.id);
        $(tableSelect).bootstrapTable("remove", {field: 'id', values: ids});
    });

});


function getDatos() {
    form = "form[save]";
    dt = JSON.parse($(form).serializeObject());
    dt.fecha = formatSave(dt.fecha);
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: JSON.stringify(dt), //$(form).serializeObject(),
            items: JSON.stringify($("#tbOrdenPedido").bootstrapTable("getData"))
        }
    };

    return datos;
}


function edit(datos) {
    $("#div-registro form[save]").data("id", datos.ID);
    $("#div-registro input[name='fecha']").val(formatView(datos.fecha));
    $("#div-registro input[area]").val(datos.area);
    $("#div-registro input[usuario]").val(datos.usuario);

    //DetalleOrdenPedido
    dt = {
        url: "servidor/sPedido.php",
        data: {
            accion: "list",
            op: "DetalleordenPedido",
            OrdenPedido: datos.ID
        }
    };
    $("#tbOrdenPedido").bootstrapTable("load", getJson(dt));
}

function obs(value) {
    return value.substr(0, 5) + "...";
}

function estadoOrdenPedido(value) {
    switch (value) {
        case "PEN":
            return "Pendiente";
            break;
        case "APR":
            return "Aprobado";
            break;
        case "DEV":
            return "Devuelto";
            break;
        case "REC":
            return "<span style='color:red;'>Rechazado</span>";
            break;
    }
}
function BtnAccion(value, rowData, index) {
    if (rowData.estado === "PEN" || rowData.estado === "DEV") {
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
}

function inputProducto(value, row, index) {
    if (row.ID === 0) {
        return "<input field='" + this.field + "' value='" + value + "' class='form-control input-sm' type='text' text >";
    } else {
        return row.descripcion;
    }
}

function imask(value, rowData, index) {
    return '<input myDecimal field="' + this.field + '" type="text" class="form-control input-sm" value="' + value + '">';
}

window.event_OPedido = {
    "click button[name='seleccion']": function (e, value, row, index) {
        $("#modal-find-items").modal("hide");
        $("#tbOrdenPedido").bootstrapTable("append", {
            ID: row.id,
            cantidad: parseFloat(1).toFixed(2),
            descripcion: row.descripcion,
            precioref: parseFloat(0).toFixed(2),
            observacion: ""
        });
    }
};