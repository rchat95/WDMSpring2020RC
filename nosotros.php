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


  </script>
</head>

<body>
  <div class="wrap80">
    <div class="section2_1">
      <div class="topnav">
        <a href="index.php" class="header-anchor"><img class="header-brand"></a>
        <a href="index.php">INICIO</a>
        <a class="active" href="nosotros.php">SOBRE NOSOTROS</a>
        <a href="menu.php">MENU</a>
        <a class="open-button" onclick="openBlog()">BLOG</a>
        <a href="contact.php">CONTACTO</a>
        <a class="open-button" onclick="openRegisterForm();">REGISTRO</a>
        <a class="open-button" onclick="openForm()">INICIAR SESION</a>
      </div>
      <div class="wrapper">
        <h4 id="sec2header">LAS MEJORES DE LA CIUDAD</h4>
        <h1 id="sec2Title">Sobre nuestras Hamburguesas</h1>
      </div>
    </div>
    <div class="section2_2">
      <div class="row">
        <div class="column">
          <img id="imgLeft">
        </div>
        <div class="column">
          <img id="imgRight">
        </div>
      </div>
      <h1 style="font-size: 40px;">Somos Ibra</h1>
      <p>
        Al comenzar el dia, cada manana estamos más que preparándonos para dar lo mejor de nosotros mismos.<br>
        Porque cada uno de nuestros clientes nos inspira a trabajar en pro del mejor servicio, las mejores entregas y,
        sobre todo, las mejores Hamburguesas..
      </p>
      <br>
      <div class="row">
        <div class="column">
          <p>Los orígenes se remontan al 10 de junio de 1960, cuando Ibrahim Mata compraron la Hamburgueseria
            <strong>“Soy
              Yo”</strong> con una inversion inicial de 950 dolares. El local estaba situado en Lecheria, y la idea de
            Ibrahim era vender Hamburguesas a domicilio a las personas de las residencias cercanas. Aquella experiencia
            no
            marchaba como tenian previsto.</p>
        </div>
        <div class="column">
          <p>A pesar de todo, Ibrahim se mantuvo al frente del restaurante y tomo decisiones importantes para su futuro,
            como reducir la carta de productos y establecer un reparto a domicilio gratuito. Despues de adquirir dos
            restaurantes más en Barcelona, en 1965 renombró sus tres locales como <strong>Ibra's Burger Grill</strong>.
          </p>
        </div>
      </div>


      <div class="btnrow">
        <div class="btncolumn">
          <button id="btn1">VER EL MENU HOY</button>
        </div>
        <div class="btncolumn">
          <button id="btn2">PEDIR AHORA</button>
        </div>
      </div>

    </div>
    <div class="section2_3">
      <div style="text-align: center;">
        <img src="images/Burguer.png" width="40" height="40">
        <h1 class="secTitle">Lo que dicen los clientes</h1>
      </div>
      <div class="row">
        <div class="column">
          <h4>Las Mejores Hamburguesas</h4>
          <p>Me gustan sus Hamburguesas, siempre seran mi lugar de encuetros y buenos recuerdas acompanados de la mejor
            Hamburguesa</p>
          <img class="clientIcon">
          <span style="color: red;">Daiane Smith</span><span>,Cliente</span>
        </div>
        <div class="column">
          <h4>Que Hamburguesas mas<br>Increible</h4>
          <p>Voy con mi familia a compertir de la buena comida y servicio que prestan, los recomiendo a mis amigos, los
            felicito</p>
          <img class="clientIcon">
          <span style="color: red;">Daiane Smith</span><span>,Cliente</span>
        </div>
        <div class="column">
          <h4>La mejor hamburguesa de la ciudad</h4>
          <p>Soy amante de la buena hamburguesa y puedo decir que me gusta lo bien que la preparan, el hambiente es como
            y
            muy familiar, cada ves que tengo la oportunidad de darme un gusto lo visito porque se que sere bien atendido
            y
            comere una excelente hamburguesa</p>
          <img class="clientIcon">
          <span style="color: red;">Michael Williams</span><span>,Cliente</span>
        </div>
      </div>
    </div>

    <div class="section2_4">
      <h1 id="hugeBanner">Nos esforzamos por brindar un buen servicio para su disfrute.</h1>
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



</body>

</html>