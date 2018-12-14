<?php 

$resultado_servicios = $conexion->DBConsulta("
    SELECT * FROM servicios where estado = 'ACTIVO';
", 2);
$servicios = array();

?>

<div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center col-xs-12">
        <div class="page-caption">
          <h1 class="page-title">Proforma</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.page header -->

<div class="content">
  <div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="widget outline">
                    <h2 class="widget-title">Listado de Servicios</h2>
                    <div class="widget-img mb30">
                      <!--<img src="<?php echo $server?>images/widget-pic.jpg" class="img-responsive" alt="">-->
                        <ul id="listadoServicios" class="list-group">
                        
                        <?php 
                          $serv_listado = array();
                          foreach($resultado_servicios as $detServicios){
                            $serv_listado['codigo'] = $detServicios['codigo'];
                            $serv_listado['nombre'] = $detServicios['nombre'];
                            $serv_listado['url_amigable'] = $detServicios['url_amigable'];
                            $serv_listado['descripcion_corta'] = $detServicios['descripcion_corta'];
                            $serv_listado['descripcion_larga'] = $detServicios['descripcion_larga'];
                            $serv_listado['title'] = $detServicios['title'];
                            $serv_listado['keywords'] = $detServicios['keywords'];

                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                            <a id="'.$serv_listado['url_amigable'].'" title ="'.$serv_listado['title'].'" class="btn btn-info btn-block">'.$serv_listado['nombre'].'</a>
                            </li>';
                          }
                            
                          
                        ?>
                        </ul>
                    </div>
                    <!--<p>Lorem ipsum dolor sit amet consectetur adipiscing elitedse fermentum exanulla vulputate sitamet susciit leorem ipsum pharetra slass aptent dolor. </p>
                    <a href="#" class="btn btn-outline">Leer mas</a>-->
                  </div>
                </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="outline pinside40">
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>Proforma en segundos</h1>
            <div class="row">
              <form id="formularioProforma" class="form">
              <!-- Text input-->
              <div class="form-group">
                <label class="col-lg-7 col-md-7 col-sm-12 col-xs-12 control-label" for="textinput">Nombre <span class="required">*</span></label>  
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <input title="nombre" id="nombre" name="textinput" type="text" placeholder="" class="form-control input-md" required>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-lg-7 col-md-7 col-sm-12 col-xs-12 control-label" for="textinput">Email <span class="required">*</span></label>  
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <input title="email" id="email" name="textinput" type="text" placeholder="" class="form-control input-md" required> 
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-lg-7 col-md-7 col-sm-12 col-xs-12 control-label" for="textinput">Cel. <span class="required">*</span></label>  
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <input title="celular" id="celular" name="textinput" type="text" placeholder="" class="form-control input-md" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-7 col-md-7 col-sm-12 col-xs-12 control-label" for="textinput">Detalle de Servicios<span class="required">*</span></label>
                <!--<input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">-->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="agregarServicio">
                </div>
                </div>
                <div class="form-group">
                <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label" for="textarea">Comentario</label>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <textarea title="comentario" id="comentario" class="form-control" rows="7" id="textarea" name="textarea" required></textarea>
                </div>
              </div>
              </div>
              <!-- Textarea -->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="g-recaptcha" data-sitekey="6LcWdGUUAAAAAE8mDJH3qhg_9hFcbV8VNdFwavKc"></div>
              </div>
                <div id="enviarProforma"class="btn btn-outline">Enviar</div>
                <!--<button  class="btn btn-outline">Enviar</button>-->
                
                <span class="required pull-right">* Se requieren campos</span>
              </div>
            </form>
            </div>

          </div>
        </div>
        </div>
      </div>
      
    </div>
  </div>
</div>