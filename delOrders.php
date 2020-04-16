<?php

include 'connect.php';
session_start();
$email = $_SESSION['EMAIL'];
$delItems = $_POST['delItems'];

$sql=$pdo->prepare("DELETE FROM ORDERS WHERE ORDER_ID IN ($delItems)");
$sql->execute();


function_alert("Orders ".$delItems." deleted successfully!");
navigateTo("http://rxc2199.uta.cloud/assignment2_RC/dashboard.php");
?>