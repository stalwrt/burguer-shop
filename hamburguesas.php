<?php
//* CÓDIGO PARA VER PRODUCTOS 
require 'Lib/Connection/database.php';

$db = new DB();
$con = $db->connect();

// No trae a la descripcion porque esa se llamará en los detalles del producto 
$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE categoria='hamburguesas'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); // Llama a todos los productos que estén en está tabla
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bistro Online | Hamburguesas</title>
    <link rel="stylesheet" href="Assets/CSS/style.css">
</head>

<body>
    <?php
    include_once('Templates/menu.php');
    ?>

    <main>

        <!-- CATALOGOS DE PRODUCTOS  -->

        <div class="card-container">
            <h2>Hamburguesas</h2>
            <br>
            <?php
            foreach ($resultado as $row) {
            ?>
                <div class="card">
                    <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
                    <div class="imagen">
                        <img src="">
                    </div>
                    <div class="contenido">
                        <h3><?php echo $row['nombre']; ?></h3>
                        <span>$<?php echo $row['precio']; ?> MXN</span>
                        <br>
                        <button class="btn-add">Agregar al carrito</button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

    <?php include_once('Templates/footer.php'); ?>
    <script src="Assets/JS/main.js"></script>

</body>

</html>