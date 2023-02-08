<?php
$mysqli = new mysqli("localhost", "root", "", "burgerbistro");
// $mysqli = new mysqli("localhost", "u573435260_root", "Leonardo286", "u573435260_burgerbistro");
if ($mysqli->connect_errno) {
	echo "Falló la conexion a la base de datos";
}
return $mysqli;
