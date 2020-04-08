<!DOCTYPE HTML>
<html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <title>Ibra's</title>
  <link rel="stylesheet" href="css/ibras.css">
  <link rel="shortcut icon" type="image/png" href="images/Burguer.png">

  <script type="text/javascript">
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    function openRegisterForm() {
      document.getElementById("rgForm").style.display = "block";
    }

    function closeRegisterForm() {
      document.getElementById("rgForm").style.display = "none";
    }

    function openBlog() {
      window.location.href = "http://rxc2199.uta.cloud/";
    }

    function SignIn() {
      var emailID = document.forms["signinForm"]["email"].value;
      var passWord = document.forms["signinForm"]["psw"].value;

      //Email Validation in JavaScript
      if (emailID == "") {
        alert("Email is required!");
        return false;
      }
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(signinForm.email.value)) {

      } else {
        alert("You have entered an invalid email address!")
        return (false);
      }

      //Pasword Validation in JavaScript
      if (passWord == "") {
        alert("Password is required!");
        return false;
      }
    }

    function SignUp() {
      var uName = document.forms["registerForm"]["uName"].value;
      var emailID = document.forms["registerForm"]["email"].value;
      var passWord = document.forms["registerForm"]["psw"].value;
      var repeatPassword = document.forms["registerForm"]["repeatPsw"].value;

      if (uName == "") {
        alert("Name is required!");
        return false;
      }
      if (emailID == "") {
        alert("Email is required!");
        return false;
      }
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(registerForm.email.value)) {

      } else {
        alert("You have entered an invalid email address!")
        return (false);
      }
      if (passWord == "") {
        alert("Password is required!");
        return false;
      }
      if (repeatPassword != passWord) {
        alert("Passwords do not match!");
        return false;
      }
    }
  </script>
</head>

<body>
  <?php
  $email = $psw = "";
  try {
    $connString = "mysql:host=localhost;port=3306;dbname=rxc2199_ibrasDB";
    $user = "rxc2199_rchat1995";
    $pass = "Riju1995@";

    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*if(is_object($pdo) && $pdo != false)
    { 
         echo "I'm connected. PDO is ready and willing";        
    }
    else
    {
        echo "Sorry something went  horribly wrong! Not connected to database";
    }
  */

    /*
  $sql = "SELECT * FROM USERS";
  $result = $pdo->query($sql);  
  */

    /*
  while($row = $result->fetch()) {
    echo $row['UserID']." - ".$row['UserName']."<br/>";
  }
  $pdo = null;
  */



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = test_input($_POST["email"]);
      $psw = test_input($_POST["psw"]);
      $sql = "SELECT * FROM USERS WHERE Email = '$email' AND Password = '$psw'";
      $result = $pdo->query($sql);
      $resultArr = $result->fetchAll();
      echo "Number of rows returned = " . count($resultArr);
      /*
      while($row = $result->fetch()) {
      echo $row['UserID']." - ".$row['UserName']."<br/>";
      } 
  */
      $pdo = null;
    }
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>
  <div class="wrap80">
    <div id="section1">
      <div class="topnav">
        <a href="index.php" class="header-anchor"><img class="header-brand"></a>
        <a class="active" href="index.php">INICIO</a>
        <a href="nosotros.php">SOBRE NOSOTROS</a>
        <a href="menu.php">MENU</a>
        <a class="open-button" onclick="openBlog()">BLOG</a>
        <a href="contact.php">CONTACTO</a>
        <a class="open-button" onclick="openRegisterForm();">REGISTRO</a>
        <a class="open-button" onclick="openForm();" style="white-space: nowrap;">INICIAR SESION</a>
      </div>

      <div class="wrapper">
        <h4>LAS MEJORES DE LA CIUDAD</h4>
        <h1 id="mainTitle">Hamburguesas</h1>
        <button class="open-button" onclick="location.href='menu.php'">
          VER MENU HOY
        </button>
      </div>
    </div>

    <div id="section2">
      <img src="images/Burguer.png" width="40" height="40">
      <h1 class="secTitle">Nuestra historia</h1>
      <img src="images/story1.png" id="sec2leftimg">
      <img src="images/story2.png" id="sec2rightimg">
      <div class="row">
        <div class="column">
          <p>Los origenes se remontan al 10 de junio de 1960, cuando Ibrahim Mata compraron la Hamburgueseria
            <strong>“Soy
              Yo”</strong> con una inversión inicial de 950 dolares. El local estaba situado en Lecheria, y la idea de
            Ibrahim era vender Hamburguesas a domicilio a las personas de las residencias cercanas. Aquella
            experiencia
            no
            marchaba como tenían previsto.</p>
        </div>
        <div class="column">
          <p>A pesar de todo, Ibrahim se mantuvo al frente del restaurante y tomo decisiones importantes para su
            futuro,
            como reducir la carta de productos y establecer un reparto a domicilio gratuito. Despues de adquirir dos
            restaurantes más en Barcelona, en 1965 renombro sus tres locales como <strong>Ibra's Burger
              Grill</strong>.
          </p>
        </div>

      </div>
    </div>

    <div id="section3">
      <div>
        <img src="images/Burguer.png" width="40" height="40">
        <h1 class="secTitle">Las mas vendidos</h1>
        <div class="grid-container">
          <div class="grid-item">
            <div class="divGridCell">
              <img id="brgimg1">
              <a>Mixta</a>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
          <div class="grid-item">
            <div class="divGridCell">
              <img id="brgimg2">
              <span>Pollo</span>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
          <div class="grid-item">
            <div>
              <img id="brgimg3">
              <span>Carne</span>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
          <div class="grid-item">
            <div class="divGridCell">
              <img id="brgimg1">
              <span>Mixta</span>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
          <div class="grid-item-1">
            <div class="divGridCell">
              <img id="brgimg2">
              <span>Pollo</span>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
          <div class="grid-item-1">
            <div class="divGridCell">
              <img id="brgimg3">
              <span>Carne</span>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
          <div class="grid-item-1">
            <div class="divGridCell">
              <img id="brgimg1">
              <span>Mixta</span>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
          <div class="grid-item-1">
            <div class="divGridCell">
              <img id="brgimg2">
              <span>Pollo</span>
              <p><strong>$11.90</strong></p>
              <button class="gridBtn">Ordenar ahora</button>
            </div>
          </div>
        </div>
        <div id="gridMenuBtn">
          <button>
            VER MENU HOY
          </button>
        </div>
      </div>
    </div>

    <div id="section4">
      <img src="images/Burguer.png" width="40" height="40">
      <h1 class="secTitle">Nuestra menu</h1>
      <div class="btn-group">
        <a class="button-sel">TODOS</a>
        <a class="button">Pollo</a>
        <a class="button">Carne</a>
        <a class="button">Mixta</a>
        <a class="button">De Todito</a>
      </div>
      <div class="row">
        <div class="column">
          <table>
            <tr>
              <td class="tdImg"><img id="tdImg1"></td>
              <td class="tdText">hamburguesa de pollo</td>
              <td class="tdPrice">$12.00</td>
            </tr>
            <tr class="spacer"></tr>
            <tr>
              <td class="tdImg"><img id="tdImg2"></td>
              <td class="tdText">hamburguesa carne</td>
              <td class="tdPrice">$12.00</td>
            </tr>
            <tr class="spacer"></tr>
            <tr>
              <td class="tdImg"><img id="tdImg3"></td>
              <td class="tdText">hamburguesa de todito</td>
              <td class="tdPrice">$12.00</td>
            </tr>
            <tr class="spacer"></tr>
            <tr>
              <td class="tdImg"><img id="tdImg4"></td>
              <td class="tdText">hamburguesa de todito</td>
              <td class="tdPrice">$12.00</td>
            </tr>
            <tr class="spacer"></tr>
          </table>
        </div>
        <div class="column">
          <table>
            <tr>
              <td class="tdImg"><img id="tdImg5"></td>
              <td class="tdText">hamburguesa carne</td>
              <td class="tdPrice">$20.00</td>
            </tr>
            <tr class="spacer"></tr>
            <tr>
              <td class="tdImg"><img id="tdImg6"></td>
              <td class="tdText">hamburguesa mixta</td>
              <td class="tdPrice">$6.00</td>
            </tr>
            <tr class="spacer"></tr>
            <tr>
              <td class="tdImg"><img id="tdImg7"></td>
              <td class="tdText">hamburguesa pollo</td>
              <td class="tdPrice">$20.00</td>
            </tr>
            <tr class="spacer"></tr>
            <tr>
              <td class="tdImg"><img id="tdImg8"></td>
              <td class="tdText">hamburguesa carne</td>
              <td class="tdPrice">$6.00</td>
            </tr>
            <tr class="spacer"></tr>
          </table>
        </div>
      </div>
      <div>
        <button>
          VER MENU HOY
        </button>
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

    <div class="form-popup" id="myForm">
      <form class="form-container" name="signinForm" method="POST" onsubmit="return SignIn()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <img class="btnClose" onclick="closeForm()">
        <h1><img class="formImg"> Iniciar Sesion</h1>
        <hr>
        <label for="email"><b>Usuario</b></label>
        <input type="email" name="email" required>

        <label for="psw"><b>Contrasena</b></label>
        <input type="password" name="psw" required>
        <hr>
        <div style="text-align: right;"><button type="submit" class="btn">Entrar</button></div>
      </form>
    </div>

    <div class="form-popup" id="rgForm">
      <form class="form-container-rg" name="registerForm" method="POST" onsubmit="return SignUp()">
        <img class="btnClose" onclick="closeRegisterForm()">
        <h1><img class="formImg"> Registro de Usuario</h1>
        <hr>
        <label for="email"><b>Nombre y apellido:</b></label>
        <input type="text" required name="uName">

        <label for="psw"><b>Correo</b></label>
        <input type="email" required name="email">

        <label for="psw"><b>Contrasena</b></label>
        <input type="password" required name="psw">

        <label for="psw"><b>Repetir Contrasena:</b></label>
        <input type="password" required name="repeatPsw">

        <label for="psw"><b>Direccion:</b></label>
        <textarea rows="5" style="width: 350px;"></textarea>
        <hr>
        <div style="text-align: right;"><button type="submit" class="btn">Cargar</button></div>
    </div>

  </div>
</body>

</html>