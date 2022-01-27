<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if ($_SESSION['user_name'] == "MT0018" || $_SESSION['user_name'] == "MT0001" || $_SESSION['user_name'] == "MT0006" || $_SESSION['user_name'] == "MT0013") {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // heroImage is the name of the input field in the HTML form
            if (isset($_FILES['heroImage'])){
                $errors = array();
                $file_name = $_FILES['heroImage']['name'];
                $file_size = $_FILES['heroImage']['size'];
                $file_tmp = $_FILES['heroImage']['tmp_name'];
                $file_type = $_FILES['heroImage']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['heroImage']['name'])));
                $expensions = array("jpeg", "jpg", "png");
                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }
                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "./hero.png");
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
            // save data to dashboard.json
            $data = json_encode($_POST);
            $file = fopen('dashboard.json', 'w');
            fwrite($file, $data);
            fclose($file);
            header("Location: img.php");
        } else {
            include './time/config.php';
            $db = new Database();
            $conn = $db->getConnection();
            $json = file_get_contents('dashboard.json');
            $data = json_decode($json, true);
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update Dashboard</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
            </head>

            <body>
                <div class="container">
                    <form method="post">
                        <!-- Generic Update in textarea -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="update">Genaral Update</label>
                                    <textarea class="form-control" id="generalUpdate" name="generalUpdate" rows="3" placeholder="Enter General updates"><?php echo  $data['generalUpdate']; ?>
                                </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="social">Social Media</label>
                                    <textarea class="form-control" id="social" name="socialMedia" rows="3" placeholder="Enter Social Media updates"><?php echo $data['socialMedia'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="employeeCount">Employee Count</label>
                                    <textarea class="form-control" id="employeeCount" name="employeeCount" rows="3" placeholder="Enter Employee Count Details"><?php echo $data['employeeCount'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="taskCompleted">Pending Tasks</label>
                                    <textarea class="form-control" id="taskCompleted" name="taskCompleted" rows="3" placeholder="Enter Task Completion Details"><?php echo $data['taskCompleted'] ?></textarea>
                                </div>
                            </div>
                            <!-- Hero Of the week -->
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="hero">Hero Of the Week</label>
                                    <textarea class="form-control" id="herodescription" name="herodescription" rows="3" placeholder="Enter Hero Of the Week"><?php echo  $data['herodescription']; ?></textarea>
                                </div>
                            </div>
                            <!-- Hero Of the week Image uploader -->
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="heroImage">Hero Of the Week Image</label>
                                    <input type="file" class="form-control" id="heroImage" name="heroImage">
                                </div>
                            </div>
                            <!-- youtube video iframe link -->
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="youtube">Youtube Video</label>
                                    <input type="text" class="form-control" id="ytLink" name="ytLink" placeholder="Enter Youtube Video Link" value="<?php echo  htmlspecialchars($data['ytLink']) ?>">
                                </div>
                            </div>
                            <!-- Feedback link -->
                            <div class="col-md-6">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="feedbackLink">Feedback Link</label>
                                    <input type="text" class="form-control" id="feedbackLink" name="feedbackLink" placeholder="Enter Feedback Link" value="<?php echo  $data['feedbackLink']; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-2"></div>
                                <div class="form-group">
                                    <label for="feedback">Feedback</label>
                                    <textarea class="form-control" id="feedbackDes" name="feedbackDes" rows="3" placeholder="Enter Feedback"><?php echo  $data['feedbackDes']; ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="lastUpdated" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        </div>
                        <div class="p-2"></div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </body>

            </html>
<?php
        }
    } else {
        echo "You are not authorized to access this page";
    }
} else {
    echo "Please Login";
}
