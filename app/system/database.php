<?php

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;port=3306;dbname=tabulous', 'root', 'root');
    }

    public static function new(): Database
    {
        return self::$instance = self::$instance ?? new Database();
    }

    public function connect(): PDO
    {
        return $this->connection;
    }

    private function __clone()
    {
    }

}