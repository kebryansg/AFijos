<!DOCTYPE html>
<div class="row " id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group btn-group-sm">
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
            data-ajax="loadModulo"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="row hidden " >
    <form save action="_administracion" role="modulo">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="" class="control-label">Descripción</label>
                                <input type="text" name="descripcion" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <!--<label for="" class="control-label">Icono</label>-->
                            <!--<i id="icono" class="fa fa-user fa-4x" style="float: right;cursor: pointer; "></i>-->
                            <i  id="icono" class="fa fa-folder-open fa-4x" ></i>
                            <input type="hidden" name="icon" value="folder-open" >
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Icono</label>
                        <select id="cboIcon" class="form-control selectpicker" data-live-search="true" required>
                            <?php
                            include '../Recurso/Icons.php';
                            ?>

                        </select>
                    </div>

                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Estado</label>
                        <select name="estado" class="form-control selectpicker" required>
                            <option value="ACT">Activo</option>
                            <option value="INA">Inactivo</option>
                            <option value="BLO">Bloqueado</option>
                            <option value="ELI">Eliminado</option>
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Observación</label>
                        <textarea rows="4" name="observacion" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div id="toolbarDet" class="btn-group">
                <button add type="button" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Agregar
                </button>
                <button remove type="button" class="btn btn-danger btn-sm ">
                    <i class="fa fa-trash"></i> Eliminar
                </button>
            </div>
            <table id="tbDetalle"
                   data-toolbar="#toolbarDet">
                <thead>
                    <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="descripcion" data-formatter="defaultInput" data-events="event_input_default">SubMódulo</th>
                        <th data-field="estado" class="col-md-2" data-align="center" data-formatter="estadoFormat">Estado</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-danger btn-sm" type="reset"  title="Haga clic aquí para cancelar el registro actual">
                    <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                </button>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-sm" title="Haga clic aquí para guardar la información">
                    <i class="fa fa-save" aria-hidden="true"></i> Guardar										
                </button>
            </div>
        </div>

    </form>
</div>


<script type="text/javascript" src="resource/views/Administracion/modulo.js"></script>