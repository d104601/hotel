<?php
include 'conn.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Map</title>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container p-3">
    <div class="d-inline-block">
        <h2 style="color: #1d2124">Hotel Map</h2>
    </div>
    <div class="d-inline-block float-lg-right">
        <a type='button' class='btn btn-dark' href='index.php'>Go back</a>
        <a type='button' class='btn btn-dark' href='signout.php'>Sign out</a>
    </div>

    <div class="jumbotron">
        <h3 style="text-align: center">Click the marker on map to see hotel information</h3>

        <div style="width=606; height=606; text-align: center">
            <div>
                <?php
                $query = mysqli_query($conn, "select * from hotel");
                while($row = mysqli_fetch_array($query))
                {
                    $i = -303 + $row['addressi']*6;
                    $j = 0 + $row['addressj']*6;
                    echo "<a href='hotelinfo.php?hotelcode=".$row['hotelcode']."'><img style='position: absolute ;margin-left: ".$i."; margin-top:".$j.";' src=\"images/marker.png\" width=30; height=30;></a>";
                }
                ?>
            </div>
            <img src="images/map.jpg" width=606; height=606;">
        </div>
        <p class="text-center p-4">


        <table class="table table-striped table-dark text-center">
            <thead>
            <tr>
                <th>Hotel Name</th>
                <th>Hotel Address(i,j)</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = mysqli_query($conn, "select * from hotel");
            while($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['hotelname'] ?></td>
                    <td><?php echo "( " . $row["addressi"] . "," . $row['addressj'] . " )"; ?></td>
                    <td><?php echo "<a href='hotelinfo.php?hotelcode=".$row['hotelcode']."' class='btn btn-primary'>Hotel Information</a>"?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </p>
        <div class="text-center">
            <a type='button' class='btn btn-primary' onClick='history.back()'>Go back</a>
        </div>
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
        background-image: url('images/hotel.jpg');
        background-size: cover;
        text-shadow: black 0.2em 0.2em 0.2em;
        color:white;
    }

    table{
        color:white;
    }


    body{
        color: #fff;
        background-color: #1d2124;
        font-family: 'Roboto', sans-serif;
    }
</style>
</html>


