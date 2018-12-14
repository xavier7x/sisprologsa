<?php

require_once('../lib/nusoap-0.9.5/lib/nusoap.php');
$claveAccesoComprobante = "1306201801179124001400120010030052932527777777713";
$xml = '<?xml version="1.0" encoding="UTF-8"?><SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://ec.gob.sri.ws.autorizacion"><SOAP-ENV:Body><ns1:autorizacionComprobante><claveAccesoComprobante>'.$claveAccesoComprobante.'</claveAccesoComprobante></ns1:autorizacionComprobante></SOAP-ENV:Body></SOAP-ENV:Envelope>';
/*$servicio="https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['claveAccesoComprobante']="1306201801179124001400120010030052932527777777713";
//$parametros['usuario']="manolo";
//$parametros['clave']="tuclave";
$client = new SoapClient($servicio, $parametros);
print_r($client);
$result = $client->autorizacionComprobante($parametros);//llamamos al métdo que nos interesa con los parámetros
*/

//Parámetros


//url del webservice
$wsdl="https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl";

//instanciando un nuevo objeto cliente para consumir el webservice
$client = new nusoap_client($wsdl,'wsdl');

//pasando los parámetros a un array
$param=array('claveAccesoComprobante'=>$xml);

//llamando al método y pasándole el array con los parámetros
$resultado = $client->call('autorizacionComprobante', $param);

print_r($resultado);



?>