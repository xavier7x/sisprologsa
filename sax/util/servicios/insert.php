<?php
include("../system/conexionMySql.php");
include("../system/funciones.php");

$conexion = new DBManager();
$conexion->DBConectar();

$respuesta = new stdClass();
$respuesta->estado = 2;
$respuesta->mensaje = "Sin acciones";

$usuario ="";
$idparametro ="";
$codigo ="";
$nombre ="";
$url_amigable ="";
$descripcion_corta ="";
$descripcion_larga ="";
$tituloPagina ="";
$keywords ="";
$titulo ="";
$parrafo1="";
$titulo2 ="";
$parrafo2 ="";
$titulo3 ="";
$parrafo3 ="";
$estado ="";


if(
    (isset($_POST['usuario']) && !empty($_POST['usuario'])) && 
    (isset($_POST['idparametro']) && !empty($_POST['idparametro'])) && 
    (isset($_POST['codigo']) && !empty($_POST['codigo'])) && 
    (isset($_POST['nombre']) && !empty($_POST['nombre'])) && 
    (isset($_POST['url_amigable']) && !empty($_POST['url_amigable'])) && 
    (isset($_POST['descripcion_corta']) && !empty($_POST['descripcion_corta'])) && 
    (isset($_POST['descripcion_larga']) && !empty($_POST['descripcion_larga'])) && 
    (isset($_POST['tituloPagina']) && !empty($_POST['tituloPagina'])) && 
    (isset($_POST['titulo']) && !empty($_POST['titulo'])) && 
    (isset($_POST['parrafo1']) && !empty($_POST['parrafo1'])) && 
    (isset($_POST['titulo2']) && !empty($_POST['titulo2'])) && 
    (isset($_POST['parrafo2']) && !empty($_POST['parrafo2'])) && 
    (isset($_POST['titulo3']) && !empty($_POST['titulo3'])) && 
    (isset($_POST['parrafo3']) && !empty($_POST['parrafo3'])) && 
    (isset($_POST['usuario']) && !empty($_POST['usuario'])) &&
    (isset($_POST['estado']) && !empty($_POST['estado']))
    
){
    $usuario = $_POST['usuario'];
    $idparametro = $_POST['idparametro'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $url_amigable = $_POST['url_amigable'];
    $descripcion_corta = $_POST['descripcion_corta'];
    $descripcion_larga = $_POST['descripcion_larga'];
    $tituloPagina = $_POST['tituloPagina'];
    $keywords = $_POST['keywords'];
    $titulo = $_POST['titulo'];
    $parrafo1= $_POST['parrafo1'];
    $titulo2 = $_POST['titulo2'];
    $parrafo2 = $_POST['parrafo2'];
    $titulo3 = $_POST['titulo3'];
    $parrafo3 = $_POST['parrafo3'];
    $estado = $_POST['estado'];
}
    $idparametro = strtolower($idparametro);
    $codigo = str_replace(" ","",$codigo);
    $url_amigable = str_replace(" ","_",$url_amigable);
if(
    !empty($usuario) &&
    !empty($idparametro) &&
    !empty($codigo) &&
    !empty($nombre) &&
    !empty($url_amigable) &&
    !empty($descripcion_corta) &&
    !empty($descripcion_larga) &&
    !empty($tituloPagina) &&
    !empty($keywords) &&
    !empty($titulo) &&
    !empty($parrafo1) &&
    !empty($titulo2) &&
    !empty($parrafo2) &&
    !empty($titulo3) &&
    !empty($parrafo3) &&
    !empty($estado)
){
                $resultado= $conexion->DBConsulta("
                
                INSERT INTO servicios(codigo, nombre, 
                url_amigable, descripcion_corta, 
                descripcion_larga, title,
                keywords, fecha_creado,
                estado)
                VALUES ('".$codigo."','".$nombre."',
                '".$url_amigable."','".$descripcion_corta."',
                '".$descripcion_larga."','".$tituloPagina."',
                '".$keywords."',NOW(),'ACTIVO');
                ");

                if($resultado == true){
                $resultadoTitulo= $conexion->DBConsulta("
                
                INSERT INTO det_servicios(`id_servicio`, `campo`, `valor`, `sys_create`, `fecha_create`)
                VALUES ('".$idparametro."','titulo',
                '".$titulo."','".$usuario."',NOW());
                ");
                $resultadoParrafo1= $conexion->DBConsulta("
                
                INSERT INTO det_servicios(`id_servicio`, `campo`, `valor`, `sys_create`, `fecha_create`)
                VALUES ('".$idparametro."','parrafo1',
                '".$parrafo1."','".$usuario."',NOW());
                ");

                $resultadoTitulo2= $conexion->DBConsulta("
                
                INSERT INTO det_servicios(`id_servicio`, `campo`, `valor`, `sys_create`, `fecha_create`)
                VALUES ('".$idparametro."','titulo2',
                '".$titulo2."','".$usuario."',NOW());
                ");
                $resultadoParrafo2= $conexion->DBConsulta("
                
                INSERT INTO det_servicios(`id_servicio`, `campo`, `valor`, `sys_create`, `fecha_create`)
                VALUES ('".$idparametro."','parrafo2',
                '".$parrafo2."','".$usuario."',NOW());
                ");

                $resultadoTitulo3= $conexion->DBConsulta("
                
                INSERT INTO det_servicios(`id_servicio`, `campo`, `valor`, `sys_create`, `fecha_create`)
                VALUES ('".$idparametro."','titulo3',
                '".$titulo3."','".$usuario."',NOW());
                ");
                $resultadoParrafo3= $conexion->DBConsulta("
                
                INSERT INTO det_servicios(`id_servicio`, `campo`, `valor`, `sys_create`, `fecha_create`)
                VALUES ('".$idparametro."','parrafo3',
                '".$parrafo3."','".$usuario."',NOW());
                ");

                
                }

                if($resultado == true && $resultadoTitulo == true &&
                 $resultadoParrafo1 == true && $resultadoTitulo2 == true &&
                 $resultadoParrafo2 == true && $resultadoTitulo3 == true &&
                 $resultadoParrafo3 == true){
                    
                    $msnChange = "";
                    $msnChange = $idparametro;
                    $respuesta->estado = 1;
                    $respuesta->mensaje = "Registro insertado con éxito ".$msnChange;
                }else{
                    $respuesta->estado = 2;
                    $respuesta->mensaje = "Error al realizar la insercion";
                }
}else{
    $respuesta->estado = 2;
    $respuesta->mensaje = "No envio los siguientes parámetros [ usuario - idparametro - nombre - descripcion - valor ]";
}

print_r(json_encode($respuesta));

?>