<?php

require_once('../../process/dbh.php');
$sql = "SELECT * from `project` order by subdate desc";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>

<head>
	<title>Project Status</title>
	<link rel="stylesheet" type="text/css" href="../styleview.css">
</head>

<body style="background-color: rgb(30, 30, 39);">
	<header>
		<nav>
			<h1>HR</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">Home</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homered" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="../../alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>

	<div style="padding-left: 100px; padding-right: 100px; padding-top: 50px;">
	<table>
		<tr>

			<th>Project ID</th>
			<th>Emp. ID</th>
			<th>Project Name</th>
			<th>Due Date</th>
			<th>Submission Date</th>
			<th>Mark</th>
			<th>Status</th>
			<th>Option</th>

		</tr>

		<?php
		while ($employee = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $employee['pid'] . "</td>";
			echo "<td>" . $employee['eid'] . "</td>";
			echo "<td>" . $employee['pname'] . "</td>";
			echo "<td>" . $employee['duedate'] . "</td>";
			echo "<td>" . $employee['subdate'] . "</td>";
			echo "<td>" . $employee['mark'] . "</td>";
			echo "<td>" . $employee['status'] . "</td>";
			echo "<td><a href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\">Mark</a>";
		}


		?>

	</table>
	</div>


</body>

</html>