<!--
  @file products/insert_query.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to make the insert of the new product into the database.
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
    die('Error: El nombre del producto no puede ser nulo');
  } else {
    $nombre = "'" . $_POST['nombre'] . "'";
  }

  if ($_POST['familia'] == ""){
    $familia = "NULL";
  } else {
    $familia = "'" . $_POST['familia'] . "'";
  }

  if ($_POST['descripcion'] == ""){
    $descripcion = "NULL";
  } else {
    $descripcion = "'" . $_POST['descripcion'] . "'";
  }

  if ($_POST['dimensiones'] == ""){
    $dimensiones = "NULL";
  } else {
    $dimensiones = "'" . $_POST['dimensiones'] . "'";
  }

  if ($_POST['peso'] == ""){
    $peso = "NULL";
  } else {
    $peso = "'" . $_POST['peso'] . "'";
  }

  if ($_POST['volumen'] == ""){
    $volumen = "NULL";
  } else {
    $volumen = "'" . $_POST['volumen'] . "'";
  }

  if ($_POST['stock'] == ""){
    die('Error: El stock del producto no puede ser nulo');
  } else {
    $stock = "'" . $_POST['stock'] . "'";
  }

  if ($_POST['pvp'] == ""){
    die('Error: El pvp del producto no puede ser nulo');
  } else {
    $pvp = "'" . $_POST['pvp'] . "'";
  }

  if ($_FILES['imagen']['tmp_name'] == ""){
    $imagen = "NULL";
  } else {
    $imagen = "'" . addslashes(file_get_contents($_FILES['imagen']['tmp_name'])) . "'";
  }

  $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');

  $query = "INSERT INTO producto (nombre, familia, descripcion, dimensiones, peso, volumen, stock, pvp, imagen)
              VALUES ({$nombre}, {$familia}, {$descripcion}, {$dimensiones}, {$peso}, {$volumen}, {$stock}, {$pvp}, {$imagen});";

  mysqli_query($db, $query) or die('Error al insertar el producto');

  echo '<h1>Inserción realizada con éxito.</h1>';

  mysqli_close($db);
  ?>

</body>

</html>
