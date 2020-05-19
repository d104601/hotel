<?php
$hotelcode = $_POST['hotelcode'];
$db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133", "3306");
mysqli_query($db, "DELETE FROM hotel WHERE hotelcode = '$hotelcode'");
header('Location:./adminpage_hotelchain.php');
?>
