<?php

include("../system/conexionMySql.php");
include("../system/funciones.php");

$conexion = new DBManager();
$conexion->DBConectar();

$respuesta = new stdClass();
$respuesta->rows = array();

$usuario = "";
$idparametro = "";
$nombre = "";
$descripcion = "";
$valor = "";
$actualizado_por = "";

if(
    (isset($_POST['idparametro']) && !empty($_POST['idparametro'])) 
){
    $idparametro = $_POST['idparametro'];
}
if(
    !empty($idparametro)
){

    // Extraer los datos

    $resultado = $conexion->DBConsulta("
    select * from det_servicios where id_servicio = $idparametro;
    ");
    
    /*$resultado = $conexion->DBConsulta("
    select a.id as idparametro, a.codigo,a.nombre,a.url_amigable,a.descripcion_corta,a.descripcion_larga,a.title,a.keywords,b.campo,b.valor from servicios a INNER JOIN det_servicios b where a.id = b.id_servicio;
    ");*/
    $cont = 0;
    foreach($resultado as $fila){
        $respuesta->rows[$cont] = $fila;
        $cont++;
    }
}else{
    $respuesta->estado = 2;
    $respuesta->mensaje = "No envio los siguientes parámetros [ idParametro ]";
}
//}
//****************************

print_r(json_encode($respuesta));

?>