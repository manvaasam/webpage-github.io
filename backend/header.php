<?php
include_once "Emp_Login/Mdb_conn.php";

session_start();
$user_id = "";
$user_name = "";

if (!isset($_SESSION['user_id'])) {
    if (!isset($_COOKIE['user_name'])) {
        $id = rand(1, 99999999999);
        setcookie("user_id", $id, time() + (86400 * 365), "/");
        $_SESSION["user_id"] = $id;
    } else {
        $_SESSION["user_id"] = $_COOKIE["user_id"];
    }
}
if (isset($_COOKIE['user_name'])) {
    $_SESSION["user_name"] = $_COOKIE['user_name'];
    $user_name = $_COOKIE["user_name"];
}
$user_id = $_SESSION["user_id"];
?>
<link rel="stylesheet" href="https://manvaasam.com/chat.css">
<nav class="shadow-sm navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://manvaasam.com/aboutus.php"><img class="logo" src="https://manvaasam.com/image/products/manvasam_logo1.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/index.php") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link px-3" href="https://manvaasam.com/index.php">
                        <div class="tab-text">Home</div>
                    </a>
                </li>
                <?php
                if (strpos($_SERVER['REQUEST_URI'], "product") !== false) {
                    echo '<li class="nav-item active">';
                } else {
                    echo '<li class="nav-item">';
                }
                ?>
                <a class="nav-link px-3" href="https://manvaasam.com/product.php">
                    <div class="tab-text">Products</div>
                </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/gallery.php") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link px-3" href="https://manvaasam.com/gallery.php">
                        <div class="tab-text">Gallery</div>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/course.php") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link px-3" href="https://manvaasam.com/course.php">
                        <div class="tab-text">Courses</div>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/aboutus.php") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link px-3" href="https://manvaasam.com/aboutus.php">
                        <div class="tab-text">About&nbsp;us</div>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/Logistics/log.php") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link px-3" href="https://manvaasam.com/Logistics/log.php">
                        <div class="tab-text">Logistics</div>
                    </a>
                </li>
                <li class="nav-item dropdown <?php if ($_SERVER['REQUEST_URI'] == "/Student_Login/loginindex.php" || $_SERVER['REQUEST_URI'] == "/Emp_Login/Mindex.html" || $_SERVER['REQUEST_URI'] == "/Admin_Login/admin.php") {
                                                    echo "active";
                                                } ?>">
                    <a class="nav-link px-3 dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div style="right: 0" class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="https://manvaasam.com/Student_Login/loginindex.php">Student Login</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="https://manvaasam.com/Emp_Login/Mindex.html">Manvaasam Login</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="https://manvaasam.com/Admin_Login/admin.php">Admin Login</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li>
                    <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSdU3temNU7_tPoLRX__95b2Tdbw9frmZGswBFFx5AAM4tmZuA/viewform" target="_blank">
                        <button class="btn btn-success btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="0.8rem" height="0.8rem" viewBox="0 0 24 24">
                                <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2S7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z" fill="#fff" />
                            </svg>
                            Join with us
                        </button>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="https://chat.whatsapp.com/L419in2xs11E02ga8UTN2u" target="_blank">
                        <button class="btn btn-success btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222c0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222c0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4l-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2c0-101.7 82.8-184.5 184.6-184.5c49.3 0 95.6 19.2 130.4 54.1c34.8 34.9 56.2 81.2 56.1 130.5c0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18c-5.1-1.9-8.8-2.8-12.5 2.8c-3.7 5.6-14.3 18-17.6 21.8c-3.2 3.7-6.5 4.2-12 1.4c-32.6-16.3-54-29.1-75.5-66c-5.7-9.8 5.7-9.1 16.3-30.3c1.8-3.7.9-6.9-.5-9.7c-1.4-2.8-12.5-30.1-17.1-41.2c-4.5-10.8-9.1-9.3-12.5-9.5c-3.2-.2-6.9-.2-10.6-.2c-3.7 0-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3c0 27.3 19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8c35.2 15.2 49 16.5 66.6 13.9c10.7-1.6 32.8-13.4 37.4-26.4c4.6-13 4.6-24.1 3.2-26.4c-1.3-2.5-5-3.9-10.5-6.6z" fill="#fff" />
                            </svg>
                            WhatsApp Group
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="FloatingButton one">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
        <g fill="currentColor">
            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM7.194 4.766c.087.124.163.26.227.401c.428.948.393 2.377-.942 3.706a.446.446 0 0 1-.612.01a.405.405 0 0 1-.011-.59c.419-.416.672-.831.809-1.22c-.269.165-.588.26-.93.26C4.775 7.333 4 6.587 4 5.667C4 4.747 4.776 4 5.734 4c.271 0 .528.06.756.166l.008.004c.169.07.327.182.469.324c.085.083.161.174.227.272zM11 7.073c-.269.165-.588.26-.93.26c-.958 0-1.735-.746-1.735-1.666c0-.92.777-1.667 1.734-1.667c.271 0 .528.06.756.166l.008.004c.17.07.327.182.469.324c.085.083.161.174.227.272c.087.124.164.26.228.401c.428.948.392 2.377-.942 3.706a.446.446 0 0 1-.613.01a.405.405 0 0 1-.011-.59c.42-.416.672-.831.81-1.22z" />
        </g>
    </svg>
    &nbsp;
    Chat Us
</div>
<div class="FloatingButton" style="width: 50px;height: 50px;border-radius: 50%;bottom: 75px;">
    <a href="tel:+91 6380091001" style="color: #fff;display: flex;justify-content: center;">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
            <g fill="none">
                <path d="M7.056 2.418l1.167-.351a2.75 2.75 0 0 1 3.302 1.505l.902 2.006a2.75 2.75 0 0 1-.633 3.139L10.3 10.11a.25.25 0 0 0-.078.155c-.044.397.225 1.17.845 2.245c.451.781.86 1.33 1.207 1.637c.242.215.375.261.432.245l2.01-.615a2.75 2.75 0 0 1 3.034 1.02l1.281 1.776a2.75 2.75 0 0 1-.339 3.605l-.886.84a3.75 3.75 0 0 1-3.587.889c-2.754-.769-5.223-3.093-7.435-6.924c-2.215-3.836-2.992-7.14-2.276-9.913a3.75 3.75 0 0 1 2.548-2.652zm.433 1.437a2.25 2.25 0 0 0-1.529 1.59c-.602 2.332.087 5.261 2.123 8.788c2.033 3.522 4.222 5.582 6.54 6.23a2.25 2.25 0 0 0 2.151-.534l.887-.84a1.25 1.25 0 0 0 .154-1.639l-1.28-1.775a1.25 1.25 0 0 0-1.38-.464l-2.015.617c-1.17.348-2.232-.593-3.372-2.568C9 11.93 8.642 10.9 8.731 10.099c.047-.416.24-.8.546-1.086l1.494-1.393a1.25 1.25 0 0 0 .288-1.427l-.902-2.006a1.25 1.25 0 0 0-1.5-.684l-1.168.352z" fill="currentColor" />
            </g>
        </svg>
    </a>
</div>
<div class="FloatingBox card border-1 p-2 text-center">
    <div>
        <img src="https://manvaasam.com/image/products/manvasam_logo1.png">
    </div>
    <div class="p-2"></div>
    <div class="FloatingBoxInner">
        <?php
        if ($user_name == "") {
        ?>
            <div class="overlayInputBox">
                <form class="typing-area" id="userNameForm" method="post">
                    <input id="inputName" type="text" name="name" class="input-field" placeholder="Enter your Name" autocomplete="off">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <g fill="none">
                                <path d="M1.724 1.053a.5.5 0 0 0-.714.545l1.403 4.85a.5.5 0 0 0 .397.354l5.69.953c.268.053.268.437 0 .49l-5.69.953a.5.5 0 0 0-.397.354l-1.403 4.85a.5.5 0 0 0 .714.545l13-6.5a.5.5 0 0 0 0-.894l-13-6.5z" fill="currentColor" />
                            </g>
                        </svg>
                    </button>
                </form>
            </div>
        <?php
        } else {
        ?>
            <div id="userNameForm" style="display: none;"></div>
        <?php
        }
        ?>
        <div class="chat-box">
            <div class="alertMessage">

            </div>
            <div class="contentContainer">

            </div>
        </div>
        <form action="#" class="typing-area" id="chatForm">
            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                    <g fill="none">
                        <path d="M1.724 1.053a.5.5 0 0 0-.714.545l1.403 4.85a.5.5 0 0 0 .397.354l5.69.953c.268.053.268.437 0 .49l-5.69.953a.5.5 0 0 0-.397.354l-1.403 4.85a.5.5 0 0 0 .714.545l13-6.5a.5.5 0 0 0 0-.894l-13-6.5z" fill="currentColor" />
                    </g>
                </svg>
            </button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.FloatingButton one').addEventListener('click', function() {
        document.querySelector('.FloatingBox').classList.toggle('show');
    });
    document.querySelector('form#chatForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var message = document.querySelector('form#chatForm input[name=message]').value;
        var user_id = document.querySelector('form#chatForm input[name=user_id]').value;
        var user_name = document.querySelector('form#chatForm input[name=user_name]').value;
        if (message.length > 0) {
            message = sanitize(message);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'https://manvaasam.com/sendMessage.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    response = response.trim();
                    if (response === '1') {
                        var chat = document.querySelector('.chat-box .contentContainer');
                        var text = '<div class="chat outgoing"><div class="details"><p>' + message + '</p></div></div>'
                        chat.insertAdjacentHTML('beforeend', text);
                        document.querySelector('.alertMessage').innerHTML = '<div class="alert alert-info" role="alert"><span class="message">You will get Notify when the admins comes online</span></div>'
                        document.querySelector('form#chatForm input[name=message]').value = '';
                    } else {
                        alert(response);
                    }
                }
            };
            xhr.send('message=' + message + '&user_id=' + user_id + '&user_name=' + user_name);
        }
    });
    document.querySelector('#userNameForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var name = document.querySelector('#inputName').value;
        var user_id = document.querySelector('form#userNameForm input[name=user_id]').value;
        if (name.length > 0) {
            name = sanitize(name);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'https://manvaasam.com/setName.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    response = response.trim();
                    if (response === 'success') {
                        alert('Welcome To Manvaasam Chat');
                        document.querySelector('.overlayInputBox').style.display = 'none';
                        document.querySelector('#chatForm input[name=user_name]').value = name;
                    } else {
                        alert(response);
                    }
                }
            };
            xhr.send('name=' + name + '&user_id=' + user_id);
        }
    });

    function getMessages() {
        var user_id = <?php echo $user_id ?>;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://manvaasam.com/getMessages.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                response = response.trim();
                if (response === 'Error') {
                    alert(response);
                } else {
                    response = JSON.parse(response);
                    var chat = document.querySelector('.chat-box .contentContainer');
                    chat.innerHTML = '';
                    for (var i = 0; i < response.length; i++) {
                        if (response[i].sender == "you") {
                            var text = '<div class="chat outgoing"><div class="details"><p>' + response[i].message + '</p></div></div>'
                            chat.insertAdjacentHTML('beforeend', text);
                        } else {
                            var text = '<div class="chat incoming"><div class="details"><p> <span style="font-size:75%;font-weight:bold" >' + response[i].sender.toUpperCase() + '</span><br/>' + response[i].message + '</p></div></div>'
                            chat.insertAdjacentHTML('beforeend', text);
                        }
                    }
                }
            }
        };
        xhr.send('id=' + user_id);
    }
    setInterval(getMessages, 2000);

    function sanitize(string) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#x27;',
            "/": '&#x2F;',
        };
        const reg = /[&<>"'/]/ig;
        return string.replace(reg, (match) => (map[match]));
    }
</script>