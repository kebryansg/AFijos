<!DOCTYPE html>
<link href="resource/bootstrap/FileInput/fileinput.min.css" rel="stylesheet" />

<div class="row" id="Listado">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <table
                    init
                    data-ajax="loadComprasOrdenPedido">
                    <thead>
                        <tr>
                            <th data-field="fecha" class="col-md-2">Fecha</th>
                            <th data-field="proveedor">Proveedor</th>
                            <th data-field="usuario">Usuario</th>
                            <th data-field="items" data-align="center" class="col-md-1">Cant. Items</th>
                            <th class="col-md-1" data-align="center" data-formatter="bAccion" data-events="evtInputComponent">Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>

    </div>
</div>
<div id="div-registro" class="hidden">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info" OCompra>
                <div class="box-header with-border">
                    <h3 class="box-title"> <i class="fa fa-file-archive"></i> Orden Compra</h3>
                </div>
                <div class="box-body row">
                    <div class="col-md-4">
                        <div class="form-group form-group-sm">
                            <label for="" class="control-label">Cod. O. Compra</label>
                            <input type="text" class="form-control" name="id" readonly>
                        </div>  
                        <div class="form-group form-group-sm">
                            <label class="control-label">Fecha</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control " name="fecha" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="" class="control-label">Proveedor</label>
                            <input type="text" name="proveedor" class="form-control input-sm" readonly>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info" RFactura>
                <div class="box-header with-border">
                    <h3 class="box-title"> <i class="fa fa-file-archive"></i> Registro Factura</h3>
                </div>
                <div class="box-body row">
                    <form action="_compras" role="FacturaOrdenCompra" save>
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="" class="control-label">Cod. Factura</label>
                                <input type="text" class="form-control" required>
                            </div>  
                            <div class="form-group form-group-sm">
                                <label class="control-label">Fecha Factura</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control " name="fechaFactura" data-tipo="fecha" dt-tipo="day" readonly required>
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
            <div class="box box-primary">
                <div class="box-body">
                    <table
                        id="tbDetalleOrdenCompraFaltante"
                        class="table-hover table-striped">
                        <thead>
                            <tr>
                                <!--<th data-checkbox="true"></th>-->
                                <!--<th data-field="">O. Compra</th>-->
                                <th data-field="descripcion">Descripción</th>
                                <th data-field="precioCompra" class="col-md-1" data-align="center">Precio Unit.</th>
                                <th data-field="saldo" class="col-md-1" data-formatter="formatInputMask" data-align="center">Saldo Pendiente</th>
                                <th data-field="cantidad" data-align="center" class="col-md-1" data-formatter="imaskMinMax" data-events="event_input_default">Cantidad</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button cancelar class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> Cancelar</button>
                <button save class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>

</div>




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
                <table id="tbFind_Pag" search>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script src="resource/bootstrap/FileInput/fileinput.min.js" type="text/javascript"></script>
<script src="resource/bootstrap/FileInput/locale/es.js" type="text/javascript"></script>
<script src="resource/bootstrap/FileInput/themes/gly/theme.js" type="text/javascript"></script>
<script type="text/javascript" src="resource/views/Compras/FacturaOrdenCompra.js"></script>