<!DOCTYPE html>
<html>

<head>
    <link href="assets/css/login.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="assets/images/Gundar.png" type="image/ico" />
    <title> Sistem Informasi Petshop Q </title>
</head>

<body>
    <div class="container">
        <h1 class="posisilog">Login</h1>
        <form action="proseslog.php" method="post">
            <div class="imgcontainer">
                <img src="assets/images/Gundar.png" alt="foto" class="imgcircle">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" autocomplete="off" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" autocomplete="off" required>

                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

</html>