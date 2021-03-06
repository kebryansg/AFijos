var nav4 = window.Event ? true : false;
var selections = [];
moment.locale("es");
var fecha_format = {
    year: "YYYY",
    month: "MM, YYYY",
    day: "MM dd, yyyy",
    view: "MMMM D, YYYY",
    save: "YYYY-MM-DD HH:mm:ss"
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
    $("table[full]").bootstrapTable(TableFull);

    $(".selectpicker").selectpicker({
        size: 5
    });
    initSelect();
    initFecha();
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

function initFecha() {
    $.each($('input[data-tipo="fecha"]'), function (i, input) {
        config = getParamsFecha($(input).attr("dt-tipo"));
        $(input).datepicker(config);
        //$(input).datepicker('update', $(input).getFecha());
    });
}

$(function () {

    $("#cerrarSesion").click(function (e) {
        e.preventDefault();
        $.post(getURL("_configuracion"), {accion: "close"}, function () {
            location.href = "login.php";
        });
    });

    $("span[refreshMenu]").click(function () {
        $("ul.sidebar-menu li:not(.header)").remove();
        $("ul.sidebar-menu").append(genMenu());
    });
    $("span[refreshMenu]").click();

    $(document).on("focus", "input[data-tipo='myDecimal']", function () {
        $(this).select();
    });

    $(document).on("click", ".selectpickerComponent button[refresh]", function (e) {
        div = $(this).closest(".selectpickerComponent");
        select = $(div).find("select");
        fnc = $(select).attr("data-fn");
        datos = self[fnc]();
        loadCbo(datos, select);
    });

    $(document).on("click", "button[name='btn_add']", function (e) {
        showRegistro();
        if (typeof window.initRegistro === 'function') {
            initRegistro();
        }
    });

    $(document).on("click", "button[name='btn_del']", function (e) {
        if (selections.length > 0) {
            alertEliminarRegistros();
        }
    });

    $(document).on("click", "button[name='btn_del_individual']", function (e) {
        div_id = $(this).closest("div[toolbar]").attr("id");
        tableSelect = $("table[data-toolbar='#" + div_id + "']");
        deleteIndividual(tableSelect);
    });

    $(document).on("click", "form[modal-save] button[type='reset']", function (e) {
        $(this).closest(".modal").modal("hide");
    });

    $(document).on("click", "form[save] button[type='reset'], form[save_fn] button[type='reset']", function (e) {
        form = $(this).closest("form");
        $(form).trigger("reset");
        $.each($(form).find('select'), function (i, select) {
            $(select).selectpicker('refresh');
            $(select).change();
        });

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
        datos = {
            url: getURL($(this).attr("action")),
            dt: {
                accion: "save",
                op: $(this).attr("role"),
                datos: $(this).serializeObject_KBSG()
            }
        };
        save_global(datos);
        $("#Listado table").bootstrapTable("refresh");
        $(this).trigger("reset");
        hideRegistro();
    });
    
    $(document).on("submit", "form[save_fn]", function (e) {
        e.preventDefault();
        if (!$(this).validate()) {
            return;
        }
        datos = getDatos(this);
        save_global(datos);
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
                    if ($.inArray(id, selections) === -1) {
                        selections.push(id);
                    }
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