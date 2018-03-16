<!DOCTYPE html>
<div class="row">
    <div class="col-md-4">
        <div class="form-group form-group-sm">
            <label for="" class="control-label">Proveedor</label>
            <select name="idproveedor" data-fn="selectProveedorOrdenCompra" class="form-control selectpicker"> </select>
        </div>  
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Factura</h3>
            </div>
            <div class="box-body row">
                <div class="col-md-4">
                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Cod. Factura</label>
                        <input type="text" class="form-control">
                    </div>  
                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Nombre Proveedor</label>
                        <input type="text" class="form-control" readonly>
                    </div>  
                </div>
                <div class="col-md-2">
                    <div class="form-group form-group-sm">
                        <label for="" class="control-label">Fecha</label>
                        <input type="text" class="form-control">
                    </div>  
                </div>
                <div class="col-md-4">
                    <label for="" class="control-label">Adjuntar</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table
            id="tbDetalleOrdenCompraFaltante"
            class="table-hover table-striped"
            >
            <thead>
                <tr>
                    <th data-checkbox="true"></th>
                    <!--<th data-field="">O. Compra</th>-->
                    <th data-field="descripcion">Descripción</th>
                    <th data-field="precioCompra" class="col-md-1" data-align="center">Precio</th>
                    <th data-field="saldo" class="col-md-1" data-align="center">Saldo</th>
                    <th data-field="" class="col-md-1">Cantidad</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script type="text/javascript" src="resource/views/Compras/FacturaOrdenCompra.js"></script>