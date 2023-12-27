<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Public/css/estilos2.css" type="text/css">
  <title>Botón y Ventana Modal</title>
  <style>
    body {
      background-color: #333;
    }
  </style>
</head>
<body>
    <button type="button" class="btn btn-primary boton-flotante" data-toggle="modal" data-target="#miModal">
    CHATBOT
  </button>
  <!-- Ventana Modal -->
  <div class="modal bottom-right fade" id="miModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <!-- Encabezado de la modal -->
        <div class="modal-header">
        <h2 class="mt-3" style="color: black">Asistente virtual📌</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                  <?php include "./index.php"; ?>
     </div>

        <!-- Pie de la modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts de Bootstrap y jQuery (asegúrate de incluir jQuery antes de Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>