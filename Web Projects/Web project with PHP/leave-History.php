<?php
session_start();
include('config.php');
$msg='';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Employee | Leave History</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author">
	<link href="assets/css/style-barside.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style-leaveHistory.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
<body background="red">
	<?php include('header.php');?><?php include('sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			<div class="page-title">
				Leave History
			</div>
			<div class="box">
				<div class="card">
					<div class="card-content">
						<?php if($msg){?>
						<div class="succWrap">
							<strong>SUCCESS</strong> : <?php $msg; ?>
						</div><?php }?>
						<table class="" id="example">
							<thead>
								<tr>
									<th>Sl No.</th>
									<th width="120">Leave Of Type</th>
									<th>From</th>
									<th>To</th>
									<th>Description</th>
									<th width="120">Posting Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php                         
								 $sql = "SELECT LeaveType,ToDate,FromDate,Description,PostingDate,Status from tblleaves where empid='$user_id'";
								$query = mysqli_query($con,$sql);
								$results = mysqli_fetch_assoc($query);
								$cnt=1;
								if(mysqli_num_rows($query)> 0)
								{
								while($row = mysqli_fetch_assoc($query))
								{               
								?>
								<tr>
									<td><?php echo $cnt;?></td>
									<td><?php echo $row['LeaveType'];?></td>
									<td><?php echo $row['ToDate'];?></td>
									<td><?php echo $row['FromDate'];?></td>
									<td><?php echo $row['Description'];?></td>
									<td><?php echo $row['PostingDate'];?></td>
									<td><?php $stats=$row['Status'];
									if($stats==1){
									?>
									<span style="color: green">Approved</span>
									<?php } if($stats==2)  { ?> 
									<span style="color: red">Not Approved</span> 
									<?php } if($stats==0)  { ?> 
									<span style="color: blue">waiting for approval</span> 
									<?php } ?>
									</td>
								</tr><?php $cnt++;} }?>
							</tbody>
						</table>
					</div>
				</div>
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
	<script src="assets/js/pages/table-data.js">
	</script> 
	<script src="assets/plugins/datatables/js/jquery.dataTables.min.js">
	</script>
</body>
</html>