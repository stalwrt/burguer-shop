<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Burger Shop | Historial</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="Assets/JS/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<!-- Hacer header en los Templates  -->
	<?php include("Templates/header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<div class="title-section">Mis compras realizadas</div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>
	<?php include("Templates/footer.php"); ?>
	<script type="text/javascript" src="Assets/JS/Funciones.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'Services/pedido/get_pedidos_all.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="caja-detalle mb5">'+
							'<div class="img">'+
								'<img src="Assets/Images/productos'+data.datos[i].imagen+'">'+
							'</div>'+
							'<div class="detalle">'+
								'<h3 class="mb5">'+data.datos[i].nombreProducto+'</h3>'+
								'<p class="mb5">Fecha: '+data.datos[i].fecped+'</p>'+
								'<p class="mb5">'+data.datos[i].descripcionProducto+'</p>'+
								'<h4 class="mb5">'+formato_precio(data.datos[i].prepro)+'</h4>'+
							'</div>'+							
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "$ "+array[0]+".<span>"+array[1]+"</span>";
		}
	</script>
</body>
</html>