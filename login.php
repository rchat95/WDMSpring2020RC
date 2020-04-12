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
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  text-align: center;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<h2 style="text-align: center">Loading...</h2>

<div class="loader"></div>

</body>
</html>
<?php
  $email = $psw = "";
  try {
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = test_input($_POST["email"]);
      $psw = test_input($_POST["psw"]);
      $sql = "SELECT * FROM USERS WHERE Email = '$email' AND Password = '$psw'";
      $result = $pdo->query($sql);
      $resultArr = $result->fetchAll();
      
      #echo "Number of rows returned = " . count($resultArr);
      /*
      while($row = $result->fetch()) {
      echo $row['UserID']." - ".$row['UserName']."<br/>";
      } 
      */

      if(count($resultArr) == 0)
      {   
        header("Refresh: 0; url=index.php");     
        function_alert("Incorrect username or password");
        die;
        
         
      }
      else
      {
        #function_alert("User found!");
        navigateTo("http://rxc2199.uta.cloud/assignment2_RC/dashboard.php");
        
      }     

      
      $pdo = null;
    }
  } catch (PDOException $e) {
    die($e->getMessage());
  }
  ?>