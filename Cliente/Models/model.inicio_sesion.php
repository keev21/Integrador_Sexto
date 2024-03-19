<?php
session_start(); // Iniciar la sesión

require_once "model.conexion.php";

$correo = $_POST['correo'];
$contrasenia = $_POST['contrasenia'];

if ($correo == "" || $contrasenia == "") {
    echo '<div class="notification is-danger is-light">
            <strong>¡No has llenado todos los datos!</strong><br>
          </div>';
    exit();
}

// Consulta SQL para obtener la contraseña almacenada
$query = "SELECT ClienteID, Nombre, Contrasena FROM clientes WHERE Correo = '$correo'";
$resultado = mysqli_query($conexion, $query);

// Verificar si la consulta devuelve al menos una fila
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtener la fila
    $fila = mysqli_fetch_assoc($resultado);
    $clienteID = $fila['ClienteID'];
    $nombre = $fila['Nombre'];
    $hashed_password = $fila['Contrasena'];

    // Verificar la contraseña
    if (password_verify($contrasenia, $hashed_password)) {
        // Contraseña correcta
        // Almacenar el ClienteID en la sesión
        $_SESSION['ClienteID'] = $clienteID;
        $_SESSION['Nombre'] = $nombre;

        // Redireccionar a la página de inicio
        header("Location: http://localhost/integrador_sexto/Cliente/views/index.php?page=home/home");
        exit();
    } else {
        // Contraseña incorrecta
        echo '<div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                Usuario o clave incorrectos
              </div>';
        exit();
    }
} else {
    // No se encontró el usuario
    echo '<div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            Usuario o clave incorrectos
          </div>';
    exit();
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
