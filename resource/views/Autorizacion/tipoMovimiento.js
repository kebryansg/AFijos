
$(function () {
    initialComponents();
});

function edit(datos) {
    form = "form[save]";
    $(form).edit(datos);
}

function getTipo(value, row, index){
    switch (value) {
        case "I":
            return "Ingreso";
            break;
        case "E":
            return "Egreso";
            break;
    }
}