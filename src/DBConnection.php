<?php

namespace Bram;
use PDO;
use PDOException;

/**
 * Created by PhpStorm.
 * User: bvg
 * Date: 19/09/2018
 * Time: 14:31
 */
class DBConnection
{
    private $connection = null;

    public function __construct(){}

    public function getConnection() {
        if($this->connection == null) {
            $this->makeDbConnection();
        }
        return $this->connection;
    }

    private function makeDbConnection()
    {
        $servername = "localhost";
        $username = "hqgamesbe_kiosk";
        $password = "Hs*kiosk2018*";
        $dbname = "hqgamesbe_kiosk";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}