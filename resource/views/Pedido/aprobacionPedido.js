op = "ordenPedido";
table = $("#Listado table");

$(function(){
    initialComponents();
    $("#tbOrdenPedido").bootstrapTable();
});

function BtnAprobar(){
    return  '<button view class="btn btn-default"> <i class="fa fa-eye" ></i> </button>';
}
window.event_btnAprobar = {
    "click button[view]": function(e, value, row, index){
        showRegistro();
        initReg(row);
    }
};


function initReg(row){
    edit(row);
    
    if(row.estado === "APR"){
        $("button[type='submit']").hide();
    }else{
        $("button[type='submit']").show();
    }
}

function queryParams(params){
    return params;
}
function getDatos(){
    form = "form[save]";
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: $(form).serializeObject_KBSG()
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
    rows = getJson(dt);
    $("#tbOrdenPedido").bootstrapTable("load", rows);
    total = rows.reduce((a, b) => a + (b.cantidad * b.precioref), 0);
    $("b[total]").html(formatInputMask(total));
}