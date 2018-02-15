<!DOCTYPE html>
<div class="row">
    <div class="col-md-3">


    </div>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-pencil-alt"></i> Datos Generales</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="" class="control-label">Cod. Orden Pedido</label>
                    <div class="inputComponent" >
                        <input type="text" class="form-control input-sm" style="width: 80%;">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-5">
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
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="" class="control-label">Usuario</label>
                            <input type="text" usuario class="form-control" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Departamento</label>
                            <input type="text" departamento class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Área</label>
                            <input type="text" area class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Estado</label>
                            <input type="text" class="form-control" estado readonly>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="col-md-5">
                <div class="form-group">
                            <label for="" class="control-label">Estado</label>
                            <!--<input type="text" class="form-control" estado readonly>-->
                            <textarea class="form-control" name="descripcion" cols="30" rows="4" readonly></textarea>
                        </div>
            </div>
        </div>
    </div>
</div>
