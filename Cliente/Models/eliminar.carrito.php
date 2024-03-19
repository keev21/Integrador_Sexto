<?php 

require_once "model.conexion.php";
echo $carritoID;
error_reporting(0);
// Obtener el valor de $carritoID desde el formulario
$carritoID = $_POST['eliminar'];

// Consulta para eliminar el registro con el valor de $carritoID
$query = "DELETE FROM `carrito_compras` WHERE carritoID='$carritoID'";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

// Verificar si la eliminación fue exitosa
if ($resultado) {
    header("Location: http://localhost/integrador_sexto/Cliente/views/index.php?page=carrito/carrito");
    exit();
} else {
   
}

// Cerrar la conexión
mysqli_close($conexion);
?>
