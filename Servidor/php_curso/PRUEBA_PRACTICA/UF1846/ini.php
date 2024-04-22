<?php
session_start();

function login($email,$password) {
  $conexion = mysqli_connect('localhost','dev','142022','usuarios');
  $query = "SELECT * FROM datos_usuarios WHERE email = '$email' AND password = '$password'";
  
  $result = mysqli_query($conexion,$query);
  if(mysqli_num_rows($result) > 0) {
    #se inicia sesion
    $datosUsuario = mysqli_fetch_array($result);
    $nombreUsuario = $datosUsuario['nombre'];
    $emailUsuario = $datosUsuario['email'];
   
   $_SESSION['user'] = $nombreUsuario;
   $_SESSION['email'] = $emailUsuario;

  
  }

 
}

