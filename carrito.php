<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Burger Shop | Carrito</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="Assets/JS/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php include("layouts/_main-header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<h3>Mi carrito</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<input class="ipt-procom" type="text" id="dirusu" placeholder="Dirección">
			<br>
			<input class="ipt-procom" type="text" id="telusu" placeholder="Celular">
			<button onclick="procesar_compra()" style="margin-top: 5px;">Procesar compra</button>
		</div>
	</div>
	<?php include("Templates/footer.php"); ?>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'Services/pedido/get_porprocesar.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					let sumaMonto=0;
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="Assets/Images/productos/'+data.datos[i].imagen+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nombreProducto+'</h3>'+
								'<p><b>Precio:</b> S/ '+data.datos[i].precioProducto+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecped+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<button class="btn-delete-cart" onclick="delete_product('+data.datos[i].codped+')">Eliminar</button>'+
							'</div>'+
						'</div>';
						sumaMonto+=parseInt(data.datos[i].prepro)+1;
					}
					if (data.datos.length==0) {
						alert("No hay productos en carrito");
						window.history.back();
					}
				    Culqi.settings({
				        title: 'Burger Shop',
				        currency: 'Hamburguesa',
				        description: 'Hamburguesa con queso doble',
				        amount: sumaMonto
				    });
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function delete_product(codped){
			$.ajax({
				url:'Services/pedido/delete_pedido.php',
				type:'POST',
				data:{
					codped:codped,
				},
				success:function(data){
					console.log(data);
					if (data.state) {
						window.location.reload();
					}else{
						alert(data.detail);
					}
				},
				error:function(err){
					console.error(err);
				}
			});
		}
		//! Aqui iria lo de enviar un correo al cliente con los datos del pedido 
		function procesar_compra(){
			let dirusu=document.getElementById("dirusu").value;
			let telusu=$("#telusu").val();
			let tipopago=1;
			if (document.getElementById("tipo2").checked) {
				tipopago=2;
			}
			if (dirusu=="" || telusu=="") {
				alert("Complete los campos");
			}else{
				if (!document.getElementById("tipo1").checked &&
					!document.getElementById("tipo2").checked) {
					alert("Seleccione un método de pago!");
				}else{
					if (tipopago==2) {
						Culqi.open();
					}else{
						$.ajax({
							url:'Services/pedido/confirm.php',
							type:'POST',
							data:{
								dirusu:dirusu,
								telusu:telusu,
								tipopago:tipopago,
								token:''
							},
							success:function(data){
								console.log(data);
								if (data.state) {
									window.location.href="pedido.php";
								}else{
									alert(data.detail);
								}
							},
							error:function(err){
								console.error(err);
							}
						});
					}
				}
			}
		}
		function culqi() {
			if (Culqi.token) { 
		      	var token = Culqi.token.id;
		      	$.ajax({
					url:'Services/pedido/confirm.php',
					type:'POST',
					data:{
						dirusu:document.getElementById("dirusu").value,
						telusu:$("#telusu").val(),
						tipopago:2,
						token:token
					},
					success:function(data){
						console.log(data);
						if (data.state) {
							window.location.href="pedido.php";
						}else{
							alert(data.detail);
						}
					},
					error:function(err){
						console.error(err);
					}
				});
		  	} else {
		      	console.log(Culqi.error);
		      	alert(Culqi.error.user_message);
		  	}
		};
	</script>
	<script src="https://checkout.culqi.com/js/v3"></script>
	<script>
	    Culqi.publicKey = 'pk_test_3adf22bd8acf4efc';
	</script>
</body>
</html>