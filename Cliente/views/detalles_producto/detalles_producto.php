<?php
$productoID = isset($_GET['productoID']) ? $_GET['productoID'] : null;


if (!empty($_SESSION['ClienteID'])) {
    $clienteID = $_SESSION['ClienteID'];
}
if ($productoID) {
    // Realizar la consulta para obtener la información del producto con INNER JOIN
    $consulta = "SELECT p.*, c.Nombre as CategoriaNombre, c.CategoriaID as CategoriaID
                 FROM productos p
                 INNER JOIN categorias c ON p.CategoriaID = c.CategoriaID
                 WHERE p.ProductoID = $productoID";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Obtener la información del producto
        $fila = mysqli_fetch_assoc($resultado);

        // Guardar la información en variables
        $nombre = $fila['Nombre'];
        $precio = $fila['Precio'];
        $descripcion = $fila['Descripcion'];
        $ruta_base_datos = $fila['Imagen'];
        $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);
        $stock = $fila['Stock'];
        $descuento = $fila['Descuento'];

        // Guardar información de la categoría en variables
        $categoriaID = $fila['CategoriaID'];
        $categoriaNombre = $fila['CategoriaNombre'];

        mysqli_free_result($resultado);
    } else {
        echo 'Producto no encontrado';
    }
} else {
    echo 'ID de producto no proporcionado';
}

if ($descuento > 0) {


?>
    <div class="tags-inside" style="margin-left: 400px;">
        <img alt="Con descuento" class="img-fluid" src="https://ddtech.mx/assets/uploads/bb7b38fe3596d6ae2baa7ba831e0e7bc.jpg" style="width: 100px; height: auto;">
    </div>



<?php
}
?>


<!-- Product Details Section Begin -->
<form action="../Models/model.carrito.php" method="POST" autocomplete="off">
    <?php
    error_reporting(0);
    $productoID = isset($_GET['productoID']) ? $_GET['productoID'] : null;
    $clienteID = $_SESSION['ClienteID'];
    echo '<input type="hidden" name="productoID" value="' . htmlspecialchars($productoID) . '">';
    echo '<input type="hidden" name="clienteID" value="' . htmlspecialchars($clienteID) . '">';
    ?>
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="<?php echo $ruta_aplicacion; ?> " style="width: 50px; height: 450px;" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $nombre; ?></h3>
                        <div class="product__details__price">
                            $<?php echo $precio; ?>
                            <input type="hidden" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
                        </div>
                        <?php
                        if ($descuento > 0) {
                            $nuevoPrecio = $precio / (1 - ($descuento / 100));

                        ?>

                            <div class="product__details__price">
                                <del style="color: #aaa;">$<?php echo  round($nuevoPrecio, 2); ?></del>
                                <span style="color: #fc0341;">         <?php echo $descuento; ?>%</span>
                                <input type="hidden" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
                            </div>




                        <?php  } ?>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <strong style="color: white;">Información del producto</strong>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            </div>
                            <!-- Agrega más contenido de pestañas según sea necesario -->
                        </div>



                        <ul>
                            <li><b>Disponibilidad</b> <span><?php echo ($stock > 0) ? 'En Stock' : 'Agotado'; ?></span></li>
                        </ul>
                        <br>
                        <br>


                        <div class="product__details__quantity">
                            <strong>Cantidad</strong>
                            <br>
                            <br>

                            <div class="quantity">

                                <!-- PONER EL IF -->
                                <?php
                                if (!empty($_SESSION['ClienteID'])) {
                                    $clienteID = $_SESSION['ClienteID'];
                                ?>

                                    <button type="submit" class="primary-btn" style="margin-left: 150px;">Añadir al carrito</button>
                                <?php
                                } else {
                                ?>

                                    <button type="submit" class="primary-btn" style="margin-left: 150px;" disabled>Registrate o inicia sesion para Añadir al carrito</button>
                                <?php



                                }
                                ?>








                                <select name="cantidadProducto">
                                    <?php
                                    for ($i = 1; $i <= $stock; $i++) {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <br>
                        <br>
                    </div>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                </ul>
            </div>
        </div>

    </section>
</form>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Productos relacionados</h2>
                </div>
            </div>
        </div>
        <?php
        // ... (código de conexión a la base de datos)

        // Consulta para obtener los 8 productos ordenados por FechaIngreso
        $consulta = "SELECT *
    FROM productos
    WHERE CategoriaID = '$categoriaID' AND ProductoID <> '$productoID' and Stock>0
    ORDER BY FechaIngreso DESC
    LIMIT 4";
        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($conexion));
        }

        // Iniciar la fila
        echo '<div class="row featured__filter">';

        // Mostrar los productos en el HTML
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $productoID = $fila['ProductoID'];
            $nombre = $fila['Nombre'];
            $precio = $fila['Precio'];
            $ruta_base_datos = $fila['Imagen'];
            $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);
            $anchoImagen = 250;
            $altoImagen = 250;

            // Mostrar la información en el HTML
            echo '<div class="col-lg-3 col-md-4 col-sm-6">
        <div class="featured__item">
            <div class="featured__item__pic set-bg text-center" data-setbg="' . $ruta_aplicacion . '"  style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="featured__item__text">
            <h6><a href="./index.php?page=detalles_producto/detalles_producto&productoID=' . $productoID . '">' . $nombre . '</a></h6>
                <h5>$' . $precio . '</h5>
            </div>
        </div>
    </div>';
        }

        // Cerrar la fila
        echo '</div>';

        // Liberar el resultado
        mysqli_free_result($resultado);

        // Cerrar la conexión
        mysqli_close($conexion);

        ?>

    </div>
</section>
<!-- Related Product Section End -->