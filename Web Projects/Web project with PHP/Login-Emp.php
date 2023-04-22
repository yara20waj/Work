<?php
session_start();
include("config.php");
$msg ='';
if(isset($_COOKIE['token'])){
    $token = $_COOKIE['token'];
    $query = "SELECT * FROM auth WHERE token ='$token'";
    if($result = mysqli_query($con,$query)){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $_SESSION['user_id'] = $user_id;
        }
    }
}

if(isset($_SESSION['user_id'])){
    header("Location:/webproject/myprofile.php");
}

if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM tblemployees WHERE EmpId = '$username'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) >0){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['id'];
            $user_password = $row['Password'];
            $status=$row['Status'];
            $_SESSION['eid']=$row['id'];
            if($status==0)
{
$msg="Your account is Inactive. Please contact admin";
} else{
            if($password == $user_password){
                 $_SESSION['user_id'] = $user_id;
                if(isset($_POST['remember'])){
                    $token = openssl_random_pseudo_bytes(8);
                    $token = bin2hex($token);
                    setcookie("token",$token,time()+(30*24*60*60),"/");
                    $query = "INSERT INTO auth(user_id,token) VALUES($user_id,'$token')";
                    if(mysqli_query($con,$query)){
                          header("Location:/webproject/myprofile.php");                         
                    }else{
                        $msg = "failed".mysqli_error($con);
                    }
                }
                header("Location:myprofile.php");                         
            }else{
                $msg = "incorrect email or password";
            }
        }
    }
     
}
}



?>
<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title>ELMS | Home Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Theme Styles -->
	<link href="assets/css/styleLogin-Admin.css" rel="stylesheet" type="text/css">
</head>
<body>
	<main>
		<a href="index.php">
		<h4>Leave Management System</h4></a>
		<div class="box">
			<span class="box-title" style="font-size:20px;">Employee Login<?php echo $msg;?></span>
			<div>
				<form id="signin" method="post" name="signin">
					<div>
						<input autocomplete="off" class="inputAdmin" id="username" name="username" required="" type="text"> <label for="email">Enter Employee username</label>
					</div>
					<div>
						<input autocomplete="off" class="inputAdmin" id="password" name="password" required="" type="password"> <label for="password">Eenter Password</label>
					</div>
					<div>
						<div style="margin-left:20px;">
							<input name="remember" style="margin-top: 35px;" type="checkbox"> <label style="margin-left:30px;">Remember me</label>
						</div>
						<div>
							<input class="login" name="signin" type="submit" value="login">
						</div>
					</div>
				</form>
			</div>
		</div>
	</main><!-- Javascripts -->
	<script src="assets/plugins/jquery/jquery-2.2.0.min.js">
	</script> 
	<script src="assets/plugins/materialize/js/materialize.min.js">
	</script> 
	<script src="assets/plugins/material-preloader/js/materialPreloader.min.js">
	</script> 
	<script src="assets/plugins/jquery-blockui/jquery.blockui.js">
	</script> 
	<script src="assets/js/alpha.min.js">
	</script>
</body>
</html>