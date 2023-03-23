<?php

require_once('../../process/dbh.php');
$sql = "SELECT employee.id,employee.firstName,employee.lastName,salary.base,salary.bonus,salary.total from employee,`salary` where employee.id=salary.id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
?>
<html>

<head>
	<title>Salary Table</title>
	<link rel="stylesheet" type="text/css" href="../styleview.css">
</head>

<!-- <body style="background-color: rgb(30, 30, 39);"> -->
<body style="background-image: url(../backk.jpg);">

	<header>
		<nav>
			<h1>Salary Table</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>

				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homered" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="../../alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div id="divimg">

	</div>

	<div style="padding-left: 100px; padding-right: 100px; padding-top: 50px;">
		<table>
			<tr>
				<th>Emp. ID</th>
				<th>Name</th>
				<th>Base Salary</th>
				<th>Bonus</th>
				<th>TotalSalary</th>
			</tr>

			<?php
			while ($employee = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $employee['id'] . "</td>";
				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";
				echo "<td>" . $employee['base'] . "</td>";
				echo "<td>" . $employee['bonus'] . " %</td>";
				echo "<td>" . $employee['total'] . "</td>";
			}
			?>
		</table>
	</div>
</body>

</html>