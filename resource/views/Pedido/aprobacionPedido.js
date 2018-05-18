op = "ordenPedido";
usuarioActual = null;
table = $("#Listado table");

$(function(){
    dt = getJson({
        url: getURL("_configuracion"),
        data: {
            op: "USUARIO.LOGIN",
            accion: "get"
        }
    });
    usuarioActual = dt.usuario;
    
    
    initialComponents();
    console.log(dt.usuario);
    
    
    
});


function BtnAprobar(){
    return  '<button view class="btn btn-default"> <i class="fa fa-eye" ></i> </button>';
}
window.event_btnAprobar = {
    "click button[view]": function(e, value, row, index){
        showRegistro();
        edit(row);
    }
};
function queryParams(params){
//    params.user = usuarioActual.id;
    return params;
}
function getDatos(){
    form = "form[save]";
    dt = JSON.parse($(form).serializeObject_KBSG());
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: JSON.stringify(dt)
        }
    };
    console.log(datos);
    return datos;
}

function edit(datos){
    console.log(datos);
    $("form[save]").edit(datos);
    $("#div-registro input[area]").val(datos.area);
    $("#div-registro input[departamento]").val(datos.departamento);
    $("#div-registro input[usuario]").val(datos.usuario);
    
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