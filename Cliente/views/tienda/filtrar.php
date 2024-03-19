<section class="breadcrumb-section set-bg" data-setbg="../Public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>TODOS LOS PRODUCTOS</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<br>

<div class="container">
    <div class="row">
        <!-- SECCION 1-->
        <div class="col-lg-3 col-md-5">
    <div class="sidebar">
        <div class="sidebar__item">
            <h4>Categorias</h4>
            <?php
                // Consulta para obtener las categorías
                $consultaCategorias = "SELECT CategoriaID, Nombre FROM categorias order by Nombre";
                $resultadoCategorias = mysqli_query($conexion, $consultaCategorias);

                if ($resultadoCategorias) {
                    echo '<select class="form-control" id="componentes" name="componentes[]" multiple>';
                    
                    // Flag para determinar si es la primera categoría
                    $primeraCategoria = true;

                    while ($fila = mysqli_fetch_assoc($resultadoCategorias)) {
                        $categoriaID = $fila['CategoriaID'];
                        $nombreCategoria = $fila['Nombre'];

                        // Verificar si la categoría está seleccionada
                        $seleccionada = ($primeraCategoria) ? 'selected' : '';

                        echo "<option value='$nombreCategoria' $seleccionada>$nombreCategoria</option>";

                        // Después de la primera categoría, desactivar el flag
                        $primeraCategoria = false;
                    }

                    echo '</select>';
                } else {
                    echo 'Error al obtener las categorías';
                }

                // Liberar el resultado
                mysqli_free_result($resultadoCategorias);
            ?>
        </div>
    </div>
</div>

        <!-- SECCION 2-->
        <div class="col-lg-3 col-md-5">
            <div class="sidebar">
                <div class="sidebar__item">
                    <h4>Filtrar por precio</h4>
                    <div class="price-range-wrap">
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="2000">
                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                        </div>
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECCION 3-->
        <div class="col-lg-3 col-md-5">
            <div class="sidebar">
                <div class="filter__sort">
                    <h5 style="color: white;">Ordenar por</h5>
                    <select id="ordenarPor">
                        <option value="ASC">Precio(menor a mayor)</option>
                        
                        <option value="DESC">Precio(mayor a menor)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- SECCION 4-->
        <div class="col-lg-3 col-md-5">
            <div class="sidebar">
                <a href="#" class="primary-btn" onclick="filtrarTienda()">Filtrar</a>
            </div>
        </div>
    </div>
</div>

<script>
    function filtrarTienda() {
        // Obtener valores seleccionados
        var componentes = document.getElementById("componentes").value;
        var minPrecio = document.getElementById("minamount").value.replace(/\D/g, '');
        var maxPrecio = document.getElementById("maxamount").value.replace(/\D/g, ''); // Eliminar cualquier caracter no numérico
        var ordenarPor = document.getElementById("ordenarPor").value;

        // Construir la URL
        var url = 'index.php?page=tienda/tienda&filtrar=search';
        url += '&componentes=' + encodeURIComponent(componentes);
        url += '&minPrecio=' + encodeURIComponent(minPrecio);
        url += '&maxPrecio=' + encodeURIComponent(maxPrecio);
        url += '&ordenarPor=' + encodeURIComponent(ordenarPor);

        // Redirigir a la URL construida
        window.location.href = url;
    }
</script>
