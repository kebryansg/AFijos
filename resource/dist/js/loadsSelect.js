function selectGrupo() {
    return getJson({
        data: {
            op: "grupos",
            accion: "list"
        },
        url: getURL("_catalogo")
    });
}