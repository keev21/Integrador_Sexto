<?php
$productoID = isset($_GET['productoID']) ? $_GET['productoID'] : null;
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
        $imagen = $fila['Imagen'];
        $stock = $fila['Stock'];
        
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
?>


 <!-- Product Details Section Begin -->
 <section class="product-details spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 col-md-6">
                 <div class="product__details__pic">
                     <div class="product__details__pic__item">
                         <img class="product__details__pic__item--large" src="../../Admin/Public/assets/images/products/<?php echo $imagen; ?>" alt="">
                     </div>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6">
                 <div class="product__details__text">
                     <h3><?php echo $nombre; ?></h3>
                     <div class="product__details__price">$<?php echo $precio; ?></div>
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
                             <a href="#" class="primary-btn" style="margin-left: 150px;">Añadir al carrito</a>


                             <select id="cantidadProducto">
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
 <!-- Product Details Section End -->

 <!-- Related Product Section Begin -->
 <section class="related-product">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title related__product__title">
                     <h2>Related Product</h2>
                 </div>
             </div>
         </div>
         <?php
    // ... (código de conexión a la base de datos)

    // Consulta para obtener los 8 productos ordenados por FechaIngreso
    $consulta = "SELECT *
    FROM productos
    WHERE CategoriaID = '$categoriaID' AND ProductoID <> '$productoID'
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
        $imagen = $fila['Imagen'];
        $anchoImagen = 250;
        $altoImagen = 150;

        // Mostrar la información en el HTML
        echo '<div class="col-lg-3 col-md-4 col-sm-6 mix">
        <div class="featured__item">
            <div class="featured__item__pic set-bg text-center" data-setbg="../../Admin/Public/assets/images/products/' . $imagen . '"  style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;">
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