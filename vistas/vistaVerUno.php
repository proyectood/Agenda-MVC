<?php
// Template que al ser solicitado genera la vista
$templateVerUno = '
<form class="row g-3">
    <div class="col-md-12 d-flex marcoBusquedas">
        <label class="form-label col-2" style="font-weight: bold;padding-top: 4px;">Correo del contacto: </label>
        <input type="text" class="form-control" id="txtCorreoDetallesBuscar">
        <button class="btn btn-primary col-2" type="button" onclick="peticion(\'vistaVerUno\',\'verUno\',\'verUno\')">Buscar</button>
    </div>
    <div id="contenedorDetalles">
    </div>
</form>
';
?>