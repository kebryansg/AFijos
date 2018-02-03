<!DOCTYPE html>
<!--
Select 
-->
<div class="col-md-6">
    <div class="form-group">
        <label class="control-label">Tipo Identificación</label>
        <div tipo  data-fn="loadTipoIdentificacion" class="selectpickerComponent"  >
            <select name="IDTipoIdentificacion" class="selectpicker form-control" data-width='80%' required>
            </select>
            <div >
                <button type="button" class="btn btn-info btn-sm " data-toggle='modal' 
                        data-target="#modal-new" data-url="mvc/views/activos/tipoidentificacion.php">
                    <i class="fa fa-plus"></i>
                </button>
                <button refresh type="button" class="btn btn-success btn-sm ">
                    <i class="fa fa-refresh"></i>
                </button>
            </div>
        </div>
    </div>    
</div>
