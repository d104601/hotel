<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('Location: ./signinManage.html');
}
else
    header('Location: ./manageReservation.php');
?>