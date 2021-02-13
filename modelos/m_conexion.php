<?php

define('DB_HOST','localhost');
define('DB_TIPO','mysql');
define('DB_USUARIO','root');
define('DB_PASS','');
define('DB_NOMBRE','pruebas');
define('DB_CHARSET','');
define('DB_CADENACONEXION' , DB_TIPO . ':host=' . DB_HOST . '; dbname=' . DB_NOMBRE);


class Conexion{

    protected $conexion_db;

    public function Conexion(){
        try{
            $this->conexion_db = new PDO(DB_CADENACONEXION, DB_USUARIO, DB_PASS);
            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(DB_CHARSET != ''){
                $this->conexion_db->exec('SET CHARACTER SET utf8');
            }            
        }catch(Exeption $e){
            die('Falló al intentar conectar a la base de datos. Error: ' . $e.GetMessage());
        }
    }

}

?>