<?php
session_start();
$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");

$addressi = $_POST['addressi'];
$addressj = $_POST['addressj'];

$gethotel = mysqli_query($db,"SELECT *from hotel where addressi = '$addressi' and addressj = '$addressj'");
while ($row = mysqli_fetch_array($gethotel))
{
    $hotelcode = $row['hotelcode'];
}


$_SESSION['hotelcode'] = $hotelcode;
$_SESSION['regAvail'] = $_POST['regAvail'];
$_SESSION['delAvail'] = $_POST['delAvail'];
$_SESSION['checkin'] = $_POST['checkin'];
$_SESSION['checkout'] = $_POST['checkout'];

header('Location: ./findhotel/reservation_signincheck.php');

?>

