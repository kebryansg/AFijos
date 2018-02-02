$(function(){
    initialComponents();
    $('button[name="btn_add"]').click();
    
});
function edit(datos){
    form = "form[save]";
    $(form).edit(datos);
}