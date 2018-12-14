<?php

include("../system/conexionMySql.php");
include("../system/funciones.php");

$conexion = new DBManager();
$conexion->DBConectar();

$respuesta = new stdClass();
$respuesta->rows = array();


    // Extraer los datos

    $resultado = $conexion->DBConsulta("
    SELECT `id` as idparametro FROM `servicios` order by id desc limit 1;
    ");

    foreach($resultado as $fila){
        $respuesta = $fila;
    }

//}
//****************************

print_r(json_encode($respuesta));

?>