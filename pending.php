<?php require "protect.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pending Loans</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        thead{
            background-color: #555555;
            color: white;
        }

    </style>
</head>

<body>
<?php require "navbar.php";?>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>LOAN ID</th>
            <th>NAME</th>
            <th>NATIONAL ID</th>
            <th>PHONE NUMBER</th>
            <th>AMOUNT</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>

    <?php
    require "connect.php";
    $query="SELECT  customers.*, loans.* FROM customers 
    JOIN loans ON customers.customer_id=loans.customer_id";
    $result=mysqli_query($conn, $query);
    while ($row=mysqli_fetch_assoc($result))
    {
        extract($row);
        echo "<tr>
            <td>$loan_id</td>
            <td><strong>$names</strong></td>
            <td>$natid</td>
            <td>$phone</td>
            <td>$amount</td>
            <td>$balance</td>
            <td><a class='btn btn-sm btn-primary' href='repay.php?loan_id=$loan_id&customer_id=$customer_id&names=$names'>Repay</a></td>
            </tr>";
    }
    ?>
        </tbody>
    </table>
</div>

</body>
</html>