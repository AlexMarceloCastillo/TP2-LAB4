<?php
require 'vendor/autoload.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
  <div class="container d-flex justify-content-center mt-5">
    <form class="migrar" action="tp2.php" method="post">
      <h4>GUARDAR PAISES EN MONGO DB</h4>
      <button class="btn btn-primary" type="submit" name="button">MIGRAR PAISES</button>
    </form>
  </div>
  <div class="">
    <ul>
      <li> <button class="btn btn-primary mt-2" type="button" name="button"><a href="tp2.php?method=1" style="color:inherit;">Ver todos los PAISES</a></button>   </li>
      <li> <button class="btn btn-info mt-2" type="button" name="button"><a href="tp2.php?method=2" style="color:inherit;">Ver PAISES con region de America</a></button>   </li>
      <li> <button class="btn btn-secondary mt-2" type="button" name="button"><a href="tp2.php?method=3" style="color:inherit;">Ver PAISES con poblacion mayor a 100000000 y con region de America</a></button>   </li>
      <li> <button class="btn btn-warning mt-2" type="button" name="button"><a href="tp2.php?method=4" style="color:inherit;">Ver PAISES con region distinta de AFFIRCA</a></button>   </li>
      <li> <button class="btn btn-light mt-2" type="button" name="button"><a href="tp2.php?method=5" style="color:inherit;">Cambiar nombre de EGYPT a EGIPTO y agregar poblacion 95000000</a></button>   </li>
      <li> <button class="btn btn-dark mt-2" type="button" name="button"><a href="tp2.php?method=6" style="color:inherit;">Eliminar PAIS con el codigo 258</a></button>   </li>
      <li> <button class="btn btn-success mt-2" type="button" name="button"><a href="tp2.php?method=7" style="color:inherit;">PAISES con población mayor a 50000000 y menor a 150000000</a></button>   </li>
      <li> <button class="btn btn-danger mt-2" type="button" name="button"><a href="tp2.php?method=8" style="color:inherit;">Ordenar los paises de forma ascendente</a></button>   </li>
    </ul>
  </div>
  <div class="container">

    <table class="table  mt-5">
      <thead>
        <tr>
          <th scope="col">Codigo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Capital</th>
          <th scope="col">Region</th>
          <th scope="col">Poblacion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($result as $key=>$value): ?>
          <tr>
            <td><?= $value->codigoPais; ?></td>
            <td><?= $value->nombrePais; ?></td>
            <td><?= $value->capitalPais; ?></td>
            <td><?= $value->region; ?></td>
            <td><?= $value->poblacion; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>

<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
