<?php
function connect_server($host, $user, $password)
{
  $connection = mysqli_connect($host, $user, $password);
  if (!$connection) {
    throw new Exception("Failed to connect to MySQL server: " . mysqli_connect_error());
  }
  return $connection;
}

function connect_db($connection, $db)
{
  if (!mysqli_select_db($connection, $db)) {
    throw new Exception("Failed to select database: " . mysqli_error($connection));
  }
  return $connection;
}

function result_query($connection, $query)
{
  $result = mysqli_query($connection, $query);
  if (!$result) {
    throw new Exception("" . mysqli_error($connection));
  }
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