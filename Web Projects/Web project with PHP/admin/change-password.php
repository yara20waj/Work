<?php
include('config.php');
session_start();
$error = $msg =$user_id ='';
if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];
}
 
    if(isset($_POST['change'])) {
    $old_password=$_POST['password'];
    $new_password=$_POST['newpassword'];
    $con_password=$_POST['confirmpassword'];
    $chg_pwd=mysqli_query($con,"SELECT * from admin WHERE id='1'");
    $chg_pwd1=mysqli_fetch_array($chg_pwd);
    $data_pwd=$chg_pwd1['Password'];
    if($data_pwd==$old_password){
    if($new_password==$con_password){
    $update_pwd=mysqli_query($con,"UPDATE admin set Password='$new_password' where id='1'");
    $msg="Your Password succesfully changed";
    }
     
    }
    else
    {
    $error="Your current password is wrong";
    }}
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Admin | Change Password</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/css/styleChange-Password.css" rel="stylesheet" type="text/css">
	<style>
	          .errorWrap {
	      padding: 10px;
	      margin: 0 0 20px 0;
	      background: #fff;
	      border-left: 4px solid #dd3d36;
	      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	   }
	   .succWrap{
	      padding: 10px;
	      margin: 0 0 20px 0;
	      background: #fff;
	      border-left: 4px solid #5cb85c;
	      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	   }
	</style>
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="page-title">
			Change Pasword
		</div>
		<div class="col s12 m12 l6">
			<div class="card">
				<div class="card-content">
					<div class="box">
						<form class="col s12" id="chngpwd" method="post" name="chngpwd">
							<?php if($error){?>
							<div class="errorWrap">
								<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
							</div><?php } 
							                else if($msg){?>
							<div class="succWrap">
								<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
							</div><?php }?>
							<div class="input-field col s12">
								<input autocomplete="off" class="validate" id="password" name="password" required="" type="password"> <label for="password">Enter Old Password</label>
							</div>
							<div class="input-field col s12">
								<input autocomplete="off" class="validate" id="password" name="newpassword" required="" type="password"> <label for="password">Enter New Password</label>
							</div>
							<div class="input-field col s12">
								<input autocomplete="off" class="validate" id="password" name="confirmpassword" required="" type="password"> <label for="password">Enter Confirm Password</label>
							</div>
							<div class="input-field col s12">
								<button class="change" name="change" onclick="return valid();" type="submit">Change</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div class="left-sidebar-hover"></div><!-- Javascripts -->
	<script src="../assets/plugins/jquery/jquery-2.2.0.min.js">
	</script> 
	<script src="../assets/plugins/materialize/js/materialize.min.js">
	</script> 
	<script src="../assets/plugins/material-preloader/js/materialPreloader.min.js">
	</script> 
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.js">
	</script> 
	<script src="../assets/js/alpha.min.js">
	</script> 
	<script src="../assets/js/pages/form_elements.js">
	</script>
</body>
</html>