<?php 
require '../utils_db.php';
connect_server();
$titulo = $contenido = $categoria = $imagen = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];
  }
  if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
  }
  if (isset($_POST['contenido'])) {
    $contenido = $_POST['contenido'];
  }
  if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
  }
  $imagen = "./img/default.jpg";
  if (isset($_FILES["imagen"])) {
    $imagePath = "./img/" . $_FILES["imagen"]["name"];
    if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagePath)) {
      $mensaje = "ERROR: No se ha subido la noticia <a href='index.php'>Volver</a>";
      echo $mensaje;
      exit;
    }
    $imagen = $imagePath;
  }
}

$query = "INSERT INTO noticia SET titulo='$titulo',contenido='$contenido',categoria='$categoria',imagen='$imagen',id_usuario='$id_usuario'";
query($query);
header("Location:profile.php?close='true'");