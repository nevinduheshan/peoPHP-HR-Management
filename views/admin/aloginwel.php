<?php
require_once('../../process/dbh.php');
$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
?>


<html>

<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../styleemplogin.css">

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet" />

</head>

<!-- <body style="background-color: rgb(30, 30, 39);"> -->
	<body style="background-image: url(../backk.jpg);">

	<header>
		<nav>
			<h1>Home</h1>
			<ul id="navli">
				<li><a class="homered" href="aloginwel.php">Home</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="../../alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="line"></div>
	<h2 style="font-family: 'Poppins', sans-serif; font-size: 25px; text-align: center; color: white;">Empolyee Leaderboard </h2>

	<div style="padding-left: 300px; padding-right: 300px;">
		<table>

			<tr>
				<th>No</th>
				<th>Employee ID</th>
				<th>Name</th>
			</tr>



			<?php
			$seq = 1;
			while ($employee = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $seq . "</td>";
				echo "<td>" . $employee['id'] . "</td>";

				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

				$seq += 1;
			}


			?>

		</table>
	</div>

	</div>
</body>

</html>