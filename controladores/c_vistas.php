<?php

require_once '../vistas/vistaInicio.php';
require_once '../vistas/vistaAgregar.php';
require_once '../vistas/vistaEditar.php';
require_once '../vistas/vistaEliminar.php';
require_once '../vistas/vistaVerTodos.php';
require_once '../vistas/vistaVerUno.php';

$peticion = $_POST['peticion'];
$respuesta = array();
switch ($peticion) {
    case "vistaInicio":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateInicio);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaAgregar":
        $respuesta[] = array('contenido' => $templateAgregar);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaEditar":
        $respuesta[] = array('contenido' => $templateJava);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaEliminar":
        $respuesta[] = array('contenido' => $templateVisualStudio);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaVerTodos":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateVerTodos);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaVerUno":
        $respuesta[] = array('contenido' => $templateOtros);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    default:
        $respuesta[] = array('resultado' => 'error','tipo' => 'vista','contenido' => $templateInicio);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
}

?>