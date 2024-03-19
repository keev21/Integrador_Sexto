<?php

require_once '../../config/config.php';
session_start();
error_reporting();

$ClienteID=$_SESSION['ClienteID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recuperar Contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="../../Plog/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../Plog/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../Plog/css/estilos.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image">
                            <img src="../../public/img/team-1.jpg" >
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Ingresa tu nueva Contraseña</h1>
                                        <p class="mb-4">Restaura tu contraseña</p>
                                    </div>
                                    <form class="user" method="post">
                                    <div class="form-group">
                                            <div class="password-container">
                                            <input type="password" class="form-control form-control-user" id="Contrasena" name="Contrasena" placeholder="Contraseña...">
                                                <img src="https://static.vecteezy.com/system/resources/previews/002/101/686/large_2x/eye-icon-look-and-vision-symbol-eye-logo-design-inspiration-free-vector.jpg" alt="Imagen de contraseña" id="togglePassword">
                                            </div>
                                            <div id="mensaje_contrasena"></div>
                                        </div>
                                        <button type="submit" id="btnGuardar"  class="btn btn-primary btn-user btn-block">
                                            Cambiar
                                        </button>
                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../Plog/vendor/jquery/jquery.min.js"></script>
    <script src="../../Plog/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../Plog/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../Plog/js/sb-admin-2.min.js"></script>
    
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
                    if (password.length < 1) {
                        message += '';
                        btnGuardar.disabled = true; // Bloquear el botón si no se ha ingresado contraseña
                    } else if (password.length >= 8 &&
                        regexLowerCase.test(password) &&
                        regexUpperCase.test(password) &&
                        regexNumbers.test(password) &&
                        regexSpecialChars.test(password)) {
                        message += 'Contraseña válida';
                        btnGuardar.disabled = false; // Habilitar el botón si la contraseña es válida
                    } else {
                        message += 'La contraseña debe tener mínimo 8 caracteres, un carácter especial y una letra mayúscula.<br>';
                        btnGuardar.disabled = true; // Bloquear el botón si la contraseña no cumple con los requisitos
                    }

                messageElement.innerHTML = message === '' ? '' : '<div style="color:red">' + message + '</div>';
            });
        </script>
 
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ClienteID = $_SESSION['ClienteID'];
    $nuevaContrasena = password_hash($_POST['Contrasena'], PASSWORD_DEFAULT);

    $conexion = new ClaseConexion();
    $conexion->ProcedimientoConectar();

    $query = "UPDATE clientes SET Contrasena='$nuevaContrasena' WHERE ClienteID='$ClienteID'";
    $resultado = mysqli_query($conexion->conexion, $query);

    if ($resultado) {
        // Contraseña actualizada correctamente
        echo '<script>
                Swal.fire("Contraseña", "Actualizada con éxito", "success")
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./login.php";
                        }
                    });
              </script>';
    } else {
        // Error al actualizar la contraseña
        echo '<script>
                Swal.fire("Error", "No se pudo actualizar la contraseña", "error");
              </script>';
    }

    // Cierra la conexión
    mysqli_close($conexion->conexion);
}
?>

<?php
//ob_end_flush();
?>
<!-- Tu HTML para la página de cambiar contraseña -->



