$(function () {
    initialComponents();
    //$("#modal-user table").bootstrapTable(TablePaginationDefault);
    $("#modal-user").on({
        'show.bs.modal': function (e) {
            $(this).find("table").bootstrapTable(TablePaginationDefault);
        },
        'hidden.bs.modal': function (e) {
            $(this).find("table").bootstrapTable("destroy");
        }
    });
});



window.evtSelect = {
    "click button[name='seleccion']": function (e, value, row, index) {
        //$("div[Contribuyente] button[clear]").click();
        console.log(row);
        $("#modal-user").modal("hide");
        $("div[datos]").edit(row);
        /* Cargar Guias */
    }
};

window.evt = {
    "click button[name='seleccion']": function (e, value, row, index) {
        $("div[update]").removeClass("hidden");
        $("div[datos] table").bootstrapTable("destroy");
        $("div[datos] table").bootstrapTable();
        $("div[datos] table").bootstrapTable("load", [row]);



    }
};