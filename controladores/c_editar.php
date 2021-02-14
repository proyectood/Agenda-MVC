<?php
// Se llama al modelo 
require '../modelos/m_contacto.php';

// Se crean variables necesarias para la petición y respuesta
$respuesta = array();
$nombres = $_POST["arregloParametros"][0];
$apellidos = $_POST["arregloParametros"][1];
$correo = $_POST["arregloParametros"][2];
$telefono = $_POST["arregloParametros"][3];
$dedicacion = $_POST["arregloParametros"][4];
$direccion = $_POST["arregloParametros"][5];
$comentarios = $_POST["arregloParametros"][6];

// Se evalúa que no vallan campos vacíos que son requeridos 
if($nombres == '' || $apellidos == '' || $correo == ''){
    $respuesta[] = array('resultado' => 'error','tipo' => 'editar','contenido' => 'Nombres, Apellidos y Correo, son campos requeridos y no pueden dejarse vacíos!');
    $respuestaJson = json_encode($respuesta);
}else{
    // Se crea el objeto enviar, se llena el arreglo de parámetros y se hace la llamada al método editar
    $enviar = new Contacto();
    $parametros2 = [$nombres,$apellidos,$direccion,$telefono,$correo,$dedicacion,$comentarios,$correo];
    $resultado2 = $enviar->editar($parametros2);
    // Se evaluá el resultado devuelto por el método editar para generar una respuesta según sea el caso
    if($resultado2 > 0){
        $respuesta[] = array('resultado' => 'ok','tipo' => 'editar','contenido' => 'Se edito el contacto con éxito');
        $respuestaJson = json_encode($respuesta);
    }else{
        $respuesta[] = array('resultado' => 'error','tipo' => 'editar','contenido' => 'Error al intentar insertar en la base da datos!');
        $respuestaJson = json_encode($respuesta);
    }   
}

// Se envía la respuesta
echo $respuestaJson;

?>
