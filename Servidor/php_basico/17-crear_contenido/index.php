<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crea tu documento</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form action="index.php" method="post" class="formulario">
      <h2 class="titulo">Crea tu post</h2>
      <div class="campo">
        <label for="name">name:</label>
        <input type="text" id="name" name="name" placeholder="Ingresa tu nombre">
      </div>
      <div class="campo">
        <label for="title">Titulo del post:</label>
        <input type="text" id="postTitle" name="postTitle" placeholder="Ingresa el titulo del post">
      </div>
      <div class="campo">
        <label for="post">Contenido de tu post:</label>
        <textarea id="postContent" name="postContent" placeholder="Escribe el contenido de tu post"></textarea>
      </div>
      <button type="submit" class="boton">Enviar</button>
    </form>
  </div>

  <?php
  $nameErr = $postTitleErr = $postContentErr = "";
  $name = $postTitle = $postContent = "";
  $postId = rand(0, 999);
  if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    http_response_code(404);
    exit;
  } else {
    if (empty($_POST["name"])) {
      $nameErr = "El nombre es requerido";
    } else {
      $name = $_POST["name"];
    }
    if (empty($_POST["postTitle"])) {
      $postTitleErr = "El titulo del post es requerido";
    } else {
      $postTitle = $_POST["postTitle"];
    }
    if (empty($_POST["postContent"])) {
      $postContentErr = "El contenido del post es requerido";
    } else {
      $postContent = $_POST["postContent"];
    }
    $namePost = "post$postId.txt";
    $newFile = fopen($namePost, "a");
    fwrite($newFile, "<header><h1>$postTitle</h1></header><main><p>$postContent</p></main><footer><p>By: $name</p></footer>");
    fclose($newFile);
    if (!file_exists($namePost)) {
      echo "Error al crear el archivo";
    }else{
      readfile($namePost);
    }

  }

  ?>
</body>

</html>