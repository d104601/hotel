<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <script type="text/javascript" src="../../../OneDrive/CS370/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../../OneDrive/CS370/css/bootstrap.css">
</head>
<body>
<div class="container p-3">
    <div class="d-inline-block">
        <h2 style="color: #1d2124">Hotel Reservation System</h2>
    </div>
    <div class="d-inline-block float-lg-right">
        <?php
        session_start();
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $sort = $_POST['sort'];

        $_SESSION['checkin'] = $checkin;
        $_SESSION['checkout'] = $checkout;
        if(!isset($_SESSION['username']))
        {
            echo '<a type="button" class="btn btn-info" href="signin.html">Sign In</a>
<a type="button" class="btn btn-info" href="signup.html">Sign Up</a>';
        }
        else
        {
            echo "<p style='color: black; display:inline'>Hello! {$_SESSION["firstname"]}. </p> <a type='button' class='btn btn-dark' href='signout.php'>Sign out</a>";
        }
        ?>
    </div>
    <div style="color: black">
        <a href="../index.php">Main</a> >> <a href="findhotel.php">Find hotel</a> >> Search result
    </div>
    <div class="jumbotron">
            <?php
            echo "<h2 class='text-center'>Here's available hotels from ". $checkin." to ". $checkout. "</h2>";
            ?>
            <p class="text-center p-4">
            <table id="hotelchain" class="table table-striped table-dark">

                <thead>
                <tr>
                    <th>Hotel Name</th>
                    <th>Address</th>
                    <th>Available rooms</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php

                $db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");

                if($sort == 'Hotel name')
                    $gethotel = mysqli_query($db,"SELECT *from hotel order by hotelname asc");
                else if($sort == 'Regular room price')
                    $gethotel = mysqli_query($db,"SELECT *from hotel order by pricenormal asc");
                else
                    $gethotel = mysqli_query($db,"SELECT *from hotel order by pricedeluxe asc");

                while($row = mysqli_fetch_array($gethotel))
                {
                    $currHotelcode = $row['hotelcode'];
                    $regReserved = mysqli_query($db,"SELECT *FROM reservation
 WHERE ((hotelcode = '$currHotelcode' AND roomtype = 'regular') 
 AND ((checkin <= '$checkin' AND checkout >= '$checkin')
 OR (checkin <= '$checkout' AND checkout >= '$checkout')
 OR (checkin >= '$checkin' AND checkout <= '$checkout')))");
                    $delReserved = mysqli_query($db,"SELECT * FROM reservation
 WHERE ((hotelcode = '$currHotelcode' AND roomtype = 'deluxe') 
 AND ((checkin <= '$checkin' AND checkout >= '$checkin')
 OR (checkin <= '$checkout' AND checkout >= '$checkout')
 OR (checkin >= '$checkin' AND checkout <= '$checkout')))");

                    $regAvail = $row['singleroom'] - $regReserved->num_rows;
                    $delAvail = $row['doubleroom'] - $delReserved->num_rows;
                    echo "<form action='reservation.php' method='post'><tr>
<td>".$row['hotelname']."</td>
<td>"."(".$row['addressi'].", ".$row['addressj'].")</td>
<td>Regular: ".$regAvail."<br>Deluxe:".$delAvail."</td>
<td>Regular: $".$row['pricenormal']."<br>Deluxe: $".$row['pricedeluxe']."</td>
<td><button type=\"submit\" class=\"btn btn-primary\">Book this hotel</button></td>
</tr></form>";
                }
                ?>
                </tbody>
            </table>
            </p>
    </div>
</div>

</body>
<style type="text/css">
    .table{
        border-spacing: 30px;
    }
    .container{
        background: #ffffff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        margin: 30px auto;
    }
    .jumbotron{
        background-image: url('../../../OneDrive/CS370/images/hotel.jpg');
        background-size: cover;
        text-shadow: black 0.2em 0.2em 0.2em;
        color:white;
    }
    body{
        color: #fff;
        background-color: #1d2124;
        font-family: 'Roboto', sans-serif;
    }
</style>
</html>
