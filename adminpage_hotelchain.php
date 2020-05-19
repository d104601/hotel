<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <script type="text/javascript" src="../../OneDrive/CS370/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../OneDrive/CS370/css/bootstrap.css">
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
    <p>
    <div class="float-lg-right">
        <a type='button' class='btn btn-primary' href='admin_addhotel.html'>Add New Hotel</a>
        <a type='button' class='btn btn-primary' href='admin_removehotelpage.php'>Remove Hotel</a>
    </div>
    </p>

    <div class="jumbotron">
        <p class="text-center p-4">
        <table id="hotelchain" class="table table-striped">
            <thead>
            <tr>
                <th>Hotel Code</th>
                <th>Branch Name</th>
                <th>Address in Coordinate</th>
                <th>No. of Rooms</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            session_start();
            $db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133","3306");
            $admin = $_SESSION['username_admin'];
            $gethotel = mysqli_query($db,"SELECT *from hotel WHERE admin='$admin'");
            while($row = mysqli_fetch_array($gethotel))
            {
                echo "<tr>
<td name='code'>".$row['hotelcode']."</td>
<td name='hotelname'>".$row['hotelname']."</td>
<td>"."(".$row['addressi'].", ".$row['addressj'].")</td>
<td>Regular: ".$row['singleroom']."<br>Deluxe:".$row['doubleroom']."</td>
<td>Regular: ".$row['pricenormal']."<br>Deluxe:".$row['pricedeluxe']."</td>
</tr>";
            }
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