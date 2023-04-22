<?php 
include('config.php');
$msg ="";$error="";
session_start();

if(isset($_POST['add'])){
    
    if (isset($_POST['empcode'])) {
    $username = $_POST['empcode'];
    $empid=$_POST['empcode'];
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];   
    $email=$_POST['email']; 
    $password=md5($_POST['password']); 
    $gender=$_POST['gender']; 
    $dob=$_POST['dob']; 
    $department=$_POST['department']; 
    $address=$_POST['address']; 
    $city=$_POST['city']; 
    $country=$_POST['country']; 
    $mobileno=$_POST['mobileno']; 
    $status=1;
  
        $sql_u = "SELECT * FROM tblemployees WHERE EmpId='$username'"; 
        $res_u = mysqli_query($con, $sql_u);
         
  
        if (mysqli_num_rows($res_u) > 0) {
            $error = "Sorry... username already taken";     
        } else{
             $query = "INSERT INTO tblemployees (EmpId,FirstName,LastName,EmailId,Password,Gender,Dob,Department,Address,City,Country,Phonenumber,Status) VALUES('$empid','$fname','$lname','$email','$password','$gender','$dob','$department','$address','$city','$country','$mobileno','$status')";
             $results = mysqli_query($con, $query);
             $msg="Saved!";
              
        }
    }}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Admin | Add Employee</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/css/add-Emp.css" rel="stylesheet" type="text/css">
	<style>
	   .errorWrap {
	       padding: 10px;
	       margin: 0 0 20px 0;
	       background: #fff;
	       border-left: 4px solid #dd3d36;
	       -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	       box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	   }

	   .succWrap {
	       padding: 10px;
	       margin: 0 0 20px 0;
	       background: #fff;
	       border-left: 4px solid #5cb85c;
	       -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	       box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	   }

	   select {
	       color: #9e9898ee;

	       padding-bottom: 1%;
	       margin-top: 5%;
	       border: none;
	       border-bottom: 1px solid rgb(202, 200, 200);
	   }

	   option {
	       background: #eee;
	   }
	</style>
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			<div class="col s12">
				<div class="page-title" style="color: #3E9919;margin-top:30px;">
					<b>Add employee</b>
				</div>
			</div>
			<div class="col s12 m12 l12">
				<div class="card">
					<div class="box" style="width:72%;margin-top:2%;padding-top:100px;padding-left:50px;padding-right:70px;">
						<form id="example-form" method="post" name="addemp">
							<div>
								<section>
									<div class="wizard-content">
										<div class="row">
											<div class="col m6">
												<div class="side-left">
													<?php if($error){?>
													<div class="errorWrap">
														<strong>ERROR</strong>:<?php echo $error; ?>
													</div><?php } 
													                                                                    else if($msg){?>
													<div class="succWrap">
														<strong>SUCCESS</strong>:<?php echo $msg; ?>
													</div><?php }?>
													<div class="side-left" style="width:500px;margin-bottom:8%;">
														<label for="empcode">Employee Code(Must be unique)</label> <input autocomplete="off" id="empcode" name="empcode" onblur="checkAvailabilityEmpid()" required="" style="width:470px; padding-bottom:2%;" type="text"> <span id="empid-availability" style="font-size:12px;"></span>
													</div>
													<div style="width:470px">
														<div class="side-left" style="width:220px;margin-bottom:8%;">
															<label for="firstName">First name</label> <input id="firstName" name="firstName" required="" style="width:220px;padding-bottom:2%;" type="text">
														</div>
														<div class="side-right" style="width:220px;margin-bottom:8%;">
															<label for="lastName">Last name</label> <input autocomplete="off" id="lastName" name="lastName" required="" style="width:220px;padding-bottom:2%;" type="text">
														</div>
													</div>
													<div class="side-left" style="width:500px;margin-bottom:8%;">
														<label for="email">Email</label> <input autocomplete="off" id="email" name="email" onblur="checkAvailabilityEmailid()" required="" style="width:470px; padding-bottom:2%;" type="email"> <span id="emailid-availability" style="font-size:12px;"></span>
													</div>
													<div class="side-left" style="width:500px;margin-bottom:8%;">
														<label for="password">Password</label> <input autocomplete="off" id="password" name="password" required="" style="width:470px; padding-bottom:2%;" type="password">
													</div>
													<div class="side-left" style="width:500px;margin-bottom:8%;">
														<label for="confirm">Confirm password</label> <input autocomplete="off" id="confirm" name="confirmpassword" required="" style="width:470px; padding-bottom:2%;" type="password">
													</div>
												</div>
											</div>
											<div class="col m6">
												<div class="row">
													<div class="side-left" style="width:220px;">
														<select name="gender" style="width:230px; padding-bottom:5%;">
															<option value="">
																Gender...
															</option>
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
													<div class="side-right" style="width:220px;">
														<label for="birthdate">Birthdate</label> <input autocomplete="off" class="datepicker" id="birthdate" name="dob" style="width:230px;margin-top:6%;" type="date">
													</div>
													<div class="side-left" style="width:220px;margin-top:4.5%;">
														<select name="department" style="width:230px; padding-bottom:5%;">
															<option value="">
																Department...
															</option>
															<option value=" Human Resource">
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
													<div class="side-right" style="width:220px;margin-top:4.5%;">
														<label for="country">Country</label> <input autocomplete="off" id="country" name="country" required="" style="width:230px;margin-top:6%;" type="text">
													</div>
													<div class="side-left" style="width:220px;margin-top:4.5%;">
														<label for="city">City/Town</label> <input autocomplete="off" id="city" name="city" required="" style="width:230px; padding-bottom:5%;" type="text">
													</div>
													<div class="side-right" style="width:220px;margin-top:4.5%;">
														<label for="address">Address</label> <input autocomplete="off" id="address" name="address" required="" style="width:230px;margin-top:6%;" type="text">
													</div>
													<div class="side-left" style="width:530px;margin-bottom:8%;margin-top:3%;">
														<label for="phone">Mobile number</label> <input autocomplete="off" id="phone" maxlength="10" name="mobileno" required="" style="width:550px; padding-bottom:2%;" type="tel">
													</div>
													<div class="side-left" style="margin-top:-3%;">
														<button class="add" id="add" name="add" onclick="return valid();" type="submit">ADD</button>
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
	</main>
	<div class="left-sidebar-hover"></div><!-- Javascripts -->
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