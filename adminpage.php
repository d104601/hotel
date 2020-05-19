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
        <a type='button' class='btn btn-dark' href='signout.php'>Sign out</a>
    </div>

    <div class="jumbotron">
        <?php
        session_start();
        if(isset($_SESSION['username_admin']))
            echo "
        <h1 class=\"text-center\">Hello {$_SESSION['username_admin']}.<br><div id=\"adminname\"></div></h1>
        <h3 class=\"text-center\">Hotel chain name: {$_SESSION['hotelchain']}<div id=\"hotelchain\"></div></h3>";
        ?>
        <p class="text-center p-4">
        <table id="adminmenu" style="margin-left: auto; margin-right: auto;">
            <tr>
                <td>
                    <a class="btn btn-primary btn-lg btn-block" href="adminpage_reservation.html" role="button">Manage Reservations</a><br>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-primary btn-lg btn-block" href="adminpage_hotelchain.php" role="button">Manage Hotel Chain</a><br>
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
