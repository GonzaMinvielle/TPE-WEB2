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
        $query = $this->db->prepare("SELECT * FROM categoria");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);;
    }

    function getCategoryById($id){

        $query = $this->db->prepare('SELECT categoria.name FROM categoria WHERE categoria.id_category = ?');

        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function deleteCategory($id){
        $query = $this->db->prepare('DELETE FROM categoria WHERE id_category  = ?');
        $query->execute([$id]);
    }

    function editCategory($id,$name){
        $query = $this->db->prepare('UPDATE categoria SET id_category = ? , productos.name = ?  WHERE id_category = ?');
        $query->execute([$id,$name]);
    }

    function addCategory($id,$name){
        $query = $this->db->prepare('INSERT INTO categoria ( id_cateory , productos.name ) VALUES (?,?)');
        $query->execute([$id,$name]);
    } 

}
