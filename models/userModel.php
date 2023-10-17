<?php

class UserModel

{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_bambas;charset=utf8', 'root', '');
    }

    function getUserByEmail($email)
    {
        $query = $this->db->prepare('SELECT * FROM administrador WHERE email = ?');

        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
