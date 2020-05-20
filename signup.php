<?php
$username = $_POST['username'];
$pw = $_POST['password'];
$pwc = $_POST['confirm_password'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];

$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");

$query = mysqli_query($db, "select * from customer where username = '$_POST[username]'");
$count = mysqli_num_rows($query);

    if($count>0){
    header("Location: ./signup_fail_username.html");
}
    else
    {
        mysqli_query($db, "INSERT INTO customer(username, password, firstname, lastname) VALUES('$username', '$pw', '$first', '$last')");
        header('Location: ./signup_success.html');
        exit();
    }

?>
