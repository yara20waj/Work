<?php
session_start();
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Admin | Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="../assets/css/styleDashboard-Admin.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner" style=" justify-content: center;">
		<div class="middle-content">
			<div class="row no-m-t no-m-b">
				<div class="col s12 m12 l4">
					<div class="card stats-card">
						<div class="content">
							<span class="card-title" style="color: white">Totle Regd Employee</span><br>
							<br>
							<br>
							<span class="stats-counter" style="color: white"> 
							<?php
							$sql = "SELECT id from tblemployees";
							$query = mysqli_query($con,$sql);
							while($select_row = mysqli_fetch_assoc($query)){
							$empcount=mysqli_num_rows($query);}
							?>
							<span class="counter"></span><?php echo $empcount;?></span>
						</div>
						<div id="sparkline-bar"></div>
					</div>
				</div>
				<div class="col s12 m12 l4">
					<div class="card stats-card">
						<div class="content">
							<span class="card-title" style="color: white">Totle Departments</span><br>
							<br>
							<br>
							<span class="stats-counter" style="color: white">
							<?php
							$sql = "SELECT id from tbldepartments";
							$query = mysqli_query($con,$sql);
							while($select_row = mysqli_fetch_assoc($query)){
							$dptcount=mysqli_num_rows($query);}
							?>
							<span class="counter"></span><?php echo $dptcount;?></span>
						</div>
						<div id="sparkline-line"></div>
					</div>
				</div>
				<div class="col s12 m12 l4">
					<div class="card">
						<div class="content">
							<span class="card-title" style="color: white">Totle leave Application</span> <br>
							<br>
							<br>
							<span class="stats-counter" style="color: white">
							<?php
							$sql = "SELECT id from tblleavetype";
							$query = mysqli_query($con,$sql);
							while($select_row = mysqli_fetch_assoc($query)){
							$leavtypcount=mysqli_num_rows($query);}
							?>
							<span class="counter"><?php echo $leavtypcount;?></span></span>
						</div>
						<div class="progress stats-card-progress">
							<div class="determinate" style="width: 70%"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-Dashboard">
				<div class="card-content">
					<span class="title-table">Latest Leave Applications</span><br>
					<br>
					<br>
					<table class="display responsive-table" id="example">
						<thead>
							<tr style="color: red">
								<th>Sl No.</th>
								<th style="width:230px;">Employe Name</th>
								<th>Leave Type</th>
								<th>Posting Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join tblemployees on tblleaves.empid=tblemployees.id order by lid desc limit 6";
	                    $query = mysqli_query($con,$sql);
						$cnt=1;
						if(mysqli_num_rows($query)> 0)
						{
						while($row = mysqli_fetch_assoc($query))
						{          
							    ?>
							<tr>
								<td><b><?php echo $cnt;?></b></td>
								<td id="t">
								<?php echo $row['FirstName']." ".$row['LastName'];?>(<?php echo $row['EmpId'];?>)
								</td>
								<td><?php echo $row['LeaveType'];?></td>
								<td><?php echo $row['PostingDate'];?></td>
								<td><?php $stats=$row['Status'];
								    if($stats==1){
								?>
								<span style="color: green">Approved</span> 
								<?php } if($stats==2)  { ?> 
								<span style="color: red">Not Approved</span> 
								<?php } if($stats==0)  { ?> 
								<span style="color: blue">waiting for approval</span> 
								<?php } ?></td>
                                <td><a href="leave-details.php?leaveid=<?php echo $row['lid'];?>" name="view" class="waves-effect waves-light btn blue m-b-xs" style="border-bottom:none;cursor: pointer;color: white;background: #35b135fd;border-radius: 2px;text-transform: uppercase;width: 150px;height: 20px;box-shadow: 0 5px 10px rgb(170, 168, 168);float: left;text-align: center;padding: 10px;margin-right: 15px;font-size: 13px;" > View Details</a></td>
							</tr><?php $cnt++;} }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
	<!-- Javascripts -->
	<script src="../assets/plugins/jquery/jquery-2.2.0.min.js">
	</script> 
	<script src="../assets/plugins/materialize/js/materialize.min.js">
	</script> 
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.js">
	</script> 
	<script src="../assets/plugins/waypoints/jquery.waypoints.min.js">
	</script> 
	<script src="../assets/plugins/counter-up-master/jquery.counterup.min.js">
	</script> 
	<script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js">
	</script> 
	<script src="../assets/plugins/chart.js/chart.min.js">
	</script> 
	<script src="../assets/plugins/flot/jquery.flot.min.js">
	</script> 
	<script src="../assets/plugins/flot/jquery.flot.time.min.js">
	</script> 
	<script src="../assets/plugins/flot/jquery.flot.symbol.min.js">
	</script> 
	<script src="../assets/plugins/flot/jquery.flot.resize.min.js">
	</script> 
	<script src="../assets/plugins/flot/jquery.flot.tooltip.min.js">
	</script> 
	<script src="../assets/plugins/curvedlines/curvedLines.js">
	</script> 
	<script src="../assets/plugins/peity/jquery.peity.min.js">
	</script> 
	<script src="../assets/js/alpha.min.js">
	</script> 
	<script src="../assets/js/pages/dashboard.js">
	</script>
</body>
</html>