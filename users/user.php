<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
This is user page





<?php
session_start();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
echo '
    <p >Welcome '. $_SESSION['username']. ' </p>
    <a href="actions/_logout.php" >Logout</a>

<a href="partials/pickupSchedule.php">Schedule your picup</a><br>
';
}
else{
echo' <a href="partials/loginPage.php">Login</a>

    <a href="partials/signupPage.php">signup</a><br>';

}
?>
</body>
</html>