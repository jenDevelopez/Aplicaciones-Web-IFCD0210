<?php
require '../utils_db.php';


if($_SERVER['REQUEST_METHOD' === 'OPTIONS']){
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Method: POST,GET,DELETE,PUT,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers:token,Content-Type');
  header('Access-Control-Max-Age: 1728000');
  header('Content-Length: 0');
  header('Content-Type: text/plain');
  die();
}

connect_server();

$q = "SELECT noticia.*,usuarios.nombre FROM noticia INNER JOIN usuarios ON noticia.id_usuario = usuarios.id";
$result = query($q);
$data = array();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
foreach($result as $row){
  $data[] = $row;
}

$data = json_encode($data, JSON_PRETTY_PRINT);

echo $data;