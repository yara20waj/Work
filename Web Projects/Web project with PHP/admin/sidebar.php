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
	<link href="../assets/css/style-barside.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<aside class="side-nav white fixed" id="slide-out">
		<div class="side-bar" style="">
			<div class="sidebar-profile">
				<div class="sidebar-profile-image"><img alt="" class="profile-img" src="../assets/images/profile-image.png"></div>
				<div class="sidebar-profile">
					<p>Admin</p>
				</div>
			</div>
			<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
				<li class="no-padding">
					<a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons" style="padding-right:20px;">settings_input_svideo</i>Dashboard</a>
				</li>
				<li class="no-padding">
					<a class="collapsible-header"><i class="material-icons" style="padding-right:20px;">account_box</i>Employees<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
					<div class="collapsible-body">
						<ul>
							<li>
								<a href="add-Employee.php">Add Employee</a>
							</li>
							<li>
								<a href="manage-Employee.php">Manage Employee</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="no-padding">
					<a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="padding-right:20px;">desktop_windows</i>Leave Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
					<div class="collapsible-body">
						<ul>
							<li>
								<a href="all-leaves.php">All Leaves</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="no-padding">
					<a class="" href="change-password.php"><i class="material-icons" style="padding-right:20px;">settings_input_svideo</i>Change Password</a>
				</li>
				<li class="no-padding">
					<a class="" href="logout.php"><i class="material-icons" style="padding-right:20px;">exit_to_app</i>Log Out</a>
				</li>
			</ul>
		</div>
	</aside>
</body>
</html>