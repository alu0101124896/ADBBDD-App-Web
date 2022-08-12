<!--
  @file products/view_info.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to view all the information of an existing product of the database.
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
  $query = "SELECT * FROM producto WHERE id LIKE '" . $_GET['id'] . "';";
  $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

  $row = mysqli_fetch_array($result);
  if (!$row['deleted']) {
    echo '
      <h1>' . $row['nombre'] . '</h1>
      <h2>ID: ' . $row['id'] . '</h2>
      <h2>Familia: ' . $row['familia'] . '</h2>
      <h2>Descripición: ' . $row['descripcion'] . '</h2>
      <h2>Dimensiones (WxHxD en cm): ' . $row['dimensiones'] . '</h2>
      <h2>Peso (en Kg): ' . $row['peso'] . '</h2>
      <h2>Volumen (en L): ' . $row['volumen'] . '</h2>
      <h2>Stock: ' . $row['stock'] . '</h2>
      <h2>PVP (en €): ' . $row['pvp'] . '</h2>
      <h2>Imagen:</h2>
      <img src="data:image/png;base64,' . base64_encode($row['imagen']) . '" alt="Image Not Found" height="300">
    ';
  } else {
    echo 'Error: El producto ya no está disponible';
  }

  mysqli_close($db);
  ?>
</body>

</html>
