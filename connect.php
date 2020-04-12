<?php
    $connString = "mysql:host=localhost;port=3306;dbname=rxc2199_ibrasDB";
    $user = "rxc2199_rchat1995";
    $pass = "Riju1995@";
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function function_alert($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    function navigateTo($url)
    {
        echo "<script type='text/javascript'>window.location.href='$url';</script>";
    }
?>