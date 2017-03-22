<!DOCTYPE html>
<head>
<title>Funny Farm</title>
</head>

<?php



echo '<legend><b>EDIT EMPLOYEE INFORMATION</b></legend>';

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
		$ssn = mysqli_real_escape_string($dbConnection, trim($_POST['emp_id']));
		$first_name = mysqli_real_escape_string($dbConnection, trim($_POST['first_name']));
		$last_name = mysqli_real_escape_string($dbConnection, trim($_POST['last_name']));
		$street = mysqli_real_escape_string($dbConnection, trim($_POST['street']));
		$city = mysqli_real_escape_string($dbConnection, trim($_POST['city']));
		$state = mysqli_real_escape_string($dbConnection, trim($_POST['state']));
		$zip = mysqli_real_escape_string($dbConnection, trim($_POST['zip']));
		$phone = mysqli_real_escape_string($dbConnection, trim($_POST['phone']));
		$salary = mysqli_real_escape_string($dbConnection, trim($_POST['salary']));
		$job = mysqli_real_escape_string($dbConnection, trim($_POST['job']));
		$r = @mysqli_query($dbConnection, $q);
		$q = "DELETE FROM employee WHERE ssn=$id AND INSERT INTO employees
			(ssn, first_name, last_name, street, city, state, zip, phone, salary, job)
			VALUES
			('$ssn', '$first_name', '$last_name', '$street', '$city', '$state', '$zip', '$phone', '$salary', '$job')";
			$r = @mysqli_query ($dbConnection, $q);
			if ($r) {
				echo'<p><h2>New employee added.</h2></p>';
			} else {
				echo'<p><h2>Employee cannot be added due to a system error.</h2></p>';
			}
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
	<p><b>SSN:</b> '. $row[0] . ' <input type="text" id="emp_id" name="emp_id" size="10" value=""/></p>
	<p><b>First Name:</b> ' . $row[1] . ' <input type="text" id="first_name" name="first_name" size="20" value=""/></p>
	<p><b>Last Name:</b> ' . $row[2] . ' <input type="text" id="last_name" name="last_name" size="20" value=""/></p>
	<p><b>Street:</b> ' . $row[3] . ' <input type="text" id="street" name="street" size="20" value=""/></p>
	<p><b>City:</b> ' . $row[4] . ' <input type="text" id="city" name="city" size="20" value=""/></p>
	<p><b>State:</b> ' . $row[5] . ' <input type="text" id="state" name="state" size="20" value=""/></p>
	<p><b>Zip:</b> ' . $row[6] . ' <input type="text" id="zip" name="zip" size="20" value=""/></p>
	<p><b>Phone:</b> ' . $row[7] . ' <input type="text" id="phone" name="phone" size="20" value=""/></p>
	<p><b>Salary:</b> ' . $row[8] . ' <input type="text" id="salary" name="salary" size="20" value=""/></p>
	<p><b>Job:</b> ' . $row[9] . '<input type="text" id="job" name="job" size="20" value=""/></p>
	<input type="radio" name="sure" value="Yes" /> <b>Yes</b>
	<input type="radio" name="sure" value="No" checked="checked" /> <b>No</b>
	<p><input type="submit" name="submit" value="UPDATE" /></p>
	<input type="hidden" name="id" value="' . $id . '" />
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