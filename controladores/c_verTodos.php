<?php
// Se llama al modelo 
require '../modelos/m_contacto.php';

// Se crean variables necesarias para la petición y respuesta
$respuesta = array();
$datos='';

// Se crea el objeto consultar y se hace la llamada al método verTodos
$consultar = new Contacto();
$contactos = $consultar->verTodos();

// Se evaluá el resultado devuelto por el método verTodos para generar una respuesta según sea el caso
if(sizeof($contactos) > 0 ){
    foreach($contactos as $contacto){
        $datos .= '<tr>';
        $datos .= '<td>' . $contacto['nombres'] . ' ' . $contacto['apellidos'] . '</td>';
        $datos .= '<td>' . $contacto['direccion'] . '</td>';
        $datos .= '<td>' . $contacto['telefono'] . '</td>';
        $datos .= '<td>' . $contacto['correo'] . '</td>';
        $datos .= '</tr>';
    }
}else{
    $datos .= '<tr><td colspan="4" style="font-weight: bold;color: #717171;text-align: center;">No existen contactos registrados aún.</td></tr>';
}

// Se construye la respuesta y se envía
$respuesta[] = array('resultado' => 'ok','tipo' => 'verTodos','contenido' => $datos);
$respuestaJson = json_encode($respuesta);
echo $respuestaJson;

?>
