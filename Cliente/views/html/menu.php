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
        color: white;
        /* Cambia el color del texto a blanco */
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
        color: white;
        /* Cambia el color del texto a blanco */
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


                        <?php
                        // Verificar si la sesión de ClienteID está configurada y no es nula
                        if (!empty($_SESSION['ClienteID'])) {
                            $clienteID = $_SESSION['ClienteID'];
                            $query = "SELECT Nombre FROM clientes WHERE ClienteID = $clienteID";
                            $result = mysqli_query($conexion, $query);

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $nombreCliente = $row['Nombre'];
                            } else {
                                // Manejar el error de la consulta
                                $nombreCliente = "Cliente Desconocido";
                            }

                            // Mostrar el nombre del cliente en lugar de "Login"
                            echo '<div class="header__top__right__auth">';
                            echo '<a href="./index.php?page=perfil/perfil"><i class="fa fa-user"></i>' . $nombreCliente . '</a>';
                            echo '</div>';
                        } else {
                            // Mostrar "Login" y enlazar a la ruta de inicio de sesión
                            echo '<div class="header__top__right__auth">';
                            echo '<a href="../views/sesion/login.php"><i class="fa fa-user"></i> Login</a>';
                            echo '</div>';
                        }
                        ?>
                        <a href="sesion/logout.php"><i class="fa fa-user"></i>Log Out</a>



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
            <div class="col-lg-6" style="color: white;">
                <nav class="header__menu" style="color: white;">
                    <ul style="color: white;">
                        <li class="active"><a href="./index.php?page=home/home">Home</a></li>
                        <li><a href="./index.php?page=tienda/tienda&valor=todos">Tienda</a></li>

                        <li><a href="./index.php?page=carrito/carrito">Carrito</a></li>
                        <li><a href="./index.php?page=ordenes/ordenes">Ordenes</a></li>
                        <li><a href="./index.php?page=contacto/contacto">Info</a></li>
                    </ul>
                </nav>
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
            <?php
           
            // Consulta para obtener todas las categorías
            $query = "SELECT CategoriaID, Nombre FROM categorias where Estado ='Publicar' order by Nombre";
            $resultado = mysqli_query($conexion, $query);

            if (!$resultado) {
                die("Error en la consulta: " . mysqli_error($conexion));
            }

            // Generar enlaces dinámicamente
            echo '<div class="col-lg-3">';
            echo '    <div class="hero__categories">';
            echo '        <div class="hero__categories__all" style="background-color: #0866ff">';
            echo '            <i class="fa fa-bars"></i>';
            echo '            <span style="background-color: #0866ff;">Todas las Categorias</span>';
            echo '        </div>';
            echo '        <ul style="background-color: #333;">';

            while ($fila = mysqli_fetch_assoc($resultado)) {
                $categoriaID = $fila['CategoriaID'];
                $nombreCategoria = $fila['Nombre'];

                // Generar enlace con CategoriaID dinámico
                echo '            <li><a href="./index.php?page=tienda/tienda&valor=' . $categoriaID . '">' . $nombreCategoria . '</a></li>';
            }

            echo '        </ul>';
            echo '    </div>';
            echo '</div>';

            // Liberar resultado y cerrar la conexión
            mysqli_free_result($resultado);
            
            ?>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form onsubmit="return buscar()">
                            <input id="searchInput" type="text" style="background-color: #333; color: white;" placeholder="¿Qué necesitas?">
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
        border: 1px solid white;
        /* Color de la línea (en este caso, negro) */
        margin: 20px 0;
        /* Márgenes superior e inferior para separar del contenido */

    }
</style>
<hr>

<script>
    function buscar() {
        // Obtener el valor del cuadro de texto
        var valor = document.getElementById("searchInput").value;

        // Validar que el cuadro de texto no esté vacío antes de redirigir
        if (valor.trim() !== "") {
            // Construir la URL con el valor del cuadro de texto
            var url = './index.php?page=tienda/tienda&busqueda=' + encodeURIComponent(valor);

            // Redirigir a la nueva URL
            window.location.href = url;

            // Devolver false para evitar que el formulario realice su acción predeterminada
            return false;
        } else {
            // Mostrar un mensaje de error si el cuadro de texto está vacío
            alert("Por favor, ingresa algo en el cuadro de búsqueda.");


            // Devolver true para permitir que el formulario se envíe (si lo deseas)
            return false;
        }
    }
</script>


<!-- Hero Section End -->