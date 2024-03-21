<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enviar archivos</title>
  <style>
    body{
      width: 100%;
      height: 100vh;
      display: grid;
      place-items: center;
  
    }
    form{
      width: 50%;
      height: 50vh;
      margin-inline: auto;
      display: grid;
      place-items: center;
      gap: 1rem;
      background-color: #ddd;
      border-radius: 5px;
      border: none;
      box-shadow: 5px 5px 10px #ccc;
    }
  </style>
</head>
<body>
  <form action="index.php" method="post" enctype="multipart/form-data">
    <label for="input-file">Añade tu imagen</label>
    <input type="file" name="file" id="input-file">
    <input type="submit" value="Enviar imagen" name="submit">
  </form>
  <?php
    if(isset($_FILES['file'])){
      $imageName = $_FILES['file']['name'];
    }
    if(!move_uploaded_file($_FILES['file']['tmp_name'],'./imagenes/'. $imageName)){
      echo "Error al subir la imagen";
    }else{
      echo "Imagen subida correctamente";
    }
  ?>
</body>
</html>