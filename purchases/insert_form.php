<!--
  @file purchases/insert_form.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script with a form to insert a new purchase into the database.
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

  <h1>Insertar nueva compra:</h1>

  <form action="./insert_query.php" method="post">
    <fieldset>
      <legend id="legend"> Datos de la nueva compra: </legend>

      <label for="dni">Cliente: </label>
      <select id="dni" name="dni" placeholder="Select" required="">
        <?php
          $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
          $query = "SELECT dni, nombre, apellido FROM cliente;";
          $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

          while ($row = mysqli_fetch_array($result)) {
            echo '
              <option value="' . $row['dni'] . '">' . $row['nombre'] . ' ' . $row['apellido'] . '</option>
            ';
          }

          mysqli_close($db);
        ?>
      </select>
      <br>

      <label for="id">Producto: </label>
      <select id="id" name="id" placeholder="Select" required="">
        <?php
          $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
          $query = "SELECT id, nombre, pvp FROM producto;";
          $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

          while ($row = mysqli_fetch_array($result)) {
            echo '
              <option value="' . $row['id'] . '">' . $row['nombre'] . ' (' . $row['pvp'] . ' € c/u)</option>
            ';
          }

          mysqli_close($db);
        ?>
      </select>
      <br>

      <label for="cantidad">Cantidad: </label>
      <input type="number" id="cantidad" name="cantidad" min="1" max="5" value="1" required="">
      <br>

      <input type="submit" name="submit" class="button" value="Insertar">
    </fieldset>
  </form>
</body>

</html>
