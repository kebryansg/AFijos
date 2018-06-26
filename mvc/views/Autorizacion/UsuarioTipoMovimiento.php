<!DOCTYPE html>
<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="form-inline">
            <form action="_autorizacion" save role="bodegaTipoMovimiento">
                <div class="form-group form-group-sm">
                    <label for="" class="control-label">Bodega:</label>
                    <!--<select name="idbodega" class="form-control selectpicker" data-fn="selectBodegaUsuario" data-width="300"  required></select>-->
                    <select name="idbodega" class="form-control selectpicker" data-fn="selectBodega" data-width="300"  required></select>
                </div>
                <button type="submit" class="btn btn-success btn-sm " ><i class="fa fa-save"></i> Guardar</button>
                <button type="button" clean class="btn btn-danger btn-sm " ><i class="fa fa-times"></i></button>
            </form>
        </div>
        <table 
            id="tbPermisoMovimiento"
            data-toolbar="#toolbar"
            class="table-hover table-striped"
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