<?php
$clienteID = $_POST['clienteID'];
$productoId=$_POST['productoID'];
$cantidad=$_POST['cantidadProducto'];
$precio=$_POST['precio'];

$carrito_total=$precio*$cantidad;
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


// Sentencia SQL para la inserción
$sql = "INSERT INTO carrito_compras (ClienteID, ProductoID, carrito_cantidad, precio_unitario, carrito_total) VALUES ('$clienteID', '$productoId', '$cantidad', '$precio', '$carrito_total')";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    header("Location: http://localhost/integrador_sexto/Cliente/views/index.php?page=carrito/carrito&action=success");
    exit();
} else {
    echo "Error al insertar datos: " . mysqli_error($conexion);
}



// Cerrar la conexión
mysqli_close($conexion);
