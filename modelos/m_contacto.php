<?php
// Se llama al modelo de conexión 
require 'm_conexion.php';

// Se crea la clase encargada de las peticiones a la base de datos, misma que extiende de la clase Conexion
class Contacto extends Conexion{
    // Método constructor
    public function Contacto(){

        parent::__construct();

    }

    // Método para agregar registros
    public function agregar($parametros = []){
        $query = "INSERT INTO ejemplo_mvc_personas(nombres,apellidos,direccion,telefono,correo,dedicacion,comentarios) VALUES(?,?,?,?,?,?,?)";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute($parametros);
        $resultado = $resultadoSql->rowCount();
        $resultadoSql->closeCursor();
        return $resultado;
    }

    // Método para editar registros
    public function editar($parametros = []){
        $query = "UPDATE ejemplo_mvc_personas SET nombres = ? , apellidos = ? , direccion = ? , telefono = ? , correo = ? , dedicacion = ? , comentarios = ?  WHERE correo = ?";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute($parametros);
        $resultado = $resultadoSql->rowCount();
        $resultadoSql->closeCursor();
        return $resultado;
    }

    // Método para eliminar registros
    public function eliminar($parametros = []){
        $query = "DELETE FROM ejemplo_mvc_personas WHERE correo = ?";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute($parametros);
        $resultado = $resultadoSql->rowCount();
        $resultadoSql->closeCursor();
        return $resultado;
    }
    
    // Método para obtener un solo registro
    public function verUno($parametros = []){
        $query = "SELECT * FROM ejemplo_mvc_personas WHERE correo = ?";
        $resultadoSql = $this->conexion_db->prepare($query);
        $resultadoSql->execute($parametros);
        $resultado = [];
        while($fila = $resultadoSql->fetch(PDO::FETCH_ASSOC)){
            array_push($resultado,$fila);
        }
        $resultadoSql->closeCursor();
        return $resultado;
    }

    // Método para obtener todos los registros
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