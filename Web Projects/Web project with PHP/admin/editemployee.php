<?php
include('config.php');
session_start();
$user_id='';$msg ="";$error="";
if(isset($_SESSION['user_id']))
    {   
header('location:index.php');
}
else{
$eid=$_GET['empid'];
if(isset($_POST['update']))
{
	$fname=$_POST['firstName'];
	$lname=$_POST['lastName'];   
	$gender=$_POST['gender']; 
	$dob=$_POST['dob']; 
	$department=$_POST['department']; 
	$address=$_POST['address']; 
	$city=$_POST['city']; 
	$country=$_POST['country']; 
	$mobileno=$_POST['mobileno']; 
	$sql="update tblemployees set FirstName='$fname',LastName='$lname',Gender='$gender',Dob='$dob',Department='$department',Address='$address',City='$city',Country='$country',Phonenumber='$mobileno' where id='$eid'";
	$query=mysqli_query($con,$sql);
	$msg = "updated profile successfully";

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
	<link href="../assets/css/style-editeEmp.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/style-barside.css" rel="stylesheet" type="text/css">
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
  margin-top: 10px; 
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

.box input:focus,
.box input:valid{
    border-bottom: 1px solid #e0ddddbe;
  }
	</style>
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="row" >
			<div class="col s12">
				<div class="page-title">
					Update employee
				</div>
			</div>
			<div class="box" style="width:76%; height:100%; padding-top:20px; padding-left:30px; margin-left:280px;margin-top:2%;">
				<div class="card">
					<div class="card-content">
						<form id="example-form" method="post" name="updatemp">
							<div>
								<h1 style="color:#07aa07;">Update Employee Details</h1>
								<?php if($error){?>
								<div class="errorWrap">
									<strong>ERROR</strong>:<?php echo $error; ?>
								</div><?php } 
								                else if($msg){?>
								<div class="succWrap">
									<strong>SUCCESS</strong> : <?php echo $msg; ?>
								</div><?php }?>
								<section>
									<div class="wizard-content" style="margin-top:6%;" >
										<div class="row">
											<div class="col m6">
												<div class="side-left" style="width:40%;">
												<?php
												$eid=$_GET['empid'];
												$sql = "SELECT * from  tblemployees where id='$eid'";							
								                $result = mysqli_query($con, $sql);
								                while($row = mysqli_fetch_assoc($result ))
								                {              
													?>
													<div class="side-left"  style="width:500px;margin-left:3%;">
														<label for="empcode">Employee Code(Must be unique)</label> <input autocomplete="off" id="empcode" name="empcode" required="" style="width:470px; padding-bottom:3%;padding-top:20px;" type="text" value="<?php echo $row['EmpId']; ?>"> 
														<span id="empid-availability" style="font-size:12px;"></span>
													</div>
													<div class="side-left" style="margin-top: 3%;width:200px;margin-left:3%;">
														<label for="firstName">First name</label> <input id="firstName" name="firstName" required="" style="width:220px;padding-bottom:2%;padding-top:20px;" type="text" value="<?php echo $row['FirstName']; ?>">
													</div>
													<div class="side-right" style="margin-top: 3%;width:200px;">
														<label for="lastName">Last name</label> <input autocomplete="off" id="lastName" name="lastName" required="" style="width:220px;padding-bottom:2%;padding-top:20px;" type="text" value="<?php echo $row['LastName']; ?>">
													</div>
													<div class="side-left"style="width:500px;margin-top: 3%;margin-left:3%;">
														<label for="email">Email</label> <input autocomplete="off" id="email" name="email" required="" type="email" style="margin-top: 2%;width:470px; padding-bottom:2%;padding-top:20px;" value="<?php echo $row['EmailId']; ?>"> <span id="emailid-availability" style="font-size:12px;"></span>
													</div>
													<div class="side-left"style="width:470px;margin-top: 3%;margin-left:3%;">
														<label for="phone">Mobile number</label> <input autocomplete="off" id="phone" maxlength="10" name="mobileno" required="" type="tel" style="margin-top: 2%;width:470px; padding-bottom:2%;padding-top:20px;" value="<?php echo $row['Phonenumber']; ?>">
													</div>
												</div>
											</div>
											<div class="col m6">
												<div class="row">
													<div class="side-left" style="margin-top: 3%; margin-left:5%;width:150px;">
														<select name="gender" style="width:250px; padding-bottom:5%;">
														<option>
														<?php echo $row['Gender'];?>
														</option>
															<option value="Male" >
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
													<div class="side-right" style="margin-left:10%;margin-top:-9%;"  >
                                                        <input class="datepicker" id="birthdate" name="dob" style="width:280px; margin-left:40%;margin-top:11%; padding-bottom:3%;" value="<?php echo $row['Dob']; ?>">
													</div>
													<div class="side-left">
														<select name="department" style="width:250px; padding-bottom:2%; margin-top:7%; margin-left:10%;">
														<option>
														<?php echo $row['Department'];?>
														</option>
                                                            <option value="Human Resource" >
                                                                Human Resource
                                                            </option>
                                                            <option value="Information Technology">
                                                                Information Technology
                                                            </option>
                                                            <option value="Operations" >
                                                                Operations
                                                            </option>
                                                        </select>
															</option>
														</select>
													</div>
													<div class="side-right" style="width:280px;margin-top:-4%;margin-right:5%;">
														<label for="country" style="">Country</label> <input autocomplete="off" id="country" name="country" required="" style="width:280px;  padding-bottom:3%;padding-top:10px;" type="text" value="<?php echo $row['Country']; ?>">
													</div>
													<div class="side-left" style=" margin-left:5%;margin-top:2%;">
														<label for="city" style="">City/Town</label> <input autocomplete="off" id="city" name="city" required="" style="width:250px; padding-bottom:2%; padding-top:10px;" type="text" value="<?php echo $row['City']; ?>">
													</div>
													<div class="side-right" style="width:340px;margin-top:-7%;">
														<label for="address" style="margin-top:1.4%;margin-left:.5%;">Address</label> <input autocomplete="off" id="address" name="address" required="" style="width:270px; margin-top:8.5%; padding-bottom:3%;margin-left:1%;padding-top:10px;" type="text" value="<?php echo $row['Address']; ?>">
													</div><?php }?>
													<div class="" style="margin-bottom:10%; width:300px; margin-left:430px;" >
														<button class="update" id="update" name="update"  style="margin-top:9%; margin-left:70px;" type="submit">UPDATE</button>
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
	</script><?php }?>
</body>
</html>