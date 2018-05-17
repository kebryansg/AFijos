<!DOCTYPE html>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-exchange-alt"></i> Seleccione Usuario</h3>
    </div>
    <div class="box-body" datos>
        <table 
            init 
            data-toolbar="#toolbar"
            data-ajax="loadUsuario"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="rol">Rol</th>
                    <th data-field="cedula">Cédula de Identidad</th>
                    <th data-field="nombres">Nombres y Apellidos</th>
                    <!--<th data-field="apellidos">Apellidos</th>-->
                    <th data-field="email">Email</th>
                    <th data-field="telefono">Telefono Movil</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="btnSeleccion" data-events="evt">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div update class="row hidden">
    <div class="flex-row">
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-exchange-alt"></i>
                        Cambiar Departamento
                    </h3>
                </div>
                <div class="box-body ">
                    <div class="form-group form-group-sm">
                        <label class="control-label">Departamento</label>
                        <div class="selectpickerComponent">
                            <select name="iddepartamento" class="form-control selectpicker" data-fn="selectDepartamento"></select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-row">
        <div class="col-md-4">
            <div class="pull-right">
                <button clean type="button" class="btn btn-danger">
                    <i class="fa fa-reply"></i> Cancelar
                </button>
                <button type="button" save class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>


<div id="modal-user" class="modal fade" >
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
                    id="tbFind" data-ajax="loadUsuario" search>
                    <thead>
                        <tr>
                            <th data-field="nombres">Nombres</th>
                            <th data-field="rol" >Rol</th>
                            <th data-field="accion" data-formatter="btnSeleccion" data-events="evtSelect" class="col-md-1" data-align="center">Acción</th>
                        </tr>
                    </thead>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="resource/views/Administracion/UsuarioDepartemento.js"></script>