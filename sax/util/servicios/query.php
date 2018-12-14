<?php

include("../system/conexionMySql.php");
include("../system/funciones.php");

$conexion = new DBManager();
$conexion->DBConectar();

$respuesta = new stdClass();
$respuesta->rows = array();


    // Extraer los datos

    $resultado = $conexion->DBConsulta("
    SELECT `id` as idparametro, `codigo`, `nombre`, `url_amigable`, `descripcion_corta`, `descripcion_larga`, `title`, `keywords`, `fecha_creado`, `fecha_actualizado`, `estado` FROM `servicios`;
    ");
    
    /*$resultado = $conexion->DBConsulta("
    select a.id as idparametro, a.codigo,a.nombre,a.url_amigable,a.descripcion_corta,a.descripcion_larga,a.title,a.keywords,b.campo,b.valor from servicios a INNER JOIN det_servicios b where a.id = b.id_servicio;
    ");*/
    $cont = 0;

    foreach($resultado as $fila){

  
        $respuesta->rows[$cont] = $fila;
        $button = '<button type="button" title="Editar" class="btn btn-warning gestion_update" data-idparametro="'.$fila['idparametro'].'">';
        $button .= '<span class="glyphicon glyphicon-pencil"></span>';
        $button .= '</button>';
        
        /*if(
            (int)$actualizar == 1 &&
            $fila['estado_interno'] == 'CREADO'
            //$fila['estado_interno'] != 'CERRADO' 
        ){    
            if(
                $fila['estado_interno'] == 'CREADO'
            ){ 
                $button .= '<button type="button" title="Facturar" class="btn btn-warning gestion_update" data-idpedido="'.$fila['idpedido'].'"';
                $button .= ' data-idbodega="'.$idbodega.'" ';
                $button .= ' data-estado_interno="'.$fila['estado_interno'].'" data-sig_estado_interno="FACTURADO">';
                $button .= '<span class="glyphicon glyphicon-file"></span>';
                $button .= '</button>';
            }            
            
        }*/
        
        
        $respuesta->rows[$cont]['btn_gestion'] = $button;

        $cont++;
    }

//}
//****************************

print_r(json_encode($respuesta));

?>