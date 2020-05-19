<?php
session_start();
$_SESSION['currentdate'] = $_POST['currentdate'];
header('Location:./index.php');
?>