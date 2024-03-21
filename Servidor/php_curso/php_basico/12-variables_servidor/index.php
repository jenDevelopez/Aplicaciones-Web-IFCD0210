<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variables del Servidor</title>
  <style>
    .container {
      width: 100%;
    }

    .row {
      width: 100%;
      height: 3rem;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      padding-bottom: 1rem;
    }
   
  </style>
</head>

<body>
  <?php

  $infoServer = array(
    'PHP_SELF' => ' //Devuelve el nombre del archivo actual',
    'GATEWAY_INTERFACE' => ' //Devuelve la interfaz de pasarela de la máquina',
    'SERVER_ADDR' => ' //Devuelve la dirección IP del servidor web',
    'SERVER_NAME' => ' //Devuelve el nombre del servidor',
    'SERVER_SOFTWARE' => ' //Devuelve la cadena de identificación del servidor',
    'SERVER_PROTOCOL' => ' //Devuelve el nombre y la revisión del protocolo de información',
    'REQUEST_METHOD',
    'REQUEST_TIME' => ' //Devuelve la marca de tiempo del inicio de la solicitud',
    'QUERY_STRING' => ' //Devuelve la cadena de consulta si se accede a la página mediante una cadena de consulta',
    'HTTP_ACCEPT' => ' //Devuelve el encabezado Accept de la solicitud actual.',
    'HTTP_ACCEPT_CHARSET' => ' //Devuelve el encabezado Accept_Charset de la solicitud actual',
    'HTTP_HOST' => ' //Devuelve el nombre del servidor web',
    'HTTP_REFERER' => ' //Devuelve la dirección URL del sitio web anterior',
    'HTTP_USER_AGENT' => ' //Devuelve la cadena del agente de usuario',
    'HTTPS' => ' //Se consulta el script a través de un protocolo HTTP seguro',
    'REMOTE_ADDR' => ' //Returns the IP address from where the user is viewing the current page',
    'REMOTE_HOST' => ' //Devuelve el nombre del host desde donde el usuario está viendo la página actual',
    'REMOTE_PORT' => ' //Devuelve el puerto que se utiliza en la máquina del usuario para comunicarse con el servidor web',
    'SCRIPT_FILENAME' => ' //Devuelve la ruta absoluta del script que se está ejecutando actualmente',
    'SERVER_ADMIN' => ' //Devuelve el valor dado a la directiva SERVER_ADMIN en el archivo de configuración del servidor web (si su script se ejecuta en un host virtual, será el valor definido para ese host virtual)',
    'SERVER_PORT' => ' //Devuelve el puerto en la máquina del servidor que utiliza el servidor web para la comunicación.',
    'SERVER_SIGNATURE' => ' //Devuelve la versión del servidor y el nombre del host virtual que se agregan a las páginas generadas por el servidor.',
    'PATH_TRANSLATED' => ' //Devuelve la ruta basada en el sistema de archivos al script actual',
    'SCRIPT_NAME' => ' //Devuelve el nombre del archivo actual',
    'SCRIPT_URI' => ' //Devuelve la dirección URL del script actual',
  );
  ?>
  <div class="container">
    <div class="row">
      <h2>Variable</h2>
      <h2>Resultado</h2>
      <h2>Descripcion</h2>
    </div>
    <hr>

    <?php
    $name = '$_SERVER';
    foreach ($infoServer as $key => $value) {
      echo "
      <div class='row'>
        <p>$key</p>
        <p>$_SERVER[$key]</p>
        <p>$value</p>
      </div>
      ";
      echo "<hr>";
    }
    ?>

  </div>
</body>

</html>