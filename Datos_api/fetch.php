<?php
//curl desde php
$url = 'https://jsonplaceholder.typicode.com/posts';
$data = array(
  'title'=> 'Titulo',
  'body'=> 'body',
  'userId'=> '1',
);
$options = array(
  'http' => array(
    'header'=> "Content-Type: application/json\r\n",
    "method"=> "POST",
    'content' => json_encode($data)
  )
  );
$context = stream_context_create($options);
$result = file_get_contents($url, false,$context);
if($result === false){
  echo "Error al realizar la solicitud";
}else{
  echo "Solicitud exitosa";
  echo $result;
}