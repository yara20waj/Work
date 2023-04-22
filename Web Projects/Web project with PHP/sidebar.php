<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<aside>
		<div class="side-bar">
			<div class="sidebar-profile">
				<div class="sidebar-profile-image"><img alt="" class="profile-img" src="assets/images/profile-Emp.png"></div>
				<div>
					<?php

					$user_id=$_SESSION['user_id'];
					                    $sql = "SELECT FirstName,LastName,EmpId from  tblemployees where id='$user_id'";
					                    $query = mysqli_query($con,$sql);
					                   $cnt=1;
					                    if(mysqli_num_rows($query)> 0)
					                    {
					                        while($row = mysqli_fetch_assoc($query))
					                    {               ?>
					<p class="name-Emp"><?php echo $row['FirstName']." ".$row['LastName'];?></p><span id="id-Emp"><?php echo $row['EmpId']?></span> <?php }} ?>
				</div>
			</div>
			<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
				<li class="no-padding">
					<a class="waves-effect waves-grey" href="myprofile.php"><i class="material-icons">account_box</i>My Profiles</a>
				</li>
				<li class="no-padding">
					<a class="waves-effect waves-grey" href="change-password-emp.php"><i class="material-icons">settings_input_svideo</i>Change Password</a>
				</li>
				<li class="no-padding">
					<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Leaves<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
					<div class="collapsible-body">
						<ul>
							<li>
								<a href="apply-leave.php">Apply Leave</a>
							</li>
							<li>
								<a href="leave-History.php">Leave History</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="no-padding">
					<a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
				</li>
			</ul>
		</div>
	</aside>
</body>
</html>