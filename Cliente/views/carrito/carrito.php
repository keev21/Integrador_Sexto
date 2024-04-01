<?php
error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : 'null';

if ($action != 'null') {
    // Output JavaScript para mostrar SweetAlert
    echo '<script>
            
    Swal.fire("Producto", "Registrado con éxito" , "success");
          </script>';
}
$action="null";





?>

<section class="breadcrumb-section set-bg" data-setbg="../Public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Carrito de compra</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<form action="../Models/eliminar.carrito.php" method="post">
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Productos</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            // Asegúrate de obtener el clienteID de alguna manera, por ejemplo, mediante un parámetro GET.

                            // Realizar la consulta SQL
                            $query = "SELECT carrito_compras.*, productos.Nombre
                                  FROM carrito_compras
                                  INNER JOIN productos ON carrito_compras.ProductoID = productos.ProductoID
                                  WHERE ClienteID = '$clienteID' order by carritoID";

                            $resultado = mysqli_query($conexion, $query);

                            // Inicializar variables para cálculos
                            $subTotal = 0;
                            $iva = 0;
                            $total = 0;
                            $productoIDs = array();
                            $cantidadProd=array();

                            // Mostrar resultados en la tabla HTML

                            echo '<tbody>';
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $productoIDs[] = $fila['ProductoID'];
                                $cantidadProd[] = $fila['carrito_cantidad'];

                                echo '<tr>';
                                echo '<td class="shoping__cart__item">';
                                echo '<img src="img/cart/cart-1.jpg" alt="">';
                                echo '<h5>' . $fila['Nombre'] . '</h5>';
                                echo '</td>';
                                echo '<td class="shoping__cart__price">' . '$ '  . $fila['precio_unitario'] . '</td>';
                                echo '<td class="shoping__cart__quantity" style="color: white;"><strong>' . $fila['carrito_cantidad'] . '</strong></td>';

                                // Calcular y mostrar el total por producto
                                $totalProducto = $fila['precio_unitario'] * $fila['carrito_cantidad'];
                                echo '<td class="shoping__cart__total">' . '$ ' . $totalProducto . '</td>';

                                echo '<td class="shoping__cart__item__close">';
                                echo '<button type="submit" name="eliminar" class="icon_close" value="' . $fila['carritoID'] . '"></button>';
                                echo '</td>';
                                echo '</tr>';

                                // Actualizar variables para cálculos

                                $total  += $totalProducto;
                            }

                            // Calcular el IVA y el total
                            $iva = $total * 0.12;

                            $subTotal = $total - $iva;



                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">


            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">


                </div>
            </div>

            <div class="col-lg-6">
                <?php
                echo '</tbody>';
                echo '</table>';

                // Mostrar los resultados del cálculo al final de la tabla
                echo '<div class="shoping__checkout">';
                echo '<h5>Total de compra</h5>';
                echo '<ul>';
                
                echo '<li>Total <span>' . '$ ' . $total . '</span></li>';
                echo '</ul>';
                ?>
                <div id="paypal-button-container"></div>
                <script>
                     var productoIDs = <?php echo json_encode($productoIDs); ?>;
    var clienteID = <?php echo json_encode($clienteID); ?>;
    var cantidadProd = <?php echo json_encode($cantidadProd); ?>;


    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo $total; ?>
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            actions.order.capture().then(function(detalles) {
                
                // Enviar detalles al servidor
                guardarDetallesEnBD(detalles, clienteID, productoIDs, cantidadProd);
                Swal.fire({
            title: '¡Pedido Capturado!',
            text: 'Detalles guardados correctamente ',
            icon: 'success',
            confirmButtonText: 'Ok',
            willClose: function() {
                // Redirigir al usuario al enlace deseado
                window.location.href = 'http://localhost/integrador_sexto/Cliente/views/index.php?page=ordenes/ordenes';
            }
        });
            });
        },
        onCancel: function(data) {
            alert("Pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');

    function guardarDetallesEnBD(detalles, clienteID, productoIDs, cantidadProd) {
        detalles.clienteID = clienteID;
        detalles.productoIDs = productoIDs;
        detalles.cantidadProd = cantidadProd;

        // Enviar detalles al servidor mediante AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./carrito/compra.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(JSON.stringify(detalles));
    }
</script>
                
               
                <?php
                echo '</div>';
                ?>

                

            </div>
        </div>
        </div>
    </section>
</form>