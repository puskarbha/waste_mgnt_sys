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
include('./partials/connect.php');
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    echo'<p >Welcome '. $_SESSION['username']. ' </p>
    <a href="actions/_logout.php" >Logout</a><br>
    <a href="partials/pickupSchedule.php">Schedule new picup</a><br>
       <table>
    <tr><tttle>Your orders</tttle></tr>
    <tr>
        <th>Type</th>
        <th>Weight</th>
        <th>location</th>
        <th>Pickup Date</th>
        <th>Status</th>
    </tr>
    
    ';
$id=$_SESSION['id'];
    $sql = "SELECT * FROM `pickup` where user_id='$id'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $orderTime=$row["order_time"];
        $type = $row['type'];
        $weight = $row["weight"];
        $location=$row["location"];
        $pickup_date=$row["date"];
        $status=$row["status"];



    echo '
    <tr>
     <td>'.$type.'</td>
     <td>'.$weight.'</td>
     <td>'.$location.'</td>
     <td>'.$pickup_date.'</td>
     <td>'.$status.'</td>
    </tr>
    ';
        }echo'</table>' ;
}
else{
echo' <a href="partials/loginPage.php">Login</a>

    <a href="partials/signupPage.php">signup</a><br>';

}
?>
</body>
</html>