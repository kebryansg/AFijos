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
                    <input type="text" name="nombres" class="form-control" readonly style="width: 90%;" >
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#findUsuario" data-ajax="loadUsuarioDepartamento" ><i class="fa fa-search"></i> </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-sm">
                <label for="" class="control-label">Departamento</label>
                <input type="text" name="departamento" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-group-sm">
                <label for="" class="control-label">Rol</label>
                <input type="text" name="rol" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <button cancelar class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> Cancelar</button>
            <button save class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
</div>
<div class="box box-primary">
    <div class="box-body">
        <table TipoMovimiento
            data-ajax="loadTipoMovimiento">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="descripcion">T. Movimiento</th>
                    <th data-field="tipo" class="col-md-3" data-formatter="getTipo">Tipo</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="findUsuario" class="modal fade" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Buscar Usuario
                </h4>
            </div>
            <div class="modal-body">
                <table 
                    id="tbFind_Pag" search>
                    <thead>
                        <tr>
                            <th data-field="cedula">Cédula</th>
                            <th data-field="nombres">Nombres</th>
                            <th data-field="rol">Rol</th>
                            <th data-field="departamento">Departamento</th>
                            <th data-formatter="btnAccion" data-align="center" data-events="event_UsuarioSelect">Acción</th>
                        </tr>
                    </thead>
                </table>
                <!--<div class="clearfix"></div>-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="resource/views/Autorizacion/UsuarioTipoMovimiento.js"></script>