CREATE TABLE producto(
	codigoProducto int not null AUTO_INCREMENT,
	nombreProducto varchar(50) null,
	descripcionProducto varchar(100) null,
	precioProducto number(6,2) null,
	estado int null,
	CONSTRAINT pk_producto
	PRIMARY KEY (codigoProducto)
);

alter table producto add imagen varchar(240) null;

INSERT INTO producto (nombreProducto,descripcionProducto,precioProducto,estado,imagen)
VALUES ('Producto prueba','Descripcion de producto de prueba','54.99',1,'crepe.jpg');

create table PEDIDO(
	codped int not null AUTO_INCREMENT,
	codusu int not null,
	codpro int not null,
	fecped datetime not null,
	estado int not null,
	dirusuped varchar(50) not null,
	telusuped varchar(12) not null,
	PRIMARY KEY (codped)
);
alter table PEDIDO add token varchar(30) null;