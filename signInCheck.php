<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('Location: ./signin.html');
}
else
    header('Location: ./manageReservation.php');
?>