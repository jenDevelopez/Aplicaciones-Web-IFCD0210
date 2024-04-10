<?php 
require('../utils_db.php');
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $mensaje = '';
   if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $conexion = connect_server();
     $db = 'noticias';
     mysqli_select_db($conexion,$db);
     $q = "SELECT email, password FROM usuarios;";
     $result = query($conexion,$q);
     while($row = mysqli_fetch_array($result)){
       if($email == $row['email']){
         $mensaje = 'Ya estas registrado, <a href"login.php">Inicia sesión</a>';
       }else{
         $q = "INSERT INTO usuarios SET  nombre='$name',email='$email',password='$password'";
         mysqli_query($conexion,$q) or die("No se ha podido registrar al usuario");
         loginWithEmailAndPassword($email,$password);
  
           header('Location:index.php');
   
       }
     }
   }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/signUp.css">
</head>
<body>
<div class="contenedor-registro">
  <h1>Registro</h1>
  <form action="signUp.php" method="post" autocomplete="off">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="name" placeholder="Ingrese su nombre completo">
    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="email" placeholder="Ingrese su correo electrónico">
  
    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="password" placeholder="Ingrese su contraseña">
    <label for="confirmar-contraseña">Confirmar contraseña:</label>
    <input type="password" id="confirmar-contraseña" name="confirmar-contraseña" placeholder="Confirme su contraseña">
    <button type="submit">Registrarse</button>
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