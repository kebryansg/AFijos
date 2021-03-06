function selectGrupo() {
    return getJson({
        data: {
            op: "grupos",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}
function selectProveedorFacturaPendiente() {
    return getJson({
        data: {
            op: "proveedor.factura.pendiente",
            accion: "list"
        },
        url: getURL("_compras")
    });
}
function selectTipoIdentificacion() {
    return getJson({
        data: {
            op: "TipoIdentificacion",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}
function selectTipoContribuyente() {
    return getJson({
        data: {
            op: "Contribuyente",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}

function selectTipoEmisor(params = null) {
    return getJson({
        data: {
            op: "TipoEmisor",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}

function selectClase() {
    return getJson({
        data: {
            op: "clases",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}

function selectModulo() {
    return getJson({
        data: {
            op: "modulo",
            accion: "list"
        },
        url: getURL("_administracion")
    });
}

function selectCiudad() {
    return getJson({
        data: {
            op: "ciudadPais",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}
function selectPais() {
    return getJson({
        data: {
            op: "pais",
            accion: "list"
        },
        url: getURL("_localizacion")
    });
}

function selectBodega() {
    return getJson({
        data: {
            op: "bodega",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}
function selectProveedorOrdenCompra() {
    return getJson({
        data: {
            op: "proveedorOrdenCompra",
            accion: "list"
        },
        url: getURL("_compras")
    });
}
function selectRol() {
    return getJson({
        data: {
            op: "rol.select",
            accion: "list"
        },
        url: getURL("_administracion")
    });
}
function selectDepartamento() {
    return getJson({
        data: {
            op: "departamento",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}