<?php 
 $host = "localhost";
 $user = "root";
 $clave = "";
 $bd = "integrador_sexto";
 $conexion = mysqli_connect($host,$user,$clave,$bd);
 if (mysqli_connect_errno()){
     echo "No se pudo conectar a la base de datos";
     exit();
 }
 mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
 mysqli_set_charset($conexion,"utf8");
 
 $clienteID = $_POST['ClienteID'];
 $nombre = $_POST['Nombre'];
 $pais = $_POST['Pais'];
 $ciudad = $_POST['Ciudad'];
 $telefono = $_POST['Telefono'];
 $direccion = $_POST['Direccion'];
 $correo = $_POST['Correo'];
 $contrasena = $_POST['Contrasena'];
 $hash_contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

 $consulta_existencia = "SELECT * FROM clientes WHERE ClienteID = '$clienteID'";
$resultado_existencia = mysqli_query($conexion, $consulta_existencia);

if (mysqli_num_rows($resultado_existencia) > 0) {
    // Realizar el update
    $consulta_update = "UPDATE clientes SET 
                        Nombre = '$nombre',
                        Pais = '$pais',
                        Ciudad = '$ciudad',
                        Telefono = '$telefono',
                        Direccion = '$direccion',
                        Correo = '$correo',
                        Contrasena = '$hash_contrasena'
                        WHERE ClienteID = '$clienteID'";

    $resultado_update = mysqli_query($conexion, $consulta_update);

    if ($resultado_update) {

        echo "Exito ";
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
} else {
    echo "ClienteID no encontrado en la base de datos";
}