<!DOCTYPE html>
<div class="row hidden" id="div-registro">
    <form save action="_localizacion" role="ciudad" >
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Descripción</label>
                        <input name="descripcion" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">País</label>
                                <div class="selectpickerComponent">
                                    <select name="idpais" data-fn="selectPais" class="selectpicker form-control"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Observación</label>
                        <textarea rows="4" name="observacion" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="pull-right">
                <button type="reset" class="btn btn-danger" title="Haga clic aquí para cancelar el registro actual">
                    <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                </button>
                &nbsp;
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                    <i class="fa fa-save" aria-hidden="true"></i> Guardar										
                </button>
            </div>
        </div>



    </form>
</div>

<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" name="btn_add" class="btn btn-success btn-sm">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del" class="btn btn-danger btn-sm">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadCiudad"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" data-align="center" class="col-md-1">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="observacion">Observación</th>
                    <th data-field="pais">País</th>
                    <th data-field="accion" data-formatter="defaultBtnAccion" data-events="event_accion_default" class="col-md-1" data-align="center">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<script type="text/javascript" src="resource/views/Localizacion/ciudad.js"></script>


