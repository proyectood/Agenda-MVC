<?php
// Template que al ser solicitado genera la vista
$templateEliminar = '
<form class="row g-3">
    <div class="col-md-12 d-flex marcoBusquedas">
        <label class="form-label col-2" style="font-weight: bold;padding-top: 4px;">Correo del contacto: </label>
        <input type="text" class="form-control" id="txtEliminarCorreoDetallesBuscar">
        <button class="btn btn-primary col-2" type="button" onclick="peticion(\'vistaEliminar\',\'verUnoEliminar\',\'verUnoEliminar\')">Buscar</button>
    </div>
    <div id="contenedorDetallesEliminar">
    </div>
</form>
';
?>