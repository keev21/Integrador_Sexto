<!-- Product Section Begin -->

<div class="container">





    <div class="row">
        <!-- codigo de busqueda -->
        <?php

        // Obtiene el valor del parámetro 'valor' de la URL
        $valor = isset($_GET['valor']) ? $_GET['valor'] : '';
        $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : 'null';
        $filtrar = isset($_GET['filtrar']) ? $_GET['filtrar'] : 'null';
        $componentes = isset($_GET['componentes']) ? $_GET['componentes'] : 'null';
        $minPrecio = isset($_GET['minPrecio']) ? $_GET['minPrecio'] : 'null';
        $maxPrecio = isset($_GET['maxPrecio']) ? $_GET['maxPrecio'] : 'null';
        $ordenarPor = isset($_GET['ordenarPor']) ? $_GET['ordenarPor'] : 'null';
        // Inicializa la consulta SQL
        $sql = "SELECT *, P.Nombre AS NombreProducto, C.Nombre AS NombreCategoria 
                    FROM productos P
                    INNER JOIN categorias C ON P.CategoriaID = C.CategoriaID  ";

        // Si el valor no es 'todos', agrega una condición WHERE
        if ($valor >= 1 && $valor <= 9) {

            $sql .= "  where p.CategoriaID = '$valor' and Stock>0";
        } else if ($valor == 'todos') {

            $sql .= " ";
        }
        if ($busqueda != 'null') {

            $sql .= "  where  (p.Nombre like '%$busqueda%' or c.Nombre like '%$busqueda%') and p.Stock>0 ";
        }
        if ($filtrar == 'search') {

            $sql .= "  WHERE c.Nombre='$componentes' and Stock>0 and p.Precio  BETWEEN $minPrecio AND $maxPrecio ORDER BY p.Precio $ordenarPor";
        }





        // Ejecuta la consulta
        $resultado = mysqli_query($conexion, $sql);

        // Verifica si hubo algún error en la consulta
        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($conexion));
        }

        ?>


        <!-- ... (código existente) ... -->
        <div class="filter__found">
            <?php
            // Muestra el número de productos encontrados
            $num_productos = mysqli_num_rows($resultado);
            echo "<h6><span>$num_productos</span> Productos encontrados</h6>";
            ?>
        </div>
        <div class="row">
            <?php
            // Itera sobre los resultados de la consulta y muestra cada producto en el código
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $anchoImagen = 350;
                $altoImagen = 300;
                $ruta_base_datos = $fila['Imagen'];
                $ruta_aplicacion = "../../Admin/Public/assets/images/" . basename($ruta_base_datos);

                echo '<div class="col-lg-4 col-md-6 col-sm-6">';
                echo '<div class="product__item">';
                echo '<div class="product__item__pic set-bg" data-setbg="' . $ruta_aplicacion . '"  style="width: ' . $anchoImagen . 'px; height: ' . $altoImagen . 'px; margin: auto;>';
                echo '<ul class="product__item__pic__hover">';



                echo '</ul>';
                echo '</div>';
                echo '<div class="product__item__text">';
                echo '<h6><a href="./index.php?page=detalles_producto/detalles_producto&productoID=' . $fila['ProductoID'] . '">' . $fila['NombreProducto'] . '</a></h6>';
                echo '<h5> $' . $fila['Precio'] . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <!-- ... (código existente) ... -->


        <?php
        // Libera los resultados de la consulta
        mysqli_free_result($resultado);

        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
        ?>
    </div>
    

</div>
</div>