<?php

class DbConnect

{

    public function connect()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=db_bambas;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            exit('Database error');
        }
    }
}
