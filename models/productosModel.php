<?php


class ProductosModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_bambas;charset=utf8', 'root', '');
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM  productos");
        $query->execute();

        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $query->execute([$id]);
        $prducto = $query->fetch(PDO::FETCH_OBJ);

        return $prducto;
    }
}
