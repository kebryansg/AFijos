<!DOCTYPE html>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title "><i class="fa fa-check-square"></i> Seleccionar Items</h4>
                <h4 class="box-title pull-right"><i class="fa fa-hashtag"></i> <span items></span> </h4>
            </div>
            <div class="box-body">
                <table id="tbDetalleOrden"
                       data-count="items"
                       data-toolbar="#toolbar"
                       data-ajax="loadAprobDetPedido">
                    <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="descripcion">Descripción</th>
                            <th data-field="cantidad" class="col-md-2" data-align="center">Cant. Pedido</th>
                            <th data-field="saldo" class="col-md-2" data-align="center" data-formatter="mask">Saldo Pendiente</th>
                            <th data-field="precioref" class="col-md-2" data-align="center">Precio</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-5">
            <div class="row">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title "><i class="fa fa-edit"></i> Datos Generales</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Fecha Inicio Plazo</label>
                                    <input type="text" name="fecha" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                <label class="control-label">Fecha Fin Plazo</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control " name="fechaFin" data-tipo="fecha" dt-tipo="day" readonly required>
                                </div>
                            </div>
<!--                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Fecha Fin Plazo</label>
                                    <input type="text" name="fechaFin" class="form-control" readonly>
                                </div>-->
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="" class="control-label">Observación</label>
                            <textarea name="observacion" rows="2" class="form-control"></textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-6">
            <div class="row">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title "><i class="fa fa-user-circle"></i> Seleccionar Proveedor</h4>
                        <h4 class="box-title pull-right"><i class="fa fa-hashtag"></i> <span proveedor></span> </h4>
                    </div>
                    <div class="box-body">
                        <table Proveedor
                               data-count="proveedor"
                               data-toolbar="#toolbar"
                               data-ajax="loadProveedor">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="nombre">Nombres</th>
                                    <th data-field="email" >E-mail</th>
                                    <th data-field="telefono" >Teléfono</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="resource/views/Compras/Cotizacion/CotizacionOPedido.js"></script>