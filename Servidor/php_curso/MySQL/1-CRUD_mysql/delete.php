<?php
ini_set('display_errors', 1);
require '../utils_db.php';
if (!isset ($_GET["id"])) {
  $mensaje = "ERROR: fALTAN PARAMETROS";
  echo "$mensaje <a href='index.php'>Volver</a>";
} else {
  $id = $_GET["id"];
  #conexion a la base de datos
  
  $credentials = parse_credentials("../php.ini");
  $host = $credentials[0];
  $user = $credentials[1];
  $password = $credentials[2];
  #realizo la conexion
  $conexion = mysqli_connect($host, $user, $password) or die ("No se ha podido realizar la conexion");


  #conexion con la base de datos
  $database = "noticias";
  mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");
  $q = "DELETE FROM noticia WHERE id='$id'";
  mysqli_query($conexion,$q);
  $referer = $_SERVER['HTTP_REFERER'];
  header("Location: $referer");
}