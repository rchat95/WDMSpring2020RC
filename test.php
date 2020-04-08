<!DOCTYPE html>
<html>
<body>

<?php
$email = $psw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $psw = test_input($_POST["psw"]);
  echo "Checking..."."<br>";
  echo $email."<br>";
  echo $psw."<br>";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>