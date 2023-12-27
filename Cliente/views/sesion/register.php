<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Public/css/estilos.css">
    <link rel="stylesheet" href="../../Public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Registration</title>
</head>
<body>
<div class="min-vh-100 d-flex align-items-center" style="background-color: #333;">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mx-auto">
                <div class="shadow-lg">
                    <div class="p-4 text-center" id="formPanel">
                        <div class="text-center mb-5">
                            <h1 class="customHeading h3 text-uppercase">Registro</h1>
                        </div>
                        <form onsubmit="event.preventDefault();submitForm()">
                            <div class="custom-form-group">
                                <label class="text-uppercase" for="name">Nombre</label>
                                <input type="text" id="name" class="pb-1" />
                                <span class="pb-1"><i class="fas fa-user"></i></span>
                            </div>
                            <br>
                            <div class="custom-form-group mt-3">
                                <label class="text-uppercase" for="email">Correo</label>
                                <input type="text" id="email" class="pb-1" />
                                <span class="pb-1"><i class="fas fa-envelope"></i></span>
                            </div>
                            <br>
                            <div class="custom-form-group mt-3">
                                <label class="text-uppercase" for="country">Pais</label>
                                <input type="text" id="country" class="pb-1" />
                                <span class="pb-1"><i class="fas fa-globe"></i></span>
                            </div>
                            <br>
                            <div class="custom-form-group mt-3">
                                <label class="text-uppercase" for="city">Ciudad</label>
                                <input type="text" id="city" class="pb-1" />
                                <span class="pb-1"><i class="fas fa-city"></i></span>
                            </div>
                            <br>
                            <div class="custom-form-group mt-3">
                                <label class="text-uppercase" for="address">Direccion</label>
                                <input type="text" id="address" class="pb-1" />
                                <span class="pb-1"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <br>
                            <div class="custom-form-group mt-3">
                                <label class="text-uppercase" for="phone">Telefono</label>
                                <input type="text" id="phone" class="pb-1" />
                                <span class="pb-1"><i class="fas fa-phone"></i></span>
                            </div>
                            <br>
                            <div class="custom-form-group mt-3">
                                <label class="text-uppercase" for="password">Contraseña</label>
                                <input type="password" id="password" class="pb-1" />
                                <span class="pb-1"><i id="showCursor" class="fas fa-eye-slash" onclick="showPassword('password')"></i></span>
                            </div>
                            <br>
                            <div class="custom-form-group mt-3">
                                <label class="text-uppercase" for="confirmPassword">Repetir Contraseña</label>
                                <input type="password" id="confirmPassword" class="pb-1" />
                                <span class="pb-1"><i id="showCursorConfirm" class="fas fa-eye-slash" onclick="showPassword('confirmPassword')"></i></span>
                            </div>
                            <br>
                            <div class="mt-5">
                                <button class="w-100 p-2 d-block custom-btn" >Registrarse</button>
                                <br>
                                <br>

                                <button class="w-100 p-2 d-block custom-btn"  style="background-color: #333;" ><a href="./login.php">Volver</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showPassword(fieldId) {
        // Obtiene el elemento de contraseña
        var passwordField = document.getElementById(fieldId);
        // Obtiene el elemento del ícono
        var showIcon = document.getElementById("showCursor");
        var showIconConfirm = document.getElementById("showCursorConfirm");

        // Cambia el tipo de entrada de contraseña entre "password" y "text"
        if (passwordField.type === "password") {
            passwordField.type = "text";
            // Cambia el ícono a un ojo abierto cuando se muestra la contraseña
            if (fieldId === "password") {
                showIcon.className = "fas fa-eye";
            } else if (fieldId === "confirmPassword") {
                showIconConfirm.className = "fas fa-eye";
            }
        } else {
            passwordField.type = "password";
            // Cambia el ícono a un ojo cerrado cuando se oculta la contraseña
            if (fieldId === "password") {
                showIcon.className = "fas fa-eye-slash";
            } else if (fieldId === "confirmPassword") {
                showIconConfirm.className = "fas fa-eye-slash";
            }
        }
    }
</script>
</body>
</html>
