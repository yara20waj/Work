<?php
include('config.php');
session_start();
$user_id='';$msg ="";$error="";
if(isset($_POST['apply']))
    {
$user_id = $_SESSION['user_id'];
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fromdate'];  
$todate=$_POST['todate'];
$description=$_POST['description'];  
$status=0;
$isread=0;
if($fromdate > $todate){
	$error=" ToDate should be greater than FromDate ";
}
$sql="INSERT INTO tblleaves(LeaveType,ToDate,FromDate,Description,Status,IsRead,empid) VALUES('$leavetype','$fromdate','$todate','$description','$status','$isread','$user_id')";
if(mysqli_query($con,$sql))
{
$msg="Leave applied successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Employee | Apply Leave</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="assets/css/style-barside.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style-applyLeave.css" rel="stylesheet" type="text/css">
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
    .page-title{
    color: #3E9919;
    text-transform: uppercase;
    margin-top: 3%;
    margin-left:19%;
    font-weight: bold;
    }
    .box{
    position: absolute;
    top: 22%;
    left: 19%;
    height:70%;
    background-color:#fff;
    width:77%;
    text-align: left;
    padding: 10px;
    border:1px solid rgba(0, 0, 0, .1);
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}
input{
    
    margin-bottom: 10px;
    margin-top: 70px;  
    width: 100%;
    box-sizing: border-box;
    box-shadow: none;
    outline: none;
    border: none; 
    font-size: 15px;
    border-bottom: 1px solid rgb(202, 200, 200);
    color:rgb(124, 124, 124);
   
}
.box form div{
    position: relative;
    
}
.box label{
    position: absolute;
    top: 10px;
    left: 0;
    
    padding-bottom: 0px;
    color:#9e9898ee;
    transition: .5s;
    pointer-events: none;
    margin-top: 45px;
}
.box input:focus ~ label,
.box input:valid ~ label
{
    top:-12px;
    left:0;
    color:#3E9919;
    font-size:15px;
    font-weight: bold;
}

.box input:focus,
.box input:valid{
    border-bottom: 1px solid #3E9919;
}
.side-left{
    width: 50%;
    float: left;
  
  }
  .side-right{
    width: 50%;
    float: right;
    
  }
  textarea{
      width:95%;
      margin-top:9%;
      border:none;
      border-bottom: 3px solid rgb(202, 200, 200);
  }
  select{
    color:#9e9898ee;
    width:94%;
    padding-bottom:1%;
      margin-top:5%;
      margin-left:3%;
      border:none;
      border-bottom: 3px solid rgb(202, 200, 200);   
  }
	</style>
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			
				<div class="page-title" style="">
					Apply for Leave
				</div>
			
			<div class="box">
				<div class="card">
					<div class="card-content">
						<form id="example-form" method="post" name="addemp">
							<div>
								<section>
									<div class="wizard-content">
										<div class="row">
											<div class="col m12">
												<div class="row">
													<?php if($error){?>
													<div class="errorWrap">
														<strong>ERROR</strong> :<?php echo $error; ?>
													</div><?php } 
													                else if($msg){?>
													<div class="succWrap">
														<strong>SUCCESS</strong>:<?php echo $msg; ?>
													</div><?php }?>
													<div style="margin-left:3%;width:45%;">
														<label for="fromdate">From Date</label> <input class="masked" data-inputmask="'alias': 'date'" id="mask1" name="fromdate" placeholder="" required="" type="text">
													</div>
													<div style="margin-left:52%;width:45%;margin-top:-100px;">
														<label for="todate">To Date</label> <input class="masked" data-inputmask="'alias': 'date'" id="mask1" name="todate" placeholder="" required="" type="text">
													</div>
													<div class="input-field col s12">
														<select name="leavetype">
														
														<option value="Casual Leave">
                                                                Casual Leave
                                                            </option>
                                                            <option value="Medical Leave test" >
                                                                Medical Leave test
                                                            </option>
                                                            <option value="Restricted Holiday(RH)">
                                                                Restricted Holiday(RH)
                                                            </option>
														</select>
													</div>

                                                    <br>
													<div class="Description" style="margin-left: 3%;">
														<label for="birthdate">Description</label> 
														<textarea class="" id="textarea1" name="description" required=""></textarea>
													</div>
												</div>
                                                <button class="apply" id="apply" name="apply" style="" type="submit">Apply</button>
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
	<div class="left-sidebar-hover"></div>
	<!-- Javascripts -->
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
	<script src="assets/js/pages/form-input-mask.js">
	</script> 
	<script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js">
	</script>
</body>
</html>