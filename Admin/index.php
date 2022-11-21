<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro?, se eliminarán los datos de la base de datos');
        }
    </script>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php

    include("Connection/db.php");

    $sql = "SELECT *  FROM productos";
    $resultado = mysqli_query($mysqli, $sql);
    ?>

    <div class="caja">
        <h1>Lista de productos</h1>

        <a href="agregar.php" id="nuevo">Nuevo producto</a>

        <br>
        <br>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $filas['id'] ?></td>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['descripcion'] ?></td>
                        <td><?php echo $filas['precio'] ?></td>
                        <td><?php echo $filas['categoria'] ?></td>
                        <td>
                            <?php echo "<a href='editar.php?id=" . $filas['id'] . "'>EDITAR</a>"; ?>
                            -
                            <?php echo "<a href='eliminar.php?id=" . $filas['id'] . "' onclick='return confirmar()'>ELIMINAR</a>"; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

    <?php
    mysqli_close($mysqli);
    ?>
</body>

</html>