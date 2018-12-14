
<?php

$resultado_det_serv = $conexion->DBConsulta("
SELECT
b.*
FROM
    servicios a
INNER JOIN det_servicios b WHERE
    a.id = b.id_servicio AND a.url_amigable = '".$p1."'
", 2);
//
$det_servicio = array();
foreach($resultado_det_serv as $filaServ){
    $det_servicio[trim($filaServ['campo'])] = trim($filaServ['valor']);
}
?>

<div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center col-xs-12">
                    <div class="page-caption">
                        <h1 class="page-title"><?php echo strtoupper(str_replace("-"," ",$p1));?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page header -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <img src="<?php echo $server; ?>images/service-single.jpg" class="img-responsive mb30" alt="">
                                        <h2><?php echo $det_servicio['titulo']; ?></h2>
                                        <?php echo $det_servicio['parrafo1']; ?>
                                        <img src="images/left-img.jpg" class="alignleft img-responsive" alt="">
                                        <h2><?php echo $det_servicio['titulo2']; ?></h2>
                                        <?php echo $det_servicio['parrafo2']; ?>
                                        <img src="<?php echo $server; ?>images/right-img.jpg" class="alignright img-responsive" alt="">
                                        <h2><?php echo $det_servicio['titulo3']; ?></h2>
                                        <?php echo $det_servicio['parrafo3']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class=" widget widget-categories pinside60 outline mb40">
                                            <h2 class="widget-title">Otros Servicios</h2>
                                            <?php //inicio de grilla de servicios
                                            $resultado_servicios_grilla3 = $conexion->DBConsulta("
                                                SELECT
                                                *
                                                FROM
                                                servicios
                                                WHERE
                                                estado = 'ACTIVO' limit 4;
                                            ", 2);

                                            $presenta_servicios3 = array();
                                            $itemsServicios3 = '';
                                            foreach($resultado_servicios_grilla3 as $fila_serv3){
                                                $presenta_servicios3['id'] = $fila_serv3['id'];
                                                $presenta_servicios3['codigo'] = $fila_serv3['codigo'];
                                                $presenta_servicios3['nombre'] = $fila_serv3['nombre'];
                                                $presenta_servicios3['url_amigable'] = $fila_serv3['url_amigable'];
                                                $presenta_servicios3['descripcion_corta'] = $fila_serv3['descripcion_corta'];
                                                $presenta_servicios3['descripcion_larga'] = $fila_serv3['descripcion_larga'];
                                                $presenta_servicios3['title'] = $fila_serv3['title'];
                                                $presenta_servicios3['keywords'] = $fila_serv3['keywords'];
                                                
                                                $itemsServicios3 .= '<li><a href="'.$server.'servicios/'.$presenta_servicios3['url_amigable'].'">'.$presenta_servicios3['nombre'].'</a></li>';
                                                
                                            }
                                            ?>
                                            <ul class="listnone bullet bullet-double-right mb0">
                                                <?php echo $itemsServicios3; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="widget outline">
                                            <h2 class="widget-title">Cotizar ahora</h2>
                                            <div class="widget-img mb30">
                                                <img src="images/widget-pic.jpg" class="img-responsive" alt="">
                                            </div>
                                            <p>Puedes cotizar cada uno de nuestros servicios, seguramente nos ajustamos a los requerimientos de cualquier empresa.</p>
                                            <a href="<?php echo $server; ?>proforma" class="btn btn-outline">Cotizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>