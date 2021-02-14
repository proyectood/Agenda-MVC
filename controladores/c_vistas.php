<?php
// Se llaman los archivos contenedores de las vistas
require_once '../vistas/vistaInicio.php';
require_once '../vistas/vistaAgregar.php';
require_once '../vistas/vistaEditar.php';
require_once '../vistas/vistaEliminar.php';
require_once '../vistas/vistaVerTodos.php';
require_once '../vistas/vistaVerUno.php';

// Se crean variables necesarias para evaluar la respuesta
$peticion = $_POST['peticion'];
$respuesta = array();

// Se evalúa en base a la petición, que respuesta se enviara según el caso
switch ($peticion) {
    case "vistaInicio":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateInicio);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaAgregar":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateAgregar);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaEditar":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateEditar);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaEliminar":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateEliminar);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaVerTodos":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateVerTodos);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    case "vistaVerUno":
        $respuesta[] = array('resultado' => 'ok','tipo' => 'vista','contenido' => $templateVerUno);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
        break;
    default:
        $respuesta[] = array('resultado' => 'error','tipo' => 'vista','contenido' => $templateInicio);
        $respuestaJson = json_encode($respuesta);
        echo $respuestaJson;
}

?>