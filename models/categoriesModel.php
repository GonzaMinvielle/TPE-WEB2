<?php

class CategoriesModel

{
    private $db;

    function __construct()

    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_bambas;charset=utf8', 'root', '');
    }

    public function getAllCategories()

    {
        $query = $this->db->prepare("SELECT * FROM  categoria");

        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    
    
}