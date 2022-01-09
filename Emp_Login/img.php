<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
  include './time/config.php';
  $db = new Database();
  $conn = $db->getConnection();
  $date = date("Y-m-d");
  $sql = "SELECT * FROM `leave` WHERE toDate >= :date";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':date', $date);
  $stmt->execute();
  $result = $stmt->fetchAll();
  // read Dashboard.json 
  $json = file_get_contents('dashboard.json');
  $data = json_decode($json, true);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="img.css">
    <link rel="shortcut icon" href="../image/fav_icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manvaasam Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0-rc.1/Chart.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" onclick="openNav()">&#9776;</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link btn btn-success text-white" href="Mlogout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="lastUpdated">
      <h5 class="date"><?= explode(" ", $data['lastUpdated'])[0]; ?></h5>
      <h5 class="time"><?= explode(" ", $data['lastUpdated'])[1]; ?></h5>
    </div>
    <div class="container">
      <div class="p-3"></div>
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h4>No Of Employees</h4>
            <div>
              <canvas id="toChart1"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h4>Tasks Completed</h4>
            <div>
              <canvas id="toChart2"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="p-3"></div>
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h4>Leaves Of Employees</h4>
            <div>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h4>Time Log</h4>
            <div>
              <canvas id="myChart2"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="p-2"></div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3>General Update</h3>
            </div>
            <div class="card-body">
              <?= $data['generalUpdate']; ?>
            </div>
          </div>
        </div>
        <!-- Social Media follwers count in table with linkedin, youtube, facebook, instagram -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3>Social Media</h3>
            </div>
            <div class="card-body">
              <!-- table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Media Name</th>
                    <th scope="col">Followers</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  try {
                    // Linkedin: 12\r\nYoutube: 1000\r\nFacebook: 1000\r\nInstagram: 1000\r\n
                    $socialMedia = explode("\r\n", $data['socialMedia']);
                    for ($i = 0; $i < count($socialMedia); $i++) {
                      $socialMediaName = explode(": ", $socialMedia[$i])[0];
                      $socialMediaFollowers = explode(": ", $socialMedia[$i])[1];
                      echo "<tr>";
                      echo "<td>" . $socialMediaName . "</td>";
                      echo "<td>" . $socialMediaFollowers . "</td>";
                      echo "</tr>";
                    }
                  } catch (Exception $e) {
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Hero of the week award. with circular image and description -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3>Hero of the week</h3>
            </div>
            <div class="card-body text-center">
              <div class="d-block">
                <img src="hero.png" class="img-fluid rounded-circle" alt="" style="width: 100px;height:100px;object-fit:cover">
              </div>
              <br />
              <?= $data['herodescription']; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="p-2"></div>
      <div class="row">
        <div class="col-md-8">
          <!-- Youtube Iframe video -->
          <div class="card">
            <div class="card-header">
              <h3>Youtube Video</h3>
            </div>
            <div class="card-body text-center">
              <?= $data['ytLink']; ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <!-- Take Assesment -->
          <div class="card">
            <div class="card-header">
              <h3>Give Feedback</h3>
            </div>
            <div class="card-body">
              <?= $data['feedbackDes']; ?>
              <br />
              <br />
              <div class="text-center">
                <a href="<?= $data['feedbackLink']; ?>" class="btn btn-success">Take Assessment</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-2"></div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- Leave list -->
            <div class="card-header">
              <h3>Leave List</h3>
            </div>
            <div class="card-body">
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
                        <a href="leave/leave_details.php?id=<?php echo $row['id']; ?>">View</a>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="p-2"></div>
      <div class="row">
      </div>
    </div>
    <?php
    $sql = "SELECT name as user_name, COUNT(user_name) as leaves FROM `leave` GROUP BY user_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $sql = "SELECT name as user_name, timeSpend FROM `employees`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $timeSpend = $stmt->fetchAll();
    ?>
    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }

      setInterval(function() {
        var formData = new FormData();
        formData.append('emp_id', '<?php echo $_SESSION['user_name']; ?>');
        formData.append('emp_name', '<?php echo $_SESSION['name']; ?>');
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'iAmAlive.php', true);
        xhr.onload = function() {
          if (this.status == 200) {
            console.log("Time Logged");
          }
        }
        xhr.send(formData);

      }, 10000);
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [<?php foreach ($result as $row) {
                      echo "'" . $row['user_name'] . "',";
                    } ?>],
          datasets: [{
            backgroundColor: [
              <?php
              foreach ($result as $row) {
                // convert username to hex color without opacity
                $color = dechex(crc32($row['user_name']));
                echo "'#" . substr($color, 0, 6) . "',";
              }
              ?>
            ],
            data: [<?php foreach ($result as $row) {
                      echo $row['leaves'] . ",";
                    } ?>]
          }]
        }
      });

      var ctx = document.getElementById("myChart2").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [<?php foreach ($timeSpend as $row) {
                      echo "'" . $row['user_name'] . "',";
                    } ?>],
          datasets: [{
            backgroundColor: [
              <?php
              foreach ($timeSpend as $row) {
                // convert username to hex color without opacity
                $color = dechex(crc32($row['user_name']));
                echo "'#" . substr($color, 0, 6) . "',";
              }
              ?>
            ],
            data: [<?php foreach ($timeSpend as $row) {
                      echo $row['timeSpend'] . ",";
                    } ?>]
          }]
        }
      });
      var noEmpTeam = [];
      var noEmpCount = [];
      var noEmpColor = [];
      var noTaskTeam = [];
      var noTaskCount = [];
      var noTaskColor = [];
      <?php 
      try {
        $socialMedia = explode("\r\n", $data['employeeCount']);
        for ($i = 0; $i < count($socialMedia); $i++) {
          $socialMediaName = explode(": ", $socialMedia[$i])[0];
          $socialMediaFollowers = explode(": ", $socialMedia[$i])[1];
          echo "noEmpTeam.push('" . $socialMediaName . "');";
          echo "noEmpCount.push('" . $socialMediaFollowers . "');";
          echo "noEmpColor.push('#" . substr(
            dechex(crc32($socialMediaName)),
            0,
            6
          ) . "');";
        }
        $socialMedia = explode("\r\n", $data['taskCompleted']);
        for ($i = 0; $i < count($socialMedia); $i++) {
          $socialMediaName = explode(": ", $socialMedia[$i])[0];
          $socialMediaFollowers = explode(": ", $socialMedia[$i])[1];
          echo "noTaskTeam.push('" . $socialMediaName . "');";
          echo "noTaskCount.push('" . $socialMediaFollowers . "');";
          echo "noTaskColor.push('#" . substr(
            dechex(crc32($socialMediaName)),
            0,
            6
          ) . "');";
        }
      } catch (Exception $e) {
      }
      ?>
      var ctx = document.getElementById("toChart1").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: noEmpTeam,
          datasets: [{
            backgroundColor: noEmpColor,
            data: noEmpCount,
          }]
        }
      });
      
      var ctx = document.getElementById("toChart2").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: noTaskTeam,
          datasets: [{
            backgroundColor: noTaskColor,
            data: noTaskCount,
          }]
        }
      });
    </script>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <img src="../img/manvaasam.jpg" alt="manvaasam logo" style="height: 150px; width: 150px; margin-left: 60px;"><br>
      <a target="_blank" href="https://drive.google.com/file/d/1RZGkxP_B3jA7nHKPNCdkcMzhJx0Zs-md/view?usp=sharing"><img src="../img/Organisational .png" height="18px" width="18px"> Organization Structure</a>
      <a target="_blank" href="https://mail.google.com/mail/"><img src="../img/Gmail.png" style="height: 16px; width: 16px;"> Check Email</a>
      <a target="_blank" href="https://app.slack.com/client/T02JN4H1J7Q/C02K7J1PNAV"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
          <g fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.066 1a2.2 2.2 0 1 0 .001 4.4h2.2V3.2a2.202 2.202 0 0 0-2.2-2.2zm0 5.867H3.2a2.2 2.2 0 0 0 0 4.4h5.866a2.2 2.2 0 1 0 0-4.4z" fill="currentColor"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M23 9.066a2.2 2.2 0 0 0-4.4 0v2.2h2.2a2.2 2.2 0 0 0 2.2-2.2zm-5.867 0V3.2a2.2 2.2 0 0 0-4.4 0v5.866a2.2 2.2 0 1 0 4.4 0z" fill="currentColor"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.933 23a2.2 2.2 0 1 0 0-4.4h-2.2v2.2c-.001 1.213.984 2.198 2.2 2.2zm0-5.868H20.8a2.2 2.2 0 0 0 0-4.4h-5.866a2.2 2.2 0 0 0-.001 4.4z" fill="currentColor"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 14.933a2.2 2.2 0 0 0 4.4 0v-2.2H3.2a2.2 2.2 0 0 0-2.2 2.2zm5.867 0v5.866a2.2 2.2 0 0 0 4.4.001v-5.866a2.2 2.2 0 0 0-4.4-.001z" fill="currentColor"></path>
          </g>
        </svg>&nbsp;Slack</a>
      <a target="_blank" href="payroll.html"><img src="../img/Payroll.png" height="15px" width="15px">Payroll</a>
      <a target="_blank" href="https://manvaasamteam.atlassian.net/jira/projects"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
          <path d="M12.004 0c-2.35 2.395-2.365 6.185.133 8.585l3.412 3.413l-3.197 3.198a6.501 6.501 0 0 1 1.412 7.04l9.566-9.566a.95.95 0 0 0 0-1.344L12.004 0zm-1.748 1.74L.67 11.327a.95.95 0 0 0 0 1.344C4.45 16.44 8.22 20.244 12 24c2.295-2.298 2.395-6.096-.08-8.533l-3.47-3.469l3.2-3.2c-1.918-1.955-2.363-4.725-1.394-7.057z" fill="currentColor"></path>
        </svg>&nbsp;Jira</a>
      <a target="_blank" href="documentCenter.php">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
          <g fill="none">
            <path d="M7 12.25a.75.75 0 1 1 1.5 0a.75.75 0 0 1-1.5 0zm.75 2.25a.75.75 0 1 0 0 1.5a.75.75 0 0 0 0-1.5zM7 18.25a.75.75 0 1 1 1.5 0a.75.75 0 0 1-1.5 0zm3.75-6.75a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5zM10 15.25a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75zm.75 2.25a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5zm8.664-9.086l-5.829-5.828a.493.493 0 0 0-.049-.04a.626.626 0 0 1-.036-.03a2.072 2.072 0 0 0-.219-.18a.652.652 0 0 0-.08-.044l-.048-.024l-.05-.029c-.054-.031-.109-.063-.166-.087a1.977 1.977 0 0 0-.624-.138c-.02-.001-.04-.004-.059-.007A.605.605 0 0 0 12.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.828a2 2 0 0 0-.586-1.414zM18.5 20a.5.5 0 0 1-.5.5H6a.5.5 0 0 1-.5-.5V4a.5.5 0 0 1 .5-.5h6V8a2 2 0 0 0 2 2h4.5v10zm-5-15.379L17.378 8.5H14a.5.5 0 0 1-.5-.5V4.621z" fill="currentColor" />
          </g>
        </svg>
        Document Center
      </a>
      <a target="_blank" href="adminChat.php">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
          <g fill="currentColor">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm7.194 2.766a1.688 1.688 0 0 0-.227-.272a1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 4C4.776 4 4 4.746 4 5.667c0 .92.776 1.666 1.734 1.666c.343 0 .662-.095.931-.26c-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01c1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 7.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01c1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4a1.686 1.686 0 0 0-.227-.273a1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 4c-.957 0-1.734.746-1.734 1.667c0 .92.777 1.666 1.734 1.666c.343 0 .662-.095.931-.26z" />
          </g>
        </svg>
        Chat</a>
      <a target="_blank" href="https://forms.gle/L8VQ4TvXZNEfXr5s8"><img src="../img/Reimburement.png" height="20px" width="20px"> Reimbursement</a>
      <a target="_blank" href="./time/index.php">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024">
          <defs />
          <path d="M945 412H689c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h256c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zM811 548H689c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h122c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zM477.3 322.5H434c-6.2 0-11.2 5-11.2 11.2v248c0 3.6 1.7 6.9 4.6 9l148.9 108.6c5 3.6 12 2.6 15.6-2.4l25.7-35.1v-.1c3.6-5 2.5-12-2.5-15.6l-126.7-91.6V333.7c.1-6.2-5-11.2-11.1-11.2z" fill="currentColor" />
          <path d="M804.8 673.9H747c-5.6 0-10.9 2.9-13.9 7.7c-12.7 20.1-27.5 38.7-44.5 55.7c-29.3 29.3-63.4 52.3-101.3 68.3c-39.3 16.6-81 25-124 25c-43.1 0-84.8-8.4-124-25c-37.9-16-72-39-101.3-68.3s-52.3-63.4-68.3-101.3c-16.6-39.2-25-80.9-25-124c0-43.1 8.4-84.7 25-124c16-37.9 39-72 68.3-101.3c29.3-29.3 63.4-52.3 101.3-68.3c39.2-16.6 81-25 124-25c43.1 0 84.8 8.4 124 25c37.9 16 72 39 101.3 68.3c17 17 31.8 35.6 44.5 55.7c3 4.8 8.3 7.7 13.9 7.7h57.8c6.9 0 11.3-7.2 8.2-13.3c-65.2-129.7-197.4-214-345-215.7c-216.1-2.7-395.6 174.2-396 390.1C71.6 727.5 246.9 903 463.2 903c149.5 0 283.9-84.6 349.8-215.8c3.1-6.1-1.4-13.3-8.2-13.3z" fill="currentColor" />
        </svg>
        Time Management</a>
      <a target="_blank" href="./leave/index.php"><img src="../img/Apply Leave.png" height="18px" width="18px"> Apply Leave</a>
    </div>
    <style>
      .date {
        position: fixed;
        bottom: 4px;
        color: #101010;
        font-size: 18px;
        right: 16px;
        z-index: 1000;
      }

      .time {
        position: fixed;
        bottom: 30px;
        color: #101010;
        font-size: 17px;
        right: 16px;
        z-index: 1000;
      }

      .last {
        position: absolute;
        bottom: 5px;
        color: auto;
        font-size: 17px;
        right: 16px;

      }
    </style>
  </body>

  </html>
<?php
} else {
  header("Location: Mindex.php");
  exit();
}
?>
<!---
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3>Employee List</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>01</td>
                    <td>MT0001</td>
                    <td>Karthick</td>
                    <td>manvaasamtreebank2020@gmail.com</td>
                  </tr>
                  <tr>
                    <td>02</td>
                    <td>MT0002</td>
                    <td>Sridhar</td>
                    <td>sridhar.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>03</td>
                    <td>MT0003</td>
                    <td>Nikitha B </td>
                    <td>nikitha.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>04</td>
                    <td>MT0004</td>
                    <td>Hariharan R </td>
                    <td>hari.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>05</td>
                    <td>MT0005</td>
                    <td>AJITH.M </td>
                    <td>ajith.manvasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>06</td>
                    <td>MT0006</td>
                    <td>Abila Jesy. J </td>
                    <td>abilajesy.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>09</td>
                    <td>MT0009</td>
                    <td>Nehru M </td>
                    <td>nehru.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>MT0010</td>
                    <td> Gokula krishnan k</td>
                    <td>gokulakrishnank.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>MT0011</td>
                    <td>Abhiram R </td>
                    <td>abhiram.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>MT0012</td>
                    <td>Kishore Kumar S </td>
                    <td>kishorekumar.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>MT0013</td>
                    <td>M.Sowmiya </td>
                    <td>sowmiya.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>MT0014</td>
                    <td>A.Monisha </td>
                    <td>monisha.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>MT0015</td>
                    <td>N.Rakesh </td>
                    <td>rakesh.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>MT0016</td>
                    <td>Susin P</td>
                    <td>susinmanvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>18</td>
                    <td>MT0018</td>
                    <td>R.Lakshmanan </td>
                    <td>lakshmanan.manvaasam@gmail.com</td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>MT0020</td>
                    <td>Muhil Kannan </td>
                    <td>muhilkannan.manvaasam@gmail.com</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>