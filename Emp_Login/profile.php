<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Profile</title>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,200&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
            <link rel="stylesheet" href="./leave/style.css">
        </head>

        <body class="body">
            <div class="main">
                <div class="container" style="overflow-x: auto">
                    <div class="signup-form">
                        <form method="POST" class="leave-form" id="leave-form">
                            <h2>Edit Profile Data</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input type="text" name="name" id="name" required="" value="<?php echo $_SESSION['name']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="id">Employee Id :</label>
                                    <input type="text" name="id" id="id" required="" readonly="true" value="<?php echo $_SESSION['user_name']; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email ID :</label>
                                <input type="email" name="email" id="email" placeholder="Enter Email" value="<?php echo $_SESSION['email']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone No :</label>
                                <input type="number" name="phone" id="phone" placeholder="Enter Phone" value="<?php echo $_SESSION['phone']; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="reason">About Yourself :</label>
                                <input type="text" name="about" id="about" placeholder="Enter one liner about yourself" value="<?php echo $_SESSION['about']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="opass">Old Password :</label>
                                <input type="password" name="opass" id="opass" placeholder="Enter Old password" />
                            </div>
                            <div class="form-group">
                                <label for="pass">New Password :</label>
                                <input type="password" name="pass" id="pass" placeholder="Enter New password" />
                            </div>
                            <div class="form-group">
                                <label for="cpass">Confirm Password :</label>
                                <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" />
                            </div>
                            <div class="form-submit">
                                <input type="reset" value="Reset All" class="submit" name="reset" id="reset">
                                <input type="submit" value="Submit Form" class="submit" name="submit" id="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        include("./config.php");
        $db = new Database();
        $conn = $db->getConnection();
        $name = $_POST['name'];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $about = $_POST['about'];
        $opass = $_POST['opass'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if ($_SESSION['user_name'] == $id){
            // pass annd cpass are same
            if ($pass == $cpass) {
                // check old pass
                $sql = "SELECT * FROM `employees` WHERE `user_name` = :id AND `password` = :pass";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":pass", $opass);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $sql = "UPDATE `employees` SET `name` = :name, `email` = :email, `phone` = :phone, `about` = :about, `password` = :pass WHERE `user_name` = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":name", $name);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":phone", $phone);
                    $stmt->bindParam(":id",$id);
                    $stmt->bindParam(":about", $about);
                    $stmt->bindParam(":pass", $pass);
                    $stmt->execute();
                    $_SESSION['user_name'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['about'] = $about;
                    $_SESSION['name'] = $name;
                    $_SESSION['id'] = $conn->lastInsertId();
                    echo "<script>alert('Profile Updated Successfully');</script>";
                    echo "<script>window.location.href='profile.php';</script>";
                } else {
                    echo "<script>alert('Old Password is Wrong');</script>";
                    echo "<script>window.location.href='profile.php';</script>";
                }
            } else {
                echo "<script>alert('New Password and Confirm Password are not same');</script>";
                echo "<script>window.location.href = './profile.php';</script>";
            }
        }
    }
} else {
    echo "Not Authenticated";
}
