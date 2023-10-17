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
        $query = $this->db->prepare("   SELECT *
                                        FROM productos
                                        WHERE id_category = ? ");

        $query->execute([$id]);

        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }

    function deletePorduct($id){
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$id]);
    }

    function editProduct($id,$name,$category,$category_id,$price,$desc,$url){
        $query = $this->db->prepare('UPDATE productos SET id = ? , productos.name = ? , tipo = ? , productos.category_id = ? , price = ? , descrption = ? , picture = ? WHERE id_category = ?');
        $query->execute([$id,$name,$category,$category_id,$price,$desc,$url]);
    }

    function addProduct($id,$name,$category,$category_id,$price,$desc,$url){
        $query = $this->db->prepare('INSERT INTO productos ( id , productos.name , tipo , productos.category_id , price , descrption , picture) VALUES (?,?,?,?,?,?)');
        $query->execute([$id,$name]);
    }
}
