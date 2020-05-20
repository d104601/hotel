<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<div class="container p-3">
    <div class="d-inline-block">
        <h2 style="color: #1d2124">Hotel Reservation System</h2>
    </div>
    <div class="d-inline-block float-lg-right">
        <?php
        session_start();
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
        <a href="../index.php">Main</a> >> Find Hotel
    </div>
    <form action="searchresult.php" method="post">
        <div class="jumbotron">
            <h1 class="text-center">Find your hotel.</h1>
            <h3 class="text-center">Please enter date of check in and check out!</h3>
            <p class="text-center p-4">
            <table style="margin-left: auto; margin-right: auto;">
                <tr>
                    <td>
                        <h4>Check in</h4>
                        <input type="date" value="<?php echo $_SESSION['currentdate']; ?>" class="form-control" name="checkin" required="required">
                    </td>
                    <td>
                        <h4>Check out</h4>
                        <input type="date" class="form-control" name="checkout" required="required">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <h4>Sort search result by</h4>
                        <select class="form-control" name="sort">
                            <option>Hotel name</option>
                            <option>Regular room price</option>
                            <option>Deluxe room price</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <button type="submit" class="btn btn-primary btn-lg">Search</button>
                    </td>
                </tr>
            </table>

        </div>
    </form>
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
        background-image: url('../images/hotel.jpg');
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
