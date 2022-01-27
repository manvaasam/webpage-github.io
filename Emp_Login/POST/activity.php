<?php
session_start();
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_NAME", "manvaasa_login");
    define("DB_PASS", "");
} else {
    define("DB_HOST", "localhost");
    define("DB_USER", "manvaasa_login");
    define("DB_NAME", "manvaasa_login");
    define("DB_PASS", "Iron_Man@#10");
}

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $error;
    public function getConnection()
    {
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

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['email']) && isset($_POST['whatyoudo'])) {
            $name = $_POST['name'];
            $id = $_POST['id'];
            $email = $_POST['email'];
            $whatyoudo = $_POST['whatyoudo'];
            $dateTime = date("Y-m-d H:i:s");
            $conn = new Database();
            $db = $conn->getConnection();
            $sql = "INSERT INTO `activity`  (`name`, `user_name`, `email`, `whatyoudo`, `created_at`) VALUES (:name, :id, :email, :whatyoudo, :dateTime)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':whatyoudo', $whatyoudo);
            $stmt->bindParam(':dateTime', $dateTime);
            $stmt->execute();
            $last_id = $db->lastInsertId();
            $stmt = null;
            // logout
            session_destroy();
            header('Location: ../index.php');
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Something went wrong'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Something went wrong'));
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
function changeDateFormat($date)
{
    $date = explode('/', $date);
    $date = $date[2] . '-' . $date[1] . '-' . $date[0];
    return $date;
}
