<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/form_styling.css">
	</head>
	
	<body>
		<div id="container">
			<div id="content">
				<?php
					require_once("config.php");
					
					if (isset ($_POST['submit'])) {
						$null_fields = array();
						
						if (empty($_POST['first_name'])) {
							$null_fields[] = 'First Name';
						}
						else {
							$first_name = trim($_POST['first_name']);
						}
						
						if (empty($_POST['age'])) {
							$null_fields[] = 'Last Name';
						}
						else {
							$last_name = trim($_POST['last_name']);
						}
						
						if (empty($_POST['age'])) {
							$null_fields[] = "Age";
						}
						else {
							$age = $_POST['age'];
						}
						
						if (empty($_POST['gender'])) {
							$null_fields[] = 'Gender';
						}
						else {
							$gender = $_POST['gender'];
						}
						
						if (empty($_POST['relationship'])) {
							$null_fields[] = 'Relationship';
						}
						else {
							$relationship = $_POST['relationship'];
						}
						
						if (empty($null_fields)) {
							$null_variable = NULL;
							$sql = " INSERT INTO FamilyMembers VALUES ('$null_variable', '$first_name',
							'$last_name','$age','$gender','$relationship')";
							
							if (!mysqli_query($conn, $sql)) {
								die("Error: ".mysqli_error($conn));
							}
							echo "Family member has been entered!";
							
							mysqli_close($conn);
						}
						
						else {
							echo "You need to enter the following missing data:<br />";
							
							foreach ($null_fields as $null_field) {
								echo $null_field."<br />";
							}
						}
					}
				?>
				<div>
					<form action="member_added.php" method="post">
						<div id="header">
								<h3>Add Family member</h3>
							</div>
							
							<div id="btn_add">
								<a href="index.php">View Members</a>
							</div>
							
							<label for="firstname">First Name: </label>
							<input type="text" id="first_name" name="first_name" maxlength="80">
							
							<label for="lastname">Last Name: </label>
							<input type="text" id="last_name" name="last_name" maxlength="80">
							
							<label for="age">Age: </label>
							<input type="number" id="age" name="age" min="1" max="100">
							
							<label for="gender">Gender: </label>
							<select id="gender" name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							<label for="relationship">Relationship</label>
							<input type="text" id="relationship" name="relationship" maxlength="80">
							
							<input type="submit" name="submit" value="ADD">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>