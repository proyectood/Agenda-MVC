<?php
// Template que al ser solicitado genera la vista
$templateAgregar = '
<form class="row g-3">
  <div class="col-md-6">
    <label for="txtNombres" class="form-label">Nombres</label>
    <input type="text" class="form-control" id="txtNombres">
  </div>
  <div class="col-md-6">
    <label for="txtApellidos" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="txtApellidos">
  </div>
  <div class="col-md-6">
    <label for="txtCorreo" class="form-label">Correo</label>
    <input type="text" class="form-control" id="txtCorreo">
  </div>
  <div class="col-md-3">
    <label for="txtTelefono" class="form-label">Teléfono</label>
    <input type="text" class="form-control" id="txtTelefono">
  </div>
  <div class="col-md-3">
    <label for="txtDedicacion" class="form-label">Dedicación</label>
    <input type="text" class="form-control" id="txtDedicacion">
  </div>
  <div class="col-md-12">
    <label for="txtDireccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="txtDireccion">
  </div>
  
    <div class="input-group">
        <span class="input-group-text" for="txtComentarios">Comentarios</span>
        <textarea class="form-control" aria-label="With textarea" id="txtComentarios"></textarea>
    </div>
  <div class="col-12 d-grid gap-2">
    <button class="btn btn-primary" type="button" onclick="peticion(\'vistaAgregar\',\'agregar\',\'agregar\')">Agregar</button>
  </div>
</form>
';
?>