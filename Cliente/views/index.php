<?php
session_start();
require_once "../Models/model.conexion.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "./html/head.php" ?>
</head>

<body>
  
<?php


include "./html/menu.php";

// Obtener el valor de la variable 'page' de la URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Verificar si la página es 'tienda/tienda' y si 'filtrar.php' existe
if ($page == 'tienda/tienda' && file_exists('../views/tienda/filtrar.php')) {
  include "../views/tienda/filtrar.php";
}

// Construir la ruta del archivo PHP a incluir
$fileToInclude = "./$page.php";

// Verificar si el archivo existe antes de incluirlo
if (file_exists($fileToInclude)) {
  include $fileToInclude;
} else {
  echo "<h1 > PÁGINA NO ENCONTRADA </h1>";
}
?>


  <!-- Botón flotante que abre la ventana modal --> 
  <button type="button" class="btn btn-primary boton-flotante" data-toggle="modal" data-target="#miModal" style="text-align: center; color: white;">
  <img src="../Public/img/chatbot.png" alt="Logo" class="logo">
  Asistente Virtual

  </button>

  <!-- Ventana Modal -->
  <div class="modal bottom-right fade" id="miModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <!-- Logo -->
          <img src="../Public/img/chatbot.png" alt="Logo" class="logo">

          <!-- Título del modal -->
          <h4 class="modal-title">Asistente virtual</h4>

          <!-- Botón de cerrar -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

       
                <div class="modal-body">
          <?php include "./chatbot/index.php"; ?>
       
        </div>

        <!-- Pie de la modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>

      </div>
    </div>
  </div>



  <?php


  include "./html/script.php";
  include "./html/footer.php";
  ?>
</body>

</html>