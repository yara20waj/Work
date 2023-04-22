<?php
session_start(); 
include('config.php');
$msg='';
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
}else{
    $user_id = $_SESSION['user_id'];
}
    session_unset();
    session_destroy();
    setcookie("token","",time()-(60*60),"/");
    $query = "DELETE FROM auth WHERE user_id = $user_id";
    if(mysqli_query($con,$query)){
        header("Location: index.php");
    }else{
        $msg = "failed logout".mysqli_error($con);
    }



?>

