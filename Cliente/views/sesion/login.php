<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Public/css/estilos.css">
    <link rel="stylesheet" href="../../Public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
<div class="min-vh-100 d-flex align-items-center" style="background-color: #333;">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mx-auto">
                <div class="shadow-lg">
                    <div class="d-flex align-items-center">
                        <div class="d-none d-md-block d-lg-block">
                            <img src="../../Public/img/hy.png" class="objectFit"  />
                        </div>
                        <div class="p-4" id="formPanel">
                            <div class="text-center mb-5">
                                <h1 class="customHeading h3 text-uppercase">Game Center</h1>
                            </div>
                            <form onsubmit="event.preventDefault();submitForm()">
                                <div class="custom-form-group">
                                    <label class="text-uppercase" for="username">Correo</label>
                                    <input type="text" id="username" class="pb-1"  /><span class="pb-1"><i class="fas fa-user"></i></span>
                                </div>
                                <div class="custom-form-group mt-3">
                                    <label class="text-uppercase" for="password">Contraseña</label>
                                    <input type="password" id="password" class="pb-1" />
                                    <span class="pb-1"><i id="showCursor" class="fas fa-eye-slash" onclick="showPassword()"></i></span>
                                </div>
                                <div class="mt-5">
                                    <button class="w-100 p-2 d-block custom-btn" >Ingresar</button>
                                    <!-- Additional text elements with the same style -->
                                    <p class="text-center mt-3"><a href="#">Registrarse</a></p>
                                    <p class="text-center"><a href="#">¿Has olvidado tu contraseña?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showPassword() {
        // Obtiene el elemento de contraseña
        var passwordField = document.getElementById("password");
        // Obtiene el elemento del ícono
        var showIcon = document.getElementById("showCursor");

        // Cambia el tipo de entrada de contraseña entre "password" y "text"
        if (passwordField.type === "password") {
            passwordField.type = "text";
            // Cambia el ícono a un ojo abierto cuando se muestra la contraseña
            showIcon.className = "fas fa-eye";
        } else {
            passwordField.type = "password";
            // Cambia el ícono a un ojo cerrado cuando se oculta la contraseña
            showIcon.className = "fas fa-eye-slash";
        }
    }
</script>
</body>
</html>

