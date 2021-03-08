<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="assets/images/Gundar.png" type="image/ico" />
    <link href="assets/css/style.css" rel="stylesheet">


    <title> Sistem Informasi Petshop Q </title>
</head>

<body class=" background">
    <nav>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <ul class="nav-link">
            <a href="#home"><img class="ava" src="assets/images/user.png" alt="logo" /> </a>
            <li class="pindah"><a href="logot.php">Log out</a></li>
            <li class="pindah"><a href="user.php?page=home">Home</a></li>
            <li class="pindah"><a href="user.php?page=list">Cart</a></li>
            <li class="pindah"><a href="user.php?page=about">About</a></li>
        </ul>
    </nav>

    <script src="assets/js/app.js"></script>
</body>

</html>
<?php
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
switch ($queries['page']) {
    case 'home':
        # code...
        include 'tampilprous.php';
        break;
    case 'list':
        # code...
        include 'cartpembeli.php';
        break;
    case 'about':
        # code...
        include 'about.php';
        break;
    default:
        #code...
        include 'web.php';
        break;
}
