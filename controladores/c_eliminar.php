<?php
// Se llama al modelo 
require '../modelos/m_contacto.php';

// Se crean variables necesarias para la petición y respuesta
$respuesta = array();
$correo = $_POST["arregloParametros"][0];

// Se crea el objeto enviar, se llena el arreglo de parámetros y se hace la llamada al método eliminar
$enviar = new Contacto();
$parametros = [$correo];
$resultado = $enviar->eliminar($parametros);
// Se evaluá el resultado devuelto por el método eliminar para generar una respuesta según sea el caso
if($resultado > 0){
    $respuesta[] = array('resultado' => 'ok','tipo' => 'editar','contenido' => 'Se elimino el contacto con éxito');
    $respuestaJson = json_encode($respuesta);
}else{
    $respuesta[] = array('resultado' => 'error','tipo' => 'editar','contenido' => 'Error al intentar insertar en la base da datos!');
    $respuestaJson = json_encode($respuesta);
}   

// Se envía la respuesta
echo $respuestaJson;

?>
