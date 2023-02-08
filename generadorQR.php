<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Generar QR</title>
	<link rel="stylesheet" href="ASSETS/CSS/styleQR.css">
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
	<script defer src="Assets/JS/main.js"></script>
</head>

<body>
	<?php
	include 'Templates/menu.php'
	?>
	<div class="contenedor">
		<form action="" id="formulario" class="formulario">
			<label for="">Escribe tu nombre para recoger tu pedido</label>
			<br>
			<input type="text" id="link" placeholder="Ingresa tu nombre" />
			<button class="btn">Generar QR</button>
		</form>

		<div id="contenedorQR" class="contenedorQR"></div>
		<p><b>Tú número de pedido es el:</b>
			<?php
			function shuffle_nums($min, $max, $count)
			{
				$nums = range($min, $max);
				shuffle($nums);

				$response = array();
				for ($i = 0; $i < $count && $i < count($nums); $i++) {
					array_push($response, $nums[$i]);
				}

				$a = $response;

				return $response;
			}

			echo "<bold>";
			print_r(shuffle_nums(10, 150, 1));
			echo "</bold>"
			?></p>
		<br>
		<hr>
		<p>
			Escanea esté código QR en tiendas fisicas para pagar y recoger tu pedido.
		</p>
	</div>
</body>

</html>