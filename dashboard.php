<?php
include 'connect.php';
session_start();
if($_SESSION['IsAdmin'] == 1)
{
  navigateTo("http://rxc2199.uta.cloud/assignment2_RC/admin.php");
  die;
}
$email = $_SESSION['EMAIL'];
$sql = "SELECT UserName FROM USERS WHERE Email = '$email'";
$result = $pdo->query($sql);

while ($row = $result->fetch()) {
  $userName =  $row['UserName'];
}


function signOut()
{
  session_unset();
  session_destroy();
  $_SESSION['LOGIN'] = 'false';
  function_alert("Signed out successfully!");
  #navigateTo("http://rxc2199.uta.cloud/assignment2_RC/index.php");
}

if (isset($_GET['signout'])) {
  signOut();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();
  $email = $_SESSION['EMAIL'];
  $sql = "INSERT INTO ORDERS (ORDERITEMS, ORDERAMT, USER_EMAIL) VALUES (?,?,?)";

  $orderItems = test_input($_POST["orderItems"]); #Comma separated order items
  $orderCost = test_input($_POST["orderCost"]); #Order Cost
  #echo $orderItems;

  $pdo->prepare($sql)->execute([$orderItems, $orderCost, $email]);

  /*
  while ($row = $result->fetch()) {
    $userName =  $row['UserName'];
  }
  */
  //Add order (UserID, Items, Amount)
  #function_alert("PHP Self Script Called");
  #function_alert("The order item list is: ".$orderItems." and the order cost is = ".$orderCost);
  function_alert("Order Created Successfully!");
}


?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Ibra's</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/ibras.css">
  <link rel="shortcut icon" type="image/png" href="images/Burguer.png">

  <script type="text/javascript">
    var itemArr = [];
    var itemDelArr = [];
    var orderCost = convert_to_float(0.0);

    function convert_to_float(a) {
      var floatValue = +(a);
      return floatValue;
    }

    function editProfile() {
      document.getElementById("profileBtn").style.backgroundColor = "red";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
      document.getElementById("editAddressDiv").style.display = "none";
      document.getElementById("orderBurgerDiv").style.display = "none";
      document.getElementById("orderHistory").style.display = "none";
      document.getElementById("offerPhoto").style.display = "none";
      document.getElementById("editProfileDiv").style.display = "block";
    }

    function editAddress() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "red";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
      document.getElementById("offerPhoto").style.display = "none";
      document.getElementById("orderBurgerDiv").style.display = "none";
      document.getElementById("orderHistory").style.display = "none";
      document.getElementById("editAddressDiv").style.display = "block";
      document.getElementById("editProfileDiv").style.display = "none";
    }

    function quickOrder() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "red";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
      document.getElementById("offerPhoto").style.display = "none";
      document.getElementById("orderBurgerDiv").style.display = "block";
      document.getElementById("orderHistory").style.display = "none";
      document.getElementById("editAddressDiv").style.display = "none";
      document.getElementById("editProfileDiv").style.display = "none";
    }

    function orderHistory() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "red";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
      document.getElementById("orderHistory").style.display = "block";
      document.getElementById("offerPhoto").style.display = "none";
      document.getElementById("orderBurgerDiv").style.display = "none";
      document.getElementById("editAddressDiv").style.display = "none";
      document.getElementById("editProfileDiv").style.display = "none";
    }

    function viewOffers() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "red";
      document.getElementById("offerPhoto").style.display = "block";
      document.getElementById("orderBurgerDiv").style.display = "none";
      document.getElementById("orderHistory").style.display = "none";
      document.getElementById("editAddressDiv").style.display = "none";
      document.getElementById("editProfileDiv").style.display = "none";
    }

    function orderBurg() {
      var burgerList = document.getElementById("burgerList");
      var item = burgerList.options[burgerList.selectedIndex].value;
      orderCost = convert_to_float(document.getElementById("cost").innerHTML);
      //alert(item);
      itemArr.push(item);
      document.getElementById("orderItems").value = itemArr;
      if (item == "Mixta") {
        orderCost += convert_to_float(20.00);
        document.getElementById("cost").innerHTML = orderCost;
      }
      if (item == "Pollo") {
        orderCost += convert_to_float(12.00);
        document.getElementById("cost").innerHTML = orderCost;
      }
      if (item == "Carne") {
        orderCost += convert_to_float(12.00);
        document.getElementById("cost").innerHTML = orderCost;
      }
      if (item == "De Pollo") {
        orderCost += convert_to_float(12.00);
        document.getElementById("cost").innerHTML = orderCost;
      }
      document.getElementById("orderCost").value = document.getElementById("cost").innerHTML;
    }

    function checkOrder() {
      var cost = document.getElementById("cost").textContent;
      if (cost <= 0.00) {
        alert("Please add atleast 1 item!");
        return false;
      }
      //alert("The item array is: " + itemArr);            
    }

    function CheckOrderHistForm() {
      //alert(itemDelArr);
      var itemSelFlag = false;
      var inputElements = document.getElementsByTagName("input");
      for (var i = 0; i < inputElements.length; i++)
        if (inputElements[i].type == "checkbox") {
          if (inputElements[i].checked) {
            itemSelFlag = true;
          }
        }

      if (itemSelFlag == true) {
        //Orders have been selected to be deleted
        document.getElementById("delItems").value = itemDelArr;
      } else {
        alert("Please select at least 1 item to delete!")
        return false;
      }

    }

    function itemClicked(e) {
      var itemDelID = e.parentNode.nextElementSibling.innerHTML.trim();
      //alert(x);
      itemDelArr.push(itemDelID);
    }

    function CheckAddress() {
      var newAddr = document.getElementById("userAddress").value;
      if(newAddr.trim() == "")
      {
        alert("Please enter a value in the address box!");
        return false;
      }
      else
      {
        return true;
      }
    }

    function CheckEditFields() {
      var newName = document.getElementById("uName").value;
      var newEmail = document.getElementById("newEmail").value;
      if(newName.trim() == "" && newEmail.trim() == "")
      {
        alert("Please enter either username or email to be updated!");
        return false;
      }
      else
      {
        return true;
      }
    }
  </script>

</head>

<body>
  <div class="wrap80">
    <div class="section8_1">
      <div class="topnav">
        <a href="index.php" class="header-anchor"><img class="header-brand"></a>
        <a href="index.php">INICIO</a>
        <a href="nosotros.php">SOBRE NOSOTROS</a>
        <a href="menu.php">MENU</a>
        <a class="open-button" onclick="redirect()">BLOG</a>
        <a href="contact.php">CONTACTO</a>
        <a href="http://rxc2199.uta.cloud/assignment2_RC/index.php?signout=true">DESCONECTAR</a>
      </div>
      <div class="wrapper">
        <h4 id="sec2header">Your one stop shop for burgers and more</h4>
        <h1 id="sec2Title">Welcome&nbsp; <?php print_r($userName) ?>

        </h1>
      </div>
    </div>

    <div class="section8_2">
      <h1 id="hugeBanner">Today's exclusive - Buffalo Burger plus any drink just at<br>$3 !</h1>
    </div>

    <div class="section8_3">
      <div class="wrapper" style="text-align: center;">
        <img src="images/Burguer.png" width="40" height="40">
        <h1 class="secTitle">Dashboard</h1>
        <img id="ProfilePhoto">
        <div class="btn-group">
          <a class="button" id="profileBtn" onclick="editProfile();">Edit Profile</a>
          <a class="button" id="addressBtn" onclick="editAddress();">Edit Address</a>
          <a class="button-sel" id="orderBtn" onclick="quickOrder();">Quick Order</a>
          <a class="button" id="historyBtn" onclick="orderHistory();">Order History</a>
          <a class="button" id="offerBtn" onclick="viewOffers()">Browse Offers</a>
        </div>

        <div id="contentDiv">
          <form name="orderForm" method="POST" onsubmit="return checkOrder();" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input id="orderItems" class="hide" name="orderItems" />
            <img id="offerPhoto" style="margin-top: 20px; display: none;">
            <div id="orderBurgerDiv">
              <img id="orderImg">
              <div id="addBurgerDiv">
                <label for="burgerList" id="selectLabel">Select burger:</label>
                <select id="burgerList" name="burgers">
                  <option>Mixta</option>
                  <option>Pollo</option>
                  <option>Carne</option>
                  <option>De Pollo</option>
                </select>
                <button type="button" style="margin-left: 0.5em;" onclick="orderBurg()">
                  ADD
                </button>
              </div>
              <div id="orderDiv">
                <label style="display: block; padding-left: 1em;">Total Amount: $<label id="cost">0</label></label>
                <input id="orderCost" class="hide" name="orderCost">
                <button type="submit" class="btn">
                  PLACE ORDER
                </button>
              </div>
            </div>
          </form>
          <div id="orderHistory" class="hide">
            <form name="orderHistForm" method="POST" onsubmit="return CheckOrderHistForm()" action="delOrders.php">
              <input id="delItems" class="hide" name="delItems" />
              <table id="customers">
                <tr>
                  <th>Select</th>
                  <th>Order ID</th>
                  <th>Items</th>
                  <th>Price</th>
                </tr>
                <?php
                $ordersql = "SELECT ORDER_ID, ORDERITEMS, ORDERAMT
                  FROM ORDERS WHERE USER_EMAIL = '$email'";
                #echo $sql;
                $result = $pdo->query($ordersql);
                while ($row = $result->fetch()) {
                  echo "<tr>
                          <td><input type=\"checkbox\" onclick=\"itemClicked(this)\"></td>
                          <td>{$row['ORDER_ID']}</td>
                          <td>{$row['ORDERITEMS']}</td>
                          <td>{$row['ORDERAMT']}</td>
                          </tr>";
                }
                #echo "<tr><td><input type=\"checkbox\"></td><td>{$email}</td><td>De Pollo, Mixta, Pollo</td><td>36</td></tr>";
                ?>
              </table>
              <div id="orderHistoryModify">
                <!--<button style="margin-right: 10px; background-color: green;">Edit</button>-->
                <button type="submit" id="orderDeleteBtn" style="background-color: red;">Delete</button>
              </div>
            </form>
          </div>
          <div id="editAddressDiv" class="hide">
            <form name="editAddrForm" method="POST" onsubmit="return CheckAddress();" action="editAddr.php">
              <textarea placeholder="New Address" rows=8 id="userAddress" name="userAddress" required></textarea>
              <button id="updateAddrBtn" type="submit">UPDATE</button>
            </form>
          </div>
          <div id="editProfileDiv" class="hide">
            <form name="editProfileForm" method="POST" onsubmit="return CheckEditFields();" action="editProfile.php">
              <input class="editProfileInput" name="uName" id="uName" type="text" placeholder="New Name">
              <input class="editProfileInput" name="newEmail" id="newEmail" type="email" placeholder="New Email">
              <div id="editProfileBtnDiv">
                <button id="editProfileBtn" type="submit">UPDATE</button>
              </div>
            </form>
          </div>
        </div>
        </form>
      </div>
    </div>
    <div class="section8_4">
      <div>
        <h1>Get the mobile app</h1>
        <img id="appImg">
        <img id="qrImg">
      </div>
    </div>

    <div class="footer">
      <img id=logoImg>
      <div id="footerContent">
        <a href="#" class="footerGreen">Habla a:</a>
        <p>Av. Intercomunal, sector la Mora, calle 8</p>
        <a href="#" class="footerGreen"> Telefono:</a>
        <p>+58 251 261 00 01</p>
        <a href="#" class="footerGreen">Correo:</a>
        <p>yourmail@gmail.com</p>
        <p style="opacity: 0.5;">Copyright &copy; 2020 Todos los derechos reservados | Este sitio esta hecho con por
          &hearts; DiazApps</p>
      </div>
    </div>
  </div>
</body>

</html>