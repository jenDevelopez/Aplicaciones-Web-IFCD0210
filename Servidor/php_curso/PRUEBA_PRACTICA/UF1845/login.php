<?php 
ini_set('display_errors',1);
require './ini.php';
if(!isset($_SESSION['user'])){
  header('location:index.php');
}

if($_SERVER['REQUEST_METHOD'] != 'POST'){
 echo "Faltan parametros <a href'index.php'>Volver al login</a>";
}else{
  if(isset($_POST['username']) &&  isset($_POST['email']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $user = login($username);
  }

  if(!isset($_SESSION['user'])){
    header('location:index.php');
  }else{
    $user = $_SESSION['user'];
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

   
  </style>
</head>

<body>
  <div class="contenedor">
    <a href="logout.php">Cerrar sesión</a>
     <div class="datos">
    <h2>Bienvenido/a <?php echo $user ?></h2>
  </div>
  </div>
</body>

</html>