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
                                <input autocomplete="off" type="text" id="idparametro" placeholder="Ingrese un parametro" class="form-control" value="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="idparametro">Codigo</label>
                                <input autocomplete="off" type="text" id="codigo" placeholder="Ingrese un codigo" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="nombre" class="form-control"  placeholder="Ingrese un nombre" required/>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="descripcion_corta">Descripción Corta (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="descripcion_corta" class="form-control"  placeholder="Ingrese descripcion corta" required/>
                            </div>
                            <div class="form-group">
                                <label for="url_amigable">Url Amigable (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="url_amigable" class="form-control"  placeholder="Ingrese Url Amigable" required/>
                            </div> 
                            
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="descripcion_larga">Descripción Larga</label>
                                <input autocomplete="off" type="text" id="descripcion_larga" placeholder="Ingrese un parametro" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="title">Titulo de Pagina (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="title" class="form-control"  placeholder="Ingrese un nombre" required/>
                            </div>
                            <div class="form-group">
                                <label for="descripcion_larga">Titulo (*)</label>
                                <input autocomplete="off" type="text" id="titulo" placeholder="Ingrese un Titulo" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="keywords">Palabras Clave (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="keywords" class="form-control"  placeholder="Ingrese palabras clave" required/>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado (*)</label>
                                <input autocomplete="off" maxlength="90" type="text" id="estado" class="form-control"  placeholder="Ingrese un Estado ACTIVO o INACTIVO" required/>
                            </div> 
                            <div class="form-group">
                                <label for="title">Segundo Titulo</label>
                                <input autocomplete="off" maxlength="90" type="text" id="titulo2" class="form-control"  placeholder="Ingrese segundo Titulo" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="parrafo1">Primer Parrafo</label>
                                <textarea rows="20" cols="250" autocomplete="off" maxlength="10000" type="text" id="parrafo1" class="form-control"  placeholder="Ingrese Primer Parrafo" required/></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                                <label for="parrafo2">Segundo Parrafo (*)</label>
                                <textarea rows="20" cols="250" autocomplete="off" maxlength="10000" type="text" id="parrafo2" class="form-control"  placeholder="Ingrese el segundo parrafo" required/></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="keywords">Tercer Titulo (*)</label>
                            <input autocomplete="off" maxlength="90" type="text" id="titulo3" class="form-control"  placeholder="Ingrese el tercer titulo" required/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="parrafo3">Tercer Parrafo (*)</label>
                            <textarea rows="20" cols="250" autocomplete="off" maxlength="10000" type="text" id="parrafo3" class="form-control"  placeholder="Ingrese el tercer Parrafo" required/></textarea>
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
                        <div id="LastId" class ="hidden"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>