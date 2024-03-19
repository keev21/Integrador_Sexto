
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
       html {
    background-color: #333;
    
}
         .title {
    color: white;
    
}
        body {
            background-color: #333;
            color: white;
        }

        .login {
            max-width: 400px;
            margin: 0 auto;
            background-color: #333;
            color: white;
            border: 1px solid white; /* Border added for better visibility */
            padding: 20px;
            border-radius: 5px;
        }

        .back-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: white;
        }

        /* Setting label and input styles */
        label, .input, .button {
            color: white !important;
        }
        .input {
      background-color: #333;
      color: white;
    }

        /* Setting box background color */
        .box {
            background-color: #333;
        }

        /* Setting button styles */
        .button {
            background-color: #333;
            border-color: white;
        }

        /* Setting button hover styles */
        .button:hover {
            background-color: #555;
        }
        .back-link:hover {
  color: #0866ff;/* Cambia el color cuando el cursor está sobre el enlace */
}
        
    </style>
</head>

<body>
    <div class="main-container" style="padding-top: 100px;">
        <form class="box login" action="" method="POST" autocomplete="off">
            <h5 class="title is-5 has-text-centered is-uppercase">GAMECENTER</h5>
            

            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                    <input class="input" type="text" name="correo">
                </div>
            </div>

            <div class="field">
                <label class="label">Clave</label>
                <div class="control">
                    <input class="input" type="password" name="contrasenia">
                </div>
            </div>

            <p class="has-text-centered mb-4 mt-3">
                <button type="submit" class="button is-info is-rounded is-fullwidth">Iniciar sesión</button>
            </p>

            <a href="./register.php" class="button is-success is-fullwidth">Registrarse</a>
            <br>
            <a href="./forgot-password.php" class="back-link">Recuperar contraseña</a>
            
            <br>
            <br>
            
            <a href="http://localhost/integrador_sexto/Cliente/views/index.php?page=home/home" class="back-link"> Volver a la página principal <br>
             <---</a>
            <br>
            <br>
            <?php
            if(isset($_POST['correo']) && isset($_POST['contrasenia'])){
                require_once "../../Models/model.inicio_sesion.php";
            }
            ?>
            
            <br>

            
            
            <br>
            

            
        </form>
        
       
    </div>
    
</body>

</html>
