$( document ).ready(function() {
    peticion();
});

function efectosFade() {
    $("#contenido").fadeIn(1000);
}

// Función para enviar las peticiones a los controladores 
function peticion(vPeticion='vistaInicio',vControlador='vacio',vParametros='') {
    let peticion = vPeticion;
    let controlador = vControlador;
    let parametros = vParametros;
    let arregloParametros = [];
    // Evaluá que parámetros son requeridos
    if(parametros != ''){
        switch (parametros) {
            case 'agregar':
                let txtNombres = $("#txtNombres").val();
                let txtApellidos = $("#txtApellidos").val();
                let txtCorreo = $("#txtCorreo").val();
                let txtTelefono = $("#txtTelefono").val();
                let txtDedicacion = $("#txtDedicacion").val();
                let txtDireccion = $("#txtDireccion").val();
                let txtComentarios = $("#txtComentarios").val();
                arregloParametros.push(txtNombres);
                arregloParametros.push(txtApellidos);
                arregloParametros.push(txtCorreo);
                arregloParametros.push(txtTelefono);
                arregloParametros.push(txtDedicacion);
                arregloParametros.push(txtDireccion);
                arregloParametros.push(txtComentarios);
                break;
            case 'editar':
                let txtEditarNombres = $("#txtEditarNombres").val();
                let txtEditarApellidos = $("#txtEditarApellidos").val();
                let txtEditarCorreo = $("#txtEditarCorreo").val();
                let txtEditarTelefono = $("#txtEditarTelefono").val();
                let txtEditarDedicacion = $("#txtEditarDedicacion").val();
                let txtEditarDireccion = $("#txtEditarDireccion").val();
                let txtEditarComentarios = $("#txtEditarComentarios").val();
                arregloParametros.push(txtEditarNombres);
                arregloParametros.push(txtEditarApellidos);
                arregloParametros.push(txtEditarCorreo);
                arregloParametros.push(txtEditarTelefono);
                arregloParametros.push(txtEditarDedicacion);
                arregloParametros.push(txtEditarDireccion);
                arregloParametros.push(txtEditarComentarios);
                break;
            case 'eliminar':
                let txtCorreoEliminar = $("#txtCorreoEliminar").val();
                arregloParametros.push(txtCorreoEliminar);
                break;
            case 'verUno':
                let txtCorreoDetallesBuscar = $("#txtCorreoDetallesBuscar").val();
                arregloParametros.push(txtCorreoDetallesBuscar);
                break;
            case 'verUnoEditar':
                let txtEditarCorreoDetallesBuscar = $("#txtEditarCorreoDetallesBuscar").val();
                arregloParametros.push(txtEditarCorreoDetallesBuscar);
                break;
            case 'verUnoEliminar':
                let txtEliminarCorreoDetallesBuscar = $("#txtEliminarCorreoDetallesBuscar").val();
                arregloParametros.push(txtEliminarCorreoDetallesBuscar);
                break;
        
            default:
                break;
        }
    }
    // Petición para obtener la vista requerida
    $.ajax({
        url: './controladores/c_vistas.php',
        type: 'POST',
        data: { peticion, controlador, parametros },
        success: function(respuestaJson) {
            respuesta = JSON.parse(respuestaJson);
            let resultado = respuesta[0]['resultado'];
            if (resultado == 'error') {
                alert('error al recibir el template');
            } else {
                let contenido = respuesta[0]['contenido'];
                $('#contenido').children(".row").html(contenido);
                $("#contenido").fadeOut(1);
                efectosFade();
                // Evalúa si el controlador no esta vacío, y genera la peticion al controlador requerido
                if(controlador != 'vacio'){
                    $.ajax({
                        url: './controladores/c_'+controlador+'.php',
                        type: 'POST',
                        data: { peticion, controlador, arregloParametros },
                        success: function(respuestaJson2) {
                            respuesta = JSON.parse(respuestaJson2);
                            let resultado = respuesta[0]['resultado'];
                            let tipo = respuesta[0]['tipo'];
                            let contenido = respuesta[0]['contenido'];
                            // Evalua la respuesta de controlador y procede según sea el caso
                            if (resultado == 'error') {
                                Swal.fire({
                                    title: 'Error!',
                                    text: contenido,
                                    icon: 'error',
                                    confirmButtonText: 'cerrar'
                                  })
                            } else {
                                switch (tipo) {
                                    case 'verTodos':
                                        $('#tablaContactos').html(contenido);
                                        break;
                                    case 'agregar':
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Contacto guardado con éxito',
                                            showConfirmButton: false,
                                            timer: 1500
                                          })
                                        break;
                                    case 'editar':
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: contenido,
                                            showConfirmButton: false,
                                            timer: 1500
                                          })
                                        break;
                                    case 'eliminar':
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: contenido,
                                            showConfirmButton: false,
                                            timer: 1500
                                          })
                                        break;
                                    case 'verUno':
                                        if(contenido == 'no'){
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'No se encontraron resultados para el correo '+arregloParametros[0]+' . Verifique e intente de nuevo!',
                                                icon: 'error',
                                                confirmButtonText: 'cerrar'
                                              })
                                        }else{
                                            $('#contenedorDetalles').html(contenido);
                                        }
                                        break;
                                    case 'verUnoEditar':
                                        if(contenido == 'no'){
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'No se encontraron resultados para el correo '+arregloParametros[0]+' . Verifique e intente de nuevo!',
                                                icon: 'error',
                                                confirmButtonText: 'cerrar'
                                              })
                                        }else{
                                            $('#formEditar').html(contenido);
                                        }
                                        break;
                                    case 'verUnoEliminar':
                                        if(contenido == 'no'){
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'No se encontraron resultados para el correo '+arregloParametros[0]+' . Verifique e intente de nuevo!',
                                                icon: 'error',
                                                confirmButtonText: 'cerrar'
                                              })
                                        }else{
                                            $('#contenedorDetallesEliminar').html(contenido);
                                        }
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                    });
                }
            }
        }
    });
}