<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Clientes </title>

    <!-- Custom fonts for this template-->
    <link href="../../Plog/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../Plog/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../Plog/css/estilos.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Cuenta!</h1>
                            </div>

                            <form id="Registro_form">
                                <div class="modal-body">
                                    <input type="hidden" name="ClienteID" id="ClienteID">

                                    

                                    <div class="form-group">
                                    <label for="Nombre" class="control-label">Nombres</label>
                                    <input type="text" name="Nombre" id="Nombre" class="form-control"  required>
                                    </div>

                                  
                                    <div class="form-group">
                                    <label for="Pais" class="control-label">Pais</label>
                                    <input type="text" name="Pais" id="Pais" class="form-control"  required>
                                    </div>

                                    <div class="form-group">
                                    <label for="Ciudad" class="control-label">Ciudad</label>
                                    <input type="text" name="Ciudad" id="Ciudad" class="form-control"  required>
                                    </div>

                                    <div class="form-group">
                                    <label for="Telefono" class="control-label">Telefono</label>
                                        <input type="text" name="Telefono" id="Telefono" class="form-control" numeros:  pattern="[0-9]+" minlength="10" maxlength="10"required>
                                    </div>

                                    <div class="form-group">
                                    <label for="Direccion" class="control-label">Direccion</label>
                                        <input type="text" name="Direccion" id="Direccion" class="form-control"   minlength="3" maxlength="100" required>
                                    </div>       
                                    
                                    <div class="form-group">
                                        <label for="Correo" class="control-label">Correo</label>
                                        <input type="email" name="Correo" id="Correo" class="form-control" required>
                                        <div id="mensaje" class="text-danger"></div>
                                    </div>

                            <div class="form-group">
                                <label for="Contrasena" class="control-label">Contraseña</label>
                                <div class="password-container">
                                    <input type="password" name="Contrasena" id="Contrasena" class="form-control" required>
                                    <img src="https://static.vecteezy.com/system/resources/previews/002/101/686/large_2x/eye-icon-look-and-vision-symbol-eye-logo-design-inspiration-free-vector.jpg" alt="Imagen de contraseña" id="togglePassword">
                                </div>
                                <div id="mensaje_contrasena"></div>
                            </div>
                            
                                </div>
                                    <div class="modal-footer">
                                    <button type="submit"   class="btn btn-primary" id="btnGuardar" disabled>Guardar</button>
                                    
                                    </div>
                                </form>

                            <hr>
                       
                            <div class="text-center">
                                <a class="small" href="./login.php">Ya tiene Cuenta? Ingrese!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap core JavaScript-->
        <script src="../../Plog/vendor/jquery/jquery.min.js"></script>
    <script src="../../Plog/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../Plog/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../Plog/js/sb-admin-2.min.js"></script>


    <script src="./registro.js"></script>

    

<script>
    $('#Correo').on('input', function() {
        const email = $(this).val();
        const mensajeElement = $('#mensaje');

        $.ajax({
            url: "../../controllers/cliente.controller.php?op=todos1",
            success: function(response) {
                console.log(response);
                try {
                    const clientes = JSON.parse(response);

                    if (Array.isArray(clientes)) {
                        const emailEnUso = clientes.some(cliente => cliente.Correo === email);
                        if (emailEnUso) {
                            mensajeElement.html('El correo está en uso.');
                            btnGuardar.disabled = true;
                        } else {
                            mensajeElement.html('');
                            btnGuardar.disabled = false;
                        }
                    } else {
                        mensajeElement.html('Respuesta del servidor no es un array válido.');
                    }
                } catch (error) {
                    console.error('Error al analizar la respuesta JSON:', error);
                    mensajeElement.html('Error en la solicitud.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', error);
                mensajeElement.html('Error en la solicitud.');
            }
        });
    });
</script>

<script>
            const passwordInput2 = document.getElementById('Contrasena');
            const togglePassword = document.getElementById('togglePassword');
            const messageElement2 = document.getElementById('mensaje_contrasena');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.textContent = type === 'password' ? 'Mostrar contraseña' : 'Ocultar contraseña';
            });


            passwordInput.addEventListener('input', function() {
                // Código de validación de contraseña (como se mostró en la respuesta anterior)
            });
        </script>

        <script>
            const passwordInput = document.getElementById('Contrasena');
            const messageElement = document.getElementById('mensaje_contrasena');

            passwordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                const regexLowerCase = /[a-z]/;
                const regexUpperCase = /[A-Z]/;
                const regexNumbers = /[0-9]/;
                const regexSpecialChars = /[!@#$%^&*()_+[\]{};':"\\|,.<>/?-]/;

                let message = '';
                if (password.length > 1) {
                    if (!regexLowerCase.test(password) || !regexUpperCase.test(password) || !regexNumbers.test(password) ||
                        !regexSpecialChars.test(password) || password.length < 8) {
                        message += 'La contraseña debe tener minimo 8 caracteres, un caracter especial y una letra mayúscula.<br>';
                    }
                } else if (password.length < 1) {
                    message += '';
                }



                messageElement.innerHTML = message === '' ? '' : '<div style="color:red">' + message + '</div>';
            });
        </script>

    <script>

/*-------------------------------------------------------------solo letras------------------------------------*/
// Función para bloquear la entrada de números en un campo de texto
function blockNumbersInput(inputElement) {
  inputElement.addEventListener('keydown', (event) => {
    // Obtener el código de la tecla pulsada
    const keyCode = event.which || event.keyCode;

    // Permitir las teclas de control (por ejemplo, las teclas de flecha, retroceso, etc.)
    if (event.ctrlKey || event.altKey || event.metaKey || keyCode === 8 || keyCode === 9) {
      return;
    }

    // Bloquear la entrada si la tecla es un número (códigos de teclas del 0 al 9 y teclado numérico)
    if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105)) {
      event.preventDefault();
    }
  });
}

// Obtener la referencia a los elementos de entrada de nombres, ciudad, pais
const nombreInputElement = document.getElementById('Nombre');
const paisInputElement = document.getElementById('Pais');
const ciudadInputElement = document.getElementById('Ciudad');




// Aplicar la restricción de no permitir números en ambos campos
blockNumbersInput(nombreInputElement);



/*-------------------------------------------------------------solo numeross------------------------------------*/

// Función para bloquear la entrada que no sea números en un campo de texto
function blockNonNumbersInput(inputElement) {
  inputElement.addEventListener('keydown', (event) => {
    // Obtener el código de la tecla pulsada
    const keyCode = event.which || event.keyCode;

    // Permitir las teclas de control (por ejemplo, las teclas de flecha, retroceso, etc.)
    if (event.ctrlKey || event.altKey || event.metaKey || keyCode === 8 || keyCode === 9) {
      return;
    }

    // Bloquear la entrada si la tecla no es un número (códigos de teclas del 0 al 9 y teclado numérico)
    if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
      event.preventDefault();
    }
  });
}

// Obtener la referencia a los elementos de entrada de nombres y apellidos
const telefonoInputElement = document.getElementById('Telefono');



// Aplicar la restricción de solo permitir números en ambos campos
blockNonNumbersInput(telefonoInputElement);





        
    </script>

</body>

</html>