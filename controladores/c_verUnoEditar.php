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
    $datos .= '
                <div class="col-md-6">
                    <label for="txtEditarNombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="txtEditarNombres" value="'. $contacto['nombres'] . '">
                </div>
                <div class="col-md-6">
                    <label for="txtEditarApellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="txtEditarApellidos" value="' . $contacto['apellidos'] .'">
                </div>
                <div class="col-md-6">
                    <label for="txtEditarCorreo" class="form-label">Correo</label>
                    <input type="text" class="form-control" id="txtEditarCorreo" value="' . $contacto['correo'] . '">
                </div>
                <div class="col-md-3">
                    <label for="txtEditarTelefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="txtEditarTelefono" value="' . $contacto['telefono'] . '">
                </div>
                <div class="col-md-3">
                    <label for="txtEditarDedicacion" class="form-label">Dedicación</label>
                    <input type="text" class="form-control" id="txtEditarDedicacion" value="' . $contacto['dedicacion'] . '">
                </div>
                <div class="col-md-12">
                    <label for="txtEditarDireccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="txtEditarDireccion" value="' . $contacto['direccion'] . '">
                </div>
                
                    <div class="input-group">
                        <span class="input-group-text" for="txtEditarComentarios">Comentarios</span>
                        <textarea class="form-control" aria-label="With textarea" id="txtEditarComentarios">' . $contacto['comentarios'] . '</textarea>
                    </div>
                <div class="col-12 d-grid gap-2">
                    <button class="btn btn-primary" type="button" onclick="peticion(\'vistaEditar\',\'editar\',\'editar\')">Guardar cambios</button>
                </div>
                
                
                ';

}

// Se evalua si la variable esta vacía y en casi afirmativo le da el valor de no
if($datos == ''){
    $datos = 'no';
}

// Se construye la respuesta y se envía
$respuesta[] = array('resultado' => 'ok','tipo' => 'verUnoEditar','contenido' => $datos);
$respuestaJson = json_encode($respuesta);
echo $respuestaJson;

?>