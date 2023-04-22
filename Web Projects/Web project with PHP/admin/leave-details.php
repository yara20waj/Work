<?php
session_start();
include('config.php');
$msg='';


//require_once ('process/dbh.php');

//$sql = "SELECT * from `employee_leave`";



// code for update the read notification status
$isread=1;
$did=intval($_GET['leaveid']);
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update tblleaves set IsRead='$isread' where id='$did'";
$select_result = mysqli_query($con,$sql);
// code for action taken on leave
if(isset($_POST['update']))
{ 
	$did=intval($_GET['leaveid']);
	$description=$_POST['description'];
	$status=$_POST['status']; 
	$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
	$sql="update tblleaves set AdminRemark='$description',Status='$status',AdminRemarkDate='$admremarkdate' where id='$did'";  	
	$select_result = mysqli_query($con,$sql);
	//while($select_row = mysqli_fetch_assoc($select_result)){
		//$emp_description=$select_row['description'];
		//$emp_status=$select_row['status'];
		//$emp_did=$select_row['did'];
		//$emp_status=$select_row['status'];
	//}
	$msg="Leave updated Successfully";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Admin | Leave Details</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="../assets/css/leave-Details.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  
}

/* Modal Content */
.modal-content {
  padding-left:30px;
  background-color: #eeeeee;
  margin: auto;
  border: 1px solid #888;
  width: 55%;
  height:55%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);

}
.browser-default{
	margin-top:3%;
    width:95%;
    background-color: white;
    padding:20px;
    border: 1px solid #888;
    font-size:15px;
    color:slategray;
}
option{
    color:slategray;
}
.description{
	background-color: #eeeeee;
    font-size:15px;
    border:none;
    border-bottom:1px solid slategray;
    width: 95%;
	margin-top:5%;
	padding-bottom:30px;
    
}

</style>
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			<div class="col s12">
				<div class="page-title" style="font-size:24px;">
					Leave Details
				</div>
			</div>
			<div class="box">
				<div class="card">
					<div class="card-content">
						<span class="box-title" >Leave Details</span> <?php if($msg){?>
						<div class="succWrap">
							<strong>SUCCESS</strong> : <?php echo $msg; ?>
						</div><?php }?>
						<table>
							<tbody>
								<?php 
								
								
								$lid=$_GET['leaveid']; 
								$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblemployees.Gender,tblemployees.Phonenumber,tblemployees.EmailId,tblleaves.LeaveType,tblleaves.ToDate,tblleaves.FromDate,tblleaves.Description,tblleaves.PostingDate,tblleaves.Status,tblleaves.AdminRemark,tblleaves.AdminRemarkDate from tblleaves join tblemployees on tblleaves.empid=tblemployees.id where tblleaves.id='$lid'";
								
								$result = mysqli_query($con, $sql);

                                            while($row = mysqli_fetch_assoc($result ))
                                        {              ?>
								<tr style="height:70px;border-top: 1px solid #eee;">
									<td style="font-size:16px;"><b>Employe Name :</b></td>
									<td>
										<a style="color: blue;font-size:14px;" href="editemployee.php?empid=%3C?php%20echo%20$row-%3Eid;?%3E" target="_blank">
                                        <?php echo $row['FirstName']." ".$row['LastName'];?></a>
									</td>
									<td style="font-size:16px;"><b>Emp username :</b></td>
									<td><?php echo $row['EmpId'];?></td>
									<td style="font-size:16px;"><b>Gender :</b></td>
									<td><?php echo $row['Gender'];?></td>
								</tr>
								<tr style="height:70px;">
									<td style="font-size:16px;"><b>Emp Email :</b></td>
									<td ><?php echo $row['EmailId'];?></td>
									<td style="font-size:16px;"><b>Emp Contact No. :</b></td>
									<td><?php echo $row['Phonenumber'];?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr style="height:70px;">
									<td style="font-size:16px;"><b>Leave Type :</b></td>
									<td><?php echo $row['LeaveType'];?></td>
									<td style="font-size:16px;"><b>Leave Date . :</b></td>
									<td>From <?php echo $row['FromDate'];?> to <?php echo $row['ToDate'];?></td>
									<td style="font-size:16px;"><b>Posting Date</b></td>
									<td><?php echo $row['PostingDate'];?></td>
								</tr>
								<tr style="height:70px;">
									<td style="font-size:16px;"><b>Employe Leave Description :</b></td>
									<td colspan="5"><?php echo $row['Description'];?></td>
								</tr>
								<tr style="height:70px;">
									<td style="font-size:16px;"><b>leave Status :</b></td>
									<td colspan="5"><?php $stats=$row['Status'];
									if($stats==1){
									?><span style="color: green">Approved</span> <?php } 
                                    if($stats==2)  { ?> <span style="color: red">Not Approved</span> <?php } 
                                    if($stats==0)  { ?> <span style="color: blue">waiting for approval</span> <?php } ?></td>
								</tr><?php 
								if($stats==0){
							

								?>
								<tr style="height:70px;">
									<td>
										<a  id="myBtn" class="modal-trigger waves-effect waves-light btn" href="#modal1" style="border-bottom:none;cursor: pointer;color: white;background: #35b135fd;border-radius: 2px;text-transform: uppercase;width: 150px;height: 20px;box-shadow: 0 5px 10px rgb(170, 168, 168);float: left;text-align: center;padding: 10px;margin-right: 15px;font-size: 13px;">Take&nbsp;Action</a>
										
										<form id="adminaction" method="post" name="adminaction" >
											<div class="modal" id="myModal" >
												<div class="modal-content">
												
													<h4>Leave take action</h4>
                                                    <select class="browser-default" name="status" required="">
														<option value="">
															Choose your option
														</option>
														<option value="1">
															Approved
														</option>
														<option value="2">
															Not Approved
														</option>
													</select>
													
													
													<textarea class="description" id="textarea1" maxlength="600" name="description" placeholder="Description" required=""></textarea>
												    <input class="" name="update" type="submit" value="Submit" style="   cursor: pointer;color: white;background: #35b135fd;border-radius: 2px;text-transform: uppercase;width: 100px;height: 30px;box-shadow: 0 5px 10px rgb(170, 168, 168);text-align: center;font-size: 13px;margin-left:80%;margin-top:9%;" >
                                                </div>
											
											</div>
										</form>
									</td>
								</tr><?php }}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
    <script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
</script>
	<!-- Javascripts -->
	<script src="../assets/plugins/jquery/jquery-2.2.0.min.js">
	</script> 
	<script src="../assets/plugins/materialize/js/materialize.min.js">
	</script> 

</body>
</html>