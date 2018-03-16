<!DOCTYPE html>

<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="form-inline">
            <div class="form-group form-group-sm">
                <label for="" class="control-label">Bodega:</label>
                <select name="idbodega" class="form-control selectpicker" data-fn="selectBodega" data-width="300"  required></select>
            </div>
        </div>
        <table 
            id="tbPermisoMovimiento"
            data-toolbar="#toolbar"
            > 
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <!--<th data-field="id" class="col-md-1" data-align="center">Cód.</th>-->
                    <th data-field="descripcion">Descripción</th>
                    <!--<th data-field="observacion">Observación</th>-->
                </tr>
            </thead>
        </table>
    </div>
</div>



<script type="text/javascript" src="resource/views/Autorizacion/BodegaTipoMovimiento.js"></script>