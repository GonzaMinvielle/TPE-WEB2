<?php

class ProductModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_bambas;charset=utf8', 'root', '');
    }
    public function getAllProducts()
    {
        $query = $this->db->prepare("SELECT * FROM  productos");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
    public function getProductById($id)
    {
        $query = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }
    public function getProductsByCategory($id)
    {
        $query = $this->db->prepare(" SELECT *FROM productos  WHERE id_category = ? ");
        $query->execute([$id]);
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }

    function getFilteredProduct($sort_filter, $sort_mode)
    {
        $query = $this->db->prepare("SELECT * FROM  productos ORDER BY $sort_filter $sort_mode");
        $query->execute([]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
    function addProduct($name, $price, $id_category, $picture, $description, $tipo)
    {
        //agregamos producto, y luego retornamos.
        $query = $this->db->prepare("INSERT INTO productos(name, price, id_category, picture, description, tipo) VALUES(?,?,?,?,?,?)");
        $query->execute([$name, $price, $id_category, $picture, $description, $tipo]);
        return $this->db->lastInsertId();
    }
    public function getproductByName($name)
    {
        $query = $this->db->prepare("SELECT * FROM productos WHERE name = ?");
        $query->execute([$name]);
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }
    function updateProduct($productId, $name, $price, $id_category, $picture, $description, $tipo)
    {
        $query = $this->db->prepare('UPDATE productos SET `name`=?, price=?, id_category=?, picture=?, `description`=?, tipo=? WHERE id=?');
        $query->execute([$name, $price, $id_category, $picture, $description, $tipo, $productId]);
    }
}
