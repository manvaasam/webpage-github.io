<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $id = rand(1, 99999999999);
    $cookie_name = "user_id";
    $cookie_value = $id;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
    $_SESSION[$cookie_name] = $cookie_value;
}
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="./image/fav_icon.png" type="image/png" />
    <title>Manvaasam</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.001.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3/dist/js/bootstrap.min.js"></script>
    <style>
        .FloatingButton {
            position: fixed;
            right: 0;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            font-size: 25px;
            color: #fff;
            background: #198754;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999999;
        }

        .FloatingBox {
            position: fixed;
            right: 0;
            bottom: 80px;
            right: 20px;
            width: 90%;
            max-width: 400px;
            max-height: 600px;
            min-height: 200px;
            height: 70%;
            color: #fff;
            background: #fafafa;
            border-radius: 5px;
            display: none;
            z-index: 9999999;
        }

        .FloatingBox.show {
            display: flex;
        }

        .FloatingBoxInner {
            position: relative;
            width: 100%;
            height: 100%;
            background: #fff;
        }

        .FloatingBox img {
            height: 50px;
        }

        .typing-area {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            position: absolute;
            bottom: 0;
            width: 100%;
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

        .typing-area input {
            height: 45px;
            width: calc(100% - 43px);
            font-size: 16px;
            padding: 0 13px;
            border: 1px solid #e6e6e6;
            outline: none;
            border-radius: 5px 0 0 5px;
        }

        .typing-area button {
            color: #fff;
            width: 40px;
            border: none;
            outline: none;
            background: #333;
            font-size: 19px;
            cursor: pointer;
            opacity: 0.7;
            pointer-events: none;
            border-radius: 0 5px 5px 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-box {
            position: absolute;
            overflow-y: auto;
            height: calc(100% - 60px);
            width: 100%;
        }

        .chat-box .text {
            position: absolute;
            top: 45%;
            left: 50%;
            width: calc(100% - 50px);
            text-align: center;
            transform: translate(-50%, -50%);
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
            text-align: left !important;
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

        .chat-header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body style="overflow-x: hidden">
<?php
    include_once './backend/header.php';
?>

    <div class="bg-video-wrap">
        <video src="./assets/videos/bg_autoplay_3.mp4" loop muted autoplay></video>
        <div class="overlay"></div>
        <div class="content">
            <div class="heroWrap-content">
                <h2>FARMER'S BEST FRIENDS</h2>
                <h1>Manvaasam</h1>
                <p>We are the friend's of farmers. Our mission is to plant 100k tree before 2023
                </p>
                <a href="aboutus.html">
                    <span class="btn btn-outline-white myPrimary">ABOUT US</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="flex-center my-5">
            <div class="box">
                <svg class="fa2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" width="1rem" height="1rem" viewBox="0 0 1664 1408">
                    <path d="M768 832v384q0 80-56 136t-136 56H192q-80 0-136-56T0 1216V512q0-104 40.5-198.5T150 150T313.5 40.5T512 0h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136zm896 0v384q0 80-56 136t-136 56h-384q-80 0-136-56t-56-136V512q0-104 40.5-198.5T1046 150t163.5-109.5T1408 0h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136z" fill="#fff" />
                </svg>
                <div class="text">
                    <svg class="fa1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" width="1rem" height="1rem" viewBox="0 0 1664 1408">
                        <path d="M768 192v704q0 104-40.5 198.5T618 1258t-163.5 109.5T256 1408h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64q106 0 181-75t75-181v-32q0-40-28-68t-68-28H192q-80 0-136-56T0 576V192q0-80 56-136T192 0h384q80 0 136 56t56 136zm896 0v704q0 104-40.5 198.5T1514 1258t-163.5 109.5T1152 1408h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64q106 0 181-75t75-181v-32q0-40-28-68t-68-28h-224q-80 0-136-56t-56-136V192q0-80 56-136t136-56h384q80 0 136 56t56 136z" fill="#fff" />
                    </svg>
                    <div>
                        <h2 style="font-weight: bold;" class="pb-2">
                            QUOTE OF THE DAY
                        </h2>
                        <h4>
                            “As long as there’s a few farmers out there, we’ll keep fighting for them.”
                        </h4>
                        <p style="text-align: right;">
                            - Willie Nelson
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-center my-5">
            <div class="box">
                <svg class="fa2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" width="1rem" height="1rem" viewBox="0 0 1664 1408">
                    <path d="M768 832v384q0 80-56 136t-136 56H192q-80 0-136-56T0 1216V512q0-104 40.5-198.5T150 150T313.5 40.5T512 0h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136zm896 0v384q0 80-56 136t-136 56h-384q-80 0-136-56t-56-136V512q0-104 40.5-198.5T1046 150t163.5-109.5T1408 0h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136z" fill="#fff" />
                </svg>
                <div class="text">
                    <svg class="fa1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" width="1rem" height="1rem" viewBox="0 0 1664 1408">
                        <path d="M768 192v704q0 104-40.5 198.5T618 1258t-163.5 109.5T256 1408h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64q106 0 181-75t75-181v-32q0-40-28-68t-68-28H192q-80 0-136-56T0 576V192q0-80 56-136T192 0h384q80 0 136 56t56 136zm896 0v704q0 104-40.5 198.5T1514 1258t-163.5 109.5T1152 1408h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64q106 0 181-75t75-181v-32q0-40-28-68t-68-28h-224q-80 0-136-56t-56-136V192q0-80 56-136t136-56h384q80 0 136 56t56 136z" fill="#fff" />
                    </svg>
                    <div>
                        <h2 style="font-weight: bold;" class="pb-2">
                        திருக்குறள்
                        </h2>
                        <h4 style="text-align:left;font-size: large">
                            “உழுதுண்டு வாழ்வாரே வாழ்வார்மற் றெல்லாம்<br> தொழுதுண்டு பின்செல் பவர்.”<br><br>

                            <b>பொருள்:</b> உழவு செய்து அதனால் கிடைத்ததைக் கொண்டு வாழ்கின்றவரே உரிமையோடு வாழ்கின்றவர், மற்றவர் எல்லோரும் பிறரைத் தொழுது உண்டு பின் செல்கின்றவரே.
                        </h4>
                        <p style="text-align: right;">
                            - திருவள்ளுவர்
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3" style="
            background: #90d156;
            border-radius: 100px 0px 100px 0px;
            box-shadow: 0 4px 8px 0 #3d3d3d;
          ">
            <div class="col-sm-6 flex-center">
                <img src="./image/home/demo_interview.jpeg" alt="demo_interview" class="img-fluid" style="width: 70%; height: 70%; padding: 4%" />
            </div>
            <div class="col-sm-6">
                <div class=" flex-center">
                    <div>

                        <div class="text-center">
                            <h2>DEMO INTERVIEW</h2>
                            <h3>"Overcome your fear about interviews"</h3>
                        </div>
                        <h3>Process Flow:-</h3>
                        <ol class="small">
                            <li>Fill this Demo Interview Form</li>
                            <li>Schedule your available Timing(30 minutes)</li>
                            <li>
                                Demo Interview Link will be shared via mail/Phone once payment
                                is completed.
                            </li>
                            <li>Upload the Screenshot of Payment while Registration</li>
                            <li>Feed backs will be shared at the end of the meet.</li>
                        </ol>
                        <br />
                        <div class="text-center">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfyt21exsn0OtuFcaF4TtngpT6RuaYDWvFLk0o6EQ4yH8Vgqg/viewform" target="_blank"><button class="btn btn-success wow animate__heartBeat animate__slower">Book Your Slot</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="row p-3" style="
        background: #90d156;
        border-radius: 100px 0px 100px 0px;
        box-shadow: 0 4px 8px 0 #3d3d3d;
      ">
            <div class="col-sm-6 flex-center">
                <img src="./image/home/birthdayform.jpg" alt="Birthdayplant" class="img-fluid" style="width: 65%; height: 65%; padding: 4%" />
            </div>
            <div class="col-sm-6">
                <div class=" flex-center">
                    <div>

                        <div class="text-center">
                            <h2> WE CELEBRATE YOUR BIRTHDAY BY PLANTING A SAPLING </h2>
                            <h3></h3>
                        </div>
                        <h4> We will plant a sapling on your birthday and maintain it for life long on behalf of you...</h4>

                        <div class="text-center"><a href="https://docs.google.com/forms/d/1gW1NGolizN5DoeJ6cbmMNRNJXTNExdSIsSYM9BYl3Mc/viewform?edit_requested=true" target="_blank" class="btn btn-success wow animate__heartBeat animate__slower">TO PLANT</a>
                            <a href="https://milaap.org/fundraisers/support-us-to-plant-trees-around-tamilnadu/deeplink?deeplink_type=paytm" target="_blank" class="btn btn-success wow animate__heartBeat animate__slower">TO DONATE</a>
                        </div>
                        <br />

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-4">
        <div class="col-sm-6">
            <img src="./image/manvasam_logo1.png" style="width: 80%; height: 175px" />
        </div>
        <div class="col-sm-6 text-center">
            <div class="flex-center">
                <h2>Be a part of Manvaasam,for a change</h2>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="jumbotron" style="
        margin-bottom: 0;
        background: #90d156;
        padding-top: 5px;
        padding-bottom: 5px;
        border-radius: 50px 50px 10px 10px;
      ">
        <div class="row">
            <div class="col-sm-6">
                <div style="margin-left: 15%; padding: 5%">
                    <a href="tel:6380091001"><img style="width: 25px; margin-right: 2%; margin-left: 2%" src="./image/otherlogo/whatsapp.png" /></a>
                    +91 6380091001<br />
                    <a href="mailto:training@manvaasam.com"><img style="width: 25px; margin-left: 2%; margin-right: 2%" src="./image/otherlogo/gmail.png" /></a>training@manvaasam.com
                </div>
            </div>

            <div class="col-sm-6">
                <div style="margin-top: 5%">
                    <center>
                        <a href="https://manvaasamteam.wordpress.com/2021/02/24/a-gratitude-note/"><img target="_blank" style="width: 35px; margin-right: 8%" src="./image/otherlogo/blog.png" /></a>
                        <a href="https://www.linkedin.com/in/manvaasam-team-/"><img style="width: 35px; margin-right: 8%" target="_blank" src="./image/otherlogo/linkedin.png" /></a>
                        <a href="https://www.facebook.com/107974564140846/posts/133516268253342/?substory_index=0"><img target="_blank" style="width: 35px; margin-right: 8%" src="./image/otherlogo/fb.png" /></a>
                        <a href="https://www.instagram.com/manvaasam_/"><img style="width: 35px; margin-right: 8%" target="_blank" src="./image/otherlogo/insta.png" /></a>
                        <a href="https://www.youtube.com/channel/UCTybxerFOmv86ekeIO1hUQw"><img style="width: 45px" target="_blank" src="./image/otherlogo/youtube.png" /></a><br />
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="FloatingButton">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
            <g fill="currentColor">
                <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM7.194 4.766c.087.124.163.26.227.401c.428.948.393 2.377-.942 3.706a.446.446 0 0 1-.612.01a.405.405 0 0 1-.011-.59c.419-.416.672-.831.809-1.22c-.269.165-.588.26-.93.26C4.775 7.333 4 6.587 4 5.667C4 4.747 4.776 4 5.734 4c.271 0 .528.06.756.166l.008.004c.169.07.327.182.469.324c.085.083.161.174.227.272zM11 7.073c-.269.165-.588.26-.93.26c-.958 0-1.735-.746-1.735-1.666c0-.92.777-1.667 1.734-1.667c.271 0 .528.06.756.166l.008.004c.17.07.327.182.469.324c.085.083.161.174.227.272c.087.124.164.26.228.401c.428.948.392 2.377-.942 3.706a.446.446 0 0 1-.613.01a.405.405 0 0 1-.011-.59c.42-.416.672-.831.81-1.22z" />
            </g>
        </svg>
    </div>
    <div class="FloatingBox card border-1 p-2 text-center">
        <div>
            <img src="./image/products/manvasam_logo1.png">
        </div>
        <div class="p-2"></div>
        <div class="FloatingBoxInner">
            <div class="chat-box">
                <div class="chat-header text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20">
                        <path d="M15 9h-1V6c0-2.2-1.8-4-4-4S6 3.8 6 6v3H5c-.5 0-1 .5-1 1v7c0 .5.5 1 1 1h10c.5 0 1-.5 1-1v-7c0-.5-.5-1-1-1zm-4 7H9l.4-2.2c-.5-.2-.9-.8-.9-1.3c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5c0 .6-.3 1.1-.9 1.3L11 16zm1-7H8V6c0-1.1.9-2 2-2s2 .9 2 2v3z" fill="currentColor" />
                    </svg>
                    <div class="p-1"></div>
                    End to end encrypted
                </div>
                <div class="alertMessage">

                </div>
                <div class="contentContainer">

                </div>
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
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
    </div>
    <script>
        document.querySelector('.FloatingButton').addEventListener('click', function() {
            document.querySelector('.FloatingBox').classList.toggle('show');
        });
        document.querySelector('form.typing-area').addEventListener('submit', function(e) {
            e.preventDefault();
            var message = document.querySelector('form.typing-area input[name=message]').value;
            var user_id = document.querySelector('form.typing-area input[name=user_id]').value;
            // validate message
            if (message.length > 0) {
                message = sanitize(message);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'sendMessage.php');
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
                            document.querySelector('form.typing-area input[name=message]').value = '';
                        } else {
                            alert(response);
                        }
                    }
                };
                xhr.send('message=' + message + '&user_id=' + user_id);
                // Clear input field
            }
        });

        function getMessages() {
            var user_id = document.querySelector('form.typing-area input[name=user_id]').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'getMessages.php');
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
                                var text = '<div class="chat incoming"><div class="details"><p> <span style="font-size:75%;font-weight:bold" >'+response[i].sender.toUpperCase()+'</span><br/>' + response[i].message + '</p></div></div>'
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
</body>

</html>