<style>
        body {
            background-color: #333;
            color: white;
        }

        #preloder {
            background-color: #333;
            color: white;
        }

        .header {
            background-color: #333;
            color: white;
        }

        .header__top,
        .header__top__left,
        .header__top__right {
            color: white;
        }

        .header__top__right__social a {
            color: white;
        }

        .header__top__right__auth a {
            color: white;
        }

        .header__menu a {
            color: white;
        }

        .header__cart a,
        .header__cart__price span {
            color: white;
        }

        .hero__categories__all,
        .hero__categories a,
        .hero__search__form input,
        .hero__search__form button,
        .hero__search__phone__icon,
        .hero__search__phone__text h5,
        .hero__search__phone__text span {
            color: white;
        }

        .hero__categories__all {
            background-color: blue;
            color: white; /* Cambia el color del texto a blanco */
        }

        .hero__search__form button {
            background-color: blue;
        }

        /* Cambios para los elementos mencionados */
        .header__menu a {
            color: white;
        }

        /* Estilo para los elementos de la barra de navegación */
        .header__menu a {
            color: white;
        }

        /* Estilo para el fondo del encabezado */
        .header {
            background-color: #333;
        }

        /* Estilo para el contenedor .header__top y sus elementos hijos */
        .header__top {
            background-color: #333;
            color: white;
        }

        .header__top__left ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .header__top__left li {
            display: inline-block;
            margin-right: 15px;
        }

        .header__top__left li i {
            margin-right: 5px;
        }

        .header__top__left li,
        .hero__categories a {
            color: white; /* Cambia el color del texto a blanco */
        }

        .header__top__right__social a {
            color: white;
            margin-right: 10px;
        }

        .header__top__right__auth a {
            color: white;
        }
    </style>

<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                        <li style="color: white;"><i class="fa fa-envelope"></i> gamecenter34@gmail.com</li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>

                        <div class="header__top__right__auth">
                            <a href="../views/sesion/login.php"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <style>
                    .header__logo img {
                        width: 200px;
                        /* Puedes ajustar el tamaño según tus necesidades */
                        margin-top: -70px;
                        /* Puedes ajustar la posición hacia arriba según tus necesidades */
                        margin-bottom: -50px;
                        /* Puedes ajustar la posición hacia abajo según tus necesidades */
                        margin-left: 30px;
                        /* Puedes ajustar la posición hacia la izquierda según tus necesidades */
                        margin-right: -20px;
                        /* Puedes ajustar la posición hacia la derecha según tus necesidades */
                        
                      

                    }
                </style>

                <div class="header__logo">
                    <a href="./index.php?page=home/home"><img src="../../Admin/Public/assets/images/logos/favicon.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6"  style="color: white;">
                <nav class="header__menu"  style="color: white;">
                    <ul  style="color: white;">
                        <li class="active"><a href="./index.php?page=home/home">Home</a></li>
                        <li><a href="./index.php?page=tienda/tienda">Tienda</a></li>

                        <li><a href="./index.php?page=carrito/carrito">Carrito de Compras</a></li>
                        <li><a href="./index.php?page=contacto/contacto">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>

                        <li><a href="#"><i class="fa fa-shopping-bag" style="color: white;"></i> <span>3</span></a></li>

                    </ul>
                    <div class="header__cart__price"  style="color: white;">item: <span  style="color: white;">$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all" style="background-color: #0866ff">
                        <i class="fa fa-bars"></i>
                        <span style="background-color: #0866ff;">Todas las Categorias</span>
                    </div>
                    <ul style="background-color: #333;" >
                        <li><a href="#">Procesadores</a></li>
                        <li><a href="#">Tarjeta Gráfica</a></li>
                        <li><a href="#">RAM</a></li>
                        <li><a href="#">Placa Base</a></li>
                        <li><a href="#">Almacenamiento (HDD/SSD)</a></li>
                        <li><a href="#">Unidad de Suministro de Energía (PSU)</a></li>
                        <li><a href="#">Sistema de Refrigeración (Ventiladores/Disipadores)</a></li>
                        <li><a href="#">Case</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">

                            <input type="text"  style="background-color: #333; color: white;" placeholder="¿Qué nesesitas?">
                            <button type="submit" class="site-btn" style="background-color: #0866ff; color: white;">BUSCAR</button>

                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>

                        <div class="hero__search__phone__text">
                            <h5> 099 383 7234</h5>
                            <span>Soporte</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<style>
        hr {
            border: 1px solid white; /* Color de la línea (en este caso, negro) */
            margin: 20px 0; /* Márgenes superior e inferior para separar del contenido */
            
        }
    </style>
    <hr>
<!-- Hero Section End -->