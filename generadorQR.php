<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Generar QR</title>
	<link rel="stylesheet" href="ASSETS/CSS/styleQR.css">
	<script defer src="https: //cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==">
	</script>
	<script defer src="Assets/JS/main.js"></script>
</head>

<body>
	<?php
	include 'Templates/menu.php'
	?>
	<div class="contenedor">
		<form action="" id="formulario" class="formulario">
			<input type="text" id="link" placeholder="Escribe tu nombre" />
			<button class="btn">Generar QR</button>
		</form>

		<div id="contenedorQR" class="contenedorQR"></div>
	</div>
</body>

</html>