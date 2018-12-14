<div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center col-xs-12">
                    <div class="page-caption">
                        <h1 class="page-title">Nuestros Servicios</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page header -->
    <div class="content">
        <div class="container">
        <?php //inicio de grilla de servicios
            $resultado_servicios_grilla2 = $conexion->DBConsulta("
                SELECT
                *
                FROM
                servicios
                WHERE
                estado = 'ACTIVO';
            ", 2);

            $presenta_servicios2 = array();
            $itemsServicios2 = '';
            foreach($resultado_servicios_grilla2 as $fila_serv2){
                $presenta_servicios2['id'] = $fila_serv2['id'];
                $presenta_servicios2['codigo'] = $fila_serv2['codigo'];
                $presenta_servicios2['nombre'] = $fila_serv2['nombre'];
                $presenta_servicios2['url_amigable'] = $fila_serv2['url_amigable'];
                $presenta_servicios2['descripcion_corta'] = $fila_serv2['descripcion_corta'];
                $presenta_servicios2['descripcion_larga'] = $fila_serv2['descripcion_larga'];
                $presenta_servicios2['title'] = $fila_serv2['title'];
                $presenta_servicios2['keywords'] = $fila_serv2['keywords'];
                
                $itemsServicios2 .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                $itemsServicios2 .= '<div class="service-block mb20 pinside30 outline text-center">';
                $itemsServicios2 .= '<div class="service-icon mb30"><img src="'.$server.'images/service-icon1.png" class="img-responsive" alt=""></div>';
                $itemsServicios2 .= '<div class="">';
                $itemsServicios2 .= '<h2><a href="'.$server.'servicios/'.$presenta_servicios2['url_amigable'].'" class="heading-title">'.$presenta_servicios2['nombre'].'</a></h2>';
                $itemsServicios2 .= '<p>'.$presenta_servicios2['descripcion_larga'].'</p>';
                $itemsServicios2 .= '<a href="'.$server.'servicios/'.$presenta_servicios2['url_amigable'].'" class="btn-link">Leer mas...</a>';
                $itemsServicios2 .= '</div></div></div>';
                
            }
            ?>
            <div class="row">
                <?php echo $itemsServicios2;?>
                <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon1.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="service-detail.html" class="heading-title">Equity</a></h2>
                            <p>Donec euurna lobortis antes gravidase iaculis aecenas is euesr suscipitatullamcorper is miuspe ndisseac.</p>
                            <a href="<?php echo $server?>servicios/Equity/" class="btn-link">Leer mas...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon2.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="<?php echo $server?>servicios/detalle/desembarque/" class="heading-title">Comodity</a></h2>
                            <p>Nulla lorem risu elementum spoeircis atincid vestibulum esnean tempor stibullor non pelntesque. </p>
                            <a href="<?php echo $server?>servicios/Comodity" class="btn-link">Leer mas...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon3.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="#" class="heading-title">Nifty Future</a></h2>
                            <p>Posroin in tellusin libero one saculis sihoncus urabitur on ictumie libero elementum leous dapibus tortor.</p>
                            <a href="<?php echo $server?>servicios/Nifty-Future" class="btn-link">Leer mas...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon4.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="service-detail.html" class="heading-title">Curruncy</a></h2>
                            <p>Fussce asapien idur loremis svallise dapibuorem ipsum dolorese sitamet ectetur iscing elitra saero.</p>
                            <a href="service-detail.html" class="btn-link">Leer mas...</a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>