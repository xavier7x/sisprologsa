<?php
include('system/config.php');
include('system/conexionMySql.php');
include('system/funciones.php');

$conexion = new DBManager();
$conexion->DBConectar(2);

// Extraer los parametros

$resultado_param = $conexion->DBConsulta("
    SELECT *
    FROM cli_parametros
", 2);

$param_valor = array();

foreach($resultado_param as $fila){
    $param_valor[trim($fila['idparametro'])] = trim($fila['valor']);
}

//print_r($param_valor); exit(0);
$server = $param_valor['hostapp'];
$direccion = $param_valor['direccionempresa'];
$correo = $param_valor['correo'];
$celular = $param_valor['celular'];
$facebook = $param_valor['facebook'];
$googlePlus = $param_valor['googleplus'];
$logo = $param_valor['logo'];
$nomempresa = $param_valor['nomempresa'];

$page = "";
$p1 = "";
$p2 = "";
$p3 = "";

if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = $_GET['page'];  
}else{
    $page = 'inicio';
}
if(isset($_GET['p1']) && !empty($_GET['p1'])){
    $p1 = $_GET['p1'];
}
if(isset($_GET['p2']) && !empty($_GET['p2'])){
    $p2 = $_GET['p2'];
}

$resultado_menu = $conexion->DBConsulta("
    SELECT *
    FROM front_menu where title = '".$page."';
", 2);

$menu_acceso = array();

foreach($resultado_menu as $fila_menu){
    $menu_acceso['id'] = $fila_menu['id'];
    $menu_acceso['padreId'] = $fila_menu['padreId'];
    $menu_acceso['nombre'] = $fila_menu['nombre'];
    $menu_acceso['url_amigable'] = $fila_menu['url_amigable'];
    $menu_acceso['title'] = $fila_menu['title'];
    $menu_acceso['descripcion'] = $fila_menu['descripcion'];
    $menu_acceso['keywords'] = $fila_menu['keywords'];
}
/*componentes de cada pagina*/
$resultado_menu_componentes = $conexion->DBConsulta("

    SELECT
    a.nombre AS nombrepagina,
    b.*
    FROM
    front_menu a
    INNER JOIN componentes_menu b WHERE
    a.id = b.id_menu AND a.nombre = '".$page."'

", 2);

$menu_componentes = array();

foreach($resultado_menu_componentes as $fila_menu_comp){
    $menu_componentes[trim($fila_menu_comp['id_class_html'])] = trim($fila_menu_comp['valor']);
}

include('inc/cabpie/cabecera1.php');
include('inc/cabpie/cabeceramenu.php');
/*servicios --detalles -- desembarque*/

if(isset($page)){
        /*$paramUrl = explode('/', $page);
        
        $priParam = $paramUrl[0];
        $segParam = $paramUrl[1];
        $terParam = $paramUrl[2];
        echo "param url 0: ".$paramUrl[0];
        echo "param url 1: ".$paramUrl[1];
        echo "param url 2: ".$paramUrl[2];*/
    if($p2 != ''){
        include('inc/'.$page.'/'.$p1.'/'.$p2.'/');
    }elseif($p1 != '' && $p2 == '' ){
        include('inc/'.$page.'/detalle.php');
    }else{
        include('inc/'.$page.'/cuerpo.php');
    }
    
}else{
    include('inc/inicio/cuerpo.php');
}
include('inc/cabpie/pie.php');

?>