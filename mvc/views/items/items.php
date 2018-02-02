<!DOCTYPE html>
<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" name="btn_add" class="btn btn-success ">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del" class="btn btn-danger ">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadItems"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="descripcion">Descripcion</th>
                    <th data-field="unidad">Unidad Medida</th>
                    <th data-field="stock">Stock</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="row hidden" >
    <form save role="items" action="_compras">
        <div class="col-md-6">
            
            <div class="form-group">
                <label class="control-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="control-label">Stock</label>
                <input name="stock" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-danger" type="reset"  title="Haga clic aquí para cancelar el registro actual">
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

<script type="text/javascript" src="resource/views/items/items.js"></script>