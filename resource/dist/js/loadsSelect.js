function selectGrupo() {
    return getJson({
        data: {
            op: "grupos",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}

function selectModulo(){
    return getJson({
        data: {
            op: "modulo",
            accion: "list"
        },
        url: getURL("_administracion")
    });
}

function selectCiudad(){
    return getJson({
        data: {
            op: "ciudad",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}