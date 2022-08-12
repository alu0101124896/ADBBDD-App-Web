<!--
  @file clients/index.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to list all clients stored on the database.
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

  <h1>Clientes:</h1>

  <button class="insert_button" onclick="window.location.href='./insert_form.php'">
    Insertar nuevo cliente
  </button>
  <br>
  <br>

  <table>
    <tr>
      <th>DNI</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>E-mail</th>
      <th>Teléfono</th>
      <th>Opciones</th>
    </tr>

    <?php
    $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
    $query = "SELECT * FROM cliente WHERE deleted = 0;";
    $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

    while ($row = mysqli_fetch_array($result)) {
      echo '
        <tr>
          <td>' . $row['dni'] . '</td>
          <td>' . $row['nombre'] . '</td>
          <td>' . $row['apellido'] . '</td>
          <td>' . $row['email'] . '</td>
          <td>' . $row['telefono'] . '</td>
          <td>
            <a href="./view_info.php?dni=' . $row['dni'] . '">Detalles</a>
            -
            <a href="./modify_form.php?dni=' . $row['dni'] . '">Editar</a>
            -
            <a href="./delete_query.php?dni=' . $row['dni'] . '">Borrar</a>
          </td>
        </tr>
      ';
    }

    mysqli_close($db);
    ?>
  </table>
</body>

</html>
