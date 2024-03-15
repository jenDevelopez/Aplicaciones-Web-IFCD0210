<?php 
  session_start();
  define("EMAIL", "correo@correo.com");
  define("PASSWORD","123456");
  if(isset($_POST['email']) && isset($_POST['password'])){
    if($_POST['email'] == EMAIL && $_POST['password'] == PASSWORD){
      $_SESSION['user'] = $_POST['name'];
      header("Location: index.php");
    }
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="login-form">
      <h1>Iniciar Sesión</h1>
      <form action="login.php" method="post" autocomplete="off">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" placeholder="Escribe tu nombre">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su nombre de usuario">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
        <button type="submit">Ingresar</button>
      </form>
      <?php 
        if(isset($_POST['email']) && isset($_POST['password'])){
          if($_POST['email'] != EMAIL || $_POST['password'] != PASSWORD){
            echo "<span style='color:red'>email o contraseña incorrectos</span>";
          }
        }
      ?>
    </div>
  </div>
</body>
</html>
