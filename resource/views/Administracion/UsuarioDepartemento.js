rowActual = null;
$(function () {
    initialComponents();
    
    $("button[clean]").click(function(){
        $("div[update]").addClass("hidden");
        $("div[datos] table").bootstrapTable("destroy");
        $("div[datos] table").bootstrapTable(TablePaginationDefault);
    });
    //$("#modal-user table").bootstrapTable(TablePaginationDefault);
    $("#modal-user").on({
        'show.bs.modal': function (e) {
            $(this).find("table").bootstrapTable(TablePaginationDefault);
        },
        'hidden.bs.modal': function (e) {
            $(this).find("table").bootstrapTable("destroy");
        }
    });
    $("button[save]").click(function(e){
        datos = JSON.parse($("div[update]").serializeObject_KBSG());
        datos.id = rowActual.id;
        //console.log(datos);
        
        response = save_global({
            url: getURL("_administracion"),
            dt: {
                accion : "save",
                op : "usuario.departamento",
                datos: JSON.stringify(datos)
            }
        });
        if(response.status){
            alert("correcto");
            rowActual = null;
            $("button[clean]").click();
            //initialComponents();
        }
    });
});



window.evtSelect = {
    "click button[name='seleccion']": function (e, value, row, index) {
        console.log(row);
        $("#modal-user").modal("hide");
        $("div[datos]").edit(row);
    }
};

window.evt = {
    "click button[name='seleccion']": function (e, value, row, index) {
        $("div[update]").removeClass("hidden");
        $("div[datos] table").bootstrapTable("destroy");
        $("div[datos] table").bootstrapTable();
        $("div[datos] table").bootstrapTable("load", [row]);
        rowActual = row;
    }
};