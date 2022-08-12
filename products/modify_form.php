<!--
  @file products/modify_form.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script with a form to modify an existing product of the database.
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

  <h1>Modificar producto:</h1>

  <?php
  $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
  $query = "SELECT * FROM producto WHERE id = '" . $_GET['id'] . "';";
  $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

  $row = mysqli_fetch_array($result);
  if (!$row['deleted']) {
    echo '
      <form action="./modify_query.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend id="legend"> Datos del producto: </legend>

          <input type="hidden" id="id" name="id" value="' . $row['id'] . '">

          <label for="nombre">Nombre: </label>
          <input type="text" id="nombre" name="nombre" placeholder="' . $row['nombre'] . '" value="' . $row['nombre'] . '" required="">
          <br>
          <label for="familia">Familia: </label>
          <input type="text" id="familia" name="familia" placeholder="' . $row['familia'] . '" value="' . $row['familia'] . '">
          <br>
          <label for="descripcion">Descripción: </label>
          <input type="text" id="descripcion" name="descripcion" placeholder="' . $row['descripcion'] . '" value="' . $row['descripcion'] . '">
          <br>
          <label for="dimensiones">Dimensiones (WxHxD en cm): </label>
          <input type="text" id="dimensiones" name="dimensiones" placeholder="' . $row['dimensiones'] . '" value="' . $row['dimensiones'] . '">
          <br>
          <label for="peso">Peso (en Kg): </label>
          <input type="number" id="peso" name="peso" step="0.01" placeholder="' . $row['peso'] . '" value="' . $row['peso'] . '">
          <br>
          <label for="volumen">Volumen (en L): </label>
          <input type="number" id="volumen" name="volumen" step="0.01" placeholder="' . $row['volumen'] . '" value="' . $row['volumen'] . '">
          <br>
          <label for="stock">Stock: </label>
          <input type="number" id="stock" name="stock" placeholder="' . $row['stock'] . '" value="' . $row['stock'] . '" required="">
          <br>
          <label for="pvp">PVP (en €): </label>
          <input type="number" id="pvp" name="pvp" step="0.01" placeholder="' . $row['pvp'] . '" value="' . $row['pvp'] . '" required="">
          <br>
          <label for="imagen">Imagen: </label>
          <input type="file" id="imagen" name="imagen">
          <br>

          <input type="submit" name="submit" class="button" value="Modificar">
        </fieldset>
      </form>
    ';
  } else {
    echo 'Error: El producto ya no está disponible';
  }

  mysqli_close($db);
  ?>

</body>

</html>
