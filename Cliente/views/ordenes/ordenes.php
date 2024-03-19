<?php error_reporting(0); ?>
<section class="breadcrumb-section set-bg" data-setbg="../Public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>ORDENES</h2>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Forma de envio</th>

                                <th class="shoping__product">Dirección</th>
                                <th>fecha orden</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Recibo</th>

                            </tr>
                        </thead>
                        <?php
                        // Asegúrate de obtener el clienteID de alguna manera, por ejemplo, mediante un parámetro GET.

                        // Realizar la consulta SQL
                        $query = "SELECT * FROM `ordenes` where ClienteID='$clienteID'";

                        $resultado = mysqli_query($conexion, $query);

                        // Inicializar variables para cálculos


                        // Mostrar resultados en la tabla HTML

                        echo '<tbody>';
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo '<tr>';
                            echo '<td class="shoping__cart__item">';
                            echo '<h5>' . $fila['FormaEnvio'] . '</h5>';
                            echo '</td>';
                            echo '<td class="shoping__cart__price">'   . $fila['DireccionEnvio'] . '</td>';
                            echo '<td class="shoping__cart__quantity" style="color: white;"><strong>' . $fila['FechaOrden'] . '</strong></td>';
                            echo '<td class="shoping__cart__quantity" style="color: white;"><strong>' . $fila['Total'] . '</strong></td>';

                            echo '<td class="shoping__cart__quantity" style="color: red;"><strong>' . $fila['Estado'] . '</strong></td>';
                            echo '<td class="shoping__cart__item__close">';
                            echo '<a href="./index.php?page=ordenes/recibo&id=' . $fila['OrdenID'] . '" class="btn btn-primary">Ver</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        



                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>