<?php
#parseo las credenciales
$credentials = parse_credentials("../php.ini");
$host = $credentials[0];
$user = $credentials[1];
$password = $credentials[2];

# Conexión
$conexion = connect_server($host, $user, $password);


$database = "noticias";
connect_db($conexion, $database);

$titulo = $contenido = $categoria = $imagen = '';

$id = $_GET["id"];

$q = "SELECT * FROM noticia WHERE id='$id'";
$result = mysqli_query($conexion, $q);

if (!$result) {
  die("Error al obtener la noticia: " . mysqli_error($conexion));
}

$row = mysqli_fetch_array($result);

$titulo = $row['titulo'];
$contenido = $row['contenido'];
$categoria = $row["categoria"];
$imagen = $row["imagen"];

echo "$titulo-$categoria";

if ($_SERVER["REQUEST_METHOD"] != 'POST') {
  echo "Error";
  exit;
}

if (!isset($_POST["id"])) {
  echo "No hay id";
  exit;
}

if (isset($_POST["titulo"]) && $_POST["titulo"] !== '') {
  $titulo = $_POST['titulo'];
}

if (isset($_POST["contenido"]) && $_POST["contenido"] !== '') {
  $contenido = $_POST['contenido'];
}

if (isset($_POST["categoria"]) && $_POST["categoria"] !== '') {
  $categoria = $_POST['categoria'];
}

if (isset($_POST["imagen"]) && $_POST["imagen"] !== '') {
  $imagen = $_POST['imagen'];
}

$q = "UPDATE noticia SET titulo='$titulo', contenido='$contenido', categoria='$categoria', imagen='$imagen' WHERE id='$id'";

$result = mysqli_query($conexion, $q);

if (!$result) {
  $mensaje = "Error al actualizar la noticia";
} else {
  $mensaje = "Noticia actualizada correctamente";
}

$referer = $_SERVER["HTTP_REFERER"];

header("Location: $referer", true, 303);

exit;
