function validarProveedor_CantItems() {
    return $("#tbDetalleOrdenSelect").bootstrapTable("getData").length > 0 || ($("#txtProveedor").val() !== "" && $("#tbDetalleOrden").bootstrapTable("getSelections").length > 0);
    //return $("#txtProveedor").val() !== "" && $("#tbDetalleOrden").bootstrapTable("getSelections").length > 0;
}

function validarCantidadSolicitada() {
    bandera = false;
    data = $("#tbDetalleOrdenSelect").bootstrapTable("getData");
    if (data.length > 0) {
        bandera = true;
        $.each(data, function (i, row) {
            if (row.solicitar <= 0) {
                bandera = false;
                return;
            }
        });
    }
    return bandera;
}

$(function () {

    $("#tbDetalleOrden,#tbDetalleOrdenSelect,#tbConfirmacion").bootstrapTable();

    $("button[deleteItems]").click(function () {
        btnGroup = $(this).closest(".btn-group").attr("id");
        table = $("table[data-toolbar='#" + btnGroup + "']");
        rows = $(table).bootstrapTable("getSelections").map(row => row.state);
        console.log(rows);
        $(table).bootstrapTable("remove", {
            field: "state",
            values: rows
        });
    });

    $(".tab-pane button[next]").click(function (e) {
        func = $(this).attr("dt-validate");
        bandera = self[func]();

        if (bandera) {
            id = $(this).closest(".tab-pane").attr("id");
            li = $('a[href="#' + id + '"]').closest("li");
            li_next = $(li).next();
            $(li_next).find("a").click();
        }
    });

    $('.nav-tabs li:eq(1) a').on('shown.bs.tab', function (event) {
        ids = [];
        ids_detalle = $("#tbDetalleOrdenSelect").bootstrapTable("getData").map(row => row.idItem);
        $.each($("#tbDetalleOrden").bootstrapTable("getSelections").filter(row => $.inArray(row.id, ids_detalle) === -1), function (i, row) {
            $("#tbDetalleOrden").bootstrapTable('uncheckBy', {field: 'id', values: row.id});

            $("#tbDetalleOrdenSelect").bootstrapTable("append", {
                id: 0,
                descripcion: row.descripcion,
                iddetalleordenpedido: row.id,
                saldo: row.saldo,
                precioref: row.precioref,
                precio: 0,
                solicitar: row.saldo,
                state: false
            });
        });
    });

    $('.nav-tabs li:eq(2) a').on('shown.bs.tab', function (event) {
        rows = $("#tbDetalleOrdenSelect").bootstrapTable("getData");
        $("#tbConfirmacion").bootstrapTable('load', rows);
        $("#lblProveedor").html($("#txtProveedor").val());
    });

    $(".tab-pane button[last]").click(function (e) {
        id = $(this).closest(".tab-pane").attr("id");
        li = $('a[href="#' + id + '"]').closest("li");
        li_next = $(li).prev();
        $(li_next).find("a").click();
    });

    //$("div[OrdenPedido]").clear();

//    $("input[name='id']").keypress(function (e) {
//        if (e.which === 13) {
//            getOrdenPedido($(this).val());
//        }
//    });

    $("#clearPag").click(function (e) {
        $("div[OrdenPedido]").clear();
        $("form[save]").clear();
        $("#tbDetalleOrden").bootstrapTable("removeAll");
        $("#tbDetalleOrdenSelect").bootstrapTable("removeAll");
        $('.nav-tabs li:eq(0) a').click();
    });

//    $('#findOrdenCompra').on({
//        'show.bs.modal': function (e) {
//            dataAjax = $(e.relatedTarget).attr("data-ajax");
//            dataColumns = $(e.relatedTarget).attr("data-columns");
//            $(this).data("ref", $(e.relatedTarget));
//
//
//            $('#findOrdenCompra table[search]').bootstrapTable($.extend({}, TablePaginationDefault, {
//                columns: tableColumns(dataColumns),
//                ajax: dataAjax
//            }));
//
//        }
//        , 'hidden.bs.modal': function (e) {
//            $('#findOrdenCompra table[search]').bootstrapTable("destroy");
//        }
//    });
});

function finRegistro() {
    //$("#clearPag").click();
    $("div[OrdenPedido]").clear();
    $("form[save]").clear();
    $("#tbDetalleOrden").bootstrapTable("removeAll");
    $("#tbDetalleOrdenSelect").bootstrapTable("removeAll");
    $('.nav-tabs li:eq(0) a').click();
}

function tableColumns(op) {
    columns = [];
    switch (op) {
        case "OrdenPedido":
            columns = [
                {
                    title: "Cod.",
                    field: "id",
                    class: "col-md-1"
                },
                {
                    title: "Fecha",
                    field: "fecha",
                    formatter: "defaultFecha"
                },
                {
                    title: "Departamento",
                    field: "departamento"
                },
                {
                    title: "Acción",
                    class: "col-md-1",
                    formatter: "btnSelecionOrdenPedido",
                    events: "evtInputComponent"
                }
            ];
            break;
        case "Proveedor":
            columns = [
                {
                    title: "Cod.",
                    field: "id",
                    class: "col-md-1"
                },
                {
                    title: "Nombres",
                    field: "nombre"
                },
                {
                    title: "Acción",
                    class: "col-md-1",
                    formatter: "btnSelecionProveedor",
                    events: "evtInputComponent"
                }
            ];
            break;
        case "":
            break;
    }

    return columns;
}

function getDatos() {
    form = "form[save]";
    dt = JSON.parse($(form).serializeObject_KBSG());
    dt["idordenpedido"] = $("div[OrdenPedido] input[name='id']").val();
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: JSON.stringify(dt), //$(form).serializeObject(),
            items: JSON.stringify($("#tbDetalleOrdenSelect").bootstrapTable("getData"))
        }
    };
    return datos;
}


function btnSelecionOrdenPedido() {
    return '<button OrdenPedido class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Seleccionar</button>';
}
function btnSelecionProveedor() {
    return '<button Proveedor class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Seleccionar</button>';
}
function imaskMinMax(value, rowData, index) {
    return '<input myDecimalMinMax d-max="' + rowData.saldo + '" field="' + this.field + '" type="text" class="form-control input-sm" value="' + formatInputMask(value) + '">';
}

window.evtInputComponent = {
    "click button[OrdenPedido]": function (e, value, row, index) {
        modal = $(this).closest(".modal");
        btnRef = $(modal).data("ref");
        $(modal).modal("hide");

        getOrdenPedido(row.id);
    },
    "click button[Proveedor]": function (e, value, row, index) {
        modal = $(this).closest(".modal");
        btnRef = $(modal).data("ref");
        $(modal).modal("hide");

        div = $(btnRef).closest(".inputComponent");
        $(div).find("input[type='hidden']").val(row.id);
        $(div).find("input[type='text']").val(row.nombre);

    }

};

function loadAprobDetPedido(params) {

    json_data = {
        data: $.extend({}, {
            accion: "list",
            op: "aprobacion.detalle.pedido"
        }, params.data),
        url: getURL("_pedido")
    };
    params.success(getJson(json_data));

    //DetalleOrdenPedido
//    dt = {
//        url: getURL("_pedido"),
//        data: {
//            accion: "list",
//            op: "aprobacion.detalle.pedido"
//        }
//    };
//    $("#tbDetalleOrden").bootstrapTable("load", getJson(dt));
}