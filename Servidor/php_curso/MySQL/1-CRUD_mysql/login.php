<?php 
require('../utils_db.php');

if(isset($_SESSION['user'])){
  header('location:profile.php');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $mensaje = '';
  if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = loginWithEmailAndPassword($email,$password);
  }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
  

</head>
<body>
<div class="contenedor-login">
  <h1>Iniciar sesión</h1>
  <form id="login.php" action="#" method="post" autocomplete="off">
    <label for="usuario">Usuario:</label>
    <input type="email" id="usuario" name="email" placeholder="Ingrese su nombre de usuario">
    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="password" placeholder="Ingrese su contraseña">
    <button id="btn-login" type="submit">Ingresar</button>
    <a href="#">¿Olvidaste tu contraseña?</a>
    <a href="./signUp.php">Registrate</a>
  </form>
  <p>
    <?php 
      if($mensaje != ''){
        echo $mensaje;
      }
    ?>
  </p>
</div>

</body>
</html>