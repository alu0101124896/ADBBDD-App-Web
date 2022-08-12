<!--
  @file purchases/insert_query.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to make the insert of the new client into the database.
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
  if ($_POST['dni'] == "") {
    die('Error: El cliente no puede ser nulo');
  } else {
    $dni = "'" . $_POST['dni'] . "'";
  }

  if ($_POST['id'] == "") {
    die('Error: El producto no puede ser nulo');
  } else {
    $id = "'" . $_POST['id'] . "'";
  }

  if ($_POST['cantidad'] == "") {
    die('Error: La cantidad de productos no puede ser nula');
  } else {
    $cantidad = (int) $_POST['cantidad'];
  }

  $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');

  $query = "SELECT stock FROM producto WHERE id = {$id}";
  $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos');

  $row = mysqli_fetch_array($result);
  $stock = (int) $row['stock'];
  if ($stock < $cantidad) {
    die('Error: La cantidad de productos deseados supera el stock disponible');
  } else {
    $query = "UPDATE producto SET stock = '" . ($stock - $cantidad) . "' WHERE id = {$id};";
    mysqli_query($db, $query) or die('Error al actualizar el stock');

    $query = "INSERT INTO compra (cliente_dni, producto_id, cantidad) VALUES ({$dni}, {$id}, '{$cantidad}');";
    mysqli_query($db, $query) or die('Error al insertar la compra');

    echo '<h1>Inserción realizada con éxito.</h1>';
  }

  mysqli_close($db);
  ?>

</body>

</html>
