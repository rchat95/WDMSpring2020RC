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

    function sendRegEmail($name, $email)
    {
        $sub = "Welcome to Ibra's - " . $name;
        $msg = "We hope you enjoy our delicious burgers!";
        $to = $email;
        $email_body = "This is to confirm that you have created an account at the Ibra's Burger website.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email\n\n$msg";
        $headers = "From: noreply@yourdomain.com\n";
        #$headers .= "Reply-To: $email_address";
        mail($to, $sub, $email_body, $headers);
        #function_alert("Email sent successfully!");
        #navigateTo("http://rxc2199.uta.cloud/assignment2_RC/contact.php");
        return true;
  }
?>