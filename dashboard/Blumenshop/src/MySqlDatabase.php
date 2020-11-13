<?php

namespace MyBlumenshopApp;

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\vendor\autoload.php';


use MyBlumenshopApp\Repositories\DatabaseInterface;
use PDO;

class MySqlDatabase implements DatabaseInterface
{
    private $database = null;

    public function __construct()
    {
        // Info: kein passwort gesetzt
        $host = 'localhost';
        $user = 'root';
        $dbname = 'blumenshop';

        //set DSN Data source name
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        //create PDO instance
        $this->database = new PDO($dsn, $user);

    }

    public function query($sql)
    {
        return $this->database->query($sql);

        // return [];
    }


    public function prepare($sql)
    {
        return $this->database->prepare($sql);
    }
}