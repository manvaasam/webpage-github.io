<?php

session_start();
include("../config.php");
$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT * FROM employees";
$getAllUsers = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
<div id="viewport">
    <div id="sidebar">
        <header>
            <a href="#">Manvaasam</a>
        </header>
        <ul class="nav">
            <?php
            foreach ($getAllUsers as $user) {
                echo '<li><a href="index.php?id=' . $user['user_name'] . '">' . $user['name'] . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <div id="content">
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $sql = "SELECT * FROM `activity` WHERE user_name=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll();
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if ($id == $_SESSION['user_name'] || $_SESSION['user_name'] != "MT0001" || $_SESSION['user_name'] != "MT0018") {
                        ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-light">
                                            <thead class="">
                                                <th>
                                                    S.No.
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    What You Do
                                                </th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($result as $row) {
                                                    $date = date("d-m-Y", strtotime($row["created_at"]));
                                                    echo '<tr>';
                                                    echo '<td>' . $i . '</td>';
                                                    echo '<td>' . $date . '</td>';
                                                    echo '<td>' . $row['whatyoudo'] . '</td>';
                                                    echo '</tr>';

                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                            echo '<div class="container p-2" style="display: flex;justify-content:center;align-items:center;height:100vh">
                            <div style="text-align: center;">
                                <h3>You are not Authorized</h3>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
            <?php
        } else {
            ?>
                <div class="container p-2" style="display: flex;justify-content:center;align-items:center;height:100vh">
                    <div style="text-align: center;">
                        <svg width=100px height=100px xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14.33 20h-.21a2 2 0 0 1-1.76-1.58L9.68 6l-2.76 6.4A1 1 0 0 1 6 13H3a1 1 0 0 1 0-2h2.34l2.51-5.79a2 2 0 0 1 3.79.38L14.32 18l2.76-6.38A1 1 0 0 1 18 11h3a1 1 0 0 1 0 2h-2.34l-2.51 5.79A2 2 0 0 1 14.33 20z" />
                        </svg>
                        <br />
                        <h3>Please Select any user from the sidebar</h3>
                    </div>

                </div>
            <?php
        }
            ?>
            </div>
    </div>
</body>
</html>