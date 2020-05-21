<?php
session_start();
$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");

$hotelcode = $_SESSION['hotelcode'];

$gethotel = mysqli_query($db,"SELECT *from hotel WHERE hotelcode = '$hotelcode'");
while($row = mysqli_fetch_array($gethotel))
{
    $getadmin = $row['admin'];
    $hotelname = $row['hotelname'];
    $getchain = mysqli_query($db,"SELECT *from hoteladmin WHERE username = '$getadmin'");
    while($row2 = mysqli_fetch_array($getchain))
    {
        $hotelchain = $row2['hotelchain'];
    }
}

$roomtype = $_POST['roomtype'];
$roomquery = "SELECT roomcode from rooms WHERE hotelcode = '$hotelcode' AND roomtype = '$roomtype'
AND NOT EXISTS 
 (SELECT roomcode FROM reservations
 WHERE reservations.roomcode = rooms.roomcode AND ((reservations.hotelcode = '$hotelcode' AND reservations.roomtype = '$roomtype') 
 AND ((reservations.checkin <= '$checkin' AND reservations.checkout >= '$checkin')
 OR (reservations.checkin <= '$checkout' AND reservations.checkout >= '$checkout')
 OR (reservations.checkin >= '$checkin' AND reservations.checkout <= '$checkout'))))";

$getAvailRoom = mysqli_query($db, "$roomquery ORDER BY RAND() LIMIT 1");
while($row = mysqli_fetch_array($getAvailRoom))
{
    $roomcode = $row['roomcode'];
}

$username = $_SESSION['username'];
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$checkin = $_SESSION['checkin'];
$checkout = $_SESSION['checkout'];

mysqli_query($db, "INSERT INTO reservations(hotelcode, hotelchain, hotelname, roomcode, roomtype, username, firstname, lastname, checkin, checkout)
VALUES('$hotelcode', '$hotelchain','$hotelname' ,'$roomcode', '$roomtype', '$username', '$first', '$last', '$checkin', '$checkout')");
header('Location: ./reservation_success.html');

?>
