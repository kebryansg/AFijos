<!DOCTYPE html>
<link rel="stylesheet" href="resource/dist/css/circularTabs.css">
<!--<link rel="stylesheet" href="resource/dist/css/circularTabsK.css">-->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body" OrdenPedido>
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Cod. Orden Pedido</label>
                            <div class="inputComponent" >
                                <input type="text" name="id" class="form-control input-sm" style="width: 80%;" required>
                                <!--<input type="hidden" name="id">-->
                                <button type="button" data-columns="OrdenPedido" data-ajax="loadOrdenPedido" data-toggle="modal" data-target="#findOrdenCompra" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> </button>
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
                                <input type="text" class="form-control " name="fecha" data-tipo="fechaView"  readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Estado</label>
                            <input type="text"  class="form-control" name="estado" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Departamento</label>
                            <input type="text" name="departamento" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="control-label">Observación</label>
                    <textarea class="form-control" name="observacion" cols="30" rows="4" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="board">
            <div class="board-inner" style="border-bottom: 1px solid #ddd;">
                <ul class="nav nav-tabs" id="myTab" style="margin: 0 auto;width: 50%;display: flex;flex-flow: row;justify-content: space-between;">
                    <!--<div class="liner"></div>-->
                    <li class="active">
                        <a href="#home" data-toggle="tab" title="Elegir">
                            <span class="round-tabs one">
                                <i class="fa fa-file-alt"></i>
                            </span> 
                        </a>
                    </li>

                    <li>
                        <a href="#profile" data-toggle="tab" title="Asignar Cantidad">
                            <span class="round-tabs two">
                                <i class="fa fa-pencil-alt"></i>
                            </span> 
                        </a>
                    </li>
                    <li>
                        <a href="#messages" data-toggle="tab" title="Confirmación">
                            <span class="round-tabs three">
                                <i class="fa fa-check"></i>
                            </span> 
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="home" >
                    <div class="center-content">
                        <div class="col-md-10">
                            <div id="toolbar" class="inputComponent">
                                <input type="text" id="txtProveedor" class="form-control input-sm" style="width: 300px; margin-right: 5px;" placeholder="Proveedor" readonly>
                                <button type="button" data-columns="Proveedor" data-ajax="loadProveedor" data-toggle="modal" data-target="#findOrdenCompra" class="btn btn-primary btn-sm"> <i class="fa fa-search"></i> </button>
                            </div>

                            <table id="tbDetalleOrden"
                                   data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-formatter="rowCount" class="col-md-1" data-align="center">N°</th>
                                        <th data-field="descripcion">Descripción</th>

                                        <th data-field="cantidad" class="col-md-2" data-align="center">Cant.</th>
                                        <th data-field="saldo" class="col-md-2" data-align="center" data-formatter="mask">Saldo</th>
                                        <th data-field="precioref" class="col-md-2" data-align="center">Precio</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!--<div class="clearfix"></div>-->
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
                <div class="tab-pane fade" id="profile" dt-validate="">
                    <div class="center-content">
                        <div class="col-md-10">
                            <table id="tbDetalleOrdenSelect">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-formatter="rowCount" class="col-md-1" data-align="center">N°</th>
                                        <th data-field="descripcion">Descripción</th>
                                        <th data-field="cantidad" class="col-md-2" data-align="center">Cant.</th>
                                        <th data-field="saldo" class="col-md-2" data-align="center" data-formatter="mask">Saldo</th>
                                        <th data-field="precioref" class="col-md-2" data-align="center">Precio</th>
                                        <th data-field="solicitar" class="col-md-2" data-formatter="imask">Solicitar</th>
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
                        <button next type="button" class="btn btn-info">
                            Siguiente
                            <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>


                </div>
                <div class="tab-pane fade" id="messages" dt-validate="">
                    <div class="center-content">
                        
                    </div>
                    <div class="pull-right-bottom ">
                        <button last type="button" class="btn btn-danger">
                            <i class="fa fa-arrow-circle-left"></i>
                            Regresar
                        </button>
                        <button next type="button" class="btn btn-info">
                            Finalizar
                            <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                    
                </div>
                <div class="clearfix"></div>
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

<script type="text/javascript" src="resource/views/Compras/GenerarOrdenPedido.js"></script>
<!--<script type="text/javascript" src="resource/views/Compras/circularTabs.js"></script>-->
