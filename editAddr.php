<?php

include 'connect.php';
session_start();
$email = $_SESSION['EMAIL'];
$address = $_POST['userAddress'];

$sql=$pdo->prepare("UPDATE USERS SET Address = '$address' WHERE Email = '$email'");
$sql->execute();


function_alert("Address updated successfully!");
navigateTo("http://rxc2199.uta.cloud/assignment2_RC/dashboard.php");
?>