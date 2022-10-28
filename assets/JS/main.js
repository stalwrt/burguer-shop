document.addEventListener('DOMContentLoaded', (event) => {
	// cookies
	const cookies = document.cookie.split(';');
	let cookie = NULL;

	cookies.forEach((item) => {
		if (item.indexOf('items') > -1) {
			cookie = item;
		}
	});

	if (cookie != NULL) {
		const count = cookie.split('=')[1];
		console.log(count);
		document.querySelector('.btn-carrito').innerHTML = `(${count}) Carrito`;
	}
});

const bCarrito = document.querySelector('.btn-carrito');

bCarrito.addEventListener('click', (event) => {
	const carritoContainer = document.querySelector('#carrito-container');

	if (carritoContainer.style.display == '') {
		carritoContainer.style.display = 'block';
		actualizarCarritoUI();
	} else {
		carritoContainer.style.display = '';
	}
});

function actualizarCarritoUI() {
	fetch('http://localhost/burger_shop/api/carrito/api-carrito.php?action=mostrar')
		.then((Response) => response.json())
		.then((data) => {
			console.log(data);
			let tablaCont = document.querySelector('#tabla');
			let precioTotal = '';
			let html = '';

			data.items.forEach((element) => {
				html += `
                <div class="fila">
                    <div class="imagen">
                        <img scr="Assets/Images/${element.imagen}" width="100"/>
                    </div>
				
                    <div class="info">
                        <input type='hidden' value='${element.id}'/>
                        <div class="nombre">${element.nombre}</div>
                        <div>${element.cantidad} items de $${element.precio}</div>
                        <div>Subtotal: $${element.subtotal}</div>
                        <div class="botones"><button class="btn-remove">Quitar 1 del carrito</button></div>
                    </div>
                </div>
                `;
				//| le podria agregar un icono de basura al boton de quitar un producto
			});

			precioTotal = `<p>Total: $${data.info.total}</p>`;
			tablaCont.innerHTML = html;

			document.cookie = `items=${data.info.count}`;

			bCarrito.innerHTML = `(${data.info.count}) Carrito`;

			document.querySelector('.btn-remove').forEach((boton) => {
				boton.addEventListener('click', (e) => {
					const id = boton.parentElement.parentElement.children[0].value;

					removeItemFromCarrito(id);
				});
			});
		});
}

const botones = document.querySelectorAll('btn-add');

botones.forEach((boton) => {
	const id = boton.parentElement.parentElement.children[0].value;

	boton.addEventListener('click', (e) => {
		addItemToCarrito(id);
	});
});

function removeItemFromCarrito(id) {
	fetch('http://localhost/burger_shop/api/productos/api-producto.php?action=remove&id=' + id)
		.then((res) => res.json())
		.then((data) => {
			console.log(data.status);
			actualizarCarritoUI();
		});
}

function addItemFromCarrito(id) {
	fetch('http://localhost/burger_shop/api/productos/api-producto.php?action=add&id=' + id)
		.then((res) => res.json())
		.then((data) => {
			console.log(data.status);
			actualizarCarritoUI();
		});
}
