<?php
$id = $_GET['id'];
$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133", "3306");
mysqli_query($db, "DELETE FROM reservations WHERE id = '$id'");
$prevPage = $_SERVER['HTTP_REFERER'];
header('Location:'.$prevPage);
?>
