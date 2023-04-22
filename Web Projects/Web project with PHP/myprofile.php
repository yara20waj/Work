<?php
include('config.php');
session_start();
$user_id='';$msg ="";$error="";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
if(isset($_POST['update']))
{
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$gender=$_POST['gender'];
$email = $_POST['email']; 
$dob=$_POST['dob']; 
$department=$_POST['department']; 
$city=$_POST['city']; 
$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$sql="update tblemployees set FirstName='$fname',LastName='$lname',Gender='$gender',Dob='$dob',Department='$department',City='$city',Country='$country',Phonenumber='$mobileno',EmailId='$email' where id= $user_id";

if(mysqli_query($con,$sql)){
    $msg = "updated profile successfully";
}else{
    $error = "error in updating profile".mysqli_error($con);
}
}
$emp_fname=$emp_lname=$emp_gender=$emp_dob=$emp_email=$emp_department=$emp_address=$emp_city=$emp_country=$emp_mobileno='';
$select_query = "SELECT * FROM tblemployees WHERE id = $user_id";
$select_result = mysqli_query($con,$select_query);
    while($select_row = mysqli_fetch_assoc($select_result)){
        $emp_id=$select_row['EmpId'];
        $emp_fname = $select_row['FirstName'];
        $emp_lname=$select_row['LastName'];
        $emp_gender = $select_row['Gender'];
        $emp_email=$select_row['EmailId'];
        $emp_dob= $select_row['Dob'];
        $emp_department= $select_row['Department'];
        $emp_city= $select_row['City'];
        $emp_country = $select_row['Country'];
        $emp_mobileno = $select_row['Phonenumber'];
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Admin | Update Employee</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="assets/css/style-barside.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style-profile.css" rel="stylesheet" type="text/css">
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
	   select{
	   color:#9e9898ee;
	   width:70%;
	   padding-bottom:1%;
	   margin-top:5%;
	   border:none;
	   border-bottom: 1px solid rgb(202, 200, 200);   
	 }
	 option{
	   background: #eee;  
	 }
	 input{
	 margin-bottom: 10px;
	 margin-top: 30px; 
	 box-sizing: border-box;
	 box-shadow: none;
	 outline: none;
	 border: none; 
	 font-size: 15px;
	 border-bottom: 1px solid #cac8c8;
	 color:#7c7c7c;
	}
	 
	.box label{
	 position: absolute;
	 color:#9e9898ee;
	 transition: .5s;
	 pointer-events: none;
	 }
	.box input:focus ~ label,
	.box input:valid ~ label{
	   top:-12px;
	   left:0;
	   color:#9e9898ee;
	   font-size:15px;
	   font-weight: bold;
	} 
	.box input:focus,
	.box input:valid{
	   border-bottom: 2px solid #e0ddddbe;
	 }
	 .update{
	 border:none;
	 cursor: pointer;
	 color: white;
	 background: #2007abe7;
	 border-radius: 3px;
	 font-size: 15px;
	 text-transform: uppercase;
	 width: 120px;
	 height: 40px;
	 box-shadow: 0 5px 10px #aaa8a8;
	 
	}
	</style>
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			<div class="col s12" style="margin-left:7%">
				<div class="page-title">
					Update employee Details
				</div>
			</div>
			<div class="box" style="width:75%; height:100%; padding-top:70px">
				<div class="card">
					<div class="card-content">
						<form id="example-form" method="post" name="updatemp">
							<div>
								<?php if($error){?>
								<div class="errorWrap">
									<strong>ERROR</strong>: <?php echo $error; ?>
								</div><?php } 
								                                                else if($msg){?>
								<div class="succWrap">
									<strong>SUCCESS</strong> : <?php echo $msg; ?>
								</div><?php }?>
								<section>
									<div class="wizard-content">
										<div class="row">
											<div class="col m6">
												<div class="side-left" style="width:40%;">
													<div class="side-left" style="width:500px;">
														<label for="empcode">Employee username</label> <input autocomplete="off" id="empcode" name="empcode" readonly required="" style="width:470px; padding-bottom:3%;" type="text" value="<?php echo $emp_id; ?>"> <span id="empid-availability" style="font-size:12px;"></span>
													</div>
													<div class="side-left" style="margin-top: 5%;width:200px;">
														<label for="firstName">First name</label> <input id="firstName" name="firstName" required="" style="width:220px;padding-bottom:4%;" type="text" value="<?php echo $emp_fname; ?>">
													</div>
													<div class="side-right" style="margin-top: 5%;width:200px;">
														<label for="lastName">Last name</label> <input autocomplete="off" id="lastName" name="lastName" required="" style="width:220px;padding-bottom:4%;" type="text" value="<?php echo $emp_lname; ?>">
													</div>
													<div class="side-left" style="width:500px;margin-top: 4%;">
														<label for="email">Email</label> <input autocomplete="off" id="email" name="email" required="" style="margin-top: 7%;width:470px; padding-bottom:3%;" type="email" value="<?php echo $emp_email; ?>"> <span id="emailid-availability" style="font-size:12px;"></span>
													</div>
													<div class="side-left" style="width:470px;margin-top: 4%;">
														<label for="phone">Mobile number</label> <input autocomplete="off" id="phone" maxlength="10" name="mobileno" required="" style="margin-top: 7%;width:470px; padding-bottom:3%;" type="tel" value="<?php echo $emp_mobileno; ?>">
													</div>
												</div>
											</div>
											<div class="col m6">
												<div class="row">
													<div class="side-left" style="margin-top: 3%; margin-left:5%;width:150px;">
														<select name="gender" style="width:250px; padding-bottom:4%;">
															<option value="Male">
																Male
															</option>
															<option value="Female">
																Female
															</option>
															<option value="Other">
																Other
															</option>
														</select>
													</div>
													<div class="side-right" style="margin-left:10%;margin-top:-6%;">
														<label for="birthdate" style="margin-top:1%;margin-left:7%;">Date of Birth</label> <input class="datepicker" id="birthdate" name="dob" style="width:280px; margin-left:25%;margin-top:15%; padding-bottom:3%;" value="<?php echo $emp_dob; ?>">
													</div>
													<div class="side-left">
														<select name="department" style="width:250px; padding-bottom:4%; margin-top:7%; margin-left:14%;">
															<option value="Human Resource">
																Human Resource
															</option>
															<option value="Information Technology">
																Information Technology
															</option>
															<option value="Operations">
																Operations
															</option>
														</select>
													</div>
													<div class="side-right" style="width:330px;margin-top:-5%;margin-left:10%;">
														<label for="country">Country</label> <input autocomplete="off" id="country" name="country" required="" style="width:280px; margin-top:10%; padding-bottom:3%;" type="text" value="<?php echo $emp_country; ?>">
													</div>
													<div class="" style="margin-top:2%; margin-left:46%;">
														<label for="city">City/Town</label> <input autocomplete="off" id="city" name="city" required="" style="width:250px; padding-bottom:2%; margin-top:8%;" type="text" value="<?php echo $emp_city; ?>">
													</div>
													<div class="" style="margin-bottom:10%; width:300px; margin-left:450px;">
														<button class="update" id="update" name="update" style="margin-top:15%; margin-left:60px;" type="submit">UPDATE</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main><!-- Javascripts -->
	<script src="assets/plugins/materialize/js/materialize.min.js">
	</script> 
	<script src="assets/plugins/material-preloader/js/materialPreloader.min.js">
	</script> 
	<script src="assets/plugins/jquery-blockui/jquery.blockui.js">
	</script> 
	<script src="assets/js/alpha.min.js">
	</script> 
	<script src="assets/js/pages/form_elements.js">
	</script>
</body>
</html>