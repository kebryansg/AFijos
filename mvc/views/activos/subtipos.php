<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-group"></i> Sub Tipos</h1>
    </div>
</div>

<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" name="btn_add" class="btn btn-default btn-success btn-outline">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del" class="btn btn-default btn-danger btn-outline">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadSubTipo"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" class="col-md-1" >Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="vidautil">Vida Util</th>
                    <th data-field="depreciable" data-formatter="formatterDepreciable">Depreciable</th>
                    <th data-field="tipo">Tipo</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="accion" class="col-md-1" data-formatter="defaultBtnAccion" data-events="event_accion_default" data-align="center">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="row hidden" >
    <form save action="servidor/sCatalogo.php" role="subtipo" >

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="" class="control-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="control-label">Vida Util</label>
                        <input type="text" name="vidautil" class="form-control" maxlength="5" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="" class="control-label">Tipo</label>
                        <div class="input-group">
                            <input id_find name="IDTipo" type="text" class="hidden" required>
                            <input descripcion_find type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                            <span class = "input-group-btn">
                                <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-find" data-ajax="loadTipo">
                                    <i class="fa fa-search"></i> 
                                </button>
                                <button new class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-new" data-url="mvc/views/activos/tipo.php">
                                    <i class="fa fa-plus"></i> 
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="" class="control-label">Estado</label>
                        <select name="estado" class="form-control selectpicker">
                            <option value="ACT">Activo</option>
                            <option value="INA">Inactivo</option>
                            <option value="BLO">Bloqueado</option>
                            <option value="ELI">Eliminado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="material-switch pull-left">
                        <span style="font-weight: bold;">Depreciable</span>   &nbsp;&nbsp;
                        <input id="depreciable" name="depreciable" type="checkbox"/>
                        <label for="depreciable" class="label-primary"></label>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label">Observación</label>
                <textarea rows="4" name="observacion" class="form-control"></textarea>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-default" type="reset"  title="Haga clic aquí para cancelar el registro actual">
                    <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                </button>
                &nbsp;
                <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                </button>
            </div>
        </div>

    </form>
</div>



<script type="text/javascript" src="recursos/views/Activos/subtipos.js"></script>

