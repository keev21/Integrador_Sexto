 <?php
    $productoID = isset($_GET['productoID']) ? $_GET['productoID'] : null;
    if ($productoID) {
        // Realizar la consulta para obtener la información del producto
        $consulta = "SELECT * FROM productos WHERE ProductoID = $productoID";
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
         <div class="row">
             <div class="col-lg-3 col-md-4 col-sm-6">
                 <div class="product__item">
                     <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                         <ul class="product__item__pic__hover">
                             <li><a href="#"><i class="fa fa-heart"></i></a></li>
                             <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                             <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="product__item__text">
                         <h6><a href="#">Crab Pool Security</a></h6>
                         <h5>$30.00</h5>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-6">
                 <div class="product__item">
                     <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                         <ul class="product__item__pic__hover">
                             <li><a href="#"><i class="fa fa-heart"></i></a></li>
                             <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                             <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="product__item__text">
                         <h6><a href="#">Crab Pool Security</a></h6>
                         <h5>$30.00</h5>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-6">
                 <div class="product__item">
                     <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                         <ul class="product__item__pic__hover">
                             <li><a href="#"><i class="fa fa-heart"></i></a></li>
                             <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                             <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="product__item__text">
                         <h6><a href="#">Crab Pool Security</a></h6>
                         <h5>$30.00</h5>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-6">
                 <div class="product__item">
                     <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                         <ul class="product__item__pic__hover">
                             <li><a href="#"><i class="fa fa-heart"></i></a></li>
                             <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                             <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="product__item__text">
                         <h6><a href="#">Crab Pool Security</a></h6>
                         <h5>$30.00</h5>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Related Product Section End -->