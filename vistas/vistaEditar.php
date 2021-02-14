<?php
// Template que al ser solicitado genera la vista
$templateEditar = '
<form class="row g-3">
    <div class="col-md-12 d-flex marcoBusquedas">
        <label class="form-label col-2" style="font-weight: bold;padding-top: 4px;">Correo del contacto: </label>
        <input type="text" class="form-control" id="txtEditarCorreoDetallesBuscar">
        <button class="btn btn-primary col-2" type="button" onclick="peticion(\'vistaEditar\',\'verUnoEditar\',\'verUnoEditar\')">Buscar</button>
    </div>
    <div id="contenedorDetalles">
    </div>
</form>
<form id="formEditar" class="row g-3">
</form>
';
?>