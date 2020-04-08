<!DOCTYPE HTML>
<html>
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
        
      }
      else {
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
        
      }
      else {
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
    function SendEmail() {
      var uName = document.forms["contactForm"]["uName"].value;
      var emailID = document.forms["contactForm"]["email"].value;
      var subject = document.forms["contactForm"]["sub"].value;
      var message = document.forms["contactForm"]["msg"].value;

      if (uName == "") {
        alert("Name is required!");
        return false;
      }
      if (emailID == "") {
        alert("Email is required!");
        return false;
      }
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contactForm.email.value)) {
        
      }
      else {
        alert("You have entered an invalid email address!")
        return (false);
      }
      if (subject == "") {
        alert("Name is required!");
        return false;
      }
      if (message == "") {
        alert("Email is required!");
        return false;
      }

    }

    
  </script>
</head>

<body>
  <div class="wrap80">
    <div class="section5_1">
      <div class="topnav">
        <a href="index.php" class="header-anchor"><img class="header-brand"></a>
        <a href="index.php">INICIO</a>
        <a href="nosotros.php">SOBRE NOSOTROS</a>
        <a  href="menu.php">MENU</a>
        <a class="open-button" onclick="redirect()">BLOG</a>
        <a class="active" href="contact.php">CONTACTO</a>
        <a class="open-button" onclick="openRegisterForm();">REGISTRO</a>
        <a class="open-button" onclick="openForm();">INICIAR SESION</a>
      </div>

      <div class="wrapper">
        <h4 id="sec2header">DI HOLA</h4>
        <h1 id="sec2Title">Contacto</h1>
      </div>
    </div>
    <div class="section5_2">
      <img src="images/Burguer.png" width="40" height="40">
      <h1 class="secTitle">Di hola</h1>
      <p>Di hola, envianos un mensaje</p>
      <p> Envianos tus comentarios y suguerencias ustedes son importante para nosotros</p>

      <form name="contactForm" method="POST" onsubmit="return SendEmail()">
        <div>
          <input type="text" placeholder="Name" class="inputField" name="uName" size="50" style="margin-right: 2%;" required>
          <input type="email" placeholder="Email" name="email" class="inputField" size="50" required>
        </div>
        <div>
          <input type="text" placeholder="Subject" name="sub" class="inputField" size="113" required>
        </div>
        <div class="contactRow3">
          <textarea placeholder="Message" rows=10 id="contactMessage" name="msg" required></textarea>
        </div>
        <div>
          <button type="submit">
            ENVIAR MENSAJE
          </button>
        </div>
      </form>
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
      <form class="form-container" name="signinForm">
        <img class="btnClose" onclick="closeForm()">
        <h1><img class="formImg"> Iniciar Sesion</h1>
        <hr>
        <label for="email"><b>Usuario</b></label>
        <input type="email" name="email" required>

        <label for="psw"><b>Contrasena</b></label>
        <input type="password" name="psw" required>
        <hr>
        <div style="text-align: right;"><button type="submit" class="btn" onclick="SignIn()">Entrar</button></div>
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