<?php
include 'connect.php';
session_start();
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
    var itemDelArr = "";

    function itemClicked(e) {
      var itemDelID = e.parentNode.nextElementSibling.innerHTML.trim();
      itemDelArr = itemDelID;
      //alert(itemDelArr);
    }

    function CheckBurgerFields() {
      var newBurgerName = document.getElementById("newBurgerName").value.trim();
      var newBurgerPrice = document.getElementById("newBurgerPrice").value.trim();
      if (btn == 'Add') {
        //Add fields validation
        if (newBurgerName == "") {
          alert("Name of new burger cannont be blank!");
          return false;
        }
        if (newBurgerPrice == "") {
          alert("Price of new burger cannont be blank!");
          return false;
        }
      } else if (btn == 'Edit') {
        //Edit fields clicked
        if (itemDelArr == "") {
          alert("Please select a burger to edit!");
          return false;
        }

        if (newBurgerName == "" && newBurgerPrice == "") {
          alert("Either enter name or price to be modified!");
          return false;
        }

        document.getElementById("delItems").value = itemDelArr;
        //alert(document.getElementById("delItems").value);
      } else if (btn == 'Delete') {
        //Delete logic
        //alert(itemDelArr);
        if (itemDelArr == "") {
          alert("Please select a burger to delete!");
          return false;
        } else {
          document.getElementById("delItems").value = itemDelArr;
          //alert(document.getElementById("delItems").value);
        }
      }
    }

    function openOrderDiv() {
      document.getElementById("burgerTable").style.display = "none";
      document.getElementById("orderTable").style.display = "block";
      var burgerElement = document.getElementById("burgerDivLink");
      var orderElement = document.getElementById("orderDivLink");

      burgerElement.classList.remove("active");
      orderElement.classList.add("active");
    }

    function openBurgerDiv() {
      document.getElementById("burgerTable").style.display = "block";
      document.getElementById("orderTable").style.display = "none";
      var burgerElement = document.getElementById("burgerDivLink");
      var orderElement = document.getElementById("orderDivLink");

      burgerElement.classList.add("active");
      orderElement.classList.remove("active");
    }
  </script>

</head>

<body>
  <div class="wrap80">
    <div class="section9_1">
      <div class="topnav">
        <a href="index.php" class="header-anchor"><img class="header-brand"></a>
        <a id="burgerDivLink" class="open-button active" onclick="openBurgerDiv()">SHOP INVENTORY</a>
        <a id="orderDivLink" class="open-button" onclick="openOrderDiv()">ORDER MANAGEMENT SYSTEM</a>
        <a href="#">EMPLOYEE PORTAL</a>
        <a id="signoutBtn" href="http://rxc2199.uta.cloud/assignment2_RC/index.php?signout=true">DESCONECTAR</a>
      </div>
      <div class="wrapper">
        <h1 id="sec2Title">Admin Dashboard</h1>
      </div>
    </div>

    <div class="section9_2">
      <div id="burgerTable">
        <h1>Burger Inventory</h1>
        <form name="burgerForm" method="POST" onsubmit="return CheckBurgerFields();" action="burgers.php">
          <input id="delItems" class="hide" name="delItems" />
          <table id="customers">
            <tr>
              <th>Select</th>
              <th>ID</th>
              <th>Burger Name</th>
              <th>Price</th>
            </tr>
            <?php
            $burgersql = "SELECT ID, Name, Price
            FROM BURGERS";
            #echo $sql;
            $result = $pdo->query($burgersql);
            while ($row = $result->fetch()) {
              echo "<tr>
                    <td><input type=\"radio\" onclick=\"itemClicked(this)\" name=\"burgerItem\"></td>
                    <td>{$row['ID']}</td>
                    <td>{$row['Name']}</td>
                    <td>\${$row['Price']}</td>
                    </tr>";
            }
            #echo "<tr><td><input type=\"checkbox\"></td><td>{$email}</td><td>De Pollo, Mixta, Pollo</td><td>36</td></tr>";
            ?>
          </table>
          <div style="margin-top: 30px;">
            <div id="burgerFormBtnDiv">
              <input id="newBurgerName" name="newBurgerName" type="text" placeholder="Burger Name">
              <input id="newBurgerPrice" name="newBurgerPrice" type="number" placeholder="Burger Price">
              <button style="margin-right: 10px; background-color: green;" type="submit" name="burgerBtn" value="Add" onclick="btn='Add';">ADD</button>
            </div>
            <button style="margin-right: 10px; background-color: green;" type="submit" name="burgerBtn" value="Edit" onclick="btn='Edit';">Edit</button>
            <button type="submit" name="burgerBtn" value="Delete" onclick="btn='Delete';">Delete</button>
          </div>
        </form>
      </div>

      <div id="orderTable" class="hide">
        <h1>Customer Orders</h1>
        <table id="customers">
          <tr>
            <th>Customer Email</th>
            <th>Order Items</th>
            <th>Order Amount</th>
          </tr>
          <?php

          $ordersql = "SELECT ORDERITEMS, ORDERAMT, USER_EMAIL FROM ORDERS";
          #echo $ordersql;
          $orderResult = $pdo->query($ordersql);
          while ($row = $orderResult->fetch()) {
            #function_alert($row['USER_EMAIL']);
            echo "<tr>
                          <td>{$row['USER_EMAIL']}</td>
                          <td>{$row['ORDERITEMS']}</td>
                          <td>\${$row['ORDERAMT']}</td>
                          </tr>";
          }
          ?>
        </table>
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