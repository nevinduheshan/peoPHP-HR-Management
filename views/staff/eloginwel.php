<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('../../process/dbh.php');
$sql1 = "SELECT * FROM `employee` where id = '$id'";
$result1 = mysqli_query($conn, $sql1);
$employeen = mysqli_fetch_array($result1);
$empName = ($employeen['firstName']);
$emplname = ($employeen['lastName']);
$picc = ($employeen['pic']);

$sql = "SELECT id, firstName, lastName, pic,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>

<html>

<head>
	<title>Employee Panel</title>
	<link rel="stylesheet" type="text/css" href="../styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>

<body style="background-color: rgb(30, 30, 39);">

	<header>
		<nav>
			<h1>HR Management System</h1>
			<ul id="navli">
				<li><a class="homered" href="eloginwel.php?id=<?php echo $id ?>">Home</a></li>
				<li><a class=" homeblack" href="myprofile.php?id=<?php echo $id ?>">My Profile</a></li>
				<li><a class=" homeblack" href="empproject.php?id=<?php echo $id ?>">My Projects</a></li>
				<li><a class=" homeblack" href="applyleave.php?id=<?php echo $id ?>">Apply Leave</a></li>
				<li><a class=" homeblack" href="../../elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div id="divimg">
		<div>
			<div class="row">
			<div class="column"><h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: left: ; color: white;">Welcome <?php echo "$empName  $emplname"; ?> </h2></div> 
			<div class="column"><img src="../../process/<?php echo $picc;?>" height = 50px width = 50px></div> 
			</div>

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center; color: white;">Empolyee Leaderboard </h2>

			<div style="padding-left: 100px; padding-right: 100px;">
			<table>
			<tr>
					<th >No</th>
					<th >Emp. ID</th>
					<th >Name</th>
					<th >Points</th>
			</tr>

				<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $seq . "</td>";
					echo "<td>" . $employee['id'] . "</td>";
					echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";
					echo "<td>" . $employee['points'] . "</td>";
					$seq += 1;
				}
				?>
			</table>
			</div>

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center; color: white;">Due Projects</h2>

			<div style="padding-left: 100px; padding-right: 100px;">
			<table>
				<tr>
					<th >Project Name</th>
					<th >Due Date</th>
				</tr>

				<?php
				while ($employee1 = mysqli_fetch_assoc($result1)) {
					echo "<tr>";
					echo "<td>" . $employee1['pname'] . "</td>";
					echo "<td>" . $employee1['duedate'] . "</td>";
				}
				?>
			</table>
			</div>

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center; color: white;">Salary Status</h2>
			
			<div style="padding-left: 100px; padding-right: 100px;">
			<table>
				<tr>
					<th >Base Salary</th>
					<th >Bonus</th>
					<th >Total Salary</th>
				</tr>

				<?php
				while ($employee = mysqli_fetch_assoc($result3)) {
					echo "<tr>";
					echo "<td>" . $employee['base'] . "</td>";
					echo "<td>" . $employee['bonus'] . " %</td>";
					echo "<td>" . $employee['total'] . "</td>";
				}
				?>
			</table>
			</div>

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center; color: white;">Leave Satus</h2>
			
			<div style="padding-left: 100px; padding-right: 100px; padding-bottom: 100px; ">
			<table>
				<tr>
					<th >Start Date</th>
					<th >End Date</th>
					<th >Total Days</th>
					<th >Reason</th>
					<th >Status</th>
				</tr>

				<?php
				while ($employee = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>" . $employee['start'] . "</td>";
					echo "<td>" . $employee['end'] . "</td>";
					echo "<td>" . $interval->days . "</td>";
					echo "<td>" . $employee['reason'] . "</td>";
					echo "<td>" . $employee['status'] . "</td>";
				}
				?>
			</table>
			</div>
		</div>
		</h2>
	</div>
</body>

</html>