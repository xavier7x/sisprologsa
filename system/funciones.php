<?php

//include("../lib/PHPMailer-master/src/PHPMailer.php");

class Funciones{

    

    public static function EscribirLogs($nomfile, $descripcion, $ubi = 1){

        $carpeta = "../logs/";

        if($ubi == 2){

            $carpeta = "util/logs/";

        }

        

        $myfile = fopen( $carpeta . $nomfile . ".txt", "a") or die("Archivo inaccessible!");

        fwrite($myfile, date('Y-m-d H:i:s') . " >>> " . $descripcion . "\r\n");

        fclose($myfile);

    }

    

    public static function clrAll($str) {

       $str=str_replace("&","&amp;",$str);

       $str=str_replace("\"","&quot;",$str);

       $str=str_replace("'","&apos;",$str);

       $str=str_replace(">","&gt;",$str);

       $str=str_replace("<","&lt;",$str);

       return $str;

    } 

    

    public static function ObtenerIp(){

        $ipaddress = '';

        if (getenv('HTTP_CLIENT_IP'))

            $ipaddress = getenv('HTTP_CLIENT_IP');

        else if(getenv('HTTP_X_FORWARDED_FOR'))

            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');

        else if(getenv('HTTP_X_FORWARDED'))

            $ipaddress = getenv('HTTP_X_FORWARDED');

        else if(getenv('HTTP_FORWARDED_FOR'))

            $ipaddress = getenv('HTTP_FORWARDED_FOR');

        else if(getenv('HTTP_FORWARDED'))

           $ipaddress = getenv('HTTP_FORWARDED');

        else if(getenv('REMOTE_ADDR'))

            $ipaddress = getenv('REMOTE_ADDR');

        else

            $ipaddress = 'UNKNOWN';

        return $ipaddress;

    }

    

    public static function ObtenerNavegador($useragent){

        /*

        $navegadores = array(

                  'Opera' => 'Opera',

                  'Mozilla Firefox'=> '(Firebird)|(Firefox)',

                  'Galeon' => 'Galeon',

                  'Mozilla'=>'Gecko',

                  'MyIE'=>'MyIE',

                  'Lynx' => 'Lynx',

                  'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',

                  'Konqueror'=>'Konqueror',

                  'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',

                  'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',

                  'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',

                  'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',

        );

        foreach($navegadores as $navegador=>$pattern){

           if (eregi($pattern, $user_agent))

           return $navegador;

        }

        return 'Desconocido';

        //*****************************************************************

        $useragent = $_SERVER['HTTP_USER_AGENT'];

        */

        if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {

            $browser_version=$matched[1];

            $browser = 'IE';

        } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {

            $browser_version=$matched[1];

            $browser = 'Opera';

        } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {

            $browser_version=$matched[1];

            $browser = 'Firefox';

        } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {

            $browser_version=$matched[1];

            $browser = 'Chrome';

        } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {

            $browser_version=$matched[1];

            $browser = 'Safari';

        } else {

            // browser not recognized!

            $browser_version = 0;

            $browser= 'Desconocido';

        }

        return $browser." - ".$browser_version;

    }

    

    public static function urls_amigables($url) {

        // Tranformamos todo a minusculas

        $url = strtolower($url);

        //Rememplazamos caracteres especiales latinos

        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

        $repl = array('a', 'e', 'i', 'o', 'u', 'n');

        $url = str_replace ($find, $repl, $url);

        // Añadimos los guiones

        $find = array(' ', '&', '\r\n', '\n', '+'); 

        $url = str_replace ($find, '-', $url);

        // Eliminamos y Reemplazamos demás caracteres especiales

        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

        $repl = array('', '-', '');

        $url = preg_replace ($find, $repl, $url);

        return $url;

    }



public static function envioEmail($host,$username,$password,$port = 465,$correo,$nombreCorreo,$destinatario,$asunto,$cuerpo){

        $mail = new PHPMailer();

        //Luego tenemos que iniciar la validación por SMTP:

        $mail->IsSMTP();

        $mail->SMTPAuth = true;

        $mail->Host = $host; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com

        $mail->Username = $username; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 

        $mail->Password = $password; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo

        $mail->Port = $port; // Puerto de conexión al servidor de envio. 

        $mail->From = $correo; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.

        $mail->FromName = $nombreCorreo; //A RELLENAR Nombre a mostrar del remitente. 

        $mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos 

        $mail->IsHTML(true); // El correo se envía como HTML 

        $mail->Subject = $asunto; // Este es el titulo del email. 

        $body = $cuerpo; 

        //$body .= 'Aquí continuamos el mensaje'; 

        $mail->Body = $body; // Mensaje a enviar. 

        $exito = $mail->Send(); // Envía el correo.

        if($exito){

            echo 'El correo fue enviado correctamente.';

        }else{

            echo 'Hubo un problema. Contacta a un administrador.'; 

        }

    }

}



?>