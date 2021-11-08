<?php

session_start();
include("./config.php");
$db = new Database();
$conn = $db->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Leaves</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $date = date("Y-m-d");
    $sql = "SELECT * FROM `leave` WHERE toDate >= :date";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>

    <div class="main">
        <div class="container" style="overflow-x: auto">
            <div class="signup-form">
                <div class="row">
                    <div class="col-md-12">
                        <h1>All Leaves</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Leave ID</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['user_name'] ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['typeOfLeave']; ?></td>
                                        <td><?php echo $row['fromDate']; ?></td>
                                        <td><?php echo $row['toDate']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <a href="leave_details.php?id=<?php echo $row['id']; ?>">View</a>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>