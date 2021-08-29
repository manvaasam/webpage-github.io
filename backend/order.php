<?php
include_once("./config.php");
$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['customer_name']) &&
        isset($_POST['customer_phone']) &&
        isset($_POST['customer_address'])  &&
        isset($_POST["count"]) &&
        isset($_POST["name"]) &&
        isset($_POST["price"])
    ) {
        $size = "ordinary";
        if (isset($_POST["size"])) {
            $size = $_POST["size"];
        }
        $customerName = $_POST['customer_name'];
        $customerPhone = $_POST['customer_phone'];
        $customerAddress = $_POST['customer_address'];
        $count = $_POST["count"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $date = date("Y-m-d H:i:s");

        $query = "INSERT INTO `order`(`customer_name`, `customer_phone`, `customer_address`, `size`, `count`, `name`, `price`, `date`) VALUES ( :customer_name, :customer_phone, :customer_address, :size, :count, :name, :price, :date )";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':customer_name', $customerName);
        $stmt->bindParam(':customer_phone', $customerPhone);
        $stmt->bindParam(':customer_address', $customerAddress);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':count', $count);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        if ($conn->lastInsertId() > 0) {
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
                        <h4 style="font-size:18px;font-weight:bold">New Order Placemented by, ' . $name . ' on '.$date.'</h4>
                        <p>
                            We have received one new order for the following product.
                        </p>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 20%;">Product Name</td>
                                <td style="width: 80%;"><b>' . $name . '</b></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Price</td>
                                <td style="width: 80%;"><b>' . $price . '</b></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Count</td>
                                <td style="width: 80%;"><b>' . $count . '</b></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Size</td>
                                <td style="width: 80%;"><b>' . $size . '</b></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Customer Name</td>
                                <td style="width: 80%;">' . $customerName . '</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Customer Phone</td>
                                <td style="width: 80%;">' . $customerPhone . '</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Customer Address</td>
                                <td style="width: 80%;">' . $customerAddress . '</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;">Order ID</td>
                                <td style="width: 80%;">' . $conn->lastInsertId() . '</td>
                            </tr>
                        </table>
                        <h5>Quick Actions</h5>
                        <a style="display: inline-block;color: #ffffff;background-color: #3498db;border: solid 1px #3498db;border-radius: 5px;box-sizing: border-box;cursor: pointer;text-decoration: none;font-size: 14px;font-weight: bold;margin: 5px;padding: 10px;text-transform: capitalize;border-color: #3498db;" target="_blank" href="http://wa.me/91' . $customerPhone . '">Whatsapp Now</a>
                        <a style="display: inline-block;color: #ffffff;background-color: #3498db;border: solid 1px #3498db;border-radius: 5px;box-sizing: border-box;cursor: pointer;text-decoration: none;font-size: 14px;font-weight: bold;margin: 5px;padding: 10px;text-transform: capitalize;border-color: #3498db;" target="_blank" href="tel:' . $customerPhone . '">Call Now</a>
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
            // mail("manvaasamtreebank2020@gmail.com", "Manvaasam New Order Placement", $html, $headers);
            mail("klakshmanan48@gmail.com", "Manvaasam New Order Placement", $html, $headers);
            // return "success";

            echo "Your Order Placed Successfully";
        } else {
            echo "Something Went Wrong";
        }
    } else {
        echo "All fields are required";
    }
} else {
    echo "Get Method not allowed";
}
