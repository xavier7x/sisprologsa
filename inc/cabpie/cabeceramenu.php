<!-- navigation-transparent -->
<div class="header">
                <!-- navigation -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <a class="logo" href="<?php echo $server?>inicio/"><img src="<?php echo $server?>images/<?php echo $logo; ?>" alt="Inicio Sisprologsa"></a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div id="navigation" class="navigation">
                                <ul class="pull-right">
                                <?php 
                                    
                                    $resultado_main_menu = $conexion->DBConsulta("
                                    SELECT *
                                    FROM front_menu where estado = 'ACTIVO' order by orden asc;
                                ", 2);

                                    $resultado_main_sub_menu = $conexion->DBConsulta("
                                    SELECT *
                                    FROM front_menu where estado = 'ACTIVO' and padreId != 0 order by ordenSubMenu asc;
                                ", 2);

                                    $sub_menu_li = '';
                                    foreach($resultado_main_menu as $det_main_menu){
                                        if($det_main_menu['padreId'] == 0){
                                            echo '<li class="men'.$det_main_menu['url_amigable'].'">'.'<a href="'.$server.$det_main_menu['url_amigable'].'" title="'.$det_main_menu['title'].'" class="animsition-link">'.$det_main_menu['nombre'].'</a>';
                                                foreach($resultado_main_sub_menu as $submenu){
                                                    if($det_main_menu['id'] == $submenu['padreId']){
                                                        $sub_menu_li .= '<li><a href="'.$server.$submenu['url_amigable'].'" title="'.$submenu['nombre'].'">'.$submenu['nombre'].'</a></li>';
                                                    }
                                                }
                                                if($det_main_menu['id'] == $submenu['padreId']){
                                                    echo '<ul>';
                                                    echo $sub_menu_li;
                                                    echo '</ul>';
                                                }
                                            echo '</li>';
                                        }
                                    }
                                ?>
                                    <!--<li class="active"><a href="<?php echo $server?>inicio/" title="Nosotros" class="animsition-link">Inicio</a></li>-->
                                    <!--<li><a href="blog.html" title="Blog" class="animsition-link">Blog</a>
                                        <ul>
                                            <li><a href="blog.html" title="Blog" class="animsition-link">Blog</a></li>
                                            <li><a href="blog-single.html" title="Blog Single" class="animsition-link">Blog Single</a></li>
                                        </ul>
                                    </li>-->
                                    <!--<li><a href="<?php echo $server?>servicios/" title="Servicios" class="animsition-link">Nuestros Servicios</a>-->
                                        <!--<ul>-->
                                            <!--<li><a href="<?php echo $server?>nosotros/" title="Service List">Service List</a></li>-->
                                            <!--<li><a href="service-detail.html" title="Service Detail">Service Detail</a></li>-->
                                            <!--<li><a href="<?php echo $server?>proforma/" title="Proforma">Proforma</a></li>-->
                                        <!--</ul>-->
                                    <!--</li>
                                    <li><a href="<?php echo $server?>nosotros/" title="Nosotros" class="animsition-link">Nosotros</a></li>
                                    <li><a href="<?php echo $server?>contactenos/" title="contactenos" class="animsition-link">Contáctenos</a></li>-->
                                    <!--<li><a href="typography.html" title="Style Guide" class="animsition-link">style guide</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.navigation -->