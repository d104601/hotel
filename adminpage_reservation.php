<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container p-3">
    <div class="d-inline-block">
        <h2 style="color: #1d2124">Admin page</h2>
    </div>
    <div class="d-inline-block float-lg-right">
        <a type='button' class='btn btn-dark' href='adminpage.php'>Go back</a>
        <a type='button' class='btn btn-dark' href='signout.php'>Sign out</a>
    </div>

    <div class="jumbotron">
        <p class="text-center p-4">
        <table id="hotelchain" class="table table-striped">
            <thead>
            <tr>
                <th>Reservation ID</th>
                <th>Hotel Code</th>
                <th>Branch Name</th>
                <th>Room code</th>
                <th>Room Type</th>
                <th>Check in</th>
                <th>Check out</th>
                <th>Cancel reservation</th>
            </tr>
            </thead>
            <tbody>
            <?php
            session_start();
            $db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");
            $admin = $_SESSION['username_admin'];
            $currdate = $_SESSION['currentdate'];
            $chain = $_SESSION['hotelchain'];
            $gethotel = mysqli_query($db,"SELECT *from reservations WHERE (hotelchain='$chain' AND (checkout = '$currdate' OR checkout > '$currdate'))");
            while($row = mysqli_fetch_array($gethotel))
            {
                echo "<tr>
<td>".$row['id']."</td>
<td>".$row['hotelcode']."</td>
<td>".$row['hotelname']."</td>
<td>".$row['roomcode']."</td>
<td>".$row['roomtype']."</td>
<td>".$row['checkin']."</td>
<td>".$row['checkout']."</td>
<td><a href='cancelreservation.php?id=".$row['id']."'class=\"btn btn-danger\">Cancel</a></td>
</tr>";
            }
            echo "Current date: $currdate";
            ?>
            </tbody>
        </table>
        </p>
    </div>
</div>
</body>
<script>

</script>>
<style type="text/css">
    .container{
        background: #ffffff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        margin: 30px auto;
    }
    .jumbotron{
        background: white;
        background-size: cover;
        color:black;
    }
    body{
        color: #fff;
        background-color: #1d2124;
        font-family: 'Roboto', sans-serif;
    }
</style>
</html>