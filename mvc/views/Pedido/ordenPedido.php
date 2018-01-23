<!DOCTYPE html>
<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="form-inline" >
            <button type="button" name="btn_add" class="btn btn-success ">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <!--<button type="button" name="btn_del" class="btn btn-default btn-danger ">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>-->
            <!--<div class="input-group">
                <input id_find name="IDModulo" type="text" class="hidden" required>
                <input descripcion_find type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                <span class = "input-group-btn">
                    <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-find" data-ajax="loadArea">
                        <i class="fa fa-search"></i> 
                    </button>
                </span>
            </div>-->
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadOrdenPedido"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="fecha" data-formatter="defaultFecha">Fecha</th>
                    <th data-field="area">Área</th>
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
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="" class="control-label">Fecha</label>
                    <input fecha name="fecha" type="text" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Área</label>
                    <input type="text" area class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Usuario</label>
                    <input type="text" usuario class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">
                        <button add type="button" class="btn btn-success">
                            <i class="glyphicon glyphicon-plus"></i> Agregar
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-find-items" >
                            <i class="glyphicon glyphicon-search"></i> Buscar
                        </button>
                        <button type="button" DeleteIndividual class="btn btn-danger ">
                            <i class="glyphicon glyphicon-trash"></i> Eliminar
                        </button>
                    </div>
                </div>
                <table
                    id="tbOrdenPedido"
                    data-toolbar="#toolbar2"
                    >
                    <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="cantidad" class="col-md-1" data-formatter="imask" data-events="event_input_default" >Cant.</th>
                            <th data-field="descripcion" data-formatter="inputProducto" data-events="event_input_default" >Descripción</th>
                            <th data-field="precioref" class="col-md-1" data-formatter="imask" data-events="event_input_default" >Precio Unit.</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-4">
                <br><br>
                <div class="form-group">
                    <label for="" class="control-label">Observación</label>
                    <textarea class="form-control" name="observacion" cols="30" rows="5"  ></textarea>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <div class="form-inline">
                        <button class="btn btn-sm btn-danger " type='reset'>
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