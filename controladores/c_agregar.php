<?php

require '../modelos/m_contacto.php';

$respuesta = array();
$datos='holaa';
$nombres = $_POST["arregloParametros"][0];
$apellidos = $_POST["arregloParametros"][1];
$correo = $_POST["arregloParametros"][2];
$telefono = $_POST["arregloParametros"][3];
$dedicacion = $_POST["arregloParametros"][4];
$direccion = $_POST["arregloParametros"][5];
$comentarios = $_POST["arregloParametros"][6];

if($nombres == '' || $apellidos == '' || $correo == ''){
    $respuesta[] = array('resultado' => 'error','tipo' => 'agregar','contenido' => 'Nombres, Apellidos y Correo, son campos requeridos y no pueden dejarse vacíos!');
    $respuestaJson = json_encode($respuesta);
}else{
    $consultar = new Contacto();
    $parametros = [$nombres,$apellidos,$direccion,$telefono,$correo,$dedicacion,$comentarios];
    $resultado = $consultar->agregar($parametros);
    if($resultado > 0){
        $respuesta[] = array('resultado' => 'ok','tipo' => 'agregar','contenido' => $resultado);
        $respuestaJson = json_encode($respuesta);
    }else{
        $respuesta[] = array('resultado' => 'error','tipo' => 'agregar','contenido' => 'Error al intentar insertar en la base da datos!');
        $respuestaJson = json_encode($respuesta);
    }    
}
echo $respuestaJson;

?>
