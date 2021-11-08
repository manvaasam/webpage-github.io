<?php 

session_start();
include("./time/config.php");
$db = new Database();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];

    $sql = "SELECT * FROM employees WHERE user_name = :emp_id AND name = :emp_name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':emp_id', $emp_id);
    $stmt->bindParam(':emp_name', $emp_name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $newTimeSpend = (int)$result["timeSpend"] + 10;
    // Update timeSpend in database
    $sql = "UPDATE employees SET timeSpend = :timeSpend WHERE user_name = :emp_id AND name = :emp_name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':timeSpend', $newTimeSpend);
    $stmt->bindParam(':emp_id', $emp_id);
    $stmt->bindParam(':emp_name', $emp_name);
    $stmt->execute();

}
?>