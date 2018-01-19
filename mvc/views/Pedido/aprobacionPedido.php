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
            <div class="input-group">
                <input id_find name="IDModulo" type="text" class="hidden" required>
                <input descripcion_find type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                <span class = "input-group-btn">
                    <button class = "btn btn-default" type="button" data-toggle="modal" data-target="#modal-find" data-ajax="loadArea">
                        <i class="fa fa-search"></i> 
                    </button>
                    <!--<button new class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-new" data-url="mvc/views/activos/area.php">
                        <i class="fa fa-plus"></i> 
                    </button>-->
                </span>
            </div>
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
                    <th data-field="fecha">Fecha</th>
                    <th data-field="area">Área</th>
                    <th data-field="usuario">Usuario</th>
                    <th data-field="estado" class="col-md-1" data-formatter="estadoOrdenPedido">Estado</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="hidden" >

    <form action="servidor/sPedido.php" role="ordenPedido" save>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="" class="control-label">Fecha</label>
                    <input id="fecha" type="text" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Área</label>
                    <div tipo data-fn="loadArea" >

                        <div class="pull-right">
                            <button refresh type="button" class="btn btn-success ">
                                <i class="fa fa-refresh"></i>
                            </button>    
                        </div>

                        <select name="IDTipoIdentificacion" class="selectpicker form-control" data-width="80%" required></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#items-registro">
                                    <i class="glyphicon glyphicon-plus"></i> Agregar
                                </button>
                                <button type="button" DeleteIndividual class="btn btn-danger ">
                                    <i class="glyphicon glyphicon-trash"></i> Eliminar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">


                        </div>
                    </div>
                </div>
                <table
                    id="tbOrdenPedido"
                    data-toolbar="#toolbar2"
                    full>
                    <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="cantidad" class="col-md-1" data-align="center">Cant.</th>
                            <th data-field="descripcion">Descripción</th>
                            <th data-field="precioref" class="col-md-1">Precio Unit.</th>
                            <th data-field="observacion" class="col-md-2" data-formatter="obs" >Observación</th> <!-- data-formatter -->
                        </tr>
                    </thead>
                </table>
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

<div id="items-registro" class="modal fade"   >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Nuevo Registro
                </h4>
            </div>
            <div class="modal-body">
                <form addLocal >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <input name="descripcion" type="text" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cantidad</label>
                                    <!--<input name="cantidad" type="text" class="form-control" required>-->
                                    <input required name="cantidad" decimal class="form-control" required data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false,  'placeholder': '0'" style="text-align: right;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Precio Unit.</label>
                                    <input name="precioref" decimal class="form-control" required data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" style="text-align: right;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Observación</label>
                            <textarea name="observacion" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="reset" class="btn btn-danger "> <i class="fa fa-reply"></i> Cancelar</button>
                            <button type="submit" class="btn btn-success "> <i class="fa fa-plus"></i> Agregar</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="resource/views/Pedido/aprobacionPedido.js"></script>