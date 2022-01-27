<?php

session_start();
include("../config.php");
$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT * FROM employees";
$getAllUsers = $conn->query($sql);

function convertSecondsToTime($sec)
{
    $hours = floor($sec / 3600);
    $minutes = floor(($sec / 60) % 60);
    $seconds = $sec % 60;
    // Return 00 hours 00 minutes 00 secs
    return "$hours Hours $minutes Minutes $seconds Seconds";
}

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
            $sql = "SELECT * FROM employees WHERE user_name=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "SELECT * FROM `time` WHERE `time`.`emp_id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll();
        ?>
        <div style="position: fixed;top: 0;right: 0;z-index:9999999">
            <a class="btn btn-success" href="<?= $user["gForm"] ?>" target="_blank">GROWTH TRACKING</a>
        </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Login Times</h4>
                                <h6>Total Time Spent : <?php echo convertSecondsToTime($user["timeSpend"]) ?></h6>
                            </div>
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
                                                In Time
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($result as $row) {
                                                $date = date("d-m-Y", strtotime($row["time_in"]));
                                                $time = date("h:i:s A", strtotime($row["time_in"]));
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                echo '<td>' . $date . '</td>';
                                                echo '<td>' . $time . '</td>';
                                                echo '</tr>';

                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        } else {
            ?>
                <div class="container p-2" style="display: flex;justify-content:center;align-items:center;height:100vh">
                    <div style="text-align: center;">
                        <svg width=100px height=100px xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                            <g fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M35 40a5 5 0 1 0 0-10a5 5 0 0 0 0 10zm0 2a7 7 0 1 0 0-14a7 7 0 0 0 0 14z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M35 31.5a1 1 0 0 1 1 1v2.086l.707.707a1 1 0 0 1-1.414 1.414L34 35.414V32.5a1 1 0 0 1 1-1z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 23h-2v2h2v-2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 23h-2v2h2v-2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M30 23h-2v2h2v-2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 31h-2v2h2v-2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 31h-2v2h2v-2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h5V9H9a3 3 0 0 0-3 3v24a3 3 0 0 0 3 3h20.255a6.972 6.972 0 0 1-.965-2H9a1 1 0 0 1-1-1V12zm26 16.07a7.062 7.062 0 0 1 2 0V12a3 3 0 0 0-3-3h-3v2h3a1 1 0 0 1 1 1v16.07zM16 11h10.563V9H16v2z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 9H16v3a1 1 0 1 1-2 0V9H9a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2h-3v3a1 1 0 1 1-2 0V9z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M36 18H8v-2h28v2z" fill="currentColor" />
                                <path d="M12 7a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0V7z" fill="currentColor" />
                                <path d="M26 7a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0V7z" fill="currentColor" />
                            </g>
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