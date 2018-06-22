<!DOCTYPE html>
<div class="box box-primary" usuario>
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-user"></i> Usuario
        </h3>
    </div>
    <div class="box-body row">
        <div class="col-md-4">
            <div class="form-group form-group-sm">
                <label for="" class="control-label">Nombres y Apellidos</label>
                <div class="inputComponent">
                    <input type="text" class="form-control" readonly style="width: 90%;" >
                    <button class="btn btn-success btn-sm"><i class="fa fa-search"></i> </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-sm">
                <label for="" class="control-label">Departamento</label>
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-group-sm">
                <label for="" class="control-label">Rol</label>
                <input type="text" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <button cancelar class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> Cancelar</button>
            <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
</div>
<div class="box box-primary">
    <!--    <div class="box-header">
            <h3 class="box-title with-border">
                
            </h3>
        </div>-->
    <div class="box-body">
        <table
            data-ajax="loadBodega">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="ciudad" class="col-md-3">Ciudad</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="box-footer">

    </div>
</div>

<script type="text/javascript" src="resource/views/Autorizacion/BodegaUsuario.js"></script>