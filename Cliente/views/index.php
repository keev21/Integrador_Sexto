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

      // Construir la ruta del archivo PHP a incluir
      $fileToInclude = "./$page.php";

      // Verificar si el archivo existe antes de incluirlo
      if (file_exists($fileToInclude)) {
         include $fileToInclude;
      } else {
         echo "Página no encontrada";
      }
     ?>
  

  <!-- Botón flotante que abre la ventana modal -->
  <button type="button" class="btn btn-primary boton-flotante" data-toggle="modal" data-target="#miModal">
    Botón
  </button>

  <!-- Ventana Modal -->
  <div class="modal bottom-right fade" id="miModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Encabezado de la modal -->
        <div class="modal-header">
          <h4 class="modal-title">Contenido de index.php</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Cuerpo de la modal (puedes cargar el contenido de index.php aquí) -->
        <div class="modal-body">
        <?php include "./chatbot/index.php"; ?>
          <!-- Agrega aquí el contenido de index.php -->
          <!-- Puedes cargar el contenido de index.php aquí o incluirlo mediante AJAX -->
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