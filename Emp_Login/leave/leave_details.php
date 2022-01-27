<?php

session_start();
include("../config.php");

$db = new Database();
$conn = $db->getConnection();

function covertToTimeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "just now";
    }
    //Minutes
    else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one min ago";
        } else {
            return "$minutes mins ago";
        }
    }
    //Hours
    else if ($hours <= 24) {
        if ($hours == 1) {
            return "an hour ago";
        } else {
            return "$hours hrs ago";
        }
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    }
    //Months
    else if ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    }
}
// Request method
$request = $_SERVER['REQUEST_METHOD'];
if ($request == "POST") {
    if (isset($_POST['submit'])) {
        $comment = $_POST['comment'];
        $id = $_POST['id'];
        $name = $_SESSION['name'];
        $dateTime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `comments`(`name`, `comment`, `leave_id` , `created_at`) VALUES (:name,:comment,:leave_id,:created_at)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':leave_id', $id);
        $stmt->bindParam(':created_at', $dateTime);
        $stmt->execute();
        header("Location:leave_details.php?id=$id");
    }
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Leave Details</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="body">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `leave` WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        ?>
        <div class="main">
            <div class="container py-3">
                <div class="signup-form">
                    <h2>Leave Details</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-2">
                                <h6>Employee Id:</h6>
                                <?php echo $result[0]['user_name']; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2">
                                <h6>Name:</h6>
                                <?php echo $result[0]['name']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-2">
                                <h6>Email:</h6>
                                <?php echo $result[0]['email']; ?>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="p-2">
                                <h6>Type Of Leave:</h6>
                                <?php echo $result[0]['typeOfLeave']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-2">
                                <h6>From Date:</h6>
                                <?php echo $result[0]['fromDate']; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2">
                                <h6>To Date:</h6>
                                <?php echo $result[0]['toDate']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-2">
                                <h6>Created At:</h6>
                                <?php echo $result[0]['created_at']; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2">
                                <h6>Status:</h6>
                                <?php echo $result[0]['status']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                        <h6>Reason:</h6>
                        <?php echo $result[0]['reason']; ?>
                    </div>
                    <div class="p-2"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="commentForm">    
                            <h2 class="m-0">Comments</h2>

                                <?php
                                $sql = "SELECT * FROM `comments` WHERE leave_id = :id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':id', $id);
                                $stmt->execute();
                                $result = $stmt->fetchAll();

                                foreach ($result as $row) {
                                ?>
                                    <div class="comment">
                                        <!-- Image -->
                                        <h6>
                                            <img src="https://avatars.dicebear.com/api/initials/<?php echo $row['name'];?>.svg?r=50&size=30" alt="">
                                            <?php echo $row['name']; ?>
                                            <span style="font-size: 10px;font-weight: bold"> #<?php echo covertToTimeAgo($row['created_at']) ?>
                                        </h6> 
                                        </span>
                                        <p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['comment']; ?>
                                        </p>
                                    </div>
                                <?php
                                }
                                ?>
                                <form action="leave_details.php" method="post">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Enter your comments..." required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button type="submit" class="btn btn-primary" name="submit"> Submit </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>