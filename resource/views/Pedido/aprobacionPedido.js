op = "ordenPedido";
table = $("#Listado table");

$(function(){
    initialComponents();
});


function BtnAprobar(){
    return  '<button view class="btn btn-default"> <i class="fa fa-eye" ></i> </button>';
}
window.event_btnAprobar = {
    "click button[view]": function(e, value, row, index){
        showRegistro();
//        $("form[save]").clear();
        edit(row);
    }
};
function queryParams(params){
    //params.user = usuarioActual.id;
    return params;
}
function getDatos(){
    form = "form[save]";
//    dt = JSON.parse($(form).serializeObject_KBSG());
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject_KBSG() //JSON.stringify(dt)
        }
    };
    return datos;
}

function edit(datos){
    encabezado = getJson({
        url: getURL("_pedido"),
        data: {
            accion: "get",
            op: "aprobacion.pedido",
            id: datos.id
        }
    });
    $("form[save]").edit(encabezado);
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