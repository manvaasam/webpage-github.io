<?php
session_start();
include_once "./Mdb_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
    <link rel="stylesheet" href="../chat.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
</head>
<body style="display: flex;justify-content:center;align-items:cennter;padding: 10px;min-height: 100vh">
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <div class="details">
                        <span><?= $_SESSION['name'] ?></span>
                        <p>active</p>
                    </div>
                </div>
                <a href="index.php" class="logout">Logout</a>
            </header>
            <div class="users-list">
                <?php
                $sql = "SELECT * FROM  `messages` GROUP BY user_id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <a href="chat.php?user_id=<?php echo $row['user_id']; ?>">
                        <div class="content">
                            <div class="details">
                                <span> <?php echo $row['uname']; ?></span> <span style="font-size: 80%;color:#c4c4c4">#<?php echo $row['user_id']; ?></span>
                            </div>
                        </div>
                        <div class="status-dot "><i class="fas fa-circle"></i></div>
                    </a>
                <?php } ?>
            </div>
        </section>
    </div>
</body>

</html>
<?php
} else {
    echo "Not Authenticated";
}
?>