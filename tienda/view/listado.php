<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    tbody > tr:hover{
      cursor: pointer;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-center">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./listado.php">Ver productos</a>
      </li>
    </ul>
  </nav>
  <main class="container my-5">
    <article class="d-flex gap-2 mb-5">
      <button class="btn btn-secondary">Agregar</button>
      <button class="btn btn-secondary">Actualizar</button>
      <button class="btn btn-secondary">Borrar</button>
    </article>
    <article  class="row">
      <section id="tabla" class="col-lg-4">
        <h4>Listado de productos</h4>
        <div class="">
          <table class="table table-hover">
            <thead>
              <th>Id</th>
              <th>Nombre</th>
            </thead>
            <tbody id="showProductData">
              <form id="formtbody" action="http://localhost/php/public/enrutado.php" method="POST">
                <?php
                  header('Access-Control-Allow-Origin: *');
                  header('Access-Control-Allow-Methods: "GET, PUT, POST, DELETE, HEAD"');
                  date_default_timezone_set('Atlantic/Canary');
                  
                  require "../public/enrutado.php";

                  foreach ($data as $info) {
                    echo "<tr><td>" . $info["id"] . "</td>"
                      . "<td>" . $info["nombre"] . "</td>"
                      . "</tr>";
                  }
                  
                ?>
                <input type="hidden" name="controlador" value="producto">
                <input type="hidden" name="accion" value="getProduct">
                <input type="hidden" name="id" value="" id="selectedRow">
                
              </form>
              
            </tbody>
          </table>
        </div>
      </section>
      <section class="col-lg-2"></section>
      <section id="mostrarElemento" class="col-lg-6"></section>
    </article>
    <article id="mostrarDetalle"></article>

  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script src="../public/listado.js"></script>
</body>

</html>
