<?php

require '../modelos/m_contacto.php';

$respuesta = array();
$datos='';
$consultar = new Contacto();
$contactos = $consultar->verTodos();
foreach($contactos as $contacto){
    $datos .= '<tr>';
    $datos .= '<td>' . $contacto['nombres'] . ' ' . $contacto['apellidos'] . '</td>';
    $datos .= '<td>' . $contacto['direccion'] . '</td>';
    $datos .= '<td>' . $contacto['telefono'] . '</td>';
    $datos .= '<td>' . $contacto['correo'] . '</td>';
    $datos .= '</tr>';
}
$respuesta[] = array('resultado' => 'ok','tipo' => 'verTodos','contenido' => $datos);
$respuestaJson = json_encode($respuesta);

echo $respuestaJson;

?>
