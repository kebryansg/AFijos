function validarProveedor_CantItems() {
    return $("#tbDetalleOrdenSelect").bootstrapTable("getData").length > 0 || ($("#txtProveedor").val() !== "" && $("#tbDetalleOrden").bootstrapTable("getSelections").length > 0);
}

function validarCantidadSolicitada() {
    bandera = false;
    data = $("#tbDetalleOrdenSelect").bootstrapTable("getData");
    if (data.length > 0) {
        bandera = true;
        $.each(data, function (i, row) {
            console.log(row);
            if (row.solicitar <= 0) {
                bandera = false;
                return;
            }
        });
    }
    return bandera;
}

$(function () {

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

    /*$('.nav-tabs li:eq(1) a').on('hide.bs.tab', function (event) {
     $("#tbDetalleOrdenSelect").bootstrapTable("removeAll");
     });*/

    $('.nav-tabs li:eq(1) a').on('shown.bs.tab', function (event) {
        ids = [];
        ids_detalle = $("#tbDetalleOrdenSelect").bootstrapTable("getData").map(row => row.id);
        $.each($("#tbDetalleOrden").bootstrapTable("getSelections"), function (i, row) {
            ids.push(row.id);
            if ($.inArray(row.id, ids_detalle) === -1 && row.saldo > 0) {
                //row.solicitar = 1;
                row.solicitar = row.saldo;
                row.state = false;
                $("#tbDetalleOrdenSelect").bootstrapTable("append", row);
            }
        });
        $("#tbDetalleOrden").bootstrapTable('uncheckBy', {field: 'id', values: ids});
    });

    $(".tab-pane button[last]").click(function (e) {
        id = $(this).closest(".tab-pane").attr("id");
        li = $('a[href="#' + id + '"]').closest("li");
        li_next = $(li).prev();
        $(li_next).find("a").click();
    });

    $("#tbDetalleOrden,#tbDetalleOrdenSelect").bootstrapTable();

    $("div[OrdenPedido]").clear();

    $("input[name='id']").keypress(function (e) {
        if (e.which === 13) {
            getOrdenPedido($(this).val());
        }
    });

    $("#clearPag").click(function (e) {
        $("div[OrdenPedido]").clear();
        $("#tbDetalleOrden").bootstrapTable("removeAll");
        $("#tbDetalleOrdenSelect").bootstrapTable("removeAll");
    });


    //$("#tbFind_Pag").bootstrapTable();

    $('#findOrdenCompra').on({
        'show.bs.modal': function (e) {
            dataAjax = $(e.relatedTarget).attr("data-ajax");
            dataColumns = $(e.relatedTarget).attr("data-columns");
            $(this).data("ref", $(e.relatedTarget));


            $('#findOrdenCompra table[search]').bootstrapTable($.extend({}, TablePaginationDefault, {
                columns: tableColumns(dataColumns),
                ajax: dataAjax
            }));

        }
        , 'hidden.bs.modal': function (e) {
            $('#findOrdenCompra table[search]').bootstrapTable("destroy");
        }
        /*, 'dbl-click-row.bs.table': function (e, row, $element) {
         action_seleccion_v2(row);
         }*/
    });
});

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

function getOrdenPedido(id) {
    datos = getJson({
        url: getURL("_pedido"),
        data: {
            accion: "get",
            op: "OrdenPedido",
            id: id
        }
    });

    $("div[OrdenPedido]").clear();
    $("#tbDetalleOrden").bootstrapTable("removeAll");
    $("#tbDetalleOrdenSelect").bootstrapTable("removeAll");

    $("div[OrdenPedido]").edit(datos);
    $("div[OrdenPedido] input[name='estado']").val(estadoOrdenPedido(datos.estado));

    //DetalleOrdenPedido
    dt = {
        url: getURL("_pedido"),
        data: {
            accion: "list",
            op: "DetalleordenPedido",
            OrdenPedido: datos.id
        }
    };

    $("#tbDetalleOrden").bootstrapTable("load", getJson(dt));
}