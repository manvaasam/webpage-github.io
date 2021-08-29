<?php
if (!isset($_SESSION)) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("config.php");

function validationEmailUsingRegex($email)
{
    $pattern = "/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i";
    if (preg_match($pattern, $email)) {
        return true;
    } else {
        return false;
    }
}
class CrudController
{
    function __construct()
    {
        $DB = new Database();
        $conn = $DB->connect();
        $this->db = $conn;
    }
    function sqlSelect($TblName, $Param, $Value)
    {
        try {
            $query = "SELECT * FROM $TblName WHERE $Param = :param  ORDER BY `id` ASC";
            $result = $this->db->prepare($query);
            $result->bindValue(':param', $Value);
            $result->execute();
            $data = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function sqlDelete($TblName, $Param, $Value)
    {
        try {
            $query = "DELETE FROM $TblName WHERE $Param = :param";
            $result = $this->db->prepare($query);
            $result->bindValue(':param', $Value);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
class InsertProduct extends CrudController
{
    function __construct($ProductId, $ProductName, $Name, $Email, $Phone)
    {
        parent::__construct();
        $this->productid = htmlentities($ProductId);
        $this->productname = htmlentities($ProductName);
        $this->email = htmlentities($Email);
        $this->name = htmlentities($Name);
        $this->phone = htmlentities($Phone);
        $this->orderid = uniqid();
    }
    function insertIntoDatabase()
    {
        $query = "SELECT * FROM `orders` WHERE product_id = :productid AND customer_email = :email AND customer_name = :name AND customer_phone = :phone";
        $result = $this->db->prepare($query);
        $result->bindValue(':productid', $this->productid);
        $result->bindValue(':phone', $this->phone);
        $result->bindValue(':email', $this->email);
        $result->bindValue(':name', $this->name);
        $result->execute();
        $data = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        if (count($data) === 0) {
            $NowDateTime = date('Y-m-d H:i:s');
            $query = "INSERT INTO `orders`(`product_id`,`product_name`, `customer_email`, `customer_name`, `customer_phone`, `order_id`,`created_at`) VALUES (:productid, :productname,:email, :name,:phone, :orderid,'$NowDateTime')";
            $result = $this->db->prepare($query);
            $result->bindValue(':productid', $this->productid);
            $result->bindValue(':productname', $this->productname);
            $result->bindValue(':email', $this->email);
            $result->bindValue(':name', $this->name);
            $result->bindValue(':orderid', $this->orderid);
            $result->bindValue(':phone', $this->phone);
            $result->execute();
            if ($this->db->lastInsertId() > 0) {
                $html = '<!DOCTYPE html>
                <html>
                <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Manvaasam Product Order</title>
                </head>
                <body class="">
                    <div style="font-family: sans-serif;font-size: 14px;display: block;margin: 0 auto;max-width: 580px;padding: 10px;width: 100%;">
                        <h2 style="font-size:23px;font-weight:bold">Hi Manvaasam Team,</h2>
                        <h4 style="font-size:18px;font-weight:bold">New Order Placemented by, '.$this->name.'</h4>
                        <p>
                            We have received one new order for the following product.
                        </p>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 20%;">Product Name</td>
                                <td style="width: 80%;"><b>'.$this->productname.'</b></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Customer Name</td>
                                <td style="width: 80%;">'.$this->name.'</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Customer Email</td>
                                <td style="width: 80%;">'.$this->email.'</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Customer Phone</td>
                                <td style="width: 80%;">'.$this->phone.'</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Order ID</td>
                                <td style="width: 80%;">'.$this->orderid.'</td>
                            </tr>
                        </table>
                        <h5>Quick Actions</h5>                        
                        <a style="display: inline-block;color: #ffffff;background-color: #3498db;border: solid 1px #3498db;border-radius: 5px;box-sizing: border-box;cursor: pointer;text-decoration: none;font-size: 14px;font-weight: bold;margin: 5px;padding: 10px;text-transform: capitalize;border-color: #3498db;" target="_blank" href="http://wa.me/91' . $this->phone . '">Whatsapp Now</a>
                        <a style="display: inline-block;color: #ffffff;background-color: #3498db;border: solid 1px #3498db;border-radius: 5px;box-sizing: border-box;cursor: pointer;text-decoration: none;font-size: 14px;font-weight: bold;margin: 5px;padding: 10px;text-transform: capitalize;border-color: #3498db;" target="_blank" href="tel:' . $this->phone . '">Call Now</a>
                        <a style="display: inline-block;color: #ffffff;background-color: #3498db;border: solid 1px #3498db;border-radius: 5px;box-sizing: border-box;cursor: pointer;text-decoration: none;font-size: 14px;font-weight: bold;margin: 5px;padding: 10px;text-transform: capitalize;border-color: #3498db;" target="_blank" href="mailto:' . $this->email . '">Mail Now</a>
                        <div style="color: #999999;font-size: 12px;text-align: center">
                            Powered by
                            <a href="https://manvaasam.com">Manvaasam.com</a>.
                        </div>
                    </div>
                </body>
                
                </html>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                $headers .= 'From: 	Manvaasam Orders <manvaasamtreebank2020@manvaasam.com> ' . "\r\n";
                mail("manvaasamtreebank2020@gmail.com","Manvaasam New Order Placement",$html,$headers);
                return "success";
            }else {
                return "Failed";
            }
        }else{
            return "alreadyExists";            
        }
        return "wentWrong";
    }
}
