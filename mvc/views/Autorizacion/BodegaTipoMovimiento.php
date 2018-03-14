<!DOCTYPE html>

<div class="row" id="Listado">
    <div class="col-md-12">
        <form id="toolbar" class="form-inline">
            <div class="form-group ">
                <label for="" class="control-label">Ciudad</label>
                <select name="idciudad" class="form-control selectpicker"  required></select>
            </div>


        </form>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadTipoMovimiento"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="observacion">Observación</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!--<div id="div-registro" class="hidden" >
    <form save action="_autorizacion" role="tipoDocumento">
        <div class="box box-primary">
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

                </div>
                <div class="col-md-6">
                    <div class="form-group  form-group-sm">
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
</div>-->

<script type="text/javascript" src="resource/views/Autorizacion/BodegaTipoMovimiento.js"></script>