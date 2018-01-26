<!DOCTYPE html>
<form save role="presupuesto" action="_compras" >
    <div class="row">
        <div class="col-md-4">
            <div class="form-group ">
                <label class="control-label">Departamento</label>
                <div tipo  data-fn="loadDepartamento"  >
                    <div class="pull-right">
                        <button type="button" class="btn btn-info btn-sm " data-toggle='modal' 
                                data-target="#modal-new" data-url="mvc/views/activos/departamento.php">
                            <i class="fa fa-plus"></i>
                        </button>
                        <button refresh type="button" class="btn btn-success btn-sm ">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                    <select name="IDDepartamento" class="selectpicker form-control" data-width='80%' required>
                    </select>
                </div>
            </div>
            <div class="form-group ">
                <label class="control-label">Año:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control " name="año" fecha dt-tipo="year" readonly required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Presupuesto Inicial</label>
                    <input type="text" name="presupuestoInicial" class="form-control" value="0.00" required myDecimal>
                </div>
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Compras</label>
                    <input name="compras" class="form-control" value="0.00" myDecimal readonly>
                </div>
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Orden Pedido</label>
                    <input name="ordenPedido" class="form-control" myDecimal value="0.00" readonly >
                </div>
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Orden Compra</label>
                    <input name="ordenCompra" class="form-control" myDecimal value="0.00"  readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 bx">
                    <h4>Excedio el PRESUPUESTO INICIAL</h4>
                </div>

            </div>
        </div>
        <div class="col-md-7 col-md-offset-1">
            <table id="tbDetallePresupuesto">
                <thead>
                    <tr>
                        <!--<th data-field="state" data-checkbox="true"></th>-->
                        <th data-formatter="rowCount" data-align="center" class="col-md-1">N°</th>
                        <th data-field="mes">Meses</th>
                        <th data-field="precio" class="col-md-3 col-xs-3" data-formatter="imask" data-events="event_input">Precio</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="col-md-12">
            <div class="pull-right">
<!--                <button type="reset" class="btn btn-danger">
                    <i class="fa fa-reply"></i> Cancelar
                </button>-->
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>

        </div>
    </div>
</form>
<script type="text/javascript" src="resource/views/items/presupuesto.js"></script>
