<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="./image/fav_icon.png" type="image/png" />
    <title>Manvaasam</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.001.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body style="overflow-x: hidden">

    <?php
    include './backend/header.php';
    ?>

    <div class="headerp">
        <div class="containerp">
            <div class="navbar">
                <div class="logo">

                </div>



            </div>
            <div class="row">
                <div class="col-2">
                    <h1>
                        Welcome to Manvaasam Products

                    </h1>
                    <p>
                        HERE YOU CAN FIND QUALITY PRODUCTS FROM MANVAASAM AT A REASONABLE PRICE.


                        <br>
                        <br>
                        <br>
                        <br>
                    </p>

                </div>

            </div>
        </div>
    </div>
    <div class="small-container">
        <h2 class="title">Our Products</h2>
        <div class="row">
            <div class="col-3">
                <a href="product-details.html">
                    <img src="image/products/cocopeate_1kg.jpeg" alt="" /></a>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h4>Cocopeat</h4>
                <p>₹181.00 - ₹314</p>
            </div>

            <div class="col-3">
                <a href="product-details1.html">
                    <img src="image/products/Egg incubator11.jpeg" alt="" />
                </a>
                <br>
                <br>
                <br>
                <h4>Egg Incubator
                </h4>

                <p>₹3999.00</p>
            </div>

            <div class="col-3">
                <a href="product-details2.html">
                    <img src="image/products/individual_Plant.jpg" alt="" />
                </a>
                <h4>PLANT</h4>

                <p>₹249.00</p>
            </div>
            <div class="col-3">
                <a href="product-details3.html">
                    <img src="image/products/vermicompost11.jpeg" alt="" />
                </a>
                <h4> Vermicompost</h4>

                <p>₹25 per kg</p>
            </div>
            <div class="col-3">
                <a href="product-details4.html">
                    <img src="image/products/1bag.jpg" alt="" />
                </a><br>
                <br>
                <br>
                <br>
                <h4> Manvaasam bag</h4>
                <p>₹250.00</p>
            </div>

            <div class="col-3">
                <a href="product-details5.html">
                    <img src="image/products/growbag.jpeg" alt="" />
                </a><br>
                <br>
                <br>
                <br>
                <h4> Manvaasam Growbag</h4>

                <p>₹50.00</p>
            </div>

            <div class="col-3">
                <a href="product-details6.html">
                    <img src="image/products/seedballs.jpg" alt="" />
                </a>
                <br>
                <br>
                <br>
                <br>
                <h4> Manvaasam Seedballs</h4>

                <p>₹5.00</p>
            </div>

            <div class="col-3">
                <a href="product-details7.html">
                    <img src="image/products/garden_kit.jpg" alt="" />
                </a>
                <h4> Gardening Setup</h4>


            </div>


        </div>

        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                } else {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
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
</body>

</html>