<!DOCTYPE html>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Fabricante </h1>
    </div>
</div>

<div class="row hidden" id="div-registro">
    <form save action="servidor/sCatalogo.php" role="fabricante" >
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Identificación</label>
                                <input name="identificacion" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Nombre</label>
                                <input name="nombre" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Teléfono</label>
                        <input name="telefono" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Dirección</label>
                        <textarea rows="2" name="direccion" class="form-control" required></textarea>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="" class="control-label">E-mail</label>
                                <input name="email" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="" class="control-label">Website</label>
                                <input name="website" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Observación</label>
                        <textarea rows="2" name="observacion" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="" class="control-label">País</label>
                                <div class="input-group">
                                    <input id_find name="IDPais" type="text" class="hidden" required>
                                    <input descripcion_find type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                    <span class = "input-group-btn">
                                        <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-find" data-ajax="loadPais">
                                            <i class="fa fa-search"></i> 
                                        </button>
                                        <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-new" data-url="mvc/views/activos/pais.php">
                                            <i class="fa fa-plus"></i> 
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
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
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label for="" class="control-label">Contacto</label>
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="control-label">Nombre</label>
                                <input type="text" class="form-control" required name="contacto">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label for="" class="control-label">Teléfono</label>
                                <input type="text" class="form-control" name="contactotelefono" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label for="" class="control-label">E-mail</label>
                                <input type="text" class="form-control" required name="contactoemail">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>
            <div class="pull-right">
                <button type="reset" class="btn btn-default" title="Haga clic aquí para cancelar el registro actual">
                    <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                </button>
                &nbsp;
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                </button>
            </div>
        </div>



    </form>
</div>

<br>

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
            data-ajax="loadFabricante"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" data-align="center" class="col-md-1">Cód.</th>
                    <th data-field="identificacion">Identificación</th>
                    <th data-field="nombre">Nombre</th>
                    <th data-field="direccion">Dirección</th>
                    <th data-field="telefono">Telefono</th>
                    <th data-field="pais">País</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<script type="text/javascript" src="recursos/views/Activos/fabricante.js"></script>