<!DOCTYPE html>
<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="form-inline" >
            <button type="button" name="btn_add" class="btn btn-success ">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadOrdenPedido"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="fecha" data-formatter="defaultFecha">Fecha</th>
                    <th data-field="departamento">Departamento</th>
                    <th data-field="usuario">Usuario</th>
                    <th data-field="estado" class="col-md-1" data-formatter="estadoOrdenPedido">Estado</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="BtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="hidden" >
    <form action="_pedido" role="ordenPedido" save>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
            </div>
            <div class="box-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-5">
                                <!--data-tipo="fechaView"-->
                                <!--<div class="form-group">
                                    <label for="" class="control-label">Fecha</label>
                                    
                                    <input data-tipo="fecha" fecha type="text" class="form-control" readonly>
                                </div>-->
                                <div class="form-group ">
                                    <label class="control-label">Fecha:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control " name="fecha" data-tipo="fecha" dt-tipo="day" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="" class="control-label">Usuario</label>
                                    <input type="text" usuario class="form-control" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="" class="control-label">Departamento</label>
                                    <input type="text" departamento class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="" class="control-label">Estado</label>
                                    <input type="text" class="form-control" estado readonly>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Observación:</label>
                            <textarea name="observacion" cols="30" rows="5" class="form-control" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="toolbar2" class="btn-group" toolbar role="group" aria-label="...">
                    <button add type="button" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus"></i> Agregar
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-find-items" >
                        <i class="glyphicon glyphicon-search"></i> Buscar
                    </button>
                    <button type="button" delete_local class="btn btn-danger ">
                        <i class="glyphicon glyphicon-trash"></i> Eliminar
                    </button>
                </div>
                <table
                    id="tbOrdenPedido"
                    data-toolbar="#toolbar2"
                    >
                    <!--<thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="cantidad" class="col-md-1" data-formatter="imask" data-events="event_input_default" >Cant.</th>
                            <th data-field="descripcion" data-formatter="inputProducto" data-events="event_input_default" >Descripción</th>
                            <th data-field="precioref" class="col-md-1" data-formatter="imask" data-events="event_input_default" >Precio Unit.</th>
                        </tr>
                    </thead>-->
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <div class="form-inline">
                        <button class="btn btn-sm btn-danger" type='reset'>
                            <i class="fa fa-reply"></i> Cancelar
                        </button>
                        <button class="btn btn-sm btn-primary " type='submit'>
                            <i class="fa fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--<div class="clearfix"></div>-->
</div>

<div id="modal-find-items" class="modal fade" >
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
                    id="tbFind"
                    data-ajax="loadItems"
                    search
                    >
                    <thead>
                        <tr>
                            <th data-field="descripcion">Descripción</th>
                            <th data-field="stock" class="col-md-1" data-align="center">Stock</th>
                            <th data-field="accion" data-formatter="btnSeleccion" data-events="event_OPedido" class="col-md-1" data-align="center">Acción</th>
                        </tr>
                    </thead>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="resource/views/Pedido/ordenPedido.js"></script>