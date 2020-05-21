<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Info</title>
    <script type="text/javascript" src="./js/bootstrap.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
<div class="container p-3">
    <div class="d-inline-block">
        <h2 style="color: #1d2124">Hotel Reservation System</h2>
    </div>
    <div class="d-inline-block float-lg-right">
        <?php
        session_start();
        $db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");
        $hotelcode = $_GET['hotelcode'];
        $gethotel = mysqli_query($db,"SELECT *from hotel where hotelcode = '$hotelcode'");

        $_SESSION['checkin'] = $checkin;
        $_SESSION['checkout'] = $checkout;
        if(!isset($_SESSION['username']))
        {
            echo '<a type="button" class="btn btn-info" href="../signin.html">Sign In</a>
<a type="button" class="btn btn-info" href="../signup.html">Sign Up</a>';
        }
        else
        {
            echo "<p style='color: black; display:inline'>Hello! {$_SESSION["firstname"]}. </p> <a type='button' class='btn btn-dark' href='../signout.php'>Sign out</a>";
        }
        ?>
    </div>
    <div style="color: black">
        <a href="./index.php">Main</a> >> <a href="map.php">Hotel Map</a> >> Hotel Info
    </div>
    <div class="jumbotron">
        <h1 class="text-center">Hotel info</h1>

        <p class="text-center p-4">
            <?php
            while($row = mysqli_fetch_array($gethotel))
            {
                $currHotelcode = $row['hotelcode'];
                $regReserved = mysqli_query($db,"SELECT *FROM reservations
 WHERE ((hotelcode = '$currHotelcode' AND roomtype = 'regular') 
 AND ((checkin <= '$checkin' AND checkout >= '$checkin')
 OR (checkin <= '$checkout' AND checkout >= '$checkout')
 OR (checkin >= '$checkin' AND checkout <= '$checkout')))");
                $delReserved = mysqli_query($db,"SELECT * FROM reservations
 WHERE ((hotelcode = '$currHotelcode' AND roomtype = 'deluxe') 
 AND ((checkin <= '$checkin' AND checkout >= '$checkin')
 OR (checkin <= '$checkout' AND checkout >= '$checkout')
 OR (checkin >= '$checkin' AND checkout <= '$checkout')))");

                $regAvail = $row['singleroom'] - $regReserved->num_rows;
                $delAvail = $row['doubleroom'] - $delReserved->num_rows;
                if($regAvail != 0 || $delAvail !=0)
                {
                    echo "<form action = fromMaptoBook.php method='post'><ul class='list-group'>
            <li class=\"list-group-item list-group-item-primary\"><h4>Hotel name</h4> ".$row['hotelname']."</li>
            <li class=\"list-group-item list-group-item-primary\"><h4>Address<h4> (<input class='form-control col-sm-1 d-inline' name='addressi' value='".$row['addressi']."' readonly>, <input class='form-control col-sm-1 d-inline' name='addressj' value='".$row['addressj']."' readonly>)</li>
            <li class=\"list-group-item list-group-item-primary\"><h4>Total Rooms</h4> <div>Regular: ".$row['singleroom']."</div><div>Deluxe: ".$row['doubleroom']."</div></li>
            <li class=\"list-group-item list-group-item-primary\"><h4>Available Rooms</h4> <div>Regular: <input class='form-control col-sm-1 d-inline' name='regAvail' value='".$regAvail."' readonly></div><div>Deluxe: <input class='form-control col-sm-1 d-inline' name='delAvail' value='".$delAvail."' readonly></div></li>
            <li class=\"list-group-item list-group-item-primary\"><h4>Rate</h4> 
            <div>Regular: $".$row['pricenormal']."</div><div>Deluxe: $".$row['pricedeluxe']."</div></li>
            <li class=\"list-group-item list-group-item-primary\">Check in:<input type='date' value='".$_SESSION['currentdate']."' name='checkin' required='required' class='form-control'> 
            Check out: <input type='date' name='checkout' required='required' class='form-control'></li>
            <li class=\"list-group-item list-group-item-primary\"><div><button type='submit' class='btn btn-primary'>Book this hotel</button></div></li>        
            </ul></form>";
                }
            }
            ?>
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
        margin: 30px auto;
    }
    .jumbotron{
        background-image: url('./images/hotel.jpg');
        background-size: cover;
        color:white;
    }
    body{
        color: #fff;
        background-color: #1d2124;
        font-family: 'Roboto', sans-serif;
    }
</style>
</html>
