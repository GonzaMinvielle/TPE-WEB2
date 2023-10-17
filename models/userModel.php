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

        $email = $query->fetch(PDO::FETCH_OBJ);

        return $email;
    }

    public function registeredUser($user, $password)
    {

        $query = $this->db->prepare('INSERT INTO administrador ( email , password) VALUES (? , ?)');

        $query->execute([$user, $password]);
    }
    public function loggedUser($email)
    {

        $query = $this->db->prepare('SELECT * FROM administrador WHERE email = ?');

        $query->execute([$email]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
}
