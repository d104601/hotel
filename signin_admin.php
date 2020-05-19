<?php
session_start();
$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");
$username = $_POST['username'];
$pw = $_POST['password'];
$getuser = $db->query("SELECT *from hoteladmin WHERE username='$username'");
if($getuser->num_rows == 1)
{
    $row=$getuser->fetch_array(MYSQLI_ASSOC);
    if($row['password']==$pw)
    {
        $_SESSION['username_admin']=$username;
        $_SESSION['hotelchain'] = $row['hotelchain'];

        if(isset($_SESSION['username_admin']))
        {
            header('Location:./adminpage.php');
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