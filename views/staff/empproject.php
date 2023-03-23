<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('../../process/dbh.php');
$sql = "SELECT * FROM `project` where eid = '$id'";
$result = mysqli_query($conn, $sql);

?>



<html>

<head>
	<title>Employee Panel</title>
	<link rel="stylesheet" type="text/css" href="../styleview.css">
</head>

<body style="background-color: rgb(30, 30, 39);">

	<header>
		<nav>
			<h1>Employee Management System</h1>
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id ?>">Home</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id ?>">My Profile</a></li>
				<li><a class="homered" href="empproject.php?id=<?php echo $id ?>">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id ?>">Apply Leave</a></li>
				<li><a class="homeblack" href="../../elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div id="divimg">

		<div style="padding-left: 100px; padding-right: 100px;">
			<table>
				<tr>

					<th>Project ID</th>
					<th>Project Name</th>
					<th>Due Date</th>
					<th>Sub Date</th>
					<th>Mark</th>
					<th>Status</th>
					<th>Option</th>
				</tr>

				<?php
				while ($employee = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>" . $employee['pid'] . "</td>";
					echo "<td>" . $employee['pname'] . "</td>";
					echo "<td>" . $employee['duedate'] . "</td>";
					echo "<td>" . $employee['subdate'] . "</td>";
					echo "<td>" . $employee['mark'] . "</td>";
					echo "<td>" . $employee['status'] . "</td>";


					echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Submit</a>";
				}


				?>

			</table>
		</div>

</body>

</html>