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

<body style="background-color: rgb(30, 30, 39);">

	<header>
		<nav>
			<h1>HR</h1>
			<ul id="navli">
				<li><a class="homered" href="aloginwel.php">Home</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="line"></div>
	<!-- <div id="divimg"> -->
	<h2 style="font-family: 'Poppins', sans-serif; font-size: 25px; text-align: center; color: white;">Empolyee Leaderboard </h2>

	<div style="padding-left: 100px; padding-right: 100px;">
		<table>

			<tr>
				<th>No</th>
				<th>Employee ID</th>
				<th>Name</th>
				<th>Points</th>
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

	<div class="p-t-20">
		<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button>
	</div>


	</div>
</body>

</html>