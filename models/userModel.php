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

    function hashPassword()
    {
        $passHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $email = $_POST['email'];

        $this->db->prepare("INSERT INTO `administrador`(`password`, 'email') VALUES ('[$passHash]', '");

        return $passHash;
    }
}
