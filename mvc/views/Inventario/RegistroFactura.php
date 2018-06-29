<!DOCTYPE html>
<div class="box box-info">
    <!--s<div class="box-header">
        <h3 class="box-title with-border"> Registrar</h3>
    </div>-->
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group form-group-sm">
                    <label class="control-label">Bodega</label>
                    <select data-fn="selectBodega" class="selectpicker form-control"></select>
                </div>
                <div class="form-group form-group-sm">
                    <label class="control-label">Cód. Factura</label>
                    <div class="inputComponent">

                        <input codigoFactura type="text" class="form-control input-sm" style="width: 90%;">
                        <button codigoFactura class="btn btn-success btn-sm"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table>
                    <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="descripcion">Item</th>
                            <th data-field="cantidad" class="col-md-2" data-align="center" data-formatter="formatInputMask" >Cant. Fact.</th>
                            <th data-field="saldo" class="col-md-2" data-align="center" data-formatter="formatInputMask" >Saldo</th>
                            <th data-field="ingreso" class="col-md-2" data-formatter="imaskMinMax" data-events="event_input_default">Cant. Recibida</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <button class="btn btn-danger btn-sm">
                <i class="fa fa-reply"></i> Cancelar
            </button>
            <button save class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i> Registrar
            </button>
        </div>
    </div>
</div>

<script type="text/javascript" src="resource/views/Inventario/RegistroFactura.js"></script>