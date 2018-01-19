<!DOCTYPE html>
<div id="modal-adminTipo" class="modal fade" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Administrar Tipo - <span name="title"></span>
                </h4>
            </div>
            <div class="modal-body">
                <div id="modal-toolbar" class="btn-group">
                    <button class="btn btn-success btn-outline" data-toggle="modal" data-target="#modal-new" data-url="mvc/views/activos/subtipogeneral.php">
                        <i class="fa fa-plus"></i> Agregar
                    </button>
                    <button class="btn btn-info btn-outline" data-toggle="modal" data-target="#modal-find" data-ajax="loadSubTipoGeneral">
                        <i class="glyphicon glyphicon-new-window"></i> Asignar
                    </button>
                    <button type="button" name="btn_del_individual" class="btn btn-default btn-danger btn-outline">
                        <i class="glyphicon glyphicon-trash"></i> Eliminar
                    </button>
                </div>
                <table 
                    full
                    data-toolbar="#modal-toolbar">
                    <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="ID" class="col-md-1">Cód.</th>
                            <th data-field="descripcion">Descripción</th>
                            <!--<th data-field="accion" data-formatter="btnSeleccion" data-events="event_accion_default" class="col-md-1" data-align="center">Acción</th>-->
                        </tr>
                    </thead>
                </table>
                <br>
                <div class="pull-right">
                    <button class="btn btn-outline btn-primary" data-dismiss="modal">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div id="modal-new" class="modal fade"   >
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

            </div>
        </div>
    </div>
</div>

<div id="modal-find" class="modal fade" >
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
                    search>
                    <thead>
                        <tr>
                            <th data-field="descripcion">Descripción</th>
                            <th data-field="accion" data-formatter="btnSeleccion" data-events="event_accion_default" class="col-md-1" data-align="center">Acción</th>
                        </tr>
                    </thead>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
