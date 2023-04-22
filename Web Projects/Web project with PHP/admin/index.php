<?php
include("config.php");
session_start();
$msg ="";
if(isset($_SESSION['user_id'])){
    header("Location:dashboard.php");
}

if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE UserName = '$username'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) >0){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['id'];
            $user_password = $row['Password'];

            if($password == $user_password){
                header("Location:dashboard.php");                         
            }else{
                $msg = "incorrect email or password";
            }
        }
    }else{
        $msg ="incorrect email or password";
    }
     
  
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <link href="../assets/css/styleLogin-Admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="loginAdmin" >
            <main>
            <a href="../index.php">  <h4>Admin Login</h4></a>
                <div class="box" >
                    <span class="box-title" >Admin Login</span>
                    <div class="row">
                        <form name="signin" method="post">
                            <div> 
                                <input id="username" type="text" name="username" class="inputAdmin" autocomplete="off" required >
                                <label for="email">Enter Username</label>
                            </div>
                            <div>
                                <input id="password" type="password" class="inputAdmin" name="password" autocomplete="off" required>
                                <label for="password">Enter Password</label>
                            </div>
                            <div>
                                <input type="submit" name="signin" value="Login" class="login">
                             </div>
                        </form>
                    </div>
                </div>     
            </main>