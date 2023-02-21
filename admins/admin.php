<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login Page</title>
</head>
<body>
This is my login page.
<form action=" " method="post">
    <label>
        <input type="email" name="u_email">
    </label>
    <label>
        <input type="password" name="u_pass">
    </label>
    <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include('../partials/connect.php');
    $email=$_POST['u_email'];
    $password=$_POST['u_pass'];


    $sql="select * from `admins` where email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

        $data=mysqli_fetch_array($result);
        echo$data['password'];
        if($password=$data['password']) {
            echo"here"  ;
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['id'] = $data['admin_id'];
            $_SESSION['username']=$data['adminName'];
        }
        echo'<script>
            window.location="../admins.php";
            </script>';
    }
    else{
        echo'<script>
        alert("Invalid credentials");
        window.location="../admins.php";
        </script>';
    }
}
?>