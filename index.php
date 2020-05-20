<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
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
            echo "<p style='color: black; display:inline'>Hello! {$_SESSION['firstname']}. </p> <a type='button' class='btn btn-dark' href='signout.php'>Sign out</a>";        }
        ?>
    </div>

    <div class="jumbotron">
        <h1 class="text-center">We will book for you</h1>
        <?php
        echo "<h3 class=\"text-center\">Current date is ".$_SESSION['currentdate']."</h3>"
        ?>
        <h3 class="text-center">Let's find your best hotel here.</h3>
        <p class="text-center p-4">
        <table style="margin-left: auto; margin-right: auto;">
            <tr>
                <td>
                    <a class="btn btn-primary btn-lg btn-block" href="./findhotel/findhotel.php" role="button">Find Your Hotel</a><br>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-primary btn-lg btn-block" href="./signInCheck.php" role="button">Manage My Reservation</a>
                </td>
            </tr>
        </table>
        </p>
        <h3 class="text-center">Are you hotel manager?</h3>
        <p class="text-center p-4">
        <table style="margin-left: auto; margin-right: auto;">
            <tr>
                <td>
                    <a class="btn btn-primary btn-lg btn-block" href="signin_admin.html" role="button">Sign In as admin</a>
                </td>
            </tr>
        </table>
        </p>
    </div>
</div>

</body>
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
    body{
        color: #fff;
        background-color: #1d2124;
        font-family: 'Roboto', sans-serif;
    }
</style>
</html>
