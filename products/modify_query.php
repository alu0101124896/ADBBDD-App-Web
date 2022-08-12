<!--
  @file products/modify_query.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to make the modification of the existing product of the database.
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
  if ($_POST['nombre'] == "") {
    die('Error: El nombre del producto no puede ser nulo');
  } else {
    $nombre = "'" . $_POST['nombre'] . "'";
  }

  if ($_POST['familia'] == "") {
    $familia = "NULL";
  } else {
    $familia = "'" . $_POST['familia'] . "'";
  }

  if ($_POST['descripcion'] == "") {
    $descripcion = "NULL";
  } else {
    $descripcion = "'" . $_POST['descripcion'] . "'";
  }

  if ($_POST['dimensiones'] == "") {
    $dimensiones = "NULL";
  } else {
    $dimensiones = "'" . $_POST['dimensiones'] . "'";
  }

  if ($_POST['peso'] == "") {
    $peso = "NULL";
  } else {
    $peso = "'" . $_POST['peso'] . "'";
  }

  if ($_POST['volumen'] == "") {
    $volumen = "NULL";
  } else {
    $volumen = "'" . $_POST['volumen'] . "'";
  }

  if ($_POST['stock'] == "") {
    die('Error: El precio del producto no puede ser nulo');
  } else {
    $stock = "'" . $_POST['stock'] . "'";
  }

  if ($_POST['pvp'] == "") {
    die('Error: El stock del producto no puede ser nulo');
  } else {
    $pvp = "'" . $_POST['pvp'] . "'";
  }

  if (isset($_FILES['imagen']) and $_FILES['imagen']['tmp_name'] != "") {
    $imagen = "'" . addslashes(file_get_contents($_FILES['imagen']['tmp_name'])) . "'";

    $query = "UPDATE producto SET
                  nombre = {$nombre},
                  familia = {$familia},
                  descripcion = {$descripcion},
                  dimensiones = {$dimensiones},
                  peso = {$peso},
                  volumen = {$volumen},
                  stock = {$stock},
                  pvp = {$pvp},
                  imagen = {$imagen}
                WHERE id = '" . $_POST['id'] . "';";
  } else {
    $query = "UPDATE producto SET
                  nombre = {$nombre},
                  familia = {$familia},
                  descripcion = {$descripcion},
                  dimensiones = {$dimensiones},
                  peso = {$peso},
                  volumen = {$volumen},
                  stock = {$stock},
                  pvp = {$pvp}
                WHERE id = '" . $_POST['id'] . "';";
  }

  $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
  mysqli_query($db, $query) or die('Error al modificar');

  echo '<h1>Modificación realizada con éxito.</h1>';

  mysqli_close($db);
  ?>

</body>

</html>
