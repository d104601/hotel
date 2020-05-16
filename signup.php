<?php

$username = $_POST['username'];
$pw = $_POST['password'];
$pwc = $_POST['confirm_password'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];

$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");

if($pw != $pwc)
{
    header('Location: ./signup_fail_password.html');
    exit;
}
else
{
    $namecheck = $db->query("SELECT EXISTS(SELECT *from customer WHERE username='$username') AS SUCCESS");
    if($namecheck == 1)
    {
        header('Location: ./signup_fail_username.html');
        exit();
    }
    else
    {
        mysqli_query($db, "INSERT INTO customer(username, password, firstname, lastname) VALUES('$username', '$pw', '$first', '$last')");
        header('Location: ./signup_success.html');
        exit();
    }
}
?>
