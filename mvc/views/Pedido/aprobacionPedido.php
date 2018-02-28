<!DOCTYPE html>
<div class="row" id="Listado">
    <div class="col-md-12">
        <!--<div id="toolbar" class="form-inline" >
            <button type="button" name="btn_add" class="btn btn-success ">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
        </div>-->
        <table 
            init
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
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="BtnAprobar" data-events="event_btnAprobar">Revisar</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="hidden" >

    <form action="_pedido" role="aprobacionOrdenPedido" save>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="" class="control-label">Fecha</label>
                            <input data-tipo="fechaView" fecha type="text" class="form-control" readonly>
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
                            <label for="" class="control-label">Área</label>
                            <input type="text" area class="form-control" readonly>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="" class="control-label">Estado</label>
                            <select name="estado" required class="selectpicker form-control">
                                <option value="PEN">Pendiente</option>
                                <option value="REC">Rechazado</option>
                                <option value="APR">Aprobado</option>
                                <option value="DEV">Devuelto</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Observación:</label>
                    <textarea name="observacion" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table
                    id="tbOrdenPedido"
                    full>
                    <thead>
                        <tr>
                            <th data-field="cantidad" class="col-md-1" data-align="center">Cant.</th>
                            <th data-field="descripcion">Descripción</th>
                            <th data-field="precioref" class="col-md-1" data-align="center">Precio Unit.</th>
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