<?php

namespace Controllers;

class BaseController
{
    //Csak a class-ben elérhető változók
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $database = 'mvcdatabase';

    public $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect(self::$host, self::$user, self::$password, self::$database);

        if (!$this->connection) {
            die("Adatbázis csatlakozás nem sikerült: " . mysqli_connect_error());
        }
    }
}