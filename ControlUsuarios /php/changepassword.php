<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: http://localhost:3000/ControlUsuarios%20/index.html');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" type="text/css" href="css/styles.css" />

    <title>Control de Usuarios</title>
  </head>
  <body>
    <div class="container-fluid mx-0 px-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-0">
        <a class="navbar-brand" href="#">Control de Usuarios</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Inicio <span class="sr-only">(current)</span></a
              >
            </li>
          </ul>
          <div class="nav justify-content-end">
            <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
        <a class="nav-link" href="#">Cambiar contraseña <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Salir</a>
        </li>
    </ul>
    </div>
        </div>
      </nav>
      <div class="card" style="width: 50%;">
  <div class="card-body">
  <form action="newpassword.php" method="POST">
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña actual</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="actualpassword">
    <label for="exampleInputPassword2">Nueva contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="newpassword">
  </div>
  <button type="submit" class="btn btn-primary">Aceptar</button>
</form>
  </div>
</div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
