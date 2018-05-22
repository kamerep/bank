<?php
require "protect.php";
$message='';
if (isset($_POST["names"]))
{
    require "connect.php";
    extract($_POST);
    $query="insert into customers values(null,'$names', $id,'$phone')";
    $result=mysqli_query($conn, $query); //or die(mysqli_error($conn));
    if ($result)
        $message="<h5 class='text-center alert alert-success'>$names Registered Successfully!</h5>";
    else
        $message="<h5 class='text-center alert alert-danger'>$id Previously Registered!!</h5>";
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Customer</title>
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
<?php require "navbar.php";?>
<div class="container">
    <div class="col-sm-4 col-sm-offset-4">
        <form role="form" method="post" action="customers.php">
            <p class="text-center"><span class="glyphicon glyphicon-user"></span></p>
            <p class="text-center">Register Customer</p>
            <?=$message?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="names" class="form-control" required id="names">
            </div>
            <div class="form-group">
                <label for="natid">National ID</label>
                <input type="number" name="id" class="form-control" required id="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" class="form-control" required id="phone">
            </div>

            <button type="submit" class="btn btn-block btn-info">Register Customer</button>
        </form>


    </div>
</div>




</body>
</html>