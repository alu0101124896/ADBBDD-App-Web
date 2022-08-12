<!--
  @file purchases/index.php
  @author Sergio Tabares Hernández <alu0101124896@ull.edu.es>
  @since Winter 2021-2022
  @summary University of La Laguna - Computer Science - Data Bases Desing and Management
  @description PHP script to list all purchases stored on the database.
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

  <h1>Compras:</h1>

  <button class="insert_button" onclick="window.location.href='./insert_form.php'">Insertar nueva compra</button>
  <br>
  <br>

  <table>
    <tr>
      <th>ID</th>
      <th>Cliente</th>
      <th>Producto</th>
      <th>Precio</th>
    </tr>

    <?php
    $db = mysqli_connect('fdb32.awardspace.net', '3995299_db', 'NJW9gEjqan9iLJQ', '3995299_db') or die('Error al conectar al servidor MySQL.');
    $query = "SELECT cliente.dni AS cliente_dni, cliente.nombre AS cliente_nombre, cliente.apellido AS cliente_apellido,
                     producto.id AS producto_id, producto.nombre AS producto_nombre, producto.pvp AS producto_pvp,
                     compra.id AS compra_id, compra.cantidad AS compra_cantidad
                FROM compra
                INNER JOIN cliente ON compra.cliente_dni = cliente.dni
                INNER JOIN producto ON compra.producto_id = producto.id";
    $result = mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

    while ($row = mysqli_fetch_array($result)) {
      $precio_final = (int) $row['compra_cantidad'] * (float) $row['producto_pvp'];
      echo '
        <tr>
          <td>' . $row['compra_id'] . '</td>
          <td><a href="../clients/view_info.php?dni=' . $row['cliente_dni'] . '">' . $row['cliente_nombre'] . ' ' . $row['cliente_apellido'] . '</a></td>
          <td><a href="../products/view_info.php?id=' . $row['producto_id'] . '">' . $row['producto_nombre'] . '</a></td>
          <td>' . $precio_final . ' € (' . $row['compra_cantidad'] . ' x ' . $row['producto_pvp'] . ' €) </td>
        </tr>
      ';
    }

    mysqli_close($db);
    ?>
  </table>
</body>

</html>
