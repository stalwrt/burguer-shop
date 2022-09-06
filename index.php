<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Shop | Inicio</title>

    <!-- conexion con la hoja de estilos -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- fuente para titulos -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans&display=swap');
    </style>

    <!-- fuente para textos -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@200&display=swap');
    </style>

    <!-- link para iconos  -->
    <script src="https://kit.fontawesome.com/200d0d3726.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <nav class="navegacion">
            <a href="/burguershop">
                <div class="logo">
                    <i class="fa-solid fa-burger"></i>
                </div>
            </a>
            

            <!-- icono de inicio -->
            <a href="/burguershop">
                <div class="iconos">
                    <i class="fa-solid fa-house"></i>
                </div>
            </a> 

            <!-- icono de productos -->
            <a href="">
                <div class="iconos">
                    <i class="fa-solid fa-pizza-slice"></i>
                </div>
            </a>

            <!-- icono de usuario -->
            <a href="sesion.php">
                <div class="iconos">
                    <i class="fa-regular fa-user"></i>
                </div>
            </a>
        </nav>
    </header>

    <div class="contenedor-principal">

        <div class="producto">
            <a href="#">
                <h2>Producto</h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam autem temporibus quibusdam officia ipsa aut id delectus atque, itaque maiores.
            </p>
            <p>$56.00</p>
            </a>
        </div>

        <div class="producto">
            <a href="#">
                <h2>Producto</h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam autem temporibus quibusdam officia ipsa aut id delectus atque, itaque maiores.
            </p>
            <p>$56.00</p>
            </a>
        </div>

        <div class="producto">
            <a href="#">
                <h2>Producto</h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam autem temporibus quibusdam officia ipsa aut id delectus atque, itaque maiores.
            </p>
            <p>$56.00</p>
            </a>
        </div>

        <div class="producto">
            <a href="#">
                <h2>Producto</h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam autem temporibus quibusdam officia ipsa aut id delectus atque, itaque maiores.
            </p>
            <p>$56.00</p>
            </a>
        </div>

    </div>

    <?php
    require 'views/footer.php'
    ?>
</body>
</html>