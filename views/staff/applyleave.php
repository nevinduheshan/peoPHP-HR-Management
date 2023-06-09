<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('../../process/dbh.php');
$sql = "SELECT * FROM `employee` where id = '$id'";
$result = mysqli_query($conn, $sql);
$employee = mysqli_fetch_array($result);
$empName = ($employee['firstName']);
//echo "$id";
?>

<html>

<head>
	<title>Apply Leave</title>
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>

<body style="background-color: rgb(30, 30, 39);">

	<header>
		<nav>
			<h1>Apply Leave</h1>
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id ?>">Home</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id ?>">My Profile</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id ?>">My Projects</a></li>
				<li><a class="homered" href="applyleave.php?id=<?php echo $id ?>">Apply Leave</a></li>
				<li><a class="homeblack" href="../../elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div class="page-wrapper p-t-100 p-b-100 font-robo">
		<div class="wrapper wrapper--w680">
			<div class="card card-1">
				<div class="card-heading"></div>
				<div class="card-body">
					<h2 class="title">Apply Leave Form</h2>
					<form action="../../process/applyleaveprocess.php?id=<?php echo $id ?>" method="POST">


						<div class="input-group">
							<input class="input--style-1" type="text" placeholder="Reason" name="reason">
						</div>
						<div class="row row-space">
							<div class="col-2">
								<p>Start Date</p>
								<div class="input-group">
									<input class="input--style-1" type="date" placeholder="start" name="start">

								</div>
							</div>
							<div class="col-2">
								<p>End Date</p>
								<div class="input-group">
									<input class="input--style-1" type="date" placeholder="end" name="end">

								</div>
							</div>
						</div>




						<div class="p-t-20">
							<button class="btn btn--radius btn--green" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div style="padding-left: 100px; padding-right: 100px;">
	<table>
		<tr>
			<th >Emp. ID</th>
			<th >Name</th>
			<th >Start Date</th>
			<th >End Date</th>
			<th >Total Days</th>
			<th >Reason</th>
			<th >Status</th>
		</tr>


		<?php
		$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";
		$result = mysqli_query($conn, $sql);
		while ($employee = mysqli_fetch_assoc($result)) {
			$date1 = new DateTime($employee['start']);
			$date2 = new DateTime($employee['end']);
			$interval = $date1->diff($date2);
			$interval = $date1->diff($date2);

			echo "<tr>";
			echo "<td>" . $employee['id'] . "</td>";
			echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

			echo "<td>" . $employee['start'] . "</td>";
			echo "<td>" . $employee['end'] . "</td>";
			echo "<td>" . $interval->days . "</td>";
			echo "<td>" . $employee['reason'] . "</td>";
			echo "<td>" . $employee['status'] . "</td>";
		}
		?>
	</table>
	</div>
</body>

</html>