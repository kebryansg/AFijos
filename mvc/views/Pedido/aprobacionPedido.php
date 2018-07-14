<!DOCTYPE html>
<div class="row " id="Listado">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <table 
                    init
                    data-ajax="loadAprobacionOrdenPedido"
                    data-query-params="queryParams"
                    data-response-handler="responseHandler">
                    <thead>
                        <tr>
                            <!--<th data-field="state" data-checkbox="true"></th>-->
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
    </div>
</div>

<div id="div-registro" class="hidden" >
    <form action="_pedido" role="aprobacionOrdenPedido" save>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
            </div>
            <div class="box-body row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="" class="control-label">Fecha</label>
                                <input data-tipo="fechaView" name="fecha" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="" class="control-label">Departamento</label>
                                <input type="text" name="departamento" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="" class="control-label">Usuario</label>
                                <input type="text" name="usuario" class="form-control" readonly>
                            </div>
                            <div class="form-group form-group-sm">
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
                <div class="col-md-3">
                    <div class="form-group  form-group-sm">
                        <label for="" class="control-label">Observación</label>
                        <textarea name="observacion" exclud cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group  form-group-sm">
                        <label for="" class="control-label">Autorizador</label>
                        <input type="text" name="autorizador" class="form-control" readonly>
                    </div>
                    <div class="form-group  form-group-sm">
                        <label for="" class="control-label">Fecha Autorización</label>
                        <input type="text" name="fecha_autorizacion" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <i class="fa fa-list-alt"></i> Detalle Orden Pedido</h3>
                        <h4 class="box-title bold pull-right" style="color: red;">Total:  <i class="fa fa-dollar-sign"></i> <b total>0.00</b></h4>
                    </div>
                    <div class="box-body">
                        <table
                            id="tbOrdenPedido">
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
            </div>
        </div>
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
</div>
<script type="text/javascript" src="resource/views/Pedido/aprobacionPedido.js"></script>