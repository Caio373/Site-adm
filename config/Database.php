<?php
class Database {
    private $host = "127.0.0.1";
    private $port = "3306";
    private $username = "root";
    private $dbName = "site_adm";
    private $password = "";

    public function conectar() {
        $connUrl = "mysql:host=$this->host;port=$this->port;dbname=$this->dbName;charset=utf8mb4";
        $conn =  new PDO(
            $connUrl, 
            $this->username, 
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        return $conn;
    }
}