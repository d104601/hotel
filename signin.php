<?php
session_start();
$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");
$username = $_POST['username'];
$pw = $_POST['password'];
$getuser = $db->query("SELECT *from customer WHERE username='$username'");
if($getuser->num_rows == 1)
{
    $row=$getuser->fetch_array(MYSQLI_ASSOC);
    if($row['password']==$pw)
    {
        $_SESSION['username']=$username;
        $_SESSION['firstname']=$row['firstname'];
        $_SESSION['lastname']=$row['lastname'];
        if(isset($_SESSION['username']))
        {
            header('Location:./index.php');
        }
    }
    else
    {
        header('Location:./signin_fail.html');
    }
}
else
{
    header('Location:./signin_fail.html');
}
?>