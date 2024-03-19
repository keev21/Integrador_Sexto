<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<?php
$ordenid = isset($_GET['id']) ? $_GET['id'] : null;
echo $ordenid;
?>
<style>
    body {
        background-color: #333;
        font-family: 'Arial', sans-serif;
        color: black;
    }

    * {
        color: black;
        /* Cambiar el color del texto a negro para todos los elementos */
    }

    .recibo-container {
        color: black;
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #D1D1D1;
        border-radius: 10px;
        margin-top: 50px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }


    .titulo {
        color: black;
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .detalle-cliente p {
        color: black;
        margin: 5px 0;
    }

    .productos p {
        color: black;
        margin: 5px 0;
    }

    .total {
        color: black;
        margin-top: 20px;
        text-align: right;
    }

    hr {
        color: black;
        border: 0.5px solid white;
        margin: 10px 0;
    }

    .col-md-3 p strong {
        color: black;
        /* Cambiar el color del texto a negro para el elemento específico */
    }

    .col-md-6 p strong {
        color: black;
        /* Cambiar el color del texto a negro para el elemento específico */
    }
    .detalle-cliente p strong {
        color: black;
        /* Cambiar el color del texto a negro para el elemento específico */
    }

    .total p strong {
        color: black;
        /* Cambiar el color del texto a negro para el elemento específico */
    }

    .total p {
        color: black;
        /* Cambiar el color del texto a negro para el elemento específico */
    }
    
    @media print {
        body * {
            visibility: hidden;
        }

        .recibo-container, .recibo-container * {
            visibility: visible;
        }

        .recibo-container {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
    #imprimirRecibo {
      display: block;
      margin: auto;
    }

    
</style>

<div id="div-a-imprimir">
<div class="recibo-container">
    <div class="titulo">Game Center</div>

    <div class="detalle-cliente">
        <p><strong>Orden N°: </strong><span id="ordenNumero"><?php echo $ordenid; ?></span></p>
        <?php
        $sql = "SELECT * FROM ordenes INNER JOIN clientes ON ordenes.ClienteID = clientes.ClienteID WHERE OrdenID='$ordenid'";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            // Obtener la fila de resultados
            $fila = mysqli_fetch_assoc($resultado);
            $total = $fila['Total'];

            // Mostrar los resultados en el formato deseado
            echo '<p><strong>Fecha de Orden:</strong> <span id="fechaOrden">' . $fila['FechaOrden'] . '</span></p>';
            echo '<p><strong>Nombre del Cliente:</strong> <span id="nombreCliente">' . $fila['Nombre'] . '</span></p>';
            echo '<p><strong>Dirección:</strong> <span id="direccionCliente">' . $fila['Direccion'] . ', ' . $fila['Ciudad'] . ', ' . $fila['Pais'] . '</span></p>';
            echo '<p><strong>Correo:</strong> <span id="correoCliente">' . $fila['Correo'] . '</span></p>';
            echo '<p><strong>Teléfono:</strong> <span id="telefonoCliente">' . $fila['Telefono'] . '</span></p>';
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion);
        }

        ?>

    </div>

    <hr>

    <?php
    $ordenid = // Obtén el valor de $ordenid desde donde sea necesario;

        // Tu conexión a la base de datos (código que proporcionaste)

        // Consulta SQL
        $sql = "SELECT ordenes.OrdenID AS NuevoOrdenID, ordenes.*, ordendetalle.*, productos.* 
        FROM ordenes 
        INNER JOIN ordendetalle ON ordenes.OrdenID = ordendetalle.OrdenID 
        INNER JOIN productos ON ordendetalle.ProductoID = productos.ProductoID 
        WHERE ordenes.OrdenID='$ordenid'";

    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {
        // Inicializar arrays para almacenar los productos, cantidades y precios
        $productos = array();
        $cantidades = array();
        $precios = array();

        // Obtener los resultados de la consulta
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $productos[] = $fila['Nombre'];
            $cantidades[] = $fila['Cantidad'];
            $precios[] = $fila['Precio'];
        }

        // Cerrar el conjunto de resultados
        mysqli_free_result($resultado);
    }

    // Cerrar la conexión a la base de datos (importante hacerlo cuando hayas terminado)
    mysqli_close($conexion);
    ?>

    <!-- Código HTML para mostrar la información -->
    <div class="productos" >
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $key => $producto) : ?>
                        <tr>
                            <td><?php echo $producto; ?></td>
                            <td><?php echo $cantidades[$key]; ?></td>
                            <td><?php echo "$" . number_format($precios[$key], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <hr>
    <?php
    $iva = $total * 0.12;
    $subtotal = $total - $iva;

    ?>

    <div class="total">
        <p><strong>Subtotal:</strong> $<span id="subtotal"><?php echo $subtotal; ?></span></p>
        <p><strong>IVA (12%):</strong> $<span id="iva"><?php echo $iva; ?></span></p>
        <p><strong>Total:</strong> $<span id="total"><?php echo $total; ?></span></p>


    </div>
    
    
</div>
</div>
<br>

<button id="imprimirRecibo" type="button" class="btn btn-outline-primary">Imprimir</button>


</body>
</html>
<script>
    document.getElementById('imprimirRecibo').addEventListener('click', function () {
        // Oculta el botón de impresión antes de imprimir
        this.style.display = 'none';

        // Llama a la función de impresión
        window.print();

        // Muestra nuevamente el botón de impresión después de imprimir
        this.style.display = 'block';
    });
</script>