<!DOCTYPE html>
<head>
<title>Funny Farm</title>
</head>
<h1>The Funny Farm</h1>
<?php



if  ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
	$id = $_GET['id'];
}
elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
	$id = $_POST['id'];
}
else{
	echo '<p>This page has been accessed in error.</p>';
	include ('footer.html');
	exit();
}

// db connection
$user = 'root';
$pass = '';
$db = 'farm';

$dbConnection = mysqli_connect('localhost',$user, $pass, $db) or die("Unable to connect to the database");

//CHECK IF FORM HAS BEEN SUBMITTED
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if ($_POST['sure'] == 'Yes'){
		//DELETE THE RECORD
		
		//MAKE THE QUERY
		$q = "DELETE FROM employees WHERE ssn=$id LIMIT 1;";
		$r = @mysqli_query($dbConnection, $q);
		if (mysqli_affected_rows($dbConnection) == 1){
			echo '<p>The employee has been deleted</p>';
		}
		else {
			echo '<p>The employee could not be deleted due to a system error.';
		}
	}
	else{
		echo '<p>The employee was not be deleted.</p>';
	}
}
else{  //SHOW THE FORM 
	
	$q = "SELECT ssn, first_name, last_name, street, city, state, zip, phone, salary, job
	FROM employees
	WHERE ssn = $id";
	$r = @mysqli_query ($dbConnection, $q);

	if (mysqli_num_rows($r) == 1){
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// create the form
	echo '<form action="delete_employee.php" method="post">
	<fieldset><legend><b>Delete Employee</b></legend>
	<p><b>SSN:</b> '. $row[0] . '</p>
	<p><b>First Name:</b> ' . $row[1] . '</p>
	<p><b>Last Name:</b> ' . $row[2] . '</p>
	<p><b>Street:</b> ' . $row[3] . '</p>
	<p><b>City:</b> ' . $row[4] . '</p>
	<p><b>State:</b> ' . $row[5] . '</p>
	<p><b>Zip:</b> ' . $row[6] . '</p>
	<p><b>Phone:</b> ' . $row[7] . '</p>
	<p><b>Salary:</b> ' . $row[8] . '</p>
	<p><b>Job:</b> ' . $row[9] . '</p>
	<input type="radio" name="sure" value="Yes" /> <b>Yes</b>
	<input type="radio" name="sure" value="No" checked="checked" /> <b>No</b>
	<p><input type="submit" name="submit" value="DELETE" /></p>
	<input type="hidden" name="id" value="' . $id . '" />
	</fieldset>
	</form>';
	}
	else{   //NOT A VALID EMPLOYEE ID
		echo '<p>This page has been accessed in error.</p>';
	}

}

mysqli_close($dbConnection);
echo '<div class="home">';
echo '<a href="farm_front_page.php">Home</a>';
echo '</div>';
?>
</html>