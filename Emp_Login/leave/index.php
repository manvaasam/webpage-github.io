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
    <div class="main">
        <div class="container" style="overflow-x: auto">
            <div class="signup-form">
                <h2>Navigations</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-2">
                            <a href="leave.php" class="btn btn-primary w-100">Leave Form</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-2">
                            <a href="all.php" class="btn btn-primary  w-100">All Leave List</a>
                        </div>
                    </div>
                </div>
                <div class="p-2">
                    <h4>Track Your Leave</h4>
                    <form id="trackLeave">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <input type="text" name="id" id="id" required="" placeholder="Leave Id" />
                            </div>
                            <div class="form-group col-md-2">
                                <input type="submit" class="btn btn-success" value="Track" style="height: 45px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('trackLeave').addEventListener('submit', function(e) {
            e.preventDefault();
            var id = document.getElementById('id').value;
            window.location.href = 'leave_details.php?id=' + id;
        });
    </script>
</body>

</html>