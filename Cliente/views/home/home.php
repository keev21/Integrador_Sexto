<div class="col-lg-12">
    <div class="section-title text-center mb-5">
        <h2 class="text-uppercase font-weight-bold text-white">¡Descubre nuestras increíbles ofertas!</h2>
        <hr class="divider my-4">
        
    </div>
</div>

<!-- Productos -->
<?php
// ... (código de conexión a la base de datos)

// Consulta para obtener los productos con descuento ordenados por FechaIngreso
$query = "SELECT * FROM productos WHERE Descuento > 0 ORDER BY FechaIngreso DESC";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Dividir los productos en grupos de 4
$productos_por_carrusel = array_chunk(mysqli_fetch_all($resultado, MYSQLI_ASSOC), 4);

// Iniciar el carrusel con un tiempo de espera entre cada deslizamiento de 5 segundos (5000 milisegundos)
echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner">';

// Mostrar cada grupo de productos en un carrusel item
foreach ($productos_por_carrusel as $index => $grupo_productos) {
    echo '<div class="carousel-item' . ($index === 0 ? ' active' : '') . '">
            <div class="row featured__filter">';

    // Mostrar los productos en el HTML
    foreach ($grupo_productos as $producto) {
        $anchoImagen = 250;
        $altoImagen = 250;
        $ruta_base_datos = $producto['Imagen'];
        $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);

        // Mostrar la información en el HTML
        echo '<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg text-center" data-setbg="' . $ruta_aplicacion . '"  style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;">
                        <ul class="featured__item__pic__hover">';
                        
        echo '</ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="./index.php?page=detalles_producto/detalles_producto&productoID=' . $producto['ProductoID'] . '">' . $producto['Nombre'] . '</a></h6>
                        <h5>$' . $producto['Precio'] . '</h5>
                    </div>
                </div>
            </div>';
    }

    // Cerrar la fila
    echo '</div>
        </div>';
}

// Cerrar el carrusel
echo '</div>
    </div>';

// Liberar el resultado
mysqli_free_result($resultado);

// Cerrar la conexión
?>

<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg" style="display: flex; align-items: center; justify-content: center;">
    <div class="hero__text" style="text-align: center;">
        <span>GAME CENTER</span>
        <h2>Componentes de Computadora
            <br />100% Originales
        </h2>
        <p>Entrega Gratuita y Recolección Disponible En Santo Domingo</p>
        <a href="./index.php?page=tienda/tienda&valor=todos" class="primary-btn">Comprar Ahora</a>
    </div>
</div>



<div class="col-lg-12">
    <div class="section-title">
        <h2>Últimos Productos</h2>
        
    </div>
   
</div>
 <!-- Productos -->
 <?php
    // ... (código de conexión a la base de datos)

    // Consulta para obtener los 8 productos ordenados por FechaIngreso
    $query = "SELECT * FROM productos where Stock>0 ORDER BY FechaIngreso DESC LIMIT 8";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    // Iniciar la fila
    echo '<div class="row featured__filter">';

    // Mostrar los productos en el HTML
    while ($fila = mysqli_fetch_assoc($resultado)) {
        
        $anchoImagen = 250;
        $altoImagen = 250;
        $ruta_base_datos = $fila['Imagen'];
        $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);

        // Mostrar la información en el HTML
        echo '<div class="col-lg-3 col-md-4 col-sm-6">
            <div class="featured__item">
                <div class="featured__item__pic set-bg text-center" data-setbg="' . $ruta_aplicacion . '"  style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;">
                    <ul class="featured__item__pic__hover">';
                    
        

        echo '</ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="./index.php?page=detalles_producto/detalles_producto&productoID=' . $fila['ProductoID'] . '">' . $fila['Nombre'] . '</a></h6>
                    <h5>$' . $fila['Precio'] . '</h5>
                </div>
            </div>
        </div>';
    }

    // Cerrar la fila
    echo '</div>';

    // Liberar el resultado
    mysqli_free_result($resultado);

    // Cerrar la conexión
?>



<!-- Featured Section End -->

<!-- Banner Begin -->
<br>
<br>
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="../Public/img/i7.png" alt="" style="width: 500px;">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="../Public/img/3060.png" alt="" style="width: 500px;">
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<?php
// Consulta SQL con INNER JOIN
$query = "SELECT productos.ProductoID, productos.Nombre AS NombreProducto, productos.Precio, productos.Imagen, categorias.Nombre AS NombreCategoria
FROM productos
INNER JOIN categorias ON productos.CategoriaID = categorias.CategoriaID
WHERE categorias.Nombre = 'Procesadores' and Stock>0
LIMIT 4"; // Limita la consulta a 4 resultados

$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
$anchoImagen = 150;
        $altoImagen = 100;

?>

<div class="col-lg-12">
    <div class="section-title">
        <h2>Productos destacados</h2>
    </div>
</div>
<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>Procesadores</h4>
        <div class="latest-product__slider owl-carousel">
            <?php
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $ruta_base_datos = $fila['Imagen'];
        $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);

                echo '<div class="latest-prdouct__slider__item">
                        <a href="./index.php?page=detalles_producto/detalles_producto&productoID=' . $fila['ProductoID'] . '" class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img src="'.$ruta_aplicacion.'"  style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>' . $fila['NombreProducto'] . '</h6>
                                <span>' . $fila['Precio'] . '</span>
                            </div>
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>
<?php


// Consulta SQL con INNER JOIN y filtro por categoría "Tarjetas Gráficas"
$query = "SELECT productos.ProductoID, productos.Nombre AS NombreProducto, productos.Precio, productos.Imagen
          FROM productos
          INNER JOIN categorias ON productos.CategoriaID = categorias.CategoriaID
          WHERE categorias.Nombre = 'Tarjetas Graficas' and Stock>0
          LIMIT 2"; // Limita la consulta a 2 resultados

$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

?>


<div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>Tarjetas Gráficas</h4>
        <div class="latest-product__slider owl-carousel">
            <?php
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $ruta_base_datos = $fila['Imagen'];
                $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);

                echo '<div class="latest-prdouct__slider__item">
                        <a href="./index.php?page=detalles_producto/detalles_producto&productoID=' . $fila['ProductoID'] . '" class="latest-product__item">
                            <div class="latest-product__item__pic">
                            <img src="'.$ruta_aplicacion.'"   style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>' . $fila['NombreProducto'] . '</h6>
                                <span>' . $fila['Precio'] . '</span>
                            </div>
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>
<?php


// Consulta SQL con INNER JOIN y filtro por categoría "Almacenamiento"
$query = "SELECT productos.ProductoID, productos.Nombre AS NombreProducto, productos.Precio, productos.Imagen
          FROM productos
          INNER JOIN categorias ON productos.CategoriaID = categorias.CategoriaID
          WHERE categorias.Nombre = 'Almacenamiento' and Stock>0
          LIMIT 2"; // Limita la consulta a 2 resultados

$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

?>
<div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>Almacenamiento</h4>
        <div class="latest-product__slider owl-carousel">
            <?php
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $ruta_base_datos = $fila['Imagen'];
                $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);
                echo '<div class="latest-prdouct__slider__item">
                        <a href="./index.php?page=detalles_producto/detalles_producto&productoID=' . $fila['ProductoID'] . '" class="latest-product__item">
                            <div class="latest-product__item__pic">
                            <img src="'.$ruta_aplicacion.'"  style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>' . $fila['NombreProducto'] . '</h6>
                                <span>' . $fila['Precio'] . '</span>
                            </div>
                            
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
           



        </div>
    </div>
</section>