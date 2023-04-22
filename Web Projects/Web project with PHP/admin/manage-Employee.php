<?php
session_start();
include('config.php');
$msg ="";
    // code for Inactive  employee    
    if(isset($_GET['inid']))
    {
    $id=$_GET['inid'];
    $status=0;
    $sql = "update tblemployees set Status='$status' WHERE id='$id'";
	$query = mysqli_query($con,$sql);

    header('location:manage-Employee.php');
    }
//code for active employee
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tblemployees set Status='$status' WHERE id='$id'";
$query = mysqli_query($con,$sql);

header('location:manage-Employee.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Admin | Manage Employees</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="UTF-8">
	<meta content="Responsive Admin Dashboard Template" name="description">
	<meta content="admin,dashboard" name="keywords">
	<meta content="Steelcoders" name="author"><!-- Styles -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/css/manage-Emp.css" rel="stylesheet" type="text/css">
	<link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
		<div class="manage-title">
			<div class="page-title">
				Manage Employes <?php echo $msg;?>
			</div>
		</div>
		<div class="box" style="height:800px;background-color:white;">
			<div class="card"  style="height:1000px;">
				<div class="card-content" style="height:1000px;">
					
					<?php if($msg){?>
					<div class="succWrap">
						<strong>SUCCESS</strong> : <?php echo $msg; ?>
					</div><?php }?>
					<table class="" id="example" >
						<thead>
							<tr id="thead">
								<th>Sl no</th>
								<th>Emp Id</th>
								<th>Full Name</th>
								<th>Department</th>
								<th>Status</th>
								<th>Reg Date</th>
								<th>Action</th>
							</tr>
						</thead>
                        <tbody>
								<?php 
										$sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees";
                                        $query = mysqli_query($con,$sql);
                                       $results = mysqli_fetch_assoc($query);
                                       $cnt=1;
                                        if(mysqli_num_rows($query)> 0)
                                        {
                                            while($row = mysqli_fetch_assoc($query))
                                        {               ?>
							<tr>
								<td><?php echo $cnt;?></td>
								<td><?php echo $row['EmpId']; ?></td>
								<td><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></td>
								<td><?php echo $row['Department']; ?></td>
								<td>
                                <?php $stats=$row['Status'];
									if($stats){
									?><a style="color:#3E9919;font-text:20px;text-transform: uppercase;">Active</a> 
									<?php } else { ?>
										 <a style="color:red;text-transform: uppercase;">Inactive</a> <?php } ?>
								</td>
								<td><?php echo $row['RegDate']; ?></td>
								<td>
                                <a href="editemployee.php?empid=<?php echo $row['id'];?>">
								<i class="material-icons" style="color: royalblue;">mode_edit</i></a> 
								<?php if($row['Status']==1)
									 {?> 
									 <a href="manage-Employee.php?inid=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to inactive this Employe?');">
									 <i class="material-icons" style="color: royalblue;" title="Inactive">clear</i> 
									 <?php } else {?></a> 
									 <a href="manage-Employee.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to active this employee?');">
									 <i class="material-icons" title="Active">done</i> 
									 <?php } ?></a>
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
	<script src="../assets/js/alpha.min.js">
	</script>
<script src="../assets/js/pages/table-data.js"></script>
<script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>

</body>
</html>