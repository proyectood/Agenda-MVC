$( document ).ready(function() {
    peticion();
});

function efectosFade() {
    $("#contenido").fadeIn(1000);
}

function peticion(vPeticion='vistaInicio',vControlador='vacio',vParametros='') {
    let peticion = vPeticion;
    let controlador = vControlador;
    let parametros = vParametros;
    let arregloParametros = [];
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
        
            default:
                break;
        }
    }
    console.log('peticion vista: ',peticion, controlador, parametros)
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
                if(controlador != 'vacio'){
                    console.log('peticion controlador: ',peticion, controlador, arregloParametros)
                    $.ajax({
                        url: './controladores/c_'+controlador+'.php',
                        type: 'POST',
                        data: { peticion, controlador, arregloParametros },
                        success: function(respuestaJson2) {
                            respuesta = JSON.parse(respuestaJson2);
                            console.log('respuesta del controlador: ',respuesta);
                            let resultado = respuesta[0]['resultado'];
                            let tipo = respuesta[0]['tipo'];
                            let contenido = respuesta[0]['contenido'];
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