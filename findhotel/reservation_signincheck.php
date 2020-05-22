<?php
session_start();

if(!isset($_SESSION['hotelcode']))
{
    $_SESSION['hotelcode'] = $_GET['hotelcode'];
    $_SESSION['regAvail'] = $_GET['regAvail'];
    $_SESSION['delAvail'] = $_GET['delAvail'];
}
else if($_SESSION['hotelcode'] != $_GET['hotelcode'])
{
    $_SESSION['hotelcode'] = $_GET['hotelcode'];
    $_SESSION['regAvail'] = $_GET['regAvail'];
    $_SESSION['delAvail'] = $_GET['delAvail'];
}

if(!isset($_SESSION['username']))
{
    header('Location: ./signin.html');
}
else
    header('Location: ./reservation.php');
?>