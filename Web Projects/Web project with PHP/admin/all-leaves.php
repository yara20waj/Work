<?php
session_start();
include('config.php');
$msg='';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Admin | Total Leave</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/css/All-Leave.css" rel="stylesheet" type="text/css">
	<style>
	th{
	   border-collapse: collapse;
	   border: none;
	   border-bottom: 1px solid #cec8c8; 
	}
	</style>
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="page-title">
			Leave History
		</div>
		<div class="box">
			<div style="">
				<?php if($msg){?>
				<div class="succWrap">
					<strong>SUCCESS</strong> : <?php echo $msg; ?>
				</div><?php }?>
				<table class="display responsive-table" id="example">
					<thead>
						<tr style="color: red;">
							<th width="">Sl No.</th>
							<th width="300">Employe Name</th>
							<th width="250">Leave Type</th>
							<th width="250">Posting Date</th>
							<th width="200">Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join tblemployees on tblleaves.empid=tblemployees.id order by lid desc";
						$query = mysqli_query($con,$sql);
						$results = mysqli_fetch_assoc($query);
						$cnt=1;
						if(mysqli_num_rows($query)> 0)
						{
						while($row = mysqli_fetch_assoc($query))
						 {               ?>
						<tr style="height:80px;">
							<td><b><?php echo $cnt;?></b></td>
							<td>
								<a class="name-Emp" href="editemployee.php?empid=%3C?php%20echo%20$row['id'];?%3E" target="_blank">
                                <?php echo $row['FirstName']." ".$row['LastName'];?>(<?php echo $row['EmpId'];?>)</a>
							</td>
							<td><?php echo $row['LeaveType'];?></td>
							<td><?php echo $row['PostingDate'];?></td>
							<td><?php $stats=$row['Status'];
							if($stats==1){
							?><span style="color: green;">Approved</span>
                            <?php } if($stats==2)  { ?> <span style="color: red;">Not Approved</span> 
                            <?php } if($stats==0)  { ?> <span style="color: blue">waiting for approval</span> 
                            <?php } ?></td>
							<td>
								<a class="view-btn" href="leave-details.php?leaveid=<?php echo $row['lid'];?>" style="padding-top:10px;padding-bottom:10px;">View Details</a>
							</td>
						</tr><?php $cnt++;} }?>
					</tbody>
				</table>
			</div>
		</div>
	</main><!-- Javascripts -->
	<script src="../assets/plugins/jquery/jquery-2.2.0.min.js">
	</script> 
	<script src="../assets/plugins/materialize/js/materialize.min.js">
	</script> 
	<script src="../assets/plugins/material-preloader/js/materialPreloader.min.js">
	</script> 
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.js">
	</script> 
	<script src="../assets/plugins/datatables/js/jquery.dataTables.min.js">
	</script> 
	<script src="../assets/js/alpha.min.js">
	</script> 
	<script src="assets/js/pages/ui-modals.js">
	</script> 
	<script src="assets/plugins/google-code-prettify/prettify.js">
	</script>
</body>
</html>