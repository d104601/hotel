<!DOCTYPE html>
<?php
include 'conn.php';
?>
<html style="background-color: rgb(150, 150, 150);">

<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <meta charset="UTF8" />
  <meta name="author" content="Y." />
  <meta name="keywords" content="First Exam" />
  <meta name="description" content="CSC355 Code" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Exam 1</title>
  <style>
    <!-- render with bootstrap if possible-- > h1 {
    color: blue;
    font-family: "Times New Roman",
    Times,
    serif;
    font-size: 25px;
    text-indent: 5cm;
    }

    .btn {
      margin: 4px 4px;
      background-color: #1c87c9;
      border: 3px solid #000000;
      border-radius: 5px;
      text-align: center;
      font-size: 10px;
      color: #fff;
      cursor: pointer;
      width: 70px;
      height: 70px;
      word-break: keep-all;
    }

    *:hover {
      color: black;
    }

    body {
      padding-top: 5%;
      text-align: center;
    }

    h1 {
      text-indent: 0em;
    }

    </style>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Hotel ID</th>
        <th scope="col">Hotel Name</th>
        <th colspan="2">Hotel Address(x,y)</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = mysqli_query($conn, "select * from hotel");
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <th scope="row"><?php echo $row['hotelcode'] ?></th>
          <td><?php echo $row['hotelname'] ?></td>
          <td><?php echo $row["addressi"] . "," . $row['addressj']; ?></td>

        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

</html>