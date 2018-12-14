<ul class="nav nav-tabs nav-justified">
    <li role="presentation" class="active"><a data-toggle="tab" id="visualizar-tab" role="tab" href="#home" aria-expanded="true">Visualización</a></li>
    <li role="presentation" class=""><a role="tab" data-toggle="tab" id="gestionar-tab" href="#menu1Now" aria-expanded="false">Gestión</a></li>
</ul>
<div id="contiene_jqGrid">
    <div class="tab-content">
        <div role="tabpanel" id="home" aria-labelledby="visualizar-tab" class="row tab-pane fade in active">        
            <br>       
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="jqGridParametros"></table>
                    <div id="jqGridParametrosPager"></div>
                </div>
            </div>  
        </div>
        <div role="tabpanel" id="menu1Now" aria-labelledby="gestionar-tab" class="row tab-pane fade">
            <br>
            <div class="col-sm-12">
                <div class="well well-sm">
                (*) Campos obligatorios
                </div>
                <form role="form" id="formParametroDetalle">
                    <div class="row">  
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="idparametro">IdParametro</label>
                                <input autocomplete="off" type="text" id="idparametro" placeholder="Ingrese un parametro" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="nombre" class="form-control"  placeholder="Ingrese un nombre" required/>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="descripcion">Descripción (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="descripcion" class="form-control"  placeholder="Ingrese descripcion" required/>
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="valor" class="form-control"  placeholder="Ingrese un valor" required/>
                            </div> 
                            
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6 form-group">
                            <button type="reset" id="limpiarFormParametrosDetalle" class="btn btn-block btn-info">Limpiar</button>
                        </div>
                        <div class="col-sm-6 form-group">
                            <button type="submit" id="submitFormParametrosDetalle" class="btn btn-block btn-success">Guardar</button>
                        </div>
                        <div id="accion" class ="hidden"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>