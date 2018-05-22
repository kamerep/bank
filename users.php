<?php
require "protect.php";
$message='';

if (isset($_POST["names"]))
{
   require "connect.php";
   extract($_POST);
   $query="insert into users values(null,'$names','$email','$password',2)";
   $result=mysqli_query($conn, $query); //or die(mysqli_error($conn));
   if ($result)
       $message="<h5 class='text-center alert alert-success'>$names Registered Successfully!</h5>";
    else
        $message="<h5 class='text-center alert alert-danger'>$email Previously Registered!!</h5>";

}
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .glyphicon-king {
            font-size: 90px;
            color: #0f0f0f;
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
<?php require "navbar.php";?>
<div class="container">
<div class="col-sm-4 col-sm-offset-4">
    <form role="form" method="post" ACTION="users.php">
        <p class="text-center"><span class="glyphicon glyphicon-king"></span></p>
        <p class="text-center">Register User</p>
        <?=$message?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="names" class="form-control" required id="names">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required id="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required id="password">
        </div>

        <button type="submit" class="btn btn-block btn-info">Register User</button>
    </form>


</div>
</div>

</body>
</html>