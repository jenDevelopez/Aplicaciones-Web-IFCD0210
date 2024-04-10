<?php
session_start();
function connect_server()
{
  $credentials = parse_credentials("../php.ini");
  $host = $credentials[0];
  $user = $credentials[1];
  $password = $credentials[2];
  $db = 'noticias';
  $conexion = mysqli_connect($host, $user, $password,$db) or die("No se ha podido conectar con el servidor");
  if(!$conexion){
    echo "No hay conexion";
  }
  return $conexion;
}

function connect_db($conexion,$db)
{
  if (!mysqli_select_db($conexion, $db)) {
    die("Conexion fallida con la tabla");
  }
  return $conexion;
}

function query($conexion,$query)
{
  $result = mysqli_query($conexion, $query);
  return $result;
}

function parse_credentials($file)
{
  $datos = parse_ini_file($file);
  $host = $datos['host'];
  $user = $datos['user'];
  $password = $datos['password'];

  return array($host, $user, $password);
}

function contar_filas($conexion,$q)
{
  $result = mysqli_query($conexion, $q);
  $nFilas = mysqli_num_rows($result);
  return $nFilas;
}

function loginWithEmailAndPassword($email, $password)
{

  $conexion = connect_server();
  $q = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
  $result = query($conexion,$q);

  if(mysqli_num_rows($result) > 0) {
    #se inicia sesion
    $_SESSION['user'] = $email;
    $user = $_SESSION['user'];

    return $user;
  }else{
    return false;
  }
}
