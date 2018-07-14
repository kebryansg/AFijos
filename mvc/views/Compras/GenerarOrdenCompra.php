<!DOCTYPE html>
<link rel="stylesheet" href="resource/dist/css/circularTabs.css">
<!--<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos - Orden Pedido</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body" OrdenPedido>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Cod. Orden Pedido</label>
                            <div class="inputComponent" >
                                <input type="text" name="id" class="form-control input-sm" style="width: 70%;" required>
                                <input type="hidden" name="id">
                                <div>
                                    <button type="button" data-columns="OrdenPedido" data-ajax="loadComprasOrdenPedido" data-toggle="modal" data-target="#findOrdenCompra" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> </button>
                                    <button type="button" id="clearPag" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label class="control-label">Fecha:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control input-sm " name="fecha" data-tipo="fechaView"  readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Departamento</label>
                            <input type="text" name="departamento" class="form-control input-sm" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Estado</label>
                            <input type="text"  class="form-control input-sm" name="estado" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control input-sm" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="control-label">Observación</label>
                    <textarea class="form-control input-sm" name="observacion" cols="30" rows="4" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="row">
    <div class="col-md-12">
        <div class="board">
            <div class="board-inner" style="border-bottom: 1px solid #ddd;">
                <ul class="nav nav-tabs" id="myTab" style="margin: 0 auto;width: 50%;display: flex;flex-flow: row;justify-content: space-between;">
                    <li class="active">
                        <a href="#home" data-toggle="tab" title="Elegir" class="not-active">
                            <span class="round-tabs one">
                                <i class="fa fa-file-alt"></i>
                            </span> 
                        </a>
                    </li>
                    <li>
                        <a href="#profile" data-toggle="tab" title="Asignar Cantidad" class="not-active">
                            <span class="round-tabs two">
                                <i class="fa fa-pencil-alt"></i>
                            </span> 
                        </a>
                    </li>
                    <li>
                        <a href="#messages" data-toggle="tab" title="Confirmación" class="not-active">
                            <span class="round-tabs three">
                                <i class="fa fa-check"></i>
                            </span> 
                        </a>
                    </li>
                </ul>
            </div>

            <form class="tab-content" save role="OrdenCompra" action="_compras">
                <div class="tab-pane fade in active" id="home" >
                    <div class="center-content">

                        <div class="col-md-10">
                            <h4 class="bold"><u>Seleccionar Items</u></h4>

                            <div id="toolbar" class="inputComponent">
                                <input type="text" id="txtProveedor" class="form-control input-sm" style="width: 300px; margin-right: 5px;" placeholder="Proveedor" readonly>
                                <input type="hidden" name="idproveedor" required>
                                <button type="button" data-columns="Proveedor" data-ajax="loadProveedor" data-toggle="modal" data-target="#findOrdenCompra" class="btn btn-primary btn-sm"> <i class="fa fa-search"></i> </button>
                            </div>

                            <table id="tbDetalleOrden"
                                   data-toolbar="#toolbar"
                                   data-ajax="loadAprobDetPedido"
                                   data-show-refresh="true"
                                   data-click-to-select="true">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-formatter="rowCount" class="col-md-1" data-align="center">N°</th>
                                        <th data-field="descripcion">Descripción</th>

                                        <th data-field="cantidad" class="col-md-2" data-align="center">Cant. Pedido</th>
                                        <th data-field="saldo" class="col-md-2" data-align="center" data-formatter="mask">Saldo Pendiente</th>
                                        <th data-field="precioref" class="col-md-2" data-align="center">Precio</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="pull-right-bottom ">
                        <!--<button last type="button" class="btn btn-danger">
                            <i class="fa fa-arrow-circle-left"></i>
                            Regresar
                        </button>-->
                        <button next type="button" class="btn btn-info" dt-validate="validarProveedor_CantItems">
                            Siguiente
                            <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>

                </div>
                <div class="tab-pane fade " id="profile" dt-validate="">
                    <div class="center-content">
                        <div class="col-md-10">
                            <h4 class="bold"><u>Establecer la cantidad a solicitar</u> </h4>
                            <div id="toolCantidad" class="btn-group btn-group-sm">
                                <button deleteItems type="button" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Eliminar Item(s)
                                </button>
                            </div>
                            <table id="tbDetalleOrdenSelect"
                                   data-toolbar="#toolCantidad"
                                   >
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-formatter="rowCount" class="col-md-1" data-align="center">N°</th>
                                        <th data-field="descripcion">Descripción</th>
                                        <!--<th data-field="cantidad" class="col-md-2" data-align="center">Cant.</th>-->
                                        <th data-field="saldo" class="col-md-2" data-align="center" data-formatter="mask">Saldo Pendiente</th>
                                        <th data-field="precioref" class="col-md-2" data-align="center">Precio Referencial</th>
                                        <th data-field="precio" class="col-md-1" data-formatter="imask" data-events="event_input_default" data-align="center">Precio Compra</th>
                                        <th data-field="solicitar" class="col-md-2" data-align="center" data-formatter="imaskMinMax" data-events="event_input_default">Solicitar</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="pull-right-bottom ">
                        <button last type="button" class="btn btn-danger">
                            <i class="fa fa-arrow-circle-left"></i>
                            Regresar
                        </button>
                        <button next type="button" class="btn btn-info" dt-validate="validarCantidadSolicitada">
                            Siguiente
                            <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>


                </div>
                <div class="tab-pane fade" id="messages" dt-validate="">
                    <div class="center-content">
                        <div class="col-md-10">
                            <h4 class="bold"><u>Confirmación de la Orden Compra</u></h4>
                            <h4 class="bold">Proveedor: <small id="lblProveedor" ></small> </h4>
                            <table id="tbConfirmacion">
                                <thead>
                                    <tr>
                                        <!--<th data-formatter="rowCount" class="col-md-1" data-align="center">N°</th>-->
                                        <th data-field="solicitar" class="col-md-2" data-align="center">Cant.</th>
                                        <th data-field="descripcion">Descripción</th>
                                        <th data-field="precio" class="col-md-2" data-align="center" data-formatter="formatInputMask">Precio Compra</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        
                    </div>
                    <div class="pull-right-bottom ">
                        <button last type="button" class="btn btn-danger">
                            <i class="fa fa-arrow-circle-left"></i>
                            Regresar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-save"></i>
                            Finalizar
                        </button>
                    </div>

                </div>
                <div class="clearfix"></div>
            </form>

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

<script type="text/javascript" src="resource/views/Compras/GenerarOrdenCompra.js"></script>
<!--<script type="text/javascript" src="resource/views/Compras/circularTabs.js"></script>-->
