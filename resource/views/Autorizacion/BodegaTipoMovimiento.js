$(function () {
    initialComponents();

    $("#tbPermisoMovimiento").bootstrapTable({
        clickToSelect: true
    });

    $("select[name='idbodega']").selectpicker("val", -1);

    loadTMovimiento();

    $("select[name='idbodega']").on('changed.bs.select', function (e) {
        $("#tbPermisoMovimiento").bootstrapTable("uncheckBy",
                {
                    field: "id",
                    values: $("#tbPermisoMovimiento").bootstrapTable("getSelections").map(row => row.id)// ["value1", "value2", "value3"]
                }
        );

        datos = getJson({
            data: {
                op: "tipoMovimientoxBodega",
                accion: "list",
                bodega: $(this).selectpicker("val")
            },
            url: getURL("_autorizacion")
        });

        $("#tbPermisoMovimiento").bootstrapTable("checkBy",
                {
                    field: "id",
                    values: datos.map(row => row.idtipomovimiento)// ["value1", "value2", "value3"]
                }
        );
    });

    $("button[clean]").click(function () {
        $("select[name='idbodega']").selectpicker("val", -1);
        loadTMovimiento();
    });



});

function getDatos() {
    form = "form[save]";
    datos = {
        url: getURL($(form).attr("action")),
        dt: {
            accion: "save",
            op: $(form).attr("role"),
            datos: {},
            bodega: $("select[name='idbodega']").selectpicker("val"),
            movimientos: JSON.stringify($("#tbPermisoMovimiento").bootstrapTable("getSelections").map(row => row.id))
        }
    };
    return datos;


}

function loadTMovimiento() {
    json_data = {
        data: {
            op: "tipoMovimiento",
            accion: "list"
        },
        url: getURL("_autorizacion")
    };
    datos = getJson(json_data);
    $("#tbPermisoMovimiento").bootstrapTable("load", datos.rows);
}