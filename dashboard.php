<!DOCTYPE HTML>
<html>

<head>
  <title>Ibra's</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/ibras.css">
  <link rel="shortcut icon" type="image/png" href="images/Burguer.png">

  <script type="text/javascript">
    function editProfile() {
      document.getElementById("profileBtn").style.backgroundColor = "red";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
    }
    function editAddress() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "red";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
    }
    function quickOrder() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "red";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
    }
    function orderHistory() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "red";
      document.getElementById("offerBtn").style.backgroundColor = "transparent";
    }
    function viewOffers() {
      document.getElementById("profileBtn").style.backgroundColor = "transparent";
      document.getElementById("addressBtn").style.backgroundColor = "transparent";
      document.getElementById("orderBtn").style.backgroundColor = "transparent";
      document.getElementById("historyBtn").style.backgroundColor = "transparent";
      document.getElementById("offerBtn").style.backgroundColor = "red";
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
      </div>
      <div class="wrapper">
        <h4 id="sec2header">Your one stop shop for burgers and more</h4>
        <h1 id="sec2Title">Welcome Rongon</h1>
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
          <a class="button" id="orderBtn" onclick="quickOrder();">Quick Order</a>
          <a class="button" id="historyBtn" onclick="orderHistory();">Order History</a>
          <a class="button-sel" id="offerBtn" onclick="viewOffers()">Browse Offers</a>
        </div>
        <div id="contentDiv">
          <img id="offerPhoto" style="margin-top: 20px;">
        </div>
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