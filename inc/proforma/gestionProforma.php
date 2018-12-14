<?php
include('../../system/config.php');
include('../../system/conexionMySql.php');
include('../../system/funciones.php');

$conexion = new DBManager();
$conexion->DBConectar(2);

$nombre = $_REQUEST['nombre'];
$email = $_REQUEST['email'];
$celular = $_REQUEST['celular'];
$comentario = $_REQUEST['comentario'];

$resultado_servicios = $conexion->DBConsulta("
    select url_amigable from servicios where estado = 'ACTIVO';
", 2);

foreach($resultado_servicios as $filaServicio){
    ${$filaServicio['url_amigable']} = $_REQUEST[$filaServicio['url_amigable']];
}

$detalle = '<html><head>';
$detalle .= '<meta name="viewport" content="width=device-width">';
$detalle .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$detalle .= '<title>ZURBemails</title>';
$detalle .= '<link rel="stylesheet" type="text/css" href="stylesheets/email.css">';
$detalle .= '</head>';
$detalle .= '<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">';
$detalle .= '<table class="head-wrap" bgcolor="#999999">';
$detalle .= '<tbody><tr>';
$detalle .= '<td></td>';
$detalle .= '<td class="header container">';
$detalle .= '<div class="content">';
$detalle .= '<table bgcolor="#999999" class="">';
$detalle .= '<tbody><tr>';
$detalle .= '<td><img src="https://www.sisprologsa.com.ec/images/logo.png"></td>';
$detalle .= '<td align="right"><h6 class="collapse">Proforma Online</h6></td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</div>';
$detalle .= '</td>';
$detalle .= '<td></td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '<table class="body-wrap">';
$detalle .= '<tbody><tr>';
$detalle .= '<td></td>';
$detalle .= '<td class="container" bgcolor="#FFFFFF">';
$detalle .= '<div class="content">';
$detalle .= '<table>';
$detalle .= '<tbody><tr>';
$detalle .= '<td>';
$detalle .= '<h1>Bienvenido, '.$nombre.'</h1>';
$detalle .= '<p class="lead">Reciba un cordial saludo de todos los que conformamos SISTEMAS Y PRODUCTOS LOGISTICOS S.A.</p>';
$detalle .= '<p><img src="https://www.sisprologsa.com.ec/images/b1.jpg"></p>';
$detalle .= '<p class="callout">';
$detalle .= 'Con SISPROLOGSA, usted puede reducir y controlar sus costos operativos, utilizar recursos especializados no disponibles en su nómina, obtiene solución de sus problemas logísticos personalizados en el momento, además de contar con tarifas competitivas dentro del mercado.';
$detalle .= '</p>';
$detalle .= '</td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</div>';
$detalle .= '<div class="column-wrap">';
$detalle .= '<div class="column">';
$detalle .= '<table align="left">';
$detalle .= '<tbody><tr>';
$detalle .= '<td>';
$detalle .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet.</p>';
$detalle .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>';
$detalle .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet.</p>';
$detalle .= '<a class="btn">Click Here »</a>';
$detalle .= '</td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</div>';
$detalle .= '<div class="column">';
$detalle .= '<table align="left">';
$detalle .= '<tbody><tr>';
$detalle .= '<td>';
$detalle .= '<ul class="sidebar">';
$detalle .= '<li>';
$detalle .= '<a>';
$detalle .= '<h5>Header Thing »</h5>';
$detalle .= '<p>Sub-head or something</p>';
$detalle .= '</a>';
$detalle .= '</li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="">Just a Plain Link »</a></li>';
$detalle .= '<li><a class="last">Just a Plain Link »</a></li>';
$detalle .= '</ul>';
$detalle .= '<table bgcolor="" class="social" width="100%">';
$detalle .= '<tbody><tr>';
$detalle .= '<td>';
$detalle .= '<table align="left" width="100%">';
$detalle .= '<tbody><tr>';
$detalle .= '<td>';
$detalle .= '<h6 class="">Connect with Us:</h6>';
$detalle .= '<p class=""><a href="#" class="soc-btn fb">Facebook</a> <a href="#" class="soc-btn tw">Twitter</a> <a href="#" class="soc-btn gp">Google+</a></p>';
$detalle .= '<h6 class="">Contact Info:</h6>';
$detalle .= '<p>Phone: <strong>408.341.0600</strong><br>';
$detalle .= 'Email: <strong><a href="emailto:hseldon@trantor.com">hseldon@trantor.com</a></strong></p>';
$detalle .= '</td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</div>';
$detalle .= '<div class="clear"></div>';
$detalle .= '</div>';
$detalle .= '</td>';
$detalle .= '<td></td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '<table class="footer-wrap">';
$detalle .= '<tbody><tr>';
$detalle .= '<td></td>';
$detalle .= '<td class="container">';
$detalle .= '<div class="content">';
$detalle .= '<table>';
$detalle .= '<tbody><tr>';
$detalle .= '<td align="center">';
$detalle .= '<p>';
$detalle .= '<a href="#">Terms</a> |';
$detalle .= '<a href="#">Privacy</a> |';
$detalle .= '<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>';
$detalle .= '</p>';
$detalle .= '</td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</div>';
$detalle .= '</td>';
$detalle .= '<td></td>';
$detalle .= '</tr>';
$detalle .= '</tbody></table>';
$detalle .= '</body></html>';


/*aqui agregar el insert a la base de datos de la proforma*/
$resultado = $conexion->DBConsulta("
    INSERT INTO proformas(nombre, email, celular, comentario, detalle, estado, fecha_insert) 
    VALUES ('".$nombre."','".$email."','".$celular."','".$comentario."','".$detalle."','P',NOW());
");

if($resultado == true){
    
}else{

}
/*luego de eso enviar el correo a sisprologsa*/ /*recordar que este envio de correo ya esta programado*/
/*luego redirigir a una pagina gracias para guardar los goals conseguidos*/ 
echo $nombre.' '.$email.' '.$celular.' '.$comentario;
 

?>