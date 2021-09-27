<?php
session_start();
include_once "./Mdb_conn.php";


if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_id = $_GET['user_id'];
        $sql = "SELECT * FROM messages WHERE user_id = '$user_id'";
        $result = $conn->query($sql);

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
            <!-- Refresh page in every 5 seconds -->
        </head>

        <body>
            <div class="wrapper">
                <section class="chat-area">
                    <header>
                        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <div class="details">
                            <span>Manvaasam</span>
                            <p>active</p>
                        </div>
                    </header>

                    <div class="chat-box">

                        <div class="contentContainer">

                        </div>
                    </div>
                    <form action="#" class="typing-area">
                        <input type="hidden" class="user_id" name="user_id" value="<?php echo $user_id; ?>" hidden>
                        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                                <g fill="none">
                                    <path d="M1.724 1.053a.5.5 0 0 0-.714.545l1.403 4.85a.5.5 0 0 0 .397.354l5.69.953c.268.053.268.437 0 .49l-5.69.953a.5.5 0 0 0-.397.354l-1.403 4.85a.5.5 0 0 0 .714.545l13-6.5a.5.5 0 0 0 0-.894l-13-6.5z" fill="currentColor" />
                                </g>
                            </svg>
                        </button>
                    </form>
                </section>
            </div>
            <script>
                document.querySelector('form.typing-area').addEventListener('submit', function(e) {
                    e.preventDefault();
                    var message = document.querySelector('form.typing-area input[name=message]').value;
                    var user_id = document.querySelector('form.typing-area input[name=user_id]').value;
                    // validate message
                    if (message.length > 0) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'chat.php');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var response = xhr.responseText;
                                response = response.trim();
                                if (response === '1') {
                                    var chat = document.querySelector('.chat-box .contentContainer');
                                    var text = '<div class="chat outgoing"><div class="details"><p>' + message + '</p></div></div>'
                                    chat.insertAdjacentHTML('beforeend', text);
                                    document.querySelector('form.typing-area input[name=message]').value = '';
                                } else {
                                    alert(response);
                                }
                            }
                        };
                        xhr.send('message=' + message + '&user_id=' + user_id);
                    }
                });

                function getMessages() {
                    var user_id = document.querySelector('form.typing-area input[name=user_id]').value;
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../getMessages.php');
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
                                        var text = '<div class="chat incoming"><div class="details"><p>' + response[i].message + '</p></div></div>'
                                        chat.insertAdjacentHTML('beforeend', text);
                                    } else {
                                        var text = '<div class="chat outgoing"><div class="details"><p>' + response[i].message + '</p></div></div>'
                                        chat.insertAdjacentHTML('beforeend', text);
                                    }
                                }
                            }
                        }
                    };
                    xhr.send('id=' + user_id);
                }

                setInterval(getMessages, 2000);
            </script>
            <style>
                .chat-box p {
                    margin-bottom: 0 !important;
                }

                @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    text-decoration: none;
                    font-family: "Poppins", sans-serif;
                }

                body {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    min-height: 100vh;
                    background: #f7f7f7;
                    padding: 0 10px;
                }

                .wrapper {
                    background: #fff;
                    max-width: 450px;
                    width: 100%;
                    border-radius: 16px;
                    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                        0 32px 64px -48px rgba(0, 0, 0, 0.5);
                }

                /* Login & Signup Form CSS Start */
                .form {
                    padding: 25px 30px;
                }

                .form header {
                    font-size: 25px;
                    font-weight: 600;
                    padding-bottom: 10px;
                    border-bottom: 1px solid #e6e6e6;
                }

                .form form {
                    margin: 20px 0;
                }

                .form form .error-text {
                    color: #721c24;
                    padding: 8px 10px;
                    text-align: center;
                    border-radius: 5px;
                    background: #f8d7da;
                    border: 1px solid #f5c6cb;
                    margin-bottom: 10px;
                    display: none;
                }

                .form form .name-details {
                    display: flex;
                }

                .form .name-details .field:first-child {
                    margin-right: 10px;
                }

                .form .name-details .field:last-child {
                    margin-left: 10px;
                }

                .form form .field {
                    display: flex;
                    margin-bottom: 10px;
                    flex-direction: column;
                    position: relative;
                }

                .form form .field label {
                    margin-bottom: 2px;
                }

                .form form .input input {
                    height: 40px;
                    width: 100%;
                    font-size: 16px;
                    padding: 0 10px;
                    border-radius: 5px;
                    border: 1px solid #ccc;
                }

                .form form .field input {
                    outline: none;
                }

                .form form .image input {
                    font-size: 17px;
                }

                .form form .button input {
                    height: 45px;
                    border: none;
                    color: #fff;
                    font-size: 17px;
                    background: #333;
                    border-radius: 5px;
                    cursor: pointer;
                    margin-top: 13px;
                }

                .form form .field i {
                    position: absolute;
                    right: 15px;
                    top: 70%;
                    color: #ccc;
                    cursor: pointer;
                    transform: translateY(-50%);
                }

                .form form .field i.active::before {
                    color: #333;
                    content: "\f070";
                }

                .form .link {
                    text-align: center;
                    margin: 10px 0;
                    font-size: 17px;
                }

                .form .link a {
                    color: #333;
                }

                .form .link a:hover {
                    text-decoration: underline;
                }

                /* Users List CSS Start */
                .users {
                    padding: 25px 30px;
                }

                .users header,
                .users-list a {
                    display: flex;
                    align-items: center;
                    padding-bottom: 20px;
                    border-bottom: 1px solid #e6e6e6;
                    justify-content: space-between;
                }

                .wrapper img {
                    object-fit: cover;
                    border-radius: 50%;
                }

                .users header img {
                    height: 50px;
                    width: 50px;
                }

                :is(.users, .users-list) .content {
                    display: flex;
                    align-items: center;
                }

                :is(.users, .users-list) .content .details {
                    color: #000;
                    margin-left: 20px;
                }

                :is(.users, .users-list) .details span {
                    font-size: 18px;
                    font-weight: 500;
                }

                .users header .logout {
                    display: block;
                    background: #333;
                    color: #fff;
                    outline: none;
                    border: none;
                    padding: 7px 15px;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 17px;
                }

                .users .search {
                    margin: 20px 0;
                    display: flex;
                    position: relative;
                    align-items: center;
                    justify-content: space-between;
                }

                .users .search .text {
                    font-size: 18px;
                }

                .users .search input {
                    position: absolute;
                    height: 42px;
                    width: calc(100% - 50px);
                    font-size: 16px;
                    padding: 0 13px;
                    border: 1px solid #e6e6e6;
                    outline: none;
                    border-radius: 5px 0 0 5px;
                    opacity: 0;
                    pointer-events: none;
                    transition: all 0.2s ease;
                }

                .users .search input.show {
                    opacity: 1;
                    pointer-events: auto;
                }

                .users .search button {
                    position: relative;
                    z-index: 1;
                    width: 47px;
                    height: 42px;
                    font-size: 17px;
                    cursor: pointer;
                    border: none;
                    background: #fff;
                    color: #333;
                    outline: none;
                    border-radius: 0 5px 5px 0;
                    transition: all 0.2s ease;
                }

                .users .search button.active {
                    background: #333;
                    color: #fff;
                }

                .search button.active i::before {
                    content: "\f00d";
                }

                .users-list {
                    max-height: 350px;
                    overflow-y: auto;
                }

                :is(.users-list, .chat-box)::-webkit-scrollbar {
                    width: 0px;
                }

                .users-list a {
                    padding-bottom: 10px;
                    margin-bottom: 15px;
                    padding-right: 15px;
                    border-bottom-color: #f1f1f1;
                }

                .users-list a:last-child {
                    margin-bottom: 0px;
                    border-bottom: none;
                }

                .users-list a img {
                    height: 40px;
                    width: 40px;
                }

                .users-list a .details p {
                    color: #67676a;
                }

                .users-list a .status-dot {
                    font-size: 12px;
                    color: #468669;
                    padding-left: 10px;
                }

                .users-list a .status-dot.offline {
                    color: #ccc;
                }

                /* Chat Area CSS Start */
                .chat-area header {
                    display: flex;
                    align-items: center;
                    padding: 18px 30px;
                }

                .chat-area header .back-icon {
                    color: #333;
                    font-size: 18px;
                }

                .chat-area header img {
                    height: 45px;
                    width: 45px;
                    margin: 0 15px;
                }

                .chat-area header .details span {
                    font-size: 17px;
                    font-weight: 500;
                }

                .chat-box {
                    position: relative;
                    min-height: 500px;
                    max-height: 500px;
                    overflow-y: auto;
                    padding: 10px 30px 20px 30px;
                    background: #f7f7f7;
                    box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                        inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
                }

                .chat-box .text {
                    position: absolute;
                    top: 45%;
                    left: 50%;
                    width: calc(100% - 50px);
                    text-align: center;
                    transform: translate(-50%, -50%);
                }

                .chat-box .chat {
                    margin: 15px 0;
                }

                .chat-box .chat p {
                    word-wrap: break-word;
                    padding: 8px 16px;
                    box-shadow: 0 0 32px rgb(0 0 0 / 8%), 0rem 16px 16px -16px rgb(0 0 0 / 10%);
                }

                .chat-box .outgoing {
                    display: flex;
                }

                .chat-box .outgoing .details {
                    margin-left: auto;
                    max-width: calc(100% - 130px);
                }

                .outgoing .details p {
                    background: #333;
                    color: #fff;
                    border-radius: 18px 18px 0 18px;
                }

                .chat-box .incoming {
                    display: flex;
                    align-items: flex-end;
                }

                .chat-box .incoming img {
                    height: 35px;
                    width: 35px;
                }

                .chat-box .incoming .details {
                    margin-right: auto;
                    margin-left: 10px;
                    max-width: calc(100% - 130px);
                }

                .incoming .details p {
                    background: #fff;
                    color: #333;
                    border-radius: 18px 18px 18px 0;
                }

                .typing-area {
                    padding: 18px 30px;
                    display: flex;
                    justify-content: space-between;
                }

                .typing-area input {
                    height: 45px;
                    width: calc(100% - 58px);
                    font-size: 16px;
                    padding: 0 13px;
                    border: 1px solid #e6e6e6;
                    outline: none;
                    border-radius: 5px 0 0 5px;
                }

                .typing-area button {
                    color: #fff;
                    width: 55px;
                    border: none;
                    outline: none;
                    background: #333;
                    font-size: 19px;
                    cursor: pointer;
                    opacity: 0.7;
                    pointer-events: none;
                    border-radius: 0 5px 5px 0;
                    transition: all 0.3s ease;
                }

                .typing-area button.active {
                    opacity: 1;
                    pointer-events: auto;
                }

                /* Responive media query */
                @media screen and (max-width: 450px) {

                    .form,
                    .users {
                        padding: 20px;
                    }

                    .form header {
                        text-align: center;
                    }

                    .form form .name-details {
                        flex-direction: column;
                    }

                    .form .name-details .field:first-child {
                        margin-right: 0px;
                    }

                    .form .name-details .field:last-child {
                        margin-left: 0px;
                    }

                    .users header img {
                        height: 45px;
                        width: 45px;
                    }

                    .users header .logout {
                        padding: 6px 10px;
                        font-size: 16px;
                    }

                    :is(.users, .users-list) .content .details {
                        margin-left: 15px;
                    }

                    .users-list a {
                        padding-right: 10px;
                    }

                    .chat-area header {
                        padding: 15px 20px;
                    }

                    .chat-box {
                        min-height: 400px;
                        padding: 10px 15px 15px 20px;
                    }

                    .chat-box .chat p {
                        font-size: 15px;
                    }

                    .chat-box .outogoing .details {
                        max-width: 230px;
                    }

                    .chat-box .incoming .details {
                        max-width: 265px;
                    }

                    .incoming .details img {
                        height: 30px;
                        width: 30px;
                    }

                    .chat-area form {
                        padding: 20px;
                    }

                    .chat-area form input {
                        height: 40px;
                        width: calc(100% - 48px);
                    }

                    .chat-area form button {
                        width: 45px;
                    }
                }
            </style>
        </body>

        </html>
<?php
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message = $_POST["message"];
        $user_id = $_POST["user_id"];
        $Now = date("Y-m-d H:i:s");
        $type = $_SESSION['name'];
        // user_id only conntains numbers using regex
        if (preg_match("/^[0-9]+$/", $user_id)) {
            // check message is not empty
            if (strlen($message) > 0) {
                // check message is not too long
                if (strlen($message) < 1000) {
                    // check message is not too short
                    if (strlen($message) >= 5) {
                        $sql = "INSERT INTO messages (message, user_id, sender, created_at) VALUES ('$message', '$user_id', '$type', '$Now')";
                        if ($conn->query($sql) === TRUE) {
                            echo "1";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Message is too short";
                    }
                } else {
                    echo "Message is too long";
                }
            } else {
                echo "Message is empty";
            }
        } else {
            echo "Error: user_id is not numeric";
        }
    } else {
        echo "parameter mistake";
    }
} else {
    echo "Error: You Dont have rights to access this page";
}
