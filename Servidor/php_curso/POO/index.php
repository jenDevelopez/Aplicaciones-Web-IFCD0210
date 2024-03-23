<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curso de Aplicaciones con tecnologias web IFCD0210 | Ejercicios</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
  <div class="container">
    <h1>Ejercicios de Jennifer</h1>
    <h2>Listado de ejercicios</h2>  
    <?php 
     $ejercicios = array(
     "clases php"=> "1-Clases_php/index.php",
     "card avatar"=> "2-Card_avatar/index.php",
     );
    ?>  
    <ol>

     <?php 
        foreach ($ejercicios as $key => $value) {
          echo "<li><a target='_blank' href='./$value'>$key</a></li>";
        }
      ?>
    </ol>
  </div>
</body>
</html>