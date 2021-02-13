<?php

require 'm_conexion.php';

class Contacto extends Conexion{

    public function Consultas(){

        parent::__construct();

    }

    public function obtener_datos($sqlQuery, $parametros = []){
        $resultadoSql = $this->conexion_db->prepare($sqlQuery);
        $resultadoSql->execute($parametros);
        $resultado = [];
        while($fila = $resultadoSql->fetch(PDO::FETCH_ASSOC)){
            array_push($resultado,$fila);
        }
        $resultadoSql->closeCursor();
        return $resultado;
    }

    public function agregar($parametros = []){
        $query = "INSERT INTO ejemplo_mvc_personas(nombres,apellidos,direccion,telefono,correo,dedicacion,comentarios) VALUES(?,?,?,?,?,?,?)";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute($parametros);
        $resultado = $resultadoSql->rowCount();
        $resultadoSql->closeCursor();
        return $resultado;
    }

    public function editar(){
        $query = "SELECT * FROM ejemplo_mvc_personas";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute();
        $resultado = [];
        while($fila = $resultadoSql->fetch(PDO::FETCH_ASSOC)){
            array_push($resultado,$fila);
        }
        $resultadoSql->closeCursor();
        return $resultado;
    }

    public function eliminar(){
        $query = "SELECT * FROM ejemplo_mvc_personas";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute();
        $resultado = [];
        while($fila = $resultadoSql->fetch(PDO::FETCH_ASSOC)){
            array_push($resultado,$fila);
        }
        $resultadoSql->closeCursor();
        return $resultado;
    }
    
    public function verUno(){
        $query = "SELECT * FROM ejemplo_mvc_personas";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute();
        $resultado = [];
        while($fila = $resultadoSql->fetch(PDO::FETCH_ASSOC)){
            array_push($resultado,$fila);
        }
        $resultadoSql->closeCursor();
        return $resultado;
    }

    public function verTodos(){
        $query = "SELECT * FROM ejemplo_mvc_personas";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute();
        $resultado = [];
        while($fila = $resultadoSql->fetch(PDO::FETCH_ASSOC)){
            array_push($resultado,$fila);
        }
        $resultadoSql->closeCursor();
        return $resultado;
    }

}


?>