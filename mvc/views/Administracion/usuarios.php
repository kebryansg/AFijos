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

<div id="div-registro" class="row hidden">
    <form save role="usuario" action="servidor/sAdministracion.php">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Cèdula Identidad</label>
                <input type="text" name="cedula" class="form-control" value="" maxlength="10" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Primero Nombre</label>
                        <input name="primerNombre" class="form-control"  maxlength="150" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Segundo Nombre</label>
                        <input name="segundoNombre" class="form-control"  maxlength="150" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Apellido Paterno</label>
                        <input name="apellidoPaterno" class="form-control"  maxlength="150" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Apellido Materno</label>
                        <input name="apellidoMaterno" class="form-control"  maxlength="150" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telèfono Mòvil</label>
                        <input name="telefono" class="form-control" maxlength="10" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" required name="email" class="form-control" maxlength="150" >
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Rol</label>
                <div class="input-group">
                    <input id_find name="IDRol" type="text" class="hidden" required>
                    <input descripcion_find type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                    <span class = "input-group-btn">
                        <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-find" data-ajax="loadRol">
                            <i class="fa fa-search"></i> 
                        </button>
                        <!--<button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-new" data-url="mvc/views/Administracion/rol.php">
                            <i class="fa fa-plus"></i> 
                        </button>-->
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
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
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                </button>
            </div>
        </div>


    </form>
</div>


<script type="text/javascript" src="resource/views/Administracion/usuarios.js"></script>