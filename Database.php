<?php

class Database
{
    public $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=php-basics;charset=utf8mb4");
    }

    function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}