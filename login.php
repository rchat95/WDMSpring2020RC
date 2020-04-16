<?php
$email = $psw = $IsAdmin = "";
try {
  include 'connect.php';
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      #Invalid Email
      function_alert("Invalid Email Format");
      die;
    }
    $psw = test_input($_POST["psw"]);
    if(strlen($psw) < 8 || strlen($psw) > 10)
    {
      function_alert("Password length has to be between 8 to 10 characters");
      navigateTo("http://rxc2199.uta.cloud/assignment2_RC/index.php?signout=true");
      die;
    }
    $sql = "SELECT * FROM USERS WHERE Email = '$email' AND Password = '$psw'";
    #echo $sql;
    $result = $pdo->query($sql);
    /*
    while ($row = $result->fetch()) {
      echo "<br>".$row['UserName']."<br>";
    }
    */
    $resultArr = $result->fetchAll();
    #echo "<br>".$resultArr[0]['IsAdmin'];
    $IsAdmin = $resultArr[0]['IsAdmin'];
    #echo "IsAdmin = ".$IsAdmin;


    if (count($resultArr) == 0) {
      function_alert("Incorrect username or password");
      navigateTo("http://rxc2199.uta.cloud/assignment2_RC/index.php");
      #die;
    } else {
      #function_alert("User found!");
      
      $_SESSION['EMAIL'] = $email;
      $_SESSION['LOGIN'] = 'true';
      #Check type of user
      if($IsAdmin == 1){
        $_SESSION['IsAdmin'] = 1;
        navigateTo("http://rxc2199.uta.cloud/assignment2_RC/admin.php");
      }
      else{
        $_SESSION['IsAdmin'] = 0;
        navigateTo("http://rxc2199.uta.cloud/assignment2_RC/dashboard.php");
      }
    }
    
    $pdo = null;
  }
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