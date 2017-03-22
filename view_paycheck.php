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
	
	$q = "SELECT ssn, first_name, last_name, street, city, state, zip, phone, salary, job,
	date1, time1, time2, time3, time4, time5, time6, time7
	FROM employees
	WHERE ssn = $id";
	$r = @mysqli_query ($dbConnection, $q);

	if (mysqli_num_rows($r) == 1){
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// create the form
	echo '<form action="view_paycheck.php" method="post">
	<fieldset><legend><b>Emloyee Last Paycheck</b></legend>
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
	<p><b>Date:</b> ' . $row[10] . '</p>
	<p><b>Sunday:</b> ' . $row[11] . '</p>
	<p><b>Monday:</b> ' . $row[12] . '</p>
	<p><b>Tuesday:</b> ' . $row[13] . '</p>
	<p><b>Wednesday:</b> ' . $row[14] . '</p>
	<p><b>Thursday:</b> ' . $row[15] . '</p>
	<p><b>Friday:</b> ' . $row[16] . '</p>
	<p><b>Saturday:</b> ' . $row[17] . '</p>
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