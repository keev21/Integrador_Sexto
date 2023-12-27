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
     

     <?php
      
      
      include "./html/script.php";
      include "./html/footer.php";
   ?>
</body>

</html>