<?php
                    
                    // Obtiene el valor del parámetro 'valor' de la URL
                    $valor = isset($_GET['valor']) ? $_GET['valor'] : 'todos';

                    // Inicializa la consulta SQL
                    $sql = "SELECT * FROM productos";

                    // Si el valor no es 'todos', agrega una condición WHERE
                    if ($valor >= 1 && $valor <= 9) {
                        $sql .= " WHERE CategoriaID = '$valor'";
                    }
                    else if ($valor == 'filtrar') {
                        $sql .= " WHERE CategoriaID = '$valor'";
                    }

                    // Ejecuta la consulta
                    $resultado = mysqli_query($conexion, $sql);

                    // Verifica si hubo algún error en la consulta
                    if (!$resultado) {
                        die("Error en la consulta: " . mysqli_error($conexion));
                    }

                    ?>

                    <div class="col-lg-9 col-md-7">
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
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">';
                                echo '<div class="product__item">';
                                echo '<div class="product__item__pic set-bg" data-setbg="' . $fila['Imagen'] . '">';
                                echo '<ul class="product__item__pic__hover">';
                                echo '<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '<div class="product__item__text">';
                                echo '<h6><a href="#">' . $fila['Nombre'] . '</a></h6>';
                                echo '<h5>' . $fila['Precio'] . '</h5>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <!-- ... (código existente) ... -->
                    </div>

                    <?php
                    // Libera los resultados de la consulta
                    mysqli_free_result($resultado);

                    // Cierra la conexión a la base de datos
                    mysqli_close($conexion);
                    ?>