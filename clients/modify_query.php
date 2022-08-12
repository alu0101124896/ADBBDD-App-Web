<!--
  @file clients/modify_query.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to make the modification of the existing client of the database.
-->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Tabares Hernández, Sergio</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <a href="../index.html">Página principal</a>
  -
  <a href="../clients/index.php">Clientes</a>
  -
  <a href="../products/index.php">Productos</a>
  -
  <a href="../purchases/index.php">Compras</a>

  <br>

  <?php
  if ($_POST['nombre'] == ""){
    die('Error: El nombre no puede ser nulo');
  } else {
    $nombre = "'" . $_POST['nombre'] . "'";
  }

  if ($_POST['apellido'] == ""){
    $apellido = "NULL";
  } else {
    $apellido = "'" . $_POST['apellido'] . "'";
  }

  if ($_POST['email'] == ""){
    die('Error: El email no puede ser nulo');
  } else {
    $email = "'" . $_POST['email'] . "'";
  }

  if ($_POST['telefono'] == ""){
    $telefono = "NULL";
  } else {
    $telefono = "'" . $_POST['telefono'] . "'";
  }

  if ($_POST['direccion_postal'] == ""){
    $direccion_postal = "NULL";
  } else {
    $direccion_postal = "'" . $_POST['direccion_postal'] . "'";
  }

  if ($_POST['codigo_postal'] == ""){
    $codigo_postal = "NULL";
  } else {
    $codigo_postal = "'" . $_POST['codigo_postal'] . "'";
  }

  $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');

  $query = "UPDATE cliente SET
                nombre = {$nombre},
                apellido = {$apellido},
                email = {$email},
                telefono = {$telefono},
                direccion_postal = {$direccion_postal},
                codigo_postal = {$codigo_postal}
              WHERE dni LIKE '" . $_POST['dni'] . "';";

  mysqli_query($db, $query) or die('Error al modificar');

  echo '<h1>Modificación realizada con éxito.</h1>';

  mysqli_close($db);
  ?>

</body>

</html>
