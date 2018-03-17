<!DOCTYPE html>
<link href="resource/bootstrap/FileInput/fileinput.min.css" rel="stylesheet" />

<div id="findOrdenCompra" class="modal fade" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Buscar Registro
                </h4>
            </div>
            <div class="modal-body">
                <table 
                    id="tbFind_Pag"
                    search>
<!--                    <thead>
                        <tr>
                            <th data-field="descripcion">Descripción</th>
                            <th data-field="accion" data-formatter="btnSeleccion" data-events="event_accion_default" class="col-md-1" data-align="center">Acción</th>
                        </tr>
                    </thead>-->
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-user"></i> Encabezado - Factura</h3>
            </div>
            <div class="box-body row">
                <form action="_compras" role="FacturaOrdenCompra" save>
                    <div class="col-md-4">
                        <div class="form-group form-group-sm">
                            <label for="" class="control-label">Cod. Factura</label>
                            <input type="text" class="form-control" required>
                        </div>  
                        <div class="form-group form-group-sm">
                            <label for="" class="control-label">Proveedor</label>
                            <div class="inputComponent">
                                <input type="text" id="txtProveedor" class="form-control input-sm" 
                                       style="width: 450px; margin-right: 5px;" placeholder="Proveedor" readonly>
                                <input type="hidden" name="idproveedor" required>
                                <div>
                                    <button type="button" data-columns="Proveedor" data-ajax="loadProveedorOrdenCompra" data-toggle="modal" data-target="#findOrdenCompra" class="btn btn-primary btn-sm"> <i class="fa fa-search"></i> </button>
                                    <button removeProveedor type="button" class="btn btn-danger btn-sm"> <i class="fa fa-times"></i> </button>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-group-sm">
                            <label class="control-label">Fecha:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control " name="fecha" data-tipo="fecha" dt-tipo="day" readonly required>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="" class="control-label">Adjuntar</label>
                        <div class="file-loading">
                            <input id="file-6" name="file-6[]" type="file" multiple>
                        </div>
                    </div>
                </form>
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
                    <th data-field="precioCompra" class="col-md-1" data-align="center">Precio Unit.</th>
                    <th data-field="saldo" class="col-md-1" data-align="center">Saldo Pendiente</th>
                    <th data-field="cantidad" data-align="center" class="col-md-1" data-formatter="imaskMinMax" data-events="event_input_default">Cantidad</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="resource/bootstrap/FileInput/fileinput.min.js" type="text/javascript"></script>
<script src="resource/bootstrap/FileInput/locale/es.js" type="text/javascript"></script>
<script src="resource/bootstrap/FileInput/themes/gly/theme.js" type="text/javascript"></script>
<script type="text/javascript" src="resource/views/Compras/FacturaOrdenCompra.js"></script>