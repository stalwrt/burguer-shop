<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Burger Shop | Pedido</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="Assets/JS/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<!-- Agregar un header en los Templates  -->
	<?php include("Templates/header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<h3>Mis pedidos</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<h3>Datos de pago</h3>
			<div class="p-line"><div>MONTO TOTAL:</div>$ &nbsp;<span id="montototal"></span></div>
		</div>
	</div>
	<?php include("Templates/footer.php"); ?>
	<script type="text/javascript" src="Assets/JS/Funciones.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'Services/pedido/get_procesados.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					let monto=0;
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="Assets/Images/productos/'+data.datos[i].imagen+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nombreProducto+'</h3>'+
								'<p><b>Precio:</b> S/.'+data.datos[i].precioProducto+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecped+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'
							'</div>'+
						'</div>';
						if (data.datos[i].estado=="2") {
							monto+=parseFloat(data.datos[i].prepro);
						}
					}
					document.getElementById("montototal").innerHTML=monto;
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
	</script>
</body>
</html>