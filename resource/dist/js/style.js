var nav4 = window.Event ? true : false;
var selections = [];
var fecha_format = {
    year: "YYYY",
    month: "MM, YYYY",
    day: "MM dd, yyyy",
    view: "MMMM D, YYYY",
    save: "YYYY-MM-DD HH:mm:ss"
};

moment.locale("es");
var TablePaginationDefault = {
    //height: 400,
    pageSize: 5,
    search: true,
    pageList: [5, 10, 15, 20],
    cache: false,
    showRefresh: true,
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
Inputmask.extendAliases({
    'myDecimal': {
        alias: "numeric",
        groupSeparator: ',',
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        placeholder: '0'
    }
});

myDecimalMinMax = {
    alias: "numeric",
    groupSeparator: ',',
    autoGroup: true,
    digits: 2,
    min: 1,
    digitsOptional: false,
    placeholder: '0'
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
    selections = [];
    $("table[init]").bootstrapTable(TablePaginationDefault);
    $("table[full]").bootstrapTable(TableDefault);
    $(".selectpicker").selectpicker({
//title: "Seleccione",
        size: 5
        //showTick: true
    });
    initSelect();
    
    //$("div[tipo] button[refresh]").click();
}

function initModalNew(modal, dataUrl) {
//funct_url = $("#modal-new").attr("data-url") + " #div-registro";

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

//$.fn.serializeObject = function () {
//    var o = {};
//    var a = this.serializeArray();
//    /* Agregar identificador  "id" */
//    o["id"] = ($.isEmptyObject($(this).data("id"))) ? 0 : $(this).data("id");
//    $.each(a, function (index, row) {
//        console.log(a);
//        o[row.name] = row.value;
//    });
//    /* Agregar input de type(checkbox) */
//    $.each($(this).find("input[type='checkbox']"), function (index, row) {
//        o[row.name] = $(row).is(":checked");
//    });
//    return JSON.stringify(o);
//};

$.fn.getFecha = function () {
    tipo = $(this).attr("dt-tipo");
    fecha = fechaMoment($(this).val(), fecha_format.view);
    switch (tipo) {
        case "year":
            fecha = moment({year: fecha.year(), month: 0, day: 0});
            break;
        case "month":
            fecha = moment({year: fecha.year(), month: fecha.month(), day: 0});
            break;
    }
    return formatSave(fecha);
};

$.fn.serializeObject_KBSG = function () {
    value = {};
    components = $(this).find("[name]");
    value["id"] = ($.isEmptyObject($(this).data("id"))) ? 0 : $(this).data("id");
    $.each(components, function (i, component) {
        tagName = $(component).prop("tagName");
        name = $(component).attr("name");
        val = "";
        switch (tagName) {
            case "SELECT":
                val = $(component).selectpicker("val");
                break;
            case "TEXTAREA":
                val = $(component).val();
                break;
            case "INPUT":
                tipo = $(component).attr("data-tipo");
                switch (tipo) {
                    case "myDecimal":
                        val = $(component).getFloat();
                        break;
                    case "fecha":
                        val = $(component).getFecha();
                        break;
                    default:
                        val = $(component).val();
                        break;
                }
                break;
        }
        value[name] = val;
    });
//    console.log(value);
    return JSON.stringify(value);
};

$.fn.validate = function () {
    bandera = true;
    $.each($(this).find("[required]"), function (i, input) {
        if (bandera) {
            switch ($(input).prop("tagName")) {
                case "INPUT":
                    tipo = $(input).attr("data-tipo");
                    switch (tipo) {
                        case "myDecimal":
                            val = $(input).getFloat();
                            bandera = val > 0;
                            break;
                        case "fecha":
                            bandera = $(input).val() !== "";
                            break;
                        default:
                            bandera = $(input).val() !== "";
                            break;
                    }
                    break;
            }
        }
    });
    return bandera;
};

$.fn.edit = function (datos) {
    claves = JSON_Clave(datos);
    $(this).data("id", datos.id);
    $.each($(this).find("[name]"), function (i, component) {
        name = $(component).attr("name");
        if ($.inArray(name.toUpperCase(), claves) !== -1) {
            tagName = $(component).prop("tagName");
            switch (tagName) {
                case "SELECT":
                    $(component).selectpicker("val", datos[name]);
                    break;
                case "TEXTAREA":
                    val = $(component).val(datos[name]);
                    break;
                case "INPUT":
                    tipo = $(component).attr("data-tipo");
                    switch (tipo) {
                        case "myDecimal":
                            $(component).setFloat(datos[name]);
                            break;
                        case "fechaView":
                            $(component).val(formatView(datos[name]).toUpperCase());
                            break;
                        case "fecha":
                            $(component).datepicker("update", fechaMoment(datos[name]).toDate());
                            break;
                        default:
                            $(component).val(datos[name]);
                            break;
                    }
                    break;
            }

        }
    });
};

$.fn.clear = function () {
    $(this).removeData("id");
    $(this).find("select").selectpicker("val", -1);
    $(this).find("input[data-tipo='myDecimal']").setFloat(0);
    $(this).find("input:not([data-tipo='myDecimal'])").val("");
};

function formatterDepreciable(value) {
    return (parseInt(value)) ? "Si" : "No";
}

function limpiarContenedor(contenedor) {
    $(contenedor + " input").val("");
    $(contenedor + " textarea").val("");
    $(contenedor + " .selectpicker").selectpicker("refresh");
}

function initSelect() {
    $("select[data-fn]").each(function (i, select) {
        fnc = $(select).attr("data-fn");
        datos = self[fnc]();
        loadCbo(datos, select);
    });

}

$(function () {

    $("span[refreshMenu]").click(function () {
        $("ul.sidebar-menu li:not(.header)").remove();
        $("ul.sidebar-menu").append(genMenu());
    });
//    $("span[refreshMenu]").click();

    $(document).on("focus", "input[data-tipo='myDecimal']", function () {
        $(this).select();
    });

    $(document).on("click", ".selectpickerComponent button[refresh]", function (e) {
        div = $(this).closest(".selectpickerComponent");
        select = $(div).find("select");
        fnc = $(select).attr("data-fn");
        datos = self[fnc]();
        console.log(datos);
        loadCbo(datos, select);
    });
    /*$(document).on("click", "div[tipo] button[refresh]", function (e) {
        div = $(this).closest("div[tipo]");
        fnc = $(div).attr("data-fn");
        select = $(div).find("select");
        datos = self[fnc]();
        loadCbo(datos, select);
    });*/

    $(document).on("click", "button[name='btn_add']", function (e) {
        //showRegistro();
        showRegistro();
        if (typeof window.initRegistro === 'function') {
            initRegistro();
        }
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

    $(document).on("click", "form[modal-save] button[type='reset']", function (e) {
        $(this).closest(".modal").modal("hide");
    });

    $(document).on("click", "form[save] button[type='reset']", function (e) {
        if (typeof window.clear === 'function') {
            clear();
        }
        hideRegistro();
    });

    $(document).on("submit", "form[modal-save]", function (e) {
        e.preventDefault();
        datos = {
            url: getURL($(this).attr("action")),
            dt: {
                accion: "save",
                op: $(this).attr("role"),
                datos: $(this).serializeObject()
            }
        };
        save_global(datos);
        $(this).closest(".modal").modal("hide");
    });

    $(document).on("keypress", "form[save]", function (e) {
        return e.which !== 13;
    });

    $(document).on("submit", "form[save]", function (e) {
        e.preventDefault();

        if (!$(this).validate()) {
            return;
        }
        datos = {};

        //if (typeof "getDatos" !== 'undefined' && jQuery.isFunction("getDatos")) {
        if (typeof window.getDatos === 'function') {
            datos = getDatos();
//            return;
        } else {
            datos = {
                url: getURL($(this).attr("action")),
                dt: {
                    accion: "save",
                    op: $(this).attr("role"),
                    //datos: $(this).serializeObject()
                    datos: $(this).serializeObject_KBSG()
                }
            };
        }
        save_global(datos);
        //$(table).bootstrapTable("refresh");
        $("#Listado table").bootstrapTable("refresh");
        $(this).trigger("reset");
        hideRegistro();
    });
    $('#modal-find').on({
        'show.bs.modal': function (e) {
            dataAjax = $(e.relatedTarget).attr("data-ajax");
            $(this).data("ref", $(e.relatedTarget));
            //$("table[search]").bootstrapTable($.extend({}, TablePaginationDefault,
            $(this).find("table[search]").bootstrapTable($.extend({}, TablePaginationDefault,
                    {
                        ajax: dataAjax
                    }));
        }
        , 'hidden.bs.modal': function (e) {
            $(this).find("table[search]").bootstrapTable("destroy");
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
    $(window).on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function (e, rows) {
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

    $(document).on("click", ".sidebar a", function (e) {
        e.preventDefault();
        url = $(this).attr("href");

        if (url !== "#") {
            $("h1[title-contenido]").html($(this).html());
            $("#containPages").load(url);
            // Estilo
            $(".sidebar li").removeClass("active");
            $(this).closest("li").addClass("active");
        }
    });

//    $(".sidebar a").click(function (e) {
//        e.preventDefault();
//        url = $(this).attr("href");
//
//        if (url !== "#") {
//            $("h1[title-contenido]").html($(this).html());
//            $("#containPages").load(url);
//            // Estilo
//            $(".sidebar li").removeClass("active");
//            $(this).closest("li").addClass("active");
//        }
//    });

});

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


function deleteIndividual(tableSelect) {
    ids = $(tableSelect).bootstrapTable("getSelections").map(row => row.ID);
    $(tableSelect).bootstrapTable("remove", {field: 'ID', values: ids});
}




