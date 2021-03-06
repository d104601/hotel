<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            color: #fff;
            background: #1d2124;
            font-family: 'Roboto', sans-serif;
        }
        .form-control{
            height: 41px;
            background: #f2f2f2;
            box-shadow: none !important;
            border: none;
        }
        .form-control:focus{
            background: #e2e2e2;
        }
        .form-control, .btn{
            border-radius: 3px;
        }
        .signup-form{
            width: 390px;
            margin: 30px auto;
        }
        .signup-form form{
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .signup-form hr {
            margin: 0 -30px 20px;
        }
        .signup-form .form-group{
            margin-bottom: 20px;
        }
        .signup-form input[type="checkbox"]{
            margin-top: 3px;
        }
        .signup-form .row div:first-child{
            padding-right: 10px;
        }
        .signup-form .row div:last-child{
            padding-left: 10px;
        }
        .signup-form .btn{
            font-size: 16px;
            font-weight: bold;
            background: #3598dc;
            border: none;
            min-width: 140px;
        }
        .signup-form .btn:hover, .signup-form .btn:focus{
            background: #2389cd !important;
            outline: none;
        }
        .signup-form a{
            color: #fff;
            text-decoration: underline;
        }
        .signup-form a:hover{
            text-decoration: none;
        }
        .signup-form form a{
            color: #3598dc;
            text-decoration: none;
        }
        .signup-form form a:hover{
            text-decoration: underline;
        }
        .signup-form .hint-text {
            padding-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="signup-form">
    <form action="admin_removehotel.php" method="post">
        <h2>Remove Hotel</h2>
        <p>Please select hotel you want to remove from chain!</p>
        <hr>
        <div class="form-group">
            <select class="form-control" name="hotelcode" required="required">
                <?php
                session_start();
                $db = mysqli_connect("sql9.freemysqlhosting.net", "sql9341133", "r3xXEQjzaB", "sql9341133", "3306");
                $admin = $_SESSION['username_admin'];
                $gethotel = mysqli_query($db, "SELECT *from hotel WHERE admin='$admin'");
                while ($row = mysqli_fetch_array($gethotel)) {
                    echo "<option>" . $row['hotelcode'] . "</option>";
                }
                ?>
            </select>
            Warning: All reservation and rooms with this hotel also will be removed.
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Remove Hotel</button>
        </div>
    </form>
    <a href="adminpage_hotelchain.php">Click here to go back</a></div>
</div>
</body>
</html>