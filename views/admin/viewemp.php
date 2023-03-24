<?php

require_once('../../process/dbh.php');
$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>

<head>
	<title>View Employee</title>
	<link rel="stylesheet" type="text/css" href="../styleview.css">
</head>

<!-- <body style="background-color: rgb(30, 30, 39);"> -->
<body style="background-image: url(../backk.jpg);">
	<header>
		<nav>
			<h1>View Employee</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homered" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="../../alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>

	<div style="padding-left: 100px; padding-right: 100px;">
		<table>
			<tr>

				<th>Emp. ID</th>
				<th>Picture</th>
				<th>Name</th>
				<th>Email</th>
				<th>Birthday</th>
				<th>Gender</th>
				<th>Contact</th>
				<th>NID</th>
				<th>Address</th>
				<th>Department</th>
				<th>Degree</th>
				<!-- <th>Point</th> -->
				<th>Options</th>
			</tr>

			<?php
			while ($employee = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $employee['id'] . "</td>";
				echo "<td><img src='../../process/" . $employee['pic'] . "' height = 60px width = 60px></td>";
				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";
				echo "<td>" . $employee['email'] . "</td>";
				echo "<td>" . $employee['birthday'] . "</td>";
				echo "<td>" . $employee['gender'] . "</td>";
				echo "<td>" . $employee['contact'] . "</td>";
				echo "<td>" . $employee['nid'] . "</td>";
				echo "<td>" . $employee['address'] . "</td>";
				echo "<td>" . $employee['dept'] . "</td>";
				echo "<td>" . $employee['degree'] . "</td>";
				// echo "<td>" . $employee['points'] . "</td>";
				echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			}

			


			?>
		
		</table>
	</div>


</body>

</html>