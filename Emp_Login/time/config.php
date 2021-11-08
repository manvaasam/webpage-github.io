<?php 
// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PASS", "");
// define("DB_NAME", "manvaasam");

define("DB_HOST", "localhost");
define("DB_USER", "manvaasa_login");
define("DB_NAME", "manvaasa_login");
define("DB_PASS", "Iron_Man@#10");

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $error;
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            $this->error = $exception->getMessage();
            echo "Connection error: " . $this->error;
        }
        return $this->conn;
    }
}


?>