<!DOCTYPE html>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="" class="control-label">Cod. Orden Pedido</label>
                    <div class="inputComponent" >
                        <input type="text" class="form-control input-sm" style="width: 80%;">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Estado</label>
                    <input type="text" class="form-control" estado readonly>
                </div>

            </div>
            <div class="col-md-3">
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
                <div class="form-group">
                    <label for="" class="control-label">Departamento</label>
                    <input type="text" departamento class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Usuario</label>
                    <input type="text" usuario class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Área</label>
                    <input type="text" area class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="control-label">Estado</label>
                    <!--<input type="text" class="form-control" estado readonly>-->
                    <textarea class="form-control" name="descripcion" cols="30" rows="4" readonly></textarea>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div id="toolbar" class="inputComponent">
            <input type="text" class="form-control input-sm" style="width: 300px; margin-right: 5px;" placeholder="Proveedor" readonly>
            <button class="btn btn-primary btn-sm"> <i class="fa fa-search"></i> </button>
        </div>

        <table id="tbDetalleOrden"
               data-toolbar="#toolbar">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-formatter="rowCount" class="col-md-1" data-align="center">N°</th>
                    <th data-field="descripcion">Descripción</th>

                    <th data-field="cantidad" class="col-md-2" data-align="center">Cant.</th>
                    <th data-field="precio" class="col-md-2" data-align="center">Precio</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript" src="resource/views/Compras/GenerarOrdenPedido.js"></script>
