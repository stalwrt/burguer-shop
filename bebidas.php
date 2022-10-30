<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/CSS/style.css">
</head>

<body>
    <?php
    include_once('Templates/menu.php');
    ?>

    <main>
        <?php
        $response = json_decode(file_get_contents('http://localhost/burger_shop/api/productos/api-producto.php?categoria=bebidas'), true);

        if ($response['statuscode'] == 200) {
            foreach ($response['items'] as $item) {
                include('Templates/items.php');
            }
        } else {
            // mostrar error
        }
        ?>
    </main>

</body>

</html>