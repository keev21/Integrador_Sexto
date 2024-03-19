

<?php

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integrador_sexto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos de PayPal
$detalles = file_get_contents("php://input");



// Convertir los datos JSON a un array asociativo
$detalles_array = json_decode($detalles, true);

// Extraer información relevante
$ClienteID =  $detalles_array['clienteID'];
$productoIDs =  $detalles_array['productoIDs'];
$cantidadProd = $detalles_array['cantidadProd'];
print_r($productoIDs);
print_r($cantidadProd);

$transaccion_id = $detalles_array['id'];
$fecha = date('Y-m-d H:i:s'); // Fecha actual
$status = $detalles_array['status'];
$email = $detalles_array['payer']['email_address'];

$monto_total = $detalles_array['purchase_units'][0]['amount']['value'];


//TRAER LOS PRECIOS DE LOS PRODUCTOS
$precios = [];
$stocks = [];

// Consulta SQL para obtener precios y stock de los productos con los IDs proporcionados
$query = "SELECT ProductoID, Precio FROM productos WHERE ProductoID IN (" . implode(',', $productoIDs) . ")";
$result = $conn->query($query);

// Verificar si la consulta fue exitosa
if ($result) {
    // Recorrer los resultados y almacenar precios y stock en los arrays correspondientes
    while ($row = $result->fetch_assoc()) {
        $precios[$row['ProductoID']] = $row['Precio'];
       
    }

    // Liberar el resultado
    $result->free();
} else {
    // Manejar el caso de error en la consulta
    echo "Error en la consulta: " . $conn->error;
}

// Consulta SQL para obtener precios y stock de los productos con los IDs proporcionados
$query = "SELECT ProductoID, Stock FROM productos WHERE ProductoID IN (" . implode(',', $productoIDs) . ")";
$result = $conn->query($query);

// Verificar si la consulta fue exitosa
if ($result) {
    // Recorrer los resultados y almacenar precios y stock en los arrays correspondientes
    while ($row = $result->fetch_assoc()) {
       
        $stocks[$row['ProductoID']] = $row['Stock'];
    }

    // Liberar el resultado
    $result->free();
} else {
    // Manejar el caso de error en la consulta
    echo "Error en la consulta: " . $conn->error;
}


// Imprimir los resultados (puedes modificar esto según tus necesidades)
echo "Precios: ";
print_r($precios);

echo "Stocks: ";
print_r($stocks);

// Asegurémonos de que ambos arrays tengan la misma longitud
if (count($stocks) === count($cantidadProd)) {
    // Restamos los elementos correspondientes de los dos arrays
    $nueva_cantidad = array_map(function ($stock, $cantidad) {
        return $stock - $cantidad;
    }, $stocks, $cantidadProd);

    // Imprimimos el resultado o lo usamos según sea necesario
    print_r($nueva_cantidad);
} else {
    echo "Los arrays no tienen la misma longitud. No se pueden restar.";
}










// Preparar la consulta SQL
$sql = "INSERT INTO productospago (id_transaccion, fecha, status, email, ClienteID, total) 
        VALUES ('$transaccion_id', '$fecha', '$status', '$email', '$ClienteID', '$monto_total')";
// Asegúrate de que los nombres de los campos coincidan con los de tu base de datos

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Detalles de la transacción guardados exitosamente.";
} else {
    echo "Error al guardar detalles: " . $conn->error;
}

$sql = "SELECT Direccion FROM clientes WHERE ClienteID = $ClienteID";

// Ejecutar la consulta
$resultado = $conn->query($sql);

// Verificar si la consulta fue exitosa
if ($resultado) {
    // Obtener la fila como un array asociativo
    $fila = $resultado->fetch_assoc();

    // Almacenar la dirección en una variable
    $direccion = $fila['Direccion'];

    // Liberar el resultado
    $resultado->free();
} else {
    // Manejar el caso en que la consulta no fue exitosa
    echo "Error en la consulta: " . $conn->error;
}
$forma_envio="ServiEntrega";
$estado="Pendiente";


$sql = "INSERT INTO `ordenes`(`ClienteID`, `Total`, `FormaEnvio`, `DireccionEnvio`, `FechaOrden`, `Estado`) VALUES ('$ClienteID','$monto_total','$forma_envio','$direccion','$fecha','$estado')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    // Obtener el último ID insertado (OrdenID)
    $ordenID = $conn->insert_id;

    echo "Detalles de la transacción guardados exitosamente. OrdenID: $ordenID";

    // Verificar que los arrays $productoIDs, $precios, y $cantidadProd estén definidos y tengan la misma longitud
    if (isset($productoIDs, $precios, $cantidadProd) && count($productoIDs) === count($precios) && count($precios) === count($cantidadProd)) {
        // Utilizar un bucle foreach para recorrer los arrays simultáneamente
        foreach ($productoIDs as $i => $productoID) {
            $precio = $precios[$productoID];
            $cantidad = $cantidadProd[$i];

            // Consulta para insertar en la tabla 'ordendetalle'
            $detalleSql = "INSERT INTO `ordendetalle`(`ProductoID`, `OrdenID`, `Precio`, `Cantidad`) VALUES ('$productoID', '$ordenID', '$precio', '$cantidad')";
            
            // Ejecutar la consulta para el detalle
            if ($conn->query($detalleSql) !== TRUE) {
                echo "Error al guardar detalles del producto: " . $conn->error;
                // Puedes manejar el error como desees
            }
        }
    } else {
        echo "Error";
    }
} else {
    echo "Error al guardar detalles: " . $conn->error;
}

if (count($productoIDs) === count($nueva_cantidad)) {
    // Preparar la consulta SQL
    $sql = "UPDATE productos SET Stock = ? WHERE ProductoID = ?";
    
    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    
    // Verificar si la preparación fue exitosa
    if ($stmt) {
        // Iterar sobre los arrays y ejecutar la actualización
        for ($i = 0; $i < count($productoIDs); $i++) {
            // Vincular los parámetros
            $stmt->bind_param("ii", $nueva_cantidad[$i], $productoIDs[$i]);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Verificar si la actualización fue exitosa
            if ($stmt->affected_rows === 1) {
                echo "Actualización exitosa para ProductoID " . $productoIDs[$i] . "<br>";
            } else {
                echo "Error al actualizar ProductoID " . $productoIDs[$i] . "<br>";
            }
            
            // Reiniciar los parámetros para la siguiente iteración
            $stmt->reset();
        }
        
        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta SQL: " . $conn->error;
    }
} else {
    echo "Los arrays no tienen la misma longitud";
}
$sql = "DELETE FROM `carrito_compras` WHERE `ClienteID` = '$ClienteID'";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado exitosamente";

    

} else {
    echo "Error al eliminar el registro: " . $conn->error;
}



// Cerrar la conexión
$conn->close();





