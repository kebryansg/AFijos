var nav4 = window.Event ? true : false;
var selections = [];
var TablePaginationDefault = {
    height: 400,
    pageSize: 5,
    search: true,
    pageList: [5, 10, 15, 20],
    cache: false,
    pagination: true,
    sidePagination: "server"
};
var TableDefault = {
    height: 400,
    pageSize: 5,
    clickToSelect: true,
    //search: true,
    pageList: [5, 10, 15, 20],
    cache: false
};
function action_seleccion_v2(datos) {
    $("#modal-find").modal("hide");
    div = $("#modal-find").data("ref");
    //console.log(($(div).closest(".input-group").length > 0));
    //Separar los casos donde es invocado el modal de busqueda
    if ($(div).closest(".input-group").length > 0) {
        div = $(div).closest(".input-group");
        $(div).find("input[descripcion_find]").val(datos.descripcion);
        $(div).find("input[id_find]").val(datos.ID);
    } else if ($(div).closest(".btn-group").length > 0) {
        id = $(div).closest(".btn-group").attr("id");
        table_ref = 'table[data-toolbar="#' + id + '"]';
        // Validar que no se repitan los registros
        ids = $(table_ref).bootstrapTable("getData").filter(val => val.ID === datos.ID);
        if (ids.length === 0) {
            $(table_ref).bootstrapTable("append", datos);
        }

    }
}

function initialComponents() {
    alert();
    selections = [];
//    $("table[init]").bootstrapTable(TablePaginationDefault);
//    $("table[full]").bootstrapTable(TableDefault);
      $("table").each(function(i,table){
          $(table).initTable();
      });


    $(".selectpicker").selectpicker({
//title: "Seleccione",
        size: 5,
        //showTick: true
    });
    $("div[tipo] button[refresh]").click();
}

function initModalNew(modal, dataUrl) {
    $.ajax({
        url: dataUrl,
        async: false,
        dataType: 'html',
        success: function (html) {
            div = "";
            $.each($(html), function (i, r) {
                if ($(r).find(".page-header").length > 0) {
                    $(r).find(".page-header i").remove();
                    title = $(r).find(".page-header").html();
                    $(modal + ' .modal-title').html('<i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Registro - ' + title);
                }
                if ($(r).attr("id") === "div-registro") {
                    $(r).removeClass("hidden");
                    $(r).removeAttr("id");
                    $(r).find("form").removeAttr("save");
                    $(r).find("form").attr("modal-save", "");
                    $(r).find("button[new]").remove();
                    div = $(r);
                }

            });
            $(modal + ' .modal-body').html(div);
        }
    });
    $(modal + ' .selectpicker').selectpicker();
}

function getJson(params) {
    result = {};
    $.ajax({
        url: params.url,
        async: false,
        type: 'POST',
        dataType: 'json',
        data: params.data,
        success: function (response) {
            result = response;
        }
    });
    return result;
}

function save_global(datos) {
    $.ajax({
        url: datos.url,
        cache: false,
        type: 'POST',
        async: false,
        dataType: 'json',
        data: datos.dt,
        success: function (response) {
        }
    });
}

function alertEliminarRegistro(row) {
    $.confirm({
        theme: "modern",
        title: 'Eliminar Registro?',
        escapeKey: "cancelAction",
        content: 'Estás seguro de continuar?',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Eliminar Registro',
                keys: ['enter'],
                action: function () {
                    delet(row);
                }
            },
            cancelAction: {
                text: "Cancelar",
                action: function () {
                    //$.alert('action is canceled');
                }
            }
        }
    });
}

function alertEliminarRegistros() {
    $.confirm({
        theme: "modern",
        escapeKey: "cancelAction",
        title: 'Eliminar Registros?',
        content: 'Estás seguro de continuar?',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Eliminar Registros',
                keys: ['enter'],
                action: function () {
                    deletes();
                    //$(btn_del).removeData("select");
                    $(table).bootstrapTable("refresh");
                }
            },
            cancelAction: {
                text: "Cancelar",
                action: function () {
                    //$.alert('action is canceled');
                }
            }
        }
    });
}

$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    alert();
    /* Agregar identificador  "id" */
    o["id"] = ($.isEmptyObject($(this).data("id"))) ? 0 : $(this).data("id");
    $.each(a, function (index, row) {
        
        o[row.name] = row.value;
    });
    /* Agregar input de type(checkbox) */
    $.each($(this).find("input[type='checkbox']"), function (index, row) {
        o[row.name] = $(row).is(":checked");
    });
    return JSON.stringify(o);
};

function btnSeleccion(value) {
    return '<button name="seleccion" class="btn btn-outline btn-success btn-sm"><i class="fa fa-check-square-o" aria-hidden="true"></i> Seleccionar</button>';
}

function defaultBtnAccion(value, rowData, index) {
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

function formatterDepreciable(value) {
    return (parseInt(value)) ? "Si" : "No";
}

function limpiarContenedor(contenedor) {
    $(contenedor + " input").val("");
    $(contenedor + " textarea").val("");
    $(contenedor + " .selectpicker").selectpicker("refresh");
}

window.event_accion_default = {
    "click li[name='edit']": function (e, value, row, index) {
        showRegistro();
        edit(row);
    },
    "click li[name='delete']": function (e, value, row, index) {
        alertEliminarRegistro(row);
    },
    "click button[name='seleccion']": function (e, value, row, index) {
        action_seleccion_v2(row);
    }
};

function loadCbo(data, select) {
    alert();
    $(select).html("");
    $.each(data.rows, function (i, row) {
        option = document.createElement("option");
        //$(option).attr("value", row.ID);
        $(option).attr("value", row.id);
        $(option).html(row.descripcion);
        $(select).append(option);
    });
    $(select).selectpicker("refresh");
}

$(function () {
    
    $(document).on("click", "div[tipo] button[refresh]", function (e) {
        div = $(this).closest("div[tipo]");
        fnc = $(div).attr("data-fn");
        select = $(div).find("select");
        datos = self[fnc]();
        loadCbo(datos, select);
    });
    
    $(document).on("click", "button[name='btn_add']", function (e) {
        showRegistro();
    });
    
    $(document).on("click", "button[name='btn_del']", function (e) {
        console.log(selections);
        if (selections.length > 0) {
            alertEliminarRegistros();
        }
    });
    
    $(document).on("click", "button[name='btn_del_individual']", function (e) {
        div_id = $(this).closest("div[toolbar]").attr("id");
        alert(div_id);
        tableSelect = $("table[data-toolbar='#" + div_id + "']");
        deleteIndividual(tableSelect);
    });
    
    $(document).on("click", "button[type='reset']", function (e) {
        alert();
        if ($(this).closest(".modal-body").length > 0) {
            $(this).closest(".modal").modal("hide");
        } else {
            
            hideRegistro();
        }
    });
    
    $(document).on("submit", "form[modal-save]", function (e) {
        e.preventDefault();
        datos = {
            url: $(this).attr("action"),
            dt: {
                accion: "save",
                op: $(this).attr("role"),
                datos: $(this).serializeObject()
            }
        };
        save_global(datos);
        $(this).closest(".modal").modal("hide");
    });
    
    $(document).on("submit", "form[save]", function (e) {
        e.preventDefault();
        datos = {};
        if (typeof document.getDatos === 'function') {
            datos = getDatos();
        } else {
            datos = {
                url: $(this).attr("action"),
                dt: {
                    accion: "save",
                    op: $(this).attr("role"),
                    datos: $(this).serializeObject()
                }
            };
        }
        console.log(datos);
        save_global(datos);
        $(table).bootstrapTable("refresh");
        $(this).trigger("reset");
        hideRegistro();
    });
    
    $('#modal-find').on({
        'show.bs.modal': function (e) {
            dataAjax = $(e.relatedTarget).attr("data-ajax");
            $(this).data("ref", $(e.relatedTarget));
            $("table[search]").bootstrapTable($.extend({}, TablePaginationDefault,
                    {
                        ajax: dataAjax
                    }));
        }
        , 'hidden.bs.modal': function (e) {
            $("table[search]").bootstrapTable("destroy");
        }
        , 'dbl-click-row.bs.table': function (e, row, $element) {
            action_seleccion_v2(row);
        }
    });
    
    $('#modal-adminTipo').on({
        'show.bs.modal': function (e) {
            dataID = $(e.relatedTarget).attr("data-id");
            $(this).data("ref", $(e.relatedTarget));
            data = getJson({
                url: "servidor/sCatalogo.php",
                data: {
                    accion: "list",
                    op: "SubTipoGeneral:TipoGeneral",
                    IDTipoGeneral: dataID
                }
            });
            console.log(data);
            $(".modal table").bootstrapTable("load", data);
        }
        , 'hidden.bs.modal': function (e) {
            $("table[full]").bootstrapTable("removeAll");
        }
    });
    
    $('#modal-new').on({
        'show.bs.modal': function (e) {
            dataUrl = $(e.relatedTarget).attr("data-url");
            initModalNew('#modal-new', dataUrl);
        }
    });
    
    $(document).on({
        'shown.bs.modal': function (e) {
            $("table[search],table[full]").bootstrapTable("resetView");
        }
        , 'show.bs.modal': function () {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function () {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        },
        'hidden.bs.modal': function () {
            if ($('.modal:visible').length > 0) {
                // restore the modal-open class to the body element, so that scrolling works
                // properly after de-stacking a modal.
                setTimeout(function () {
                    $(document.body).addClass('modal-open');
                }, 0);
            }
        }
    }, '.modal');
    
    $(document).on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function (e, rows) {
        if ($(e.target).attr("init") !== undefined) {
            var ids = $.map(!$.isArray(rows) ? [rows] : rows, row => row.ID);
            if ($.inArray(e.type, ['check', 'check-all']) > -1) {
//Add
                $.each(ids, function (i, id) {
                    selections.push(id);
                });
            } else {
//Delete
                $.each(ids, function (i, id) {
                    if ($.inArray(id, selections) > -1) {
                        selections.splice($.inArray(id, selections), 1);
                    }
                });
            }
        }
    });
    
    var dropdownMenu;
    $(window).on('show.bs.dropdown', function (e) {
        if (!$.isEmptyObject($(e.target).attr("name"))) {
            dropdownMenu = $(e.target).find('.dropdown-menu');
            $('body').append(dropdownMenu.detach());
            var eOffset = $(e.target).offset();
            dropdownMenu.css({
                'display': 'block',
                'top': eOffset.top + $(e.target).outerHeight(),
                'left': eOffset.left + $(e.target).outerWidth() - $(dropdownMenu).width()
            });
        }
    });
    
    $(window).on('hide.bs.dropdown', function (e) {
        if (!$.isEmptyObject(dropdownMenu)) {
            $(e.target).append(dropdownMenu.detach());
            dropdownMenu.hide();
            dropdownMenu = null;
        }
    });
});
function responseHandler(res) {
    $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.ID, selections) !== -1;
    });
    return res;
}

function deletes() {
    $.ajax({
        url: url,
        type: "POST",
        async: false,
        data: {
            accion: "delete",
            op: op,
            ids: selections
        }
    });
    selections = [];
    $(table).bootstrapTable("refresh");
}

function showRegistro() {
    $("#Listado").fadeOut();
    $("#Listado").addClass("hidden");
    $("#div-registro").fadeIn("slow");
    $("#div-registro").removeClass("hidden");
    $(":input[decimal]").inputmask();
    //$(":input[decimal]").inputmask();

}
//
//function hideRegistro() {
//    alert();
//    $("#div-registro").fadeOut();
//    $("#div-registro").addClass("hidden");
//    if ($("#div-registro table").length > 0) {
//        $("#div-registro table").bootstrapTable("removeAll");
//    }
//    $("#Listado").fadeIn("slow");
//    $("#Listado").removeClass("hidden");
//    $("#div-registro form").removeData("id");
//    $("select.selectpicker").selectpicker("refresh");
//    console.log($("select.selectpicker"));
//    
//}

function deleteIndividual(tableSelect) {
    ids = $(tableSelect).bootstrapTable("getSelections").map(row => row.ID);
    $(tableSelect).bootstrapTable("remove", {field: 'ID', values: ids});
}