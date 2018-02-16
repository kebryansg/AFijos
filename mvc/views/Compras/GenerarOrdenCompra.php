<!DOCTYPE html>
<link rel="stylesheet" href="resource/dist/css/circularTabs.css">
<!--<link rel="stylesheet" href="resource/dist/css/circularTabsK.css">-->
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
    <div class="col-md-12">
        <div class="board">
            <div class="board-inner" style="border-bottom: 1px solid #ddd;">
                <ul class="nav nav-tabs" id="myTab" style="margin: 0 auto;width: 50%;display: flex;flex-flow: row;justify-content: space-between;">
                    <!--<div class="liner"></div>-->
                    <li class="active">
                        <a href="#home" data-toggle="tab" title="welcome">
                            <span class="round-tabs one">
                                <i class="fa fa-book"></i>
                            </span> 
                        </a>
                    </li>

                    <li><a href="#profile" data-toggle="tab" title="profile">
                            <span class="round-tabs two">
                                <i class="fa fa-pencil-alt"></i>
                            </span> 
                        </a>
                    </li>
                    <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                            <span class="round-tabs three">
                                <i class="fa fa-check"></i>
                            </span> </a>
                    </li>


                </ul></div>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">

                    <h3 class="head text-center">Welcome to Bootsnipp<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                    <p class="narrow text-center">
                        Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>

                    <p class="text-center">
                        <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                    </p>
                </div>
                <div class="tab-pane fade" id="profile">
                    <h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
                    <p class="narrow text-center">
                        Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>

                    <p class="text-center">
                        <a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                    </p>

                </div>
                <div class="tab-pane fade" id="messages">
                    <h3 class="head text-center">Bootsnipp goodies</h3>
                    <p class="narrow text-center">
                        Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>

                    <p class="text-center">
                        <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                    </p>
                </div>
                <div class="tab-pane fade" id="settings">
                    <h3 class="head text-center">Drop comments!</h3>
                    <p class="narrow text-center">
                        Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>

                    <p class="text-center">
                        <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                    </p>
                </div>
                <div class="tab-pane fade" id="doner">
                    <div class="text-center">
                        <i class="img-intro icon-checkmark-circle"></i>
                    </div>
                    <h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
                    <p class="narrow text-center">
                        Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>
                </div>
                <div class="clearfix"></div>
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
<script type="text/javascript" src="resource/views/Compras/circularTabs.js"></script>
