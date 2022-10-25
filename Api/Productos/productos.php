<?php
include_once '../../Lib/Connection/database.php';

class Productos extends DB
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        $query = $this->connect()->prepare('SELECT * FROM productos WHERE id = :id LIMIT 0,12');
        $query->execute(['idProducto' => $id]);

        $row = $query->fetch();

        return [
            'id'            => $row['id'],
            'nombre'        => $row['nombre'],
            'descripcion'   => $row['descripcion'],
            'precio'        => $row['precio'],
            'imagen'        => $row['imagen'],
            'categoria'     => $row['categoria'],
        ];
    }

    public function getItemsByCategory($category)
    {
        $query = $this->connect()->prepare('SELECT * FROM productos WHERE categoria = :cat LIMIT 0,12');
        $query->execute(['cat' => $category]);

        $items = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $item = [
                'id'            => $row['id'],
                'nombre'        => $row['nombre'],
                'descripcion'   => $row['descripcion'],
                'precio'        => $row['precio'],
                'imagen'        => $row['imagen'],
                'categoria'             => $row['categoria'],
            ];

            array_push($items, $item);
        }

        return $items;
    }
}
