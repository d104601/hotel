<?php
session_start();
$hotelcode = $_POST['hotelcode'];
$admin = $_SESSION['username_admin'];
$hotelname = $_POST['hotelname'];
$i = $_POST['i'];
$j = $_POST['j'];
$single = $_POST['singleroom'];
$double = $_POST['doubleroom'];
$prices = $_POST['prices'];
$priced = $_POST['priced'];

$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");

$namecheck = mysqli_query($db,"SELECT COUNT(*) FROM hotel WHERE hotelcode = '$hotelcode'");
$addresscheck = mysqli_query($db,"SELECT COUNT(*) FROM hotel WHERE addressi='$i' AND addressj = '$j'");
if(mysqli_fetch_array($namecheck)[0] != 0)
{
    header('Location: ./addhotel_fail_hotelcode.html');
    exit();
}
else if(mysqli_fetch_array($addresscheck)[0] != 0)
{
    header('Location: ./addhotel_fail_address.html');
    exit();
}
else
{
    mysqli_query($db, "INSERT INTO hotel(hotelcode, admin, hotelname, addressi, addressj, singleroom, doubleroom, pricenormal, pricedeluxe) VALUES('$hotelcode', '$admin', '$hotelname', '$i', '$j', '$single', '$double', '$prices', '$priced')");
    $start = 0;
    while($start < $single)
    {
        mysqli_query($db, "INSERT INTO rooms(roomcode, hotelcode, roomtype) VALUES('regular$start$hotelcode', '$hotelcode', 'Regular')");
        $start++;
    }
    $start = 0;
    while($start < $double)
    {
        mysqli_query($db, "INSERT INTO rooms(roomcode, hotelcode, roomtype) VALUES('deluxe$start$hotelcode', '$hotelcode', 'Deluxe')");
        $start++;
    }
    header('Location: ./adminpage_hotelchain');
    exit();
}
?>
