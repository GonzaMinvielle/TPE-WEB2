<?php
class conexionDB
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_bambas;charset=utf8', 'root', '');
    }
}
