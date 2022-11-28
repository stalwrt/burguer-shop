const contenedorQR = document.getElementById('contenedorQR');
const formulario = document.getElementById('formulario');

const QR = new QRCode(contenedorQR);

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
	QR.makeCode(formulario.link.value);
});

//° GENERAR NÚMERO ALEATORIO PARA NÚMERO DE PEDIDO

function generate() {
	let num = Math.floor(Math.random()) * 100;
	console.log(num);

	document.write(num);
}
