<?php
include 'connect.php';
session_start();
$email = $_SESSION['EMAIL'];
$modifyItems = test_input($_POST['delItems']);
#function_alert("Modify Items = ".$modifyItems);
$newBurgerName = test_input($_POST['newBurgerName']);
$newBurgerPrice = test_input($_POST['newBurgerPrice']);


if($_POST['burgerBtn'] == "Edit")
{   
    #Edit fields validation
    if($modifyItems == "")
    {
        function_alert("Please select an item to edit!");
        navigateTo("http://rxc2199.uta.cloud/assignment2_RC/admin.php");
        die;
    }
    if($newBurgerName == "" && $newBurgerPrice == "")
    {
        function_alert("Either enter name or price to edit!");
        navigateTo("http://rxc2199.uta.cloud/assignment2_RC/admin.php");
        die;
    }
    
    if($newBurgerName == "")
    {
        #Update Price
        $sql=$pdo->prepare("UPDATE BURGERS SET Price = '$newBurgerPrice' WHERE ID = $modifyItems");
        $sql->execute();
    }
    else if($newBurgerPrice == "")
    {
        #Update Name
        $sql=$pdo->prepare("UPDATE BURGERS SET Name = '$newBurgerName' WHERE ID = $modifyItems");
        $sql->execute();
    }
    else if($newBurgerName != "" && $newBurgerPrice != "")
    {
        #Update name and price
        $sql=$pdo->prepare("UPDATE BURGERS SET Name = '$newBurgerName' AND Price = '$newBurgerPrice' WHERE ID = $modifyItems");
        $sql->execute();
    }

    function_alert("Burger edited successfully!");
}
else if($_POST['burgerBtn'] == "Add")
{
    #Update name and price
    #Validation of fields
    if($newBurgerName == "" || $newBurgerPrice == "")
    {
        function_alert("Name or price cannot be blank!");
        navigateTo("http://rxc2199.uta.cloud/assignment2_RC/admin.php");
        die;
    }
    $sql = "INSERT INTO BURGERS (Name, Price) VALUES (?,?)";
    $pdo->prepare($sql)->execute([$newBurgerName, $newBurgerPrice]);
    function_alert("Burger added successfully!");
}
else
{
    #function_alert("Items to be deleted = ".$modifyItems);
    #Delete logic backend
    
    $sql=$pdo->prepare("DELETE FROM BURGERS WHERE ID IN ($modifyItems)");
    $sql->execute();
    function_alert("Burger ".$modifyItems." deleted successfully!");
    
}
navigateTo("http://rxc2199.uta.cloud/assignment2_RC/admin.php");
?>