<?php
class Database
{
    function connect()
    {
        if (!isset($this->db)) {
            try {
                // $conn = new PDO('mysql:dbname=manvaasa_orders;host=localhost;charset=utf8', 'manvaasa_orders', 'yd937ZXnWh4WRck');
                $conn = new PDO('mysql:dbname=manvaasam;host=localhost;charset=utf8', 'root', '');
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
            return $conn;
        }
    }
}
