<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include './config.php';
    $db = new Database();
    $conn = $db->getConnection();
    $date = date("Y-m-d");
    $sql = "SELECT * FROM `employees`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employees</title>
    </head>

    <body>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            body {
                margin-top: 20px;
                background: #FAFAFA
            }

            img.profile-photo-md {
                height: 50px;
                width: 50px;
                border-radius: 50%;
            }

            .create-post {
                width: 100%;
                min-height: 90px;
                padding: 20px;
                margin-bottom: 20px;
                border-bottom: 1px solid #f1f2f2;
            }

            .create-post .form-group {
                margin-bottom: 0;
                display: inline-flex;
            }

            .create-post .form-group .form-control {
                border: 1px solid #ccc;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            }

            .create-post .form-group img.profile-photo-md {
                margin-right: 10px;
            }

            .create-post .tools {
                padding: 8px 0 10px;
            }

            .create-post .tools ul.publishing-tools {
                display: inline-block;
                text-align: left;
                margin: 0;
                padding: 5px 0;
            }

            .create-post .tools ul.publishing-tools li a {
                color: #6d6e71;
                font-size: 18px;
            }

            .create-post .tools ul.publishing-tools li a:hover {
                color: #27aae1;
            }

            .list-inline>li {
                display: inline-block;
                padding-right: 5px;
                padding-left: 5px;
            }

            .friend-list .friend-card {
                border-radius: 4px;
                border-bottom: 1px solid #f1f2f2;
                overflow: hidden;
                margin-bottom: 20px;
            }

            .friend-list .friend-card .card-info {
                padding: 0 20px 10px;
            }

            .friend-list .friend-card .card-info img.profile-photo-lg {
                margin-top: -60px;
                border: 7px solid #fff;
            }

            img.profile-photo-lg {
                height: 80px;
                width: 80px;
                border-radius: 50%;
            }

            .text-green {
                color: #8dc63f;
            }
        </style>
        <div class="container">
            <div class="friend-list">
                <div class="row">
                    <?php
                    for ($i = 0; $i < count($result); $i++) {
                    ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="friend-card card">
                                <div style="height: 100px;">
                                    <img src="https://picsum.photos/400/100?grayscale&<?= $result[$i]['user_name'] ?>" alt="profile-cover" class="w-100 img-responsive cover">
                                </div>
                                <div class="card-info">
                                    <img src="https://avatars.dicebear.com/api/bottts/<?= $result[$i]['name'] ?>.svg" alt="user" class="profile-photo-lg">
                                    <div class="friend-info">
                                        <p class="pull-right text-secondary">#<?= $result[$i]['user_name'] ?></p>
                                        <h3><?= $result[$i]['name'] ?></h3>
                                        <p><?= $result[$i]['about'] ?></p>
                                        <?php
                                        if ($result[$i]['user_name'] != $_SESSION['user_name']) {
                                            if ($result[$i]['email'] != "") {
                                                echo '<a href="mailto:' . $result[$i]['email'] . '" class="btn btn-primary btn-sm">Send Mail</a> &nbsp;';
                                            }
                                            if ($result[$i]['phone'] != "") {
                                                echo '<a href="tel:' . $result[$i]['phone'] . '" class="btn btn-primary btn-sm">Call</a>';
                                            }
                                        } else {
                                        ?>
                                            <div class="tools">
                                                <a href="profile.php" class="btn btn-success  btn-sm">EDIT PROFILE</a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
