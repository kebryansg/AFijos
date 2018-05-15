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
            data-ajax="loadProveedor"
            data-response-handler="responseHandler">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" class="col-md-1" data-align="center">Cód.</th>
                    <th data-field="nombre">Nombres</th>
                    <th data-field="email">Email</th>
                    <th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultBtnAccion" data-events="event_accion_default">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="div-registro" class="hidden" >
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
        </div>
        <div class="box-body">
            <form save role="proveedor" action="_compras">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tipo Identificación</label>
                        <div tipo >
                            <select name="IDTipoIdentificacion" class="selectpicker form-control" data-fn="selectTipoIdentificacion" data-width='80%' required></select>
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-sm " data-toggle='modal' 
                                        data-target="#modal-new" data-url="mvc/views/activos/tipoidentificacion.php">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button refresh type="button" class="btn btn-success btn-sm ">
                                    <i class="fa fa-sync-alt"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Identificación</label>
                        <input type="text" name="identificacion" class="form-control" value="" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" class="form-control"  maxlength="150" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input name="telefono" class="form-control"  maxlength="10" >
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular</label>
                                <input name="celular" class="form-control"  maxlength="10" >
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Autorización SRI</label>
                        <input name="autorizacionSRI" class="form-control"  maxlength="150" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" class="form-control"  maxlength="150" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contribuyente</label>
                        <div tipo  >
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-sm " data-toggle='modal' 
                                        data-target="#modal-new" data-url="mvc/views/activos/contribuyente.php">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button refresh type="button" class="btn btn-success btn-sm ">
                                    <i class="fa fa-sync-alt"></i>
                                </button>
                            </div>
                            <select name="IDContribuyente" data-fn="selectTipoContribuyente" class="selectpicker form-control" data-width='80%'>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label">Tipo Emisor</label>
                        <div tipo  >
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-sm " data-toggle='modal' 
                                        data-target="#modal-new" data-url="mvc/views/activos/tipoemisor.php">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button refresh type="button" class="btn btn-success btn-sm ">
                                    <i class="fa fa-sync-alt"></i>
                                </button>
                            </div>
                            <select name="IDTipoEmisor" data-fn="selectTipoEmisor" class="selectpicker form-control" data-width='80%'>
                            </select>
                        </div>

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
                            <i class="fa fa-save" aria-hidden="true"></i> Guardar										
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="resource/views/items/proveedor.js"></script>