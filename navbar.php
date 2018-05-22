<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header" >
            <a class="navbar-brand" style="color: #a6e1ec; font-weight: bolder; font-size: 150%" href="#">Mini Bank</a>
        </div>
        <ul class="nav navbar-nav" style="float:right; font-weight:bold">
            <li><a href="customers.php">New Customer</a></li>
            <?php if($_SESSION["type"]==1):?>
            <li><a href="register.php">Register User</a></li>
            <li><a href="view.php">View Users</a></li>
            <?php endif;?>
            <li><a href="issue.php">Issue Loan</a></li>
            <li><a href="pending.php">Pending Loans</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-left">

            <li><a href="#"><?=$_SESSION["names"]?></a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </div>
</nav>


