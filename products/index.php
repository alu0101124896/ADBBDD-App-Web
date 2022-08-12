<!--
  @file products/index.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to list all products stored on the database.
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

  <h1>Productos:</h1>

  <button class="insert_button" onclick="window.location.href='./insert_form.php'">
    Insertar nuevo producto
  </button>
  <br>
  <br>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Familia</th>
      <th>Descripción</th>
      <th>Stock</th>
      <th>PVP</th>
      <th>Imagen</th>
      <th>Opciones</th>
    </tr>
    <?php
    $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
    $query = "SELECT * FROM producto WHERE deleted = 0;";
    $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

    while ($row = mysqli_fetch_array($result)) {
      echo '
        <tr>
          <td>' . $row['id'] . '</td>
          <td>' . $row['nombre'] . '</td>
          <td>' . $row['familia'] . '</td>
          <td>' . $row['descripcion'] . '</td>
          <td>' . $row['stock'] . ' u</td>
          <td>' . $row['pvp'] . ' €</td>
          <td>
            <img src="data:image/png;base64,' . base64_encode($row['imagen']) . '" alt="Image Not Available" height="100">
          </td>
          <td>
            <a href="./view_info.php?id=' . $row['id'] . '">Detalles</a>
            -
            <a href="./modify_form.php?id=' . $row['id'] . '">Editar</a>
            -
            <a href="./delete_query.php?id=' . $row['id'] . '">Borrar</a>
          </td>
        </tr>
      ';
    }

    mysqli_close($db);
    ?>
  </table>
</body>

</html>
