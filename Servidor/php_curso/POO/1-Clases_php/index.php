<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  class Saludo
  {
    const SALUDO_INICIAL = "Hola Friki de PHP";
  }
  class Movil
  {
    #variables privadas

    private $brand;
    private $model;
    private $year;
    private $price;

    #variables públicas
    /* public $brand;
    public $model;
    public $year;
    public $price;
*/
    #usando el constructor
    /* function __construct($brand, $model, $year, $price)
    {
      $this->brand = $brand;
      $this->model = $model;
      $this->year = $year;
      $this->price = $price;
    }*/

    #usando un getter
    function get_brand()
    {
      return $this->brand;
    }

    function get_model()
    {
      return $this->model;
    }

    function get_year()
    {
      return $this->year;
    }

    function get_price()
    {
      return $this->price;
    }

    protected function get_info()
    {
      return "brand = $this->brand, model = $this->model, year = $this->year, price = $this->price";
    }
  }

  class Smartphone extends Movil
  {
  }

  $moviles = array(
    new Movil('Samsung', 'Galaxy S23 Ultra', 2024, 1259),
    new Movil('Apple', 'iPhone 15 Pro Max', 2024, 1443),
    new Movil('Xiaomi', '13 Pro', 2024, 999),
    new Movil('Oppo', 'Find X6 Pro', 2024, 1199),
    new Movil('Motorola', 'Edge 40 Pro', 2024, 799),
  )

  ?>


  <div class="container">
    <h1>Lista de móviles</h1>
    <?php
    echo Saludo::SALUDO_INICIAL;
    ?>
    <table>
      <thead>
        <tr>
          <th>Brand</th>
          <th>Model</th>
          <th>Year</th>
          <th>Price</th>
        </tr>
      </thead>
      <!-- <tbody>
        
        Usando variables publicas y el constructor
        <?php //foreach ($moviles as $movil) : 
        ?>
          <tr>
            <td><?php echo $movil->brand; ?></td>
            <td><?php echo $movil->model; ?></td>
            <td><?php echo $movil->year; ?></td>
            <td><?php echo $movil->price; ?> €</td>
          </tr>
        <?php //endforeach; 
        ?>

      </tbody> -->

      <tbody>

        <!-- Usando variables privadas y metodo get -->
        <?php foreach ($moviles as $movil) : ?>
          <tr>
            <td><?php echo $movil->get_brand('Samsung'); ?></td>
            <td><?php echo $movil->get_model(); ?></td>
            <td><?php echo $movil->get_year(); ?></td>
            <td><?php echo $movil->get_price(); ?> €</td>
          </tr>
        <?php endforeach; ?>
      </tbody>

      <?php
      $movil = new Movil();
     echo $movil->get_brand('xiaomi');
      //echo $movil->get_info()#no se puede acceder a una metodo protegido desde fuera de la clase, sino desde dentro de la clase


      ?>

      


      </tbody>
    </table>
  </div>
</body>

</html>