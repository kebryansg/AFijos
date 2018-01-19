<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-lock fa-fw"></i> Roles / Permisos</h1>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Registro
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <form id="frmRoles" role="form" action="roles.php" method="post" novalidate="novalidate">
                            <input name="form_action" type="hidden" value="create">
                            <input name="form_edit" type="hidden" value="-1">
                            <div class="form-group">
                                <label>Nombre del Rol</label>
                                <input type="text" name="nombreRol" class="form-control" value="" maxlength="150" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea name="descripcionRol" class="form-control" rows="3" maxlength="300" autocomplete="off"></textarea>
                            </div>
                            
                            <hr>
                            <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                            </button>
                            &nbsp;
                            <a class="btn btn-default" href="./index.php" title="Haga clic aquí para cancelar el registro actual">
                                <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                            </a>
                        </form>
                    </div>
                    <div class="col-md-6 col-lg-8">
                        <div class="form-group">
                            <label class="control-label">Permisos</label>
                            </div>
                        <table id="tbgrupo_permiso" data-height="300" data-click-to-select="true">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="grupo" class="col-md-3">Grupo</th>
                                    <th data-field="modulo" class="col-md-3">Módulo</th>
                                    <th data-field="descripcion">Descripción</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-search" aria-hidden="true"></i> Roles Registrados
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <select class="selectpicker form-control">
                                <option value="">5</option>
                                <option value="">10</option>
                                <option value="">15</option>
                            </select>
                        </div>
                        <div class="pull-right">
                            <input type="text" placeholder="Buscar" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <table id="tb_Usuario">
                            <thead>
                                <tr>
                                    <th data-field="nombre">Nombre del Rol</th>
                                    <th data-field="descripcion">Descripción</th>
                                    <th data-field="accion" data-formatter="btn_accion" data-events="event_accion">Acciones</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="clearfix"></div>
                        <br>
                        <div class="pull-right">
                            <ul id="paginationRol" class="pagination-sm"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="resource/views/Administracion/roles.js"></script>





