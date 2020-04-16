<?php
$name = $email = $psw = $address = "";

try {
  include 'connect.php';
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["uName"]);
    $email = test_input($_POST["email"]);
    $psw = test_input($_POST["psw"]);
    $address = test_input($_POST["address"]);

    $sql = "SELECT Email FROM USERS";
    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
      if($email == $row['Email'])
      {
        function_alert("User already exists! Try with a different Email ID");
        navigateTo("http://rxc2199.uta.cloud/assignment2_RC/index.php");
        die;
      }      
    }

    $sql = "INSERT INTO USERS (UserName, Email, Password, Address, IsAdmin) VALUES (?,?,?,?,?)";
    $pdo->prepare($sql)->execute([$name, $email, $psw, $address, 0]);
    $_SESSION['EMAIL'] = $email;
    $_SESSION['LOGIN'] = 'true';
    $_SESSION['IsAdmin'] = 0;
    sendRegEmail($name, $email);
    function_alert("Registration Successful! Email sent to " . $email);
    navigateTo("http://rxc2199.uta.cloud/assignment2_RC/dashboard.php");
  }


  $pdo = null;
} catch (PDOException $e) {
  die($e->getMessage());
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      margin: 0 auto;
      text-align: center;
      -webkit-animation: spin 2s linear infinite;
      /* Safari */
      animation: spin 2s linear infinite;
      text-align: center;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body>

  <h2 style="text-align: center">Loading...</h2>

  <div class="loader"></div>

</body>

</html>