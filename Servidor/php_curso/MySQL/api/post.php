<?php
ini_set('display_errors0', 1);
require '../utils_db.php';

connect_server();

if(!isset($_GET['id'])){
  http_response_code(400);
  echo "Error: faltan parametros requeridos";
  exit();
}

$id = $_GET["id"];



$q = "SELECT * FROM noticia WHERE id='$id'";
$result = query($q);
$data = array();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
foreach($result as $row){
  $data[] = $row;
}

$data = json_encode($data, JSON_PRETTY_PRINT);

echo $data;
exit;