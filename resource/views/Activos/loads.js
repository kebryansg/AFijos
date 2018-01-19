url = "servidor/sCatalogo.php";

function loadArea(params = null) {
    data = {
        op: "area",
        accion: "list"
    };
    if (params !== null) {
        json_data = {
            data: $.extend({}, data, params.data),
            url: "servidor/sCatalogo.php"
        };
        params.success(getJson(json_data));
    } else {
        return getJson({
            data: data,
            url: "servidor/sCatalogo.php"
        });
}
}

function loadProveedor(params = null) {
    data = {
        op: "proveedor",
        accion: "list"
    };
    if (params !== null) {
        json_data = {
            data: $.extend({}, data, params.data),
            url: "servidor/sCompras.php"
        };

        params.success(getJson(json_data));
    } else {
        return getJson({
            data: data,
            url: "servidor/sCompras.php"
        });
}
}

function loadTipoEmisor(params = null) {
    data = {
        op: "TipoEmisor",
        accion: "list"
    };
    if (params !== null) {
        json_data = {
            data: $.extend({}, data, params.data),
            url: url
        };
        params.success(getJson(json_data));
    } else {
        return getJson({
            data: data,
            url: url
        });
}
}

function loadTipoIdentificacion(params = null) {
    data = {
        op: "TipoIdentificacion",
        accion: "list"
    };
    if (params !== null) {
        json_data = {
            data: $.extend({}, data, params.data),
            url: url
        };
        params.success(getJson(json_data));
    } else {
        return getJson({
            data: data,
            url: url
        });
}
}

function loadContribuyente(params = null) {
    data = {
        op: "Contribuyente",
        accion: "list"
    };
    if (params !== null) {
        json_data = {
            data: $.extend({}, data, params.data),
            url: url
        };
        params.success(getJson(json_data));
    } else {
        return getJson({
            data: data,
            url: url
        });
}
}

function loadPais(params) {
    json_data = {
        data: $.extend({}, {
            op: "pais",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}



function loadDepartamento(params) {
    json_data = {
        data: $.extend({}, {
            op: "departamento",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}
function loadCentroCosto(params) {
    json_data = {
        data: $.extend({}, {
            op: "centrocosto",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadCategoria(params) {
    json_data = {
        data: $.extend({}, {
            op: "categoria",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadCiudad(params) {
    json_data = {
        data: $.extend({}, {
            op: "ciudad",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}


function loadClase(params) {
    json_data = {
        data: $.extend({}, {
            op: "clases",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}
function loadSubClase(params) {
    json_data = {
        data: $.extend({}, {
            op: "subclases",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}


function loadClasificacion(params) {
    json_data = {
        data: $.extend({}, {
            op: "clasificacion",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadEdificio(params) {
    json_data = {
        data: $.extend({}, {
            op: "edificio",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadFabricante(params) {
    json_data = {
        data: $.extend({}, {
            op: "fabricante",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadGrupo(params) {
    json_data = {
        data: $.extend({}, {
            op: "grupos",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}
function loadSubGrupo(params) {
    json_data = {
        data: $.extend({}, {
            op: "subgrupos",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadTipo(params) {
    json_data = {
        data: $.extend({}, {
            op: "tipo",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadSubTipo(params) {
    json_data = {
        data: $.extend({}, {
            op: "subtipo",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadUnidad(params) {
    json_data = {
        data: $.extend({}, {
            op: "unidad",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}
function loadBodega(params) {
    json_data = {
        data: $.extend({}, {
            op: "bodega",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}
function loadUbicacion(params) {
    json_data = {
        data: $.extend({}, {
            op: "ubicacion",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}
function loadModulo(params) {
    json_data = {
        data: $.extend({}, {
            op: "modulo",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadSubModulo(params) {
    json_data = {
        data: $.extend({}, {
            op: "submodulo",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadPermisoRol(params) {
    json_data = {
        data: $.extend({}, {
            op: "permisoRol",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadRol(params) {
    json_data = {
        data: $.extend({}, {
            op: "rol",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadUsuario(params) {
    json_data = {
        data: $.extend({}, {
            op: "usuario",
            accion: "list"
        }, params.data),
        url: url
    };
    params.success(getJson(json_data));
}

function loadOrdenPedido(params) {
    json_data = {
        data: $.extend({}, {
            op: "ordenPedido",
            accion: "list"
        }, params.data),
        url: "servidor/sPedido.php"
    };
    params.success(getJson(json_data));
}
function loadTipoGeneral(params) {
    json_data = {
        data: $.extend({}, {
            op: "tipogeneral",
            accion: "list"
        }, params.data),
        url: "servidor/sCatalogo.php"
    };
    params.success(getJson(json_data));
}

function loadSubTipoGeneral(params) {
    json_data = {
        data: $.extend({}, {
            op: "subtipogeneral",
            accion: "list"
        }, params.data),
        url: "servidor/sCatalogo.php"
    };
    params.success(getJson(json_data));
}

/*function loadProveedor(params) {
 json_data = {
 data: $.extend({}, {
 op: "proveedor",
 accion: "list"
 }, params.data),
 url: "servidor/sPedido.php"
 };
 params.success(getJson(json_data));
 }*/