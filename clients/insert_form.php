<!--
  @file clients/insert_form.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script with a form to insert a new client into the database.
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

  <h1>Insertar nuevo cliente:</h1>

  <?php
  $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
  $query = "SELECT * FROM cliente WHERE deleted = 0;";
  $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

  $row = mysqli_fetch_array($result);
  echo '
    <form action="./insert_query.php" method="post">
      <fieldset>
        <legend id="legend"> Datos del nuevo cliente: </legend>

        <label for="dni">DNI: </label>
        <input type="text" id="dni" name="dni" placeholder="' . $row['dni'] . '" required="">
        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" placeholder="' . $row['nombre'] . '" required="">
        <br>
        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" placeholder="' . $row['apellido'] . '">
        <br>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" placeholder="' . $row['email'] . '" required="">
        <br>
        <label for="telefono">Teléfono: </label>
        <input type="number" id="telefono" name="telefono" placeholder="' . $row['telefono'] . '">
        <br>
        <label for="direccion_postal">Dirección Postal: </label>
        <input type="text" id="direccion_postal" name="direccion_postal" placeholder="' . $row['direccion_postal'] . '">
        <br>
        <label for="codigo_postal">Código Postal: </label>
        <input type="number" id="codigo_postal" name="codigo_postal" placeholder="' . $row['codigo_postal'] . '">
        <br>

        <input type="submit" name="submit" class="button" value="Insertar">
      </fieldset>
    </form>
  ';

  mysqli_close($db);
  ?>
</body>

</html>
