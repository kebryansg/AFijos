<!DOCTYPE html>
<div class="row" id="Listado">
    <div class="col-md-12">
        <div id="toolbar" class="btn-group">
            <button type="button" name="btn_add" class="btn btn-success ">
                <i class="glyphicon glyphicon-plus"></i> Agregar
            </button>
            <button type="button" name="btn_del" class="btn btn-danger ">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
            </button>
        </div>
        <table 
            init
            data-toolbar="#toolbar"
            data-ajax="loadPresupuesto"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ID" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="departamento">Departamento</th>
                    <th data-field="prestamoInicial">Prestamo</th>
                    <th data-field="compras">Compras</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="row hidden" >
    <form save role="presupuesto" action="_compras">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Departamento</label>
                <div tipo  data-fn="loadDepartamento"  >
                    <div class="pull-right">
                        <!--<button type="button" class="btn btn-info btn-sm " data-toggle='modal' 
                                data-target="#modal-new" data-url="mvc/views/activos/tipoidentificacion.php">
                            <i class="fa fa-plus"></i>
                        </button>-->
                        <button refresh type="button" class="btn btn-success btn-sm ">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                    <select name="IDDepartamento" class="selectpicker form-control" data-width='80%' required>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Año:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="año" fecha dt-tipo="year">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Prestamo Inicial</label>
                <input type="text" name="prestamoInicial" class="form-control"  required myDecimal>
            </div>
            <div class="form-group">
                <label class="control-label">Compras</label>
                <input name="compras" class="form-control"  required myDecimal>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Orden Pedido</label>
                <input name="ordenPedido" class="form-control" value="0.00" readonly >
            </div>
            <div class="form-group">
                <label class="control-label">Orden Compra</label>
                <input name="ordenCompra" class="form-control" value="0.00"  readonly>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-danger" type="reset"  title="Haga clic aquí para cancelar el registro actual">
                    <i class="fa fa-reply" aria-hidden="true"></i> Cancelar
                </button>
                &nbsp;
                <button type="submit" class="btn btn-primary" title="Haga clic aquí para guardar la información">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar										
                </button>
                <button id="btnGet" type="button" class="btn btn-success btn-sm ">
                    <i class="fa fa-refresh"></i>
                </button>
            </div>
        </div>

    </form>
</div>

<script type="text/javascript" src="resource/views/items/presupuesto.js"></script>