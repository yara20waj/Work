<?php
$host = "localhost";
$username="root";
$password = '';
$database = "project";

$con = mysqli_connect($host,$username,$password,$database);

if(!$con){
  die("failed".mysqli_connect_error($conn));
}
?>