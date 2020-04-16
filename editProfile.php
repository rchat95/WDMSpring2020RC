<?php

include 'connect.php';
session_start();
$email = $_SESSION['EMAIL'];

if(test_input($_POST['newEmail']) == "")
{
    #Update UserName
    $uName = test_input($_POST['uName']);
    $sql=$pdo->prepare("UPDATE USERS SET UserName = '$uName' WHERE Email = '$email'");
    $sql->execute();
    function_alert("User Name Updated Successfully!");
}
else if(test_input($_POST['uName']) == "")
{
    #Update Email
    $newEmail = test_input($_POST['newEmail']);
    $sql=$pdo->prepare("UPDATE USERS SET Email = '$newEmail' WHERE Email = '$email'");
    $sql->execute();
    function_alert("Email Updated Successfully!");
    $_SESSION['EMAIL'] = $newEmail;
}

navigateTo("http://rxc2199.uta.cloud/assignment2_RC/dashboard.php");
?>