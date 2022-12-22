<?php include('partials/menu.php'); ?>

<head>
    <title>Grocery order website - home page</title>
    <link rel="stylesheet" href="../css/admin.css">


    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>

            <br>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            ?>

<br>

            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php include('partials/footer.php'); ?>