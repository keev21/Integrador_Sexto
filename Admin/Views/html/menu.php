
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <!-- <a href="./index.html" class="text-nowrap logo-img"> -->
      <img src="../Public/assets/images/logos/favicon.png" width="150" alt="50">
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Pantallad e Inicio </span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="." aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Inicio</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">FUNCIONALIDAD</span>
        </li>
        
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE USUARIOS
            /*****************************************************************************************************************************************************************************/ -->
            <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
                <a class="sidebar-link" href="Usuarios/usuarios.php" target="base" aria-expanded="false">
                    <span>
                        <i class="ti ti-user"></i>
                    </span>
                    <span class="hide-menu">Usuarios</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE CATEGORIA
            /*****************************************************************************************************************************************************************************/ -->
        
            <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
             <a class="sidebar-link" href="categoria/categoria.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-tag"></i>
                </span>
                <span class="hide-menu">Categoria</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
              <a class="sidebar-link" href="categoria/categoria.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-tag"></i>
                </span>
                <span class="hide-menu">Categoria</span>
              </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>
        
            
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE Productos
            /*****************************************************************************************************************************************************************************/ -->
            <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
             <a class="sidebar-link" href="productos2/productos2.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Productos</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
               <a class="sidebar-link" href="productos2/productos2.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Productos</span>
              </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE ORDER
            /*****************************************************************************************************************************************************************************/ -->
            <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
              <a class="sidebar-link" href="orden/orden.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Orden</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
               <a class="sidebar-link" href="orden/orden.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Orden</span>
              </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>
        

        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE ORDER
         /*****************************************************************************************************************************************************************************/ -->
         <li class="sidebar-item">
              <?php
              $Rol = $_SESSION['Rol'];
              if ($Rol == 'Administrador') {
              ?>
              <a class="sidebar-link" href="palabras_chat/palabras.php" target="base" aria-expanded="false">
                <span>
                  <i class="ti ti-pencil"></i>
                </span>
                <span class="hide-menu">Palabras</span>
              </a>
              <?php
              } elseif($Rol == 'Empleado') {
              ?>
                <a class="sidebar-link" href="palabras_chat/palabras.php" target="base" aria-expanded="false">
                  <span>
                    <i class="ti ti-pencil"></i>
                  </span>
                  <span class="hide-menu">Palabras</span>
                </a>
              <?php
              } // Cierre de la llave para la condición
              ?>
          </li>


        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE PERSONALIZACION
            /*****************************************************************************************************************************************************************************/ -->
      
        <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
               <a class="sidebar-link" href="pagos/pagos.php" target="base" aria-expanded="false">
                  <span>
                    <i class="ti ti-file"></i>
                  </span>
                  <span class="hide-menu">Pagos</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>

             <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
               <a class="sidebar-link" href="reportes/reportes.php" target="base" aria-expanded="false">
                  <span>
                  <i class="ti ti-list"></i>
                  </span>
                  <span class="hide-menu">Reportes</span>
                </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        MENU DE DIRECION PAGINA WEB
            /*****************************************************************************************************************************************************************************/ -->
        <li class="sidebar-item">
                <?php
                $Rol = $_SESSION['Rol'];
                if ($Rol == 'Administrador') {
                ?>
              <a class="sidebar-link" href="http://localhost/integrador_sexto/Cliente/views/index.php?page=home/home"  aria-expanded="false">
                <span>
                  <i class="ti ti-world"></i>
                </span>
                <span class="hide-menu">Comercio Electronico</span>
              </a>
                <?php
                } // Agregué el cierre de la llave para la condición
                ?>
            </li>
        <!-- /*****************************************************************************************************************************************************************************/
                                                                                        FIN MENU DE ACCESSO Y REGISTRAR
            /*****************************************************************************************************************************************************************************/ -->
      </ul>

    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>