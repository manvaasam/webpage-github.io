<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Leave</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-form">
                <form method="POST" class="leave-form" id="leave-form">
                    <h2>Employee Leave form</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" name="name" id="name" required="" readonly="true" value="<?php echo $_SESSION['name']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="id">Employee Id :</label>
                            <input type="text" name="id" id="id" required="" readonly="true" value="<?php echo $_SESSION['user_name']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email ID :</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" required="" placeholder="Enter Email" />
                    </div>
                    <div class="form-group">
                        <label for="typeOfLeave">Type Of Leave :</label>
                        <div class="form-select">
                            <select name="typeOfLeave" id="typeOfLeave">
                                <option value="">Select a type of leave</option>
                                <option value="Exam Leave">Exam Leave</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Casual Leave">Casual Leave</option>
                                <option value="Vacation Leave">Vacation Leave</option>
                                <option value="Personal Leave">Personal Leave</option>
                                <option value="Birthday Leave">Birthday Leave</option>
                                <option value="Other Leave">Other Leave</option>
                            </select>
                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fromDate">From :</label>
                            <input type="text" name="fromDate" id="fromDate" placeholder="dd/mm/yyyy" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="toDate">To :</label>
                            <input type="text" name="toDate" id="toDate" placeholder="dd/mm/yyyy" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason of Leave :</label>
                        <input type="text" name="reason" id="reason" placeholder="Enter Reason" required="" />
                    </div>
                    <div class="form-submit">
                        <input type="reset" value="Reset All" class="submit" name="reset" id="reset">
                        <input type="submit" value="Submit Form" class="submit" name="submit" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#fromDate").datepicker({
            dateFormat: "dd/mm/yy",
        });
        $("#toDate").datepicker({
            dateFormat: "dd/mm/yy"
        });
        document.getElementById('leave-form').addEventListener('submit', (e) => {
            e.preventDefault();
            let name = document.getElementById('name').value;
            let id = document.getElementById('id').value;
            let email = document.getElementById('email').value;
            let typeOfLeave = document.getElementById('typeOfLeave').value;
            let fromDate = document.getElementById('fromDate').value;
            let toDate = document.getElementById('toDate').value;
            let reason = document.getElementById('reason').value;
            let submit = document.getElementById('submit');
            let reset = document.getElementById('reset');
            let form = document.getElementById('leave-form');
            let formData = new FormData(form);
            let xhr = new XMLHttpRequest();
            if (isRealDate(fromDate) && isRealDate(toDate)) {
                if (new Date(fromDate) < new Date(toDate)) {
                    xhr.open('POST', 'POST/leave.php', true);
                    xhr.onload = function() {
                        if (this.status == 200) {
                            let response = JSON.parse(this.responseText);
                            if (response.status == 'success') {
                                alert(response.message);
                                window.location.href = 'index.php';
                                email.value = '';
                                typeOfLeave.value = '';
                                fromDate.value = '';
                                toDate.value = '';
                                reason.value = '';
                            } else {
                                alert(response.message);
                            }
                        }
                    }
                    xhr.send(formData);
                } else {
                    alert('Leave dates does not match');
                }
            } else {
                alert('Please enter valid date');
            }
        });

        function isRealDate(date) {
            if (!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(date)) {
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>