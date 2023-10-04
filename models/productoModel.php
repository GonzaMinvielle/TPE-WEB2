<?php

class ProductoModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO(
            'mysql:host=localhost;'
                . 'db_bambas;charset=utf8',
            'root',
            ''
        );
    }
}
