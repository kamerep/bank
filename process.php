<?php
require "protect.php";
    $message="";
    $names="";
    if (isset($_GET["names"])){
        extract($_GET);
    }

    if (isset($_POST["amount"])){
        extract($_POST);
        require"connect.php";
        $query="select * from loans where customer_id=$customer_id and balance>0";
        $count= mysqli_num_rows(mysqli_query($conn,$query));
        if ($count>0)
        {
            $message="<p class='text-danger text-center'>You already owe the bank</p>";
        }else {
            $balance=$amount*1.15;
            $date_borrowed=date("Y-m-d");
            $query="insert into loans values(null, $customer_id, $amount, '$date_borrowed', $balance)";
            $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
            header("location:issue.php");
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
    <title>Process Loan</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .glyphicon-user{
            font-size: 95px;
        }

    </style>
</head>
<body>
<?php require "navbar.php";?>
<div class="container">
    <div class="col-sm-4 col-sm-offset-4">
        <?=$message?>
        <p class="text-center"><span class="glyphicon glyphicon-user"></span></p>
        <form role="form" method="post" action="process.php" >

            <p class="text-center">Issue Loan To <strong><?=$names?></strong> </p>

            <div class="form-group">
                <label for="loan">Enter Loan Amount</label>
                <input type="number" name="amount" class="form-control" required id="loan">
            </div>
            <input type="hidden" name="customer_id" value="<?=$customer_id?>">

            <button type="submit" class="btn btn-block btn-info">ISSUE</button>
        </form>


    </div>
</div>

</body>
</html>