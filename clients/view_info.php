<!--
  @file clients/view_info.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to view all the information of an existing client of the database.
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

  <?php
  $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
  $query = "SELECT * FROM cliente WHERE dni LIKE '" . $_GET['dni'] . "';";
  $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

  $row = mysqli_fetch_array($result);
  if (!$row['deleted']) {
    echo '
      <h1>' . $row['nombre'] . ' ' . $row['apellido'] . '</h1>
      <h2>DNI: ' . $row['dni'] . '</h2>
      <h2>Email: ' . $row['email'] . '</h2>
      <h2>Telefono: ' . $row['telefono'] . '</h2>
      <h2>Dirección Postal: ' . $row['direccion_postal'] . '</h2>
      <h2>Código Postal: ' . $row['codigo_postal'] . '</h2>
    ';
  } else {
    echo 'Error: El cliente ya no está disponible';
  }

  mysqli_close($db);
  ?>
</body>

</html>
