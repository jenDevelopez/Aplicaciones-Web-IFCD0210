<?php
ini_set('display_errors', 1);
require '../utils_db.php';
#parseo las credenciales
$credentials = parse_credentials("../php.ini");
$host = $credentials[0];
$user = $credentials[1];
$password = $credentials[2];
  #realizo la conexion
  $conexion = mysqli_connect($host, $user, $password) or die ("No se ha podido realizar la conexion");

  $database = "noticias";
  mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");
  $titulo = $contenido = $categoria = $imagen = '';
  $id = $_POST["id"];
  $q = "SELECT * FROM noticia WHERE id='$id'";
   $result = mysqli_query($conexion,$q) or die("Error al obtener la noticia");
   $row = mysqli_fetch_array($result); 
   $titulo = $row['titulo'];
   $contenido = $row['contenido'];
   $categoria = $row["categoria"];
  $imagen = $row["imagen"];


 if ($_SERVER["REQUEST_METHOD"] != 'POST') {
    echo "Error";
    exit;
  } 

  if (!isset($_POST["id"])) {
    echo "Error al obtener el id";
    exit;
  }
 
  if(isset($_POST["titulo"]) && $_POST["titulo"] !== ''){
    $titulo = $_POST['titulo'];
  }
  if(isset($_POST["contenido"]) && $_POST["contenido"] !== ''){
    $contenido = $_POST['contenido'];
  }
  if(isset($_POST["categoria"]) && $_POST["categoria"] !== ''){
    $categoria = $_POST['categoria'];
  }
  if(isset($_POST["imagen"]) && $_POST["imagen"] != ''){
    $imagen = $_POST['imagen'];
   
  }
  
  
  $q = "UPDATE noticia SET titulo='$titulo', contenido='$contenido', categoria='$categoria', imagen='$imagen' WHERE id='$id'";

  $result = mysqli_query($conexion, $q);

  if(!$result){
    $mensaje = "Error al actualizar la noticia";
  }else{
    $mensaje = "Noticia actualizada correctamente";
  }

  $referer = $_SERVER["HTTP_REFERER"];
  header("Location: $referer");



