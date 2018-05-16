<!DOCTYPE html>
<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" name="btn_add" class="btn  btn-success ">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del" class="btn  btn-danger ">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table 
            init 
            data-toolbar="#toolbar"
            data-ajax="loadUsuario"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="rol">Rol</th>
                    <th data-field="cedula">Cédula de Identidad</th>
                    <th data-field="nombres">Nombres y Apellidos</th>
                    <!--<th data-field="apellidos">Apellidos</th>-->
                    <th data-field="email">Email</th>
                    <th data-field="telefono">Telefono Movil</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="hidden">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
        </div>
        <div class="box-body">
            <form save role="usuario" action="_administracion">
                <div class="col-md-6">
                    <div class="form-group form-group-sm">
                        <label class="control-label">Cèdula Identidad</label>
                        <input type="text" name="cedula" class="form-control" value="" maxlength="10" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Primero Nombre</label>
                                <input name="primernombre" class="form-control"  maxlength="150" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Segundo Nombre</label>
                                <input name="segundonombre" class="form-control"  maxlength="150" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Apellido Paterno</label>
                                <input name="apellidopaterno" class="form-control"  maxlength="150" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Apellido Materno</label>
                                <input name="apellidomaterno" class="form-control"  maxlength="150" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Telèfono Mòvil</label>
                                <input name="telefono" class="form-control" maxlength="10" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Email</label>
                                <input type="email" required name="email" class="form-control" maxlength="150" >
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-sm">
                        <label class="control-label">Rol</label>
                        <div tipo>
                            <select name="idrol" class="form-control selectpicker" data-fn="selectRol"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Contraseña</label>
                                <input name="password" type="password" class="form-control" maxlength="15" required>
                                <!--<p class="help-block">Si deja en blanco este campo se autogenerará una contraseña que será la <b>Cédula de Identidad</b>.</p>*-->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" title="Haga clic aquí para cancelar el registro actual">
                            <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                            <i class="fa fa-save" aria-hidden="true"></i> Guardar										
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="resource/views/Administracion/usuarios.js"></script>