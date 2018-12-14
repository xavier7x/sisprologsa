<div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 hidden-xs">
                    <div class="intro-caption">
                        <!-- intro caption -->
                        <h1 class="intro-title"><?php echo $menu_componentes['titulo']; ?></h1>
                        <p class="mb40"><?php echo $menu_componentes['parrafotitulo']; ?></p>
                        <!--<a href="#" class="btn btn-default">Download</a>-->
                        <a href="#" class="btn btn-white"><?php echo $menu_componentes['buttonInicioTexto']; ?></a> </div>
                    <!-- /.intro caption -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.intro section -->
    <div class="section-space60">
        <!-- section-space80 -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h1><?php echo $menu_componentes['titulo2']; ?></h1>
                        <p><?php echo $menu_componentes['parrafotitulo2']; ?></p>
                    </div>
                </div>
            </div>
            <?php //inicio de grilla de servicios
            $resultado_servicios_grilla = $conexion->DBConsulta("
                SELECT
                *
                FROM
                servicios
                WHERE
                estado = 'ACTIVO' limit 4;
            ", 2);

            $presenta_servicios = array();
            $itemsServicios = '';
            foreach($resultado_servicios_grilla as $fila_serv){
                $presenta_servicios['id'] = $fila_serv['id'];
                $presenta_servicios['codigo'] = $fila_serv['codigo'];
                $presenta_servicios['nombre'] = $fila_serv['nombre'];
                $presenta_servicios['url_amigable'] = $fila_serv['url_amigable'];
                $presenta_servicios['descripcion_corta'] = $fila_serv['descripcion_corta'];
                $presenta_servicios['descripcion_larga'] = $fila_serv['descripcion_larga'];
                $presenta_servicios['title'] = $fila_serv['title'];
                $presenta_servicios['keywords'] = $fila_serv['keywords'];
                
                $itemsServicios .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                $itemsServicios .= '<div class="service-block mb20 pinside30 outline text-center">';
                $itemsServicios .= '<div class="service-icon mb30"><img src="'.$server.'images/service-icon1.png" class="img-responsive" alt=""></div>';
                $itemsServicios .= '<div class="">';
                $itemsServicios .= '<h2><a href="'.$server.'servicios/'.$presenta_servicios['url_amigable'].'" class="heading-title">'.$presenta_servicios['nombre'].'</a></h2>';
                $itemsServicios .= '<p>'.$presenta_servicios['descripcion_corta'].'</p>';
                $itemsServicios .= '<a href="'.$server.'servicios/'.$presenta_servicios['url_amigable'].'" class="btn-link">Leer mas...</a>';
                $itemsServicios .= '</div></div></div>';
                
            }
            ?>
            <div class="row">
                <?php echo $itemsServicios; ?>
                <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon1.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="service-detail.html" class="heading-title">Equity</a></h2>
                            <p>Donec euurna lobor tis an tes gravi dase iaculis aec enas is euesr suscipitatullamcorper.</p>
                            <a href="service-detail.html" class="btn-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon2.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="service-detail.html" class="heading-title">Comodity</a></h2>
                            <p>Nulla lorem risu elementum spoeircis atincid vestibulum esnean tempor stibullor non pelntesque. </p>
                            <a href="service-detail.html" class="btn-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon3.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="#" class="heading-title">Nifty Future</a></h2>
                            <p>Posroin in tellusin libero one saculis sihoncus urabitur on ictumie libero elementum leous dapibus tortor.</p>
                            <a href="service-detail.html" class="btn-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block mb20 pinside30 outline text-center">
                        service block
                        <div class="service-icon mb30"><img src="<?php echo $server?>images/service-icon4.png" class="img-responsive" alt=""></div>
                        <div class="">
                            <h2><a href="service-detail.html" class="heading-title">Curruncy</a></h2>
                            <p>Fussce asapien idur loremis svallise dapibuorem ipsum dolorese sitamet ectetur iscing elitra saero.</p>
                            <a href="service-detail.html" class="btn-link">Read More</a>
                        </div>
                    </div>
                
                </div>-->
            </div>
            <!-- fin grilla -->
        </div>
        <!-- /.section-space80 -->
    </div>
    <div class="section-space80 bg-light">
        <!-- section-space80 -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mb60">
                    <h1>Who We Are?</h1>
                    <p>Maecenas semper egestas maximu hasellus utelit loremes mullanec nequeac mione tempus
                        <br> comodo egetac ummtusell <strong>entesque ulisdiam mcorper tiam blandit</strong> faucibus massaose
                        <br> tortored euismllam facilisis rutrum pulvinar Integ vulputate leo.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mb40">
                    <h2>Take on the market with our powerful platforms</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="mb30">
                        <h3>Multiple Brokage Options</h3>
                        <p>Scelerisque diam ortis ut phasellus exorci posuere mollis tellus ia lorrem pharetra dolordui.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="mb30">
                        <h3>Convenience</h3>
                        <p>Necscelerisque diam ortis ut phasellus exorci one posuere mollis tellus ia lorrem pharetra.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="mb30">
                        <h3>Expert Research Recommendations</h3>
                        <p>Elerisque diam ortisut phasellus exorci posuere one mollis tellusia lorrem desones deroits.</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mt40">
                    <a href="#" class="btn btn-outline">About us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.section-space80 -->
    <div class="section-space60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h1>Customer Reviews</h1>
                        <p>We welcome feedback from our members as it helps us optimize the site to better service their needs. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="outline testimonial-block pinside30 mb30">
                        <div class="testimonial-header">
                            <div class="testimonial-icon">
                                <!-- testimonial icon -->
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <!-- /.testimonial icon -->
                            <span class="testimonial-title">Good Service</span>
                        </div>
                        <div class="testimonial-content">
                            <p>“I have only been with the stock pick system and short time and so for have had very good results. 34 trades with only one loss and that amount was only 1.35%”</p>
                        </div>
                        <div class="customer-box">
                            <!-- customer-box -->
                            <div class="testimonial-img">
                                <img src="<?php echo $server?>images/testimonial1.jpg" alt=" " class="img-circle">
                            </div>
                            <div class="testimonial-info">
                                <h3 class="customer-name">Jose Chronister</h3>
                                <h4 class="testimonial-meta">customer</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="outline testimonial-block pinside30 mb30">
                        <div class="testimonial-header">
                            <div class="testimonial-icon">
                                <!-- testimonial icon -->
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <!-- /.testimonial icon -->
                            <span class="testimonial-title">Great Discovery</span>
                        </div>
                        <div class="testimonial-content">
                            <p>“What a great discovery. This is what I have been looking for. I don’t want to Daytrade. On the other hand, I do not want to sit on it for a long time before I sell”</p>
                        </div>
                        <div class="customer-box">
                            <!-- customer-box -->
                            <div class="testimonial-img">
                                <img src="<?php echo $server?>images/testimonial2.jpg" alt=" " class="img-circle">
                            </div>
                            <div class="testimonial-info">
                                <h3 class="customer-name">Lisa Greene</h3>
                                <h4 class="testimonial-meta">customer</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="outline testimonial-block pinside30 mb30">
                        <div class="testimonial-header">
                            <div class="testimonial-icon">
                                <!-- testimonial icon -->
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <!-- /.testimonial icon -->
                            <span class="testimonial-title">Easy to Follow</span>
                        </div>
                        <div class="testimonial-content">
                            <p>“After searching for a site with recommendations that make sense and easy to follow I finally found one. Took about profit first and I’m just getting into the system”</p>
                        </div>
                        <div class="customer-box">
                            <!-- customer-box -->
                            <div class="testimonial-img">
                                <img src="<?php echo $server?>images/testimonial3.jpg" alt=" " class="img-circle">
                            </div>
                            <div class="testimonial-info">
                                <h3 class="customer-name">Katheryn Brown</h3>
                                <h4 class="testimonial-meta">customer</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.section-space80 -->
    <div class="cta ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <h1 class="cta-title">Get in touch <br>
                 Call, email 24/7 or visit a branch</h1>
                    <p class="cta-text">Interdum varius quisque mattis elit quam quis posuere odio sagittisvel aliquam a imperdiet ante sed mollis libero maecenas egestaudin morbi arc.</p>
                    <a href="#" class="btn btn-white mb30">Get Started Now</a>
                </div>
                <div class="col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 col-sm-6 col-xs-12">
                    <div class="bg-white pinside30 cta-info">
                        <div class="cta-call">
                            <i class="fa fa-phone"></i>
                            <span>+91 123 456 789</span>
                        </div>
                        <div class="cta-mail">
                            <i class="fa fa-envelope"></i>
                            <span>Info@Broker.com</span>
                        </div>
                        <div class="cta-address">
                            <i class="fa fa-map-marker"></i>
                            <span class="address">
                              4451 Jett Lane Irvine, 
                              CA 92614
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space80">
        <!-- section space -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h1>Brokers Latest News</h1>
                        <p>Necslerisque diam lobortis ut phasellus exorci posuere mollis tellus idlacinia pharetra dolor.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="post-block pinside40 outline mb30">
                        <!-- post block -->
                        <div class="post-meta mb10">
                            <!-- post meta -->
                            <span class="meta-admin">By <a href="#" class="meta-link">Admin </a></span>
                        </div>
                        <!-- /.post meta -->
                        <div class="post-header">
                            <h1 class="post-title mb10"><a href="blog-single.html" class="title">More Than 100 Planners, One Philosophy</a></h1>
                        </div>
                        <div class="post-meta mb30">
                            <!-- post meta -->
                            <span class="meta-date"><i class="fa fa-calendar"></i> 25 April, 2017 </span>
                            <span class="meta-comment"><i class="fa fa-comment-o"></i> <a href="#" class="meta-link">(08) </a></span>
                        </div>
                        <div class="post-content">
                            <p>Aliquam sed at sollicitudin tellus aliquam imperdiet is sem rumdui id nisi blandit non lorem tellus aliquam imperdiet is sem rumdui sollicitudin semeque lorem ipsums derons libero nisi vitae elit ullamper mauris vitae dignissim suscipit lorem. </p>
                            <a href="blog-single.html" class="btn-link">Read More</a> </div>
                    </div>
                    <!-- /.post block -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="post-block pinside40 outline">
                        <!-- post block -->
                        <div class="post-meta mb10">
                            <!-- post meta -->
                            <span class="meta-admin">By <a href="#" class="meta-link">Admin </a></span>
                        </div>
                        <!-- /.post meta -->
                        <div class="post-header">
                            <h1 class="post-title mb10"><a href="blog-single.html" class="title">The Expert Opinion We Recommendation</a></h1>
                        </div>
                        <div class="post-meta mb30">
                            <!-- post meta -->
                            <span class="meta-date"><i class="fa fa-calendar"></i> 24 April, 2017 </span>
                            <span class="meta-comment"><i class="fa fa-comment-o"></i> <a href="#" class="meta-link">(08) </a></span>
                        </div>
                        <div class="post-content">
                            <p>Proin inte llus inli bro iacu lis rhon cus.urab itur a dic tum libe roeu emes elem en tum leoiv amus dapi bus torto rsed bibe ndum ull am corp envel its scele risque feli sid pellen tesque era tull pos uere.</p>
                            <a href="blog-single.html" class="btn-link">Read More</a> </div>
                    </div>
                    <!-- /.post block -->
                </div>
            </div>
        </div>
    </div>