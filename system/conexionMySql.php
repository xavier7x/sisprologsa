<?php

class DBManager{
    
    private $BaseDatos;
	private $Servidor;
	private $Usuario;
	private $Clave;
    private $Conexion;
    
    public function __construct(){
        
		$this->Servidor = "localhost";
		$this->BaseDatos = "rjufewiz_sisprologsa";
        $this->Usuario = "rjufewiz_sisprologsa";
		$this->Clave = "G=#2X)M&ugfe";		
        
	}
    
    public function DBParametros( $servidor, $db, $usuario, $clave ) {
        $this->Servidor = $servidor;
		$this->Usuario = $usuario;
		$this->Clave = $clave;
		$this->BaseDatos = $db;
	}
    
    public function DBConectar( $ubilog = 1, $nomfile = "DBConectarAux" ){
        $mysqli = new mysqli($this->Servidor,$this->Usuario,$this->Clave,$this->BaseDatos);

        if ($mysqli->connect_error) {
            Funciones::EscribirLogs( $nomfile, "Error de conexión: (". $mysqli->connect_errno .") ". $mysqli->connect_error, $ubilog);
            die("Error de conexión: (". $mysqli->connect_errno .") ". $mysqli->connect_error);
            $this->Conexion = false;
            return false;
        }else{
            $this->Conexion = $mysqli;
            $this->Conexion->set_charset("utf8");
            return true;
        }      
	}
    
    public function DBConsulta($sql, $ubilog = 1, $nomfile = "DBConsultaAux"){
        if($resultado = $this->Conexion->query($sql)){
            $result = $resultado;
            return $result; 
            $resultado->close();                       
        }else{
            Funciones::EscribirLogs( $nomfile, "Error en el query: " . $sql, $ubilog);
            die("Error en el query: " . $sql);
            return false;
        }
	}
    
    
    public function __destruct(){
        if($this->Conexion){
            $this->Conexion->close();
        }	
	}
    
}

?>