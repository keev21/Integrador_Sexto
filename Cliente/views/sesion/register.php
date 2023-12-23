<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registrarse - Tienda de Componentes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .register-container {
      margin-top: 5%;
    }
    .custom-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      background-color: #343a40; /* Fondo oscuro */
      color: #fff;
    }
    .custom-card-header {
      background: transparent;
      border-bottom: 1px solid #fff;
      padding: 1.25rem;
    }
    .custom-card-body {
      padding: 2rem;
    }
    .custom-card-footer {
      background: transparent;
      border-top: 1px solid #fff;
      padding: 1rem;
    }
    .btn-custom {
      background-color: #fff;
      color: #343a40; /* Texto oscuro */
      transition: background-color 0.3s, color 0.3s;
    }
    .btn-custom:hover {
      background-color: #343a40;
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container register-container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-8">
      <div class="card custom-card">
        <div class="card-header custom-card-header">
          <h3 class="text-center">Registrarse</h3>
        </div>
        <div class="card-body custom-card-body">
          <form action="registro.php" method="post">
            <!-- ... (Campos del formulario) ... -->
            <button type="submit" class="btn btn-custom btn-block">Registrarse</button>
          </form>
        </div>
        <div class="card-footer text-center custom-card-footer">
          ¿Ya tienes una cuenta? <a href="login.php" class="text-white">Inicia Sesión</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
