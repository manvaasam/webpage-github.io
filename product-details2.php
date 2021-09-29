<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>cocopeate</title>
  <link rel="stylesheet" href="style.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
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
      <div class="col-2">
        <img src="image/products/individual_plant.jpg" width="100%" id="ProductImg" />

        <div class="small-img-row">
          <div class="small-img-col">
            <img src="image/products/individual_plant.jpg" class="small-img" />
          </div>
          <div class="small-img-col">
            <img src="image/products/mpant1.jpg" class="small-img" />
          </div>
          <div class="small-img-col">
            <img src="image/products/mplant.jpg" class="small-img" />
          </div>

        </div>
      </div>
      <div class="col-2">
        <p>Product / Plant</p>
        <h2 id="ProductName">Manvaasam Plant</h2>
        <h4 id="orderprice">Rs. 250.00 + Shipping fee*</h4>
        <form method="POST" id="submitform" action="backend/order.php">
          <select onchange="changevalue()" id="ordersize" name="size" required>
            <option value="small" selected>Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
          </select>
          <input type="number" id="ordercount" value="1" onchange="changevalue()" name="count" required />
          <input type="hidden" name="product" value="manvaasam_cocopeate">
          <button id="myBtn">Buy Now</button>
        </form>


        <div id="myModal" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Manvaasam</h2>
            </div>
            <div class="modal-body">
              <form method="POST" id="LoginForm" >
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
          var modal = document.getElementById("myModal");
          var btn = document.getElementById("myBtn");
          var span = document.getElementsByClassName("close")[0];
          btn.onclick = function (e) {
            e.preventDefault();
            modal.style.display = "block";
          }
          span.onclick = function () {
            modal.style.display = "none";
          }
          window.onclick = function (event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }

          document.getElementById('LoginForm').addEventListener('submit', function (e) {
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
            }).then(function (response) {
              return response.text();
            }).then(function (text) {
              alert(text);
            });
          });
        </script>






      </div>
    </div>
  </div>


  </div>
  <!-- js for product gallery -->
  <script>
    var ProductImg = document.getElementById("ProductImg");
    var smallImg = document.getElementsByClassName("small-img");
    smallImg[0].onclick = function () {
      ProductImg.src = smallImg[0].src;
    };
    smallImg[1].onclick = function () {
      ProductImg.src = smallImg[1].src;
    };
    smallImg[2].onclick = function () {
      ProductImg.src = smallImg[2].src;
    };
    function changevalue() {
      var ordersize = document.getElementById('ordersize').value
      var ordercount = document.getElementById('ordercount').value
      var orderprice = document.getElementById('orderprice')
      var orderimg = document.getElementById('ProductImg')
      if (ordersize == 'small') {
        orderprice.innerHTML = 'Rs. ' + (250 * ordercount) + ' + Shipping fee*'
        orderimg.src = 'image/products/individual_plant.jpg'

      }
      else if (ordersize == 'medium') {
        orderprice.innerHTML = 'RS. ' + (300 * ordercount)+ ' + Shipping fee*'
        orderimg.src = 'image/products/mpant1.jpg'
      }
      else {
        orderprice.innerHTML = 'Rs. ' + (350 * ordercount)+ ' + Shipping fee*'
        orderimg.src = 'image/products/mplant.jpg'
      }
    }

  </script>


</body>

</html>