<!DOCTYPE html>

<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" name="btn_add" class="btn btn-success ">
                <i class="fa fa-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del" class="btn btn-danger ">
                <i class="fa fa-trash"></i> Eliminar
            </button>
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadBodega"
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

<div id="div-registro" class="hidden" >
    <form save role="bodega" action="_catalogo">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
            </div>
            <div class="box-body row">
                <div class="col-md-6">
                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" required>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="" class="control-label">Ciudad</label>
                                <div tipo  data-fn="selectCiudad"  >
                                    <div class="inputComponent">
                                        <select name="idciudad" class="form-control selectpicker" data-width='80%' required></select>
                                        <div>
                                            <button type="button" class="btn btn-info btn-sm " data-toggle='modal' 
                                                    data-target="#modal-new" data-url="mvc/views/activos/ciudad.php">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <button refresh type="button" class="btn btn-success btn-sm ">
                                                <i class="fa fa-sync-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Observación</label>
                        <textarea rows="4" name="observacion" class="form-control"></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="pull-right">
            <button class="btn btn-danger" type="reset"  title="Haga clic aquí para cancelar el registro actual">
                <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
            </button>
            &nbsp;
            <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                <i class="fa fa-save" aria-hidden="true"></i> Guardar										
            </button>
        </div>

    </form>
</div>


<script type="text/javascript" src="resource/views/Activos/bodega.js"></script>