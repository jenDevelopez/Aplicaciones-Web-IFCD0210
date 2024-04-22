<?php
ini_set('display_errors',1);
$referer = $_SERVER['HTTP_REFERER'];
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  echo "<p>Falta de parametros<p><a href='$referer'>Volver al formulario</a>";
  http_response_code(400);
  exit;
} else {
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
  }
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }
  if (isset($_POST['password'])) {
    $password = $_POST['password'];
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos del usuario</title>
  <style>body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

.contenedor {
  width: 80%;
  max-width: 600px;
  margin: 40px auto;
  padding: 30px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
    .datos h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .datos p {
      margin-bottom: 10px;
    }

    .datos span {
      font-weight: bold;
    }

    .datos > a {

    }
  </style>
</head>

<body>
  <div class="contenedor">
     <div class="datos">
    <h2>Datos del formulario</h2>

    <p>Nombre de usuario: <span id="nombre-dato">
      <?php echo $username ?>
    </span></p>
    <p>Correo electrónico: <span id="email-dato">
    <?php echo $email ?>
    </span></p>
    <p>Contraseña: <span id="asunto-dato">
    <?php echo $password ?>
    </span></p>
  </div>
  </div>
 
  <a href="formulario.php">Volver al formulario</a>
</body>

</html>