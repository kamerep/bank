<?php
session_start();
header("location:login.php");
$message="";
$names="";
if(isset($_POST["email"]))
{
    require "connect.php";
    extract($_POST);
    $query="select * from users where email='$email' and password='$password'
      and type!=3";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $count = mysqli_num_rows($result);
    if ($count==1)
    {
        //success
        $row= mysqli_fetch_assoc($result);
        extract($row);
        session_start();
        $_SESSION["names"]=$names;
        $_SESSION["type"]=$type;
        header("location:issue.php");
    }
    else
    {
        $message="<p class='text-danger'>Wrong email or password.</p>";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .glyphicon-user {
            font-size: 95px;
        }
        .container{
            height: 100vh;
            display: flex;
            align-items: center;
            align-content: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-sm-4 col-sm-offset-4">
        <p class="text-center"><span class="glyphicon glyphicon-user"></span></p>
        <p class="text-center">Log In Here</p>

        <form role="form" method="post" action="login.php">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required id="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required id="password">
            </div>

            <button type="submit" class="btn btn-block btn-info">Log In</button>
        </form>

        <?=$message?>

    </div>
</div>

</body>
</html>