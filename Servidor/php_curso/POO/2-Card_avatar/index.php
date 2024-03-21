<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <?php
  class Avatar
  {
    // Atributos privados
    private $nombre;
    private $email;
    private $empleo;
    private $titulacion;
    private $comentario;

    // Constructor
    function __construct($nombre, $email, $empleo, $titulacion, $comentario)
    {
      $this->nombre = $nombre;
      $this->email = $email;
      $this->empleo = $empleo;
      $this->titulacion = $titulacion;
      $this->comentario = $comentario;
    }

    // Métodos para obtener y modificar los atributos
    function get_nombre()
    {
      return $this->nombre;
    }

    function set_nombre($nombre)
    {
      $this->nombre = $nombre;
    }

    function get_email()
    {
      return $this->email;
    }

    function set_email($email)
    {
      $this->email = $email;
    }

    function get_empleo()
    {
      return $this->empleo;
    }

    function set_empleo($empleo)
    {
      $this->empleo = $empleo;
    }

    function get_titulacion()
    {
      return $this->titulacion;
    }

    function set_titulacion($titulacion)
    {
      $this->titulacion = $titulacion;
    }

    function get_comentario()
    {
      return $this->comentario;
    }

    function set_comentario($comentario)
    {
      $this->comentario = $comentario;
    }
  }


  ?>
  <div class="container">
    <div class="formulario">
      <h2>Formulario de Presentación Personal</h2>

      <div class="campo">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>

      <div class="campo">
        <label for="email">Su email:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="campo">
        <label for="empleo">Empleo:</label>
        <input type="text" id="empleo" name="empleo">
      </div>

      <div class="campo">
        <label for="titulacion">Su titulación:</label>
        <input type="text" id="titulacion" name="titulacion">
      </div>

      <div class="campo">
        <label for="comentario">Comentario sobre sí misma:</label>
        <textarea id="comentario" name="comentario"></textarea>
      </div>

      <div class="campo">
        <button class="boton">Enviar</button>
      </div>
    </div>

  </div>

  <?php
  $nombre = $email = $empleo = $titulacion = $comentario = '';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre'])) $nombre = $_POST['nombre'];
    if (isset($_POST['email'])) $email = $_POST['email'];
    if (isset($_POST['empleo'])) $empleo = $_POST['empleo'];
    if (isset($_POST['titulacion'])) $titulacion = $_POST['titulacion'];
    if ($_POST['commentario'] != '') $comentario = $_POST['comentario'];

    $persona = new Avatar($nombre, $email, $empleo, $titulacion, $comentario);
  }
  ?>

  <div class="card">
    <h2><?php echo $persona->get_nombre() ?></h2>
    <img src="avatar.png" alt="Avatar">
    <p><?php echo $persona->get_email() ?></p>
    <p><?php echo $persona->get_empleo() ?></p>
    <p><?php echo $persona->get_titulacion() ?></p>
    <p><?php echo $persona->get_comentario() ?></p>
  </div>


</body>

</html>