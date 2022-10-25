<?php
include_once 'productos.php';

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];

    if ($categoria == '') {
        echo json_encode(['statuscode' => 400, 'response' => 'No existe esa categoria']);
    } else {
        $productos = new Productos();
        $items = $productos->getItemsByCategory($categoria);

        echo json_encode(['statuscode' => 200, 'items' => $items]);
    }
} else {
    echo json_encode(['statuscode' => 400, 'response' => 'No hay acción']);
}
