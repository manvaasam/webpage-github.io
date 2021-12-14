<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>cocopeate</title>

  <link rel="stylesheet" type="text/css" href="./assets/css/style.001.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3/dist/js/bootstrap.min.js"></script>


  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

  <?php
  include './backend/header.php';
  ?>

  <div class="container">
    <div class="navbar">
      <div class="logo">
        <a href="index.html">
          <img src="image/products/logo.png" alt="" width="125px" /></a>
      </div>

    </div>
  </div>

  <!-- Single Products Detail -->
  <div class="small-container single-product">
    <div class="row">
      <div class="col-md-6">
        <img src="image/products/gardeningsetup.jpg" width="100%" id="ProductImg" />
        <div class="row">
          <div class="col">
            <img src="image/products/gardeningsetup.jpg" class="small-img" />
          </div>
          <div class="col">
            <img src="image/products/gardeningsetup1.jpg" class="small-img" />
          </div>
          <div class="col">
            <img src="image/products/gardeningsetup2.jpg" class="small-img" />
          </div>

        </div>
      </div>
      <div class="col-md-6">
        <p>Product / Gardening Setup</p>
        <h2 id="ProductName">Manvaasam Gardening Setup</h2>
        <h4 id="orderprice">Rs. 499.00 + Shipping fee*<br>1) 3 TYPES OF GROW BAG<br>2) 8 VARIETIES OF SEEDS<br>3) 500 gms OF VERMICOMPOST<br>4) 250 gms OF COCOPEAT</h4><br>
        <select onchange="changegar()" id="ordersize" name="size" required>
          <option value="small" selected>Small(1 kg)</option>
          <option value="medium">Medium(3 kg)</option>
          <option value="large">Large(5 kg)</option>
        </select><br>

        <input type="number" id="ordercount" value="1" onchange="changegar()" min="1"  name="count" required />
        <input type="hidden" name="product" value="manvaasam_cocopeate">
        <button id="myBtn">Buy Now </button>


        <div id="myModal" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Manvaasam</h2>
            </div>
            <div class="modal-body">
              <form action="./backend/order.php" method="POSt" id="LoginForm">
                <input type="text" name="customer_name" placeholder="Your Name" required /><br>
                <input type="tel" name="customer_phone" placeholder="Phone No." required />
                <textarea placeholder="Your Address" name="customer_address" id="" rows="6" required></textarea>
                <button type="submit" class="btn">Buy Now</button>
              </form>
            </div>
            <div class="modal-footer">
              <h3>Contact : 6380091001</h3>
            </div>
          </div>
        </div>
        <script>
          document.getElementById('LoginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var form = new FormData(this);
            console.log(form);
            // add price to form
            form.append("price", document.getElementById("orderprice").innerHTML);
            form.append("name", document.getElementById("ProductName").innerHTML);
            form.append("size", document.getElementById("ordersize").value);
            form.append("count", document.getElementById("ordercount").value);
            fetch('backend/order.php', {
              method: 'POST',
              body: form
            }).then(function(response) {
              return response.text();
            }).then(function(text) {
              alert(text);
            });
          });
        </script>
        <script>
          var modal = document.getElementById("myModal");
          var btn = document.getElementById("myBtn");
          var span = document.getElementsByClassName("close")[0];
          btn.onclick = function() {
            modal.style.display = "block";
          }
          span.onclick = function() {
            modal.style.display = "none";
          }
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }
        </script>






      </div>
    </div>
  </div>


  </div>
  </form>
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

  <!-- js for product gallery -->
  <script>
    var ProductImg = document.getElementById("ProductImg");
    var smallImg = document.getElementsByClassName("small-img");
    smallImg[0].onclick = function() {
      ProductImg.src = smallImg[0].src;
    };
    smallImg[1].onclick = function() {
      ProductImg.src = smallImg[1].src;
    };
    smallImg[2].onclick = function() {
      ProductImg.src = smallImg[2].src;
    };
    smallImg[3].onclick = function() {
      ProductImg.src = smallImg[3].src;
    };
    function changegar() {
      var ordersize = document.getElementById('ordersize').value
      var ordercount = document.getElementById('ordercount').value
      var orderprice = document.getElementById('orderprice')
      var orderpriceinput = document.getElementById('orderpriceinput')
      var orderimg = document.getElementById('ProductImg')
      if (ordercount == 0) {
        ordercount = 1
      }
      if (ordersize == 'small') {
        orderprice.innerHTML = 'Rs. '+ (499 * ordercount) +'.00 + Shipping fee*<br>1) 3 TYPES OF GROW BAG<br>2) 8 VARIETIES OF SEEDS<br>3) 500 gms OF VERMICOMPOST<br>4) 250 gms OF COCOPEAT'
        orderpriceinput.value = (499 * ordercount)
        document.getElementById('ordercount').value = ordercount
        
      }
      else if (ordersize == 'medium') {
        orderprice.innerHTML = 'Rs. '+ (999 * ordercount) +'.00 + Shipping fee*<br>1) 6 TYPES OF GROW BAG<br>2) 12 VARIETIES OF SEEDS<br>3) 1 kg OF VERMICOMPOST<br>4) 500 gms OF COCOPEAT<br>5) 1 YEAR WARRENTY & ONLINE MAINTAINANCE'
        orderpriceinput.value = (999 * ordercount)
        document.getElementById('ordercount').value = ordercount
      }
      else {
        orderprice.innerHTML = 'Rs.'+(1399 * ordercount)+'.00 + Shipping fee*<br>1) 10 TYPES OF GROW BAG<br>2) 20 VARIETIES OF SEEDS<br>3) 2.5 kg OF VERMICOMPOST<br>4) 2 kg OF COCOPEAT<br>5) HANDMADE WATERING CAN<br>6) 1 YEAR WARRENTY & 24*7 ONLINE ASSISTANCE'
        orderpriceinput.value = (1399 * ordercount)
        document.getElementById('ordercount').value = ordercount
      }
    }

    
    
  </script>


</body>

</html>