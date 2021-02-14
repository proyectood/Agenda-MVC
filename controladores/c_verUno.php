<?php
// Se llama al modelo 
require '../modelos/m_contacto.php';

// Se crean variables necesarias para la petición y respuesta
$respuesta = array();
$datos='';
$correo = $_POST["arregloParametros"][0];

// Se crea el objeto consultar, se llena el arreglo de parámetros y se hace la llamada al método verUno
$consultar = new Contacto();
$parametros = [$correo];
$contactos = $consultar->verUno($parametros);

// Se construye un template utilizando en el los resultados devueltos por el método verUno
foreach($contactos as $contacto){
    $datos .= '<div class="col-md-12">
                <label class="form-label col-2" style="font-weight: bold;">Nombre Completo: </label>
                <label class="form-label detalles">'. $contacto['nombres'] . ' ' . $contacto['apellidos'] .'</label>
                </div>
                <div class="col-md-12">
                <label class="form-label col-2" style="font-weight: bold;">Dirección: </label>
                <label class="form-label detalles">' . $contacto['direccion'] . '</label>
                </div>
                <div class="col-md-12">
                <label class="form-label col-2" style="font-weight: bold;">Teléfono: </label>
                <label class="form-label detalles">' . $contacto['telefono'] . '</label>
                </div>
                <div class="col-md-12">
                <label class="form-label col-2" style="font-weight: bold;">Correo: </label>
                <label class="form-label detalles">' . $contacto['correo'] . '</label>
                </div>
                <div class="col-md-12">
                <label class="form-label col-2" style="font-weight: bold;">Dedicación: </label>
                <label class="form-label detalles">' . $contacto['dedicacion'] . '</label>
                </div>
                <div class="col-md-12">
                <label class="form-label col-2" style="font-weight: bold;">Comentarios: </label>
                <label class="form-label detalles">' . $contacto['comentarios'] . '</label>
                </div>';

}

// Se evalua si la variable esta vacía y en casi afirmativo le da el valor de no
if($datos == ''){
    $datos = 'no';
}

// Se construye la respuesta y se envía
$respuesta[] = array('resultado' => 'ok','tipo' => 'verUno','contenido' => $datos);
$respuestaJson = json_encode($respuesta);
echo $respuestaJson;

?>