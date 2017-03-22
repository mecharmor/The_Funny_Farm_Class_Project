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
		
		//GET INFO
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
		$date1 = mysqli_real_escape_string($dbConnection, trim($_POST['date1']));
		$time1 = mysqli_real_escape_string($dbConnection, trim($_POST['time1']));
		$time2 = mysqli_real_escape_string($dbConnection, trim($_POST['time2']));
		$time3 = mysqli_real_escape_string($dbConnection, trim($_POST['time3']));
		$time4 = mysqli_real_escape_string($dbConnection, trim($_POST['time4']));
		$time5 = mysqli_real_escape_string($dbConnection, trim($_POST['time5']));
		$time6 = mysqli_real_escape_string($dbConnection, trim($_POST['time6']));
		$time7 = mysqli_real_escape_string($dbConnection, trim($_POST['time7']));
		//MAKE THE QUERY
		$q = "UPDATE employees
			SET date1 = '$date1', time1 = '$time1', time2 = '$time2',
			time3 = '$time3', time4 = '$time4', time5 = '$time5',
			time6 = '$time6', time7 = '$time7'
			WHERE
			ssn=$id;";
		$r = @mysqli_query($dbConnection, $q);
		if (mysqli_affected_rows($dbConnection) == 1){
			echo '<p>The employee timecard has been updated</p>';
		}
		else {
			echo '<p>The employee timecard could not be updated due to a system error.';
		}
	}
	else{
		echo '<p>The employee timecard was not be updated.</p>';
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
	echo '<form action="clock_in.php" method="post">
	<fieldset><legend><b>Confirm Timecard Details</b></legend>
	<p><b>SSN:  </b> <input type="text" readonly="readonly" id="emp_id" name="emp_id" size="10" value='. $row[0] . '></p>
	<p><b>First Name:  </b> <input type="text" readonly="readonly" id="first_name" name="first_name" size="20" value=' . $row[1] . '></p>
	<p><b>Last Name:  </b> <input type="text" readonly="readonly" id="last_name" name="last_name" size="20" value=' . $row[2] . '></p>
	<p><b>Street:  </b> <input type="text" readonly="readonly" id="street" name="street" size="20" value=' . $row[3] . '></p>
	<p><b>City:  </b> <input type="text" readonly="readonly" id="city" name="city" size="20" value=' . $row[4] . '></p>
	<p><b>State:  </b> <input type="text" readonly="readonly" id="state" name="state" size="20" value=' . $row[5] . '></p>
	<p><b>Zip:  </b> <input type="text" readonly="readonly" id="zip" name="zip" size="20" value=' . $row[6] . '></p>
	<p><b>Phone:  </b> <input type="text" readonly="readonly" id="phone" name="phone" size="20" value=' . $row[7] . '></p>
	<p><b>Salary  :</b> <input type="text" readonly="readonly" id="salary" name="salary" size="20" value=' . $row[8] . '></p>
	<p><b>Job:  </b> <input type="text" readonly="readonly" id="job" name="job" size="20" value= ' . $row[9] . '></p>
	
	<p><b>Payperiod Begin Date: </b/><input type="date" id="date1" name="date1"/></p>
	
	
	<p><b>Hours Worked: </b>
	Sunday: <input type="text" id="time1" name="time1" size="5" value="0""/>
	Monday: <input type="text" id="time2" name="time2" size="5" value="0"/>
	Tuesday: <input type="text" id="time3" name="time3" size="5" value="0"/>
	Wednesday: <input type="text" id="time4" name="time4" size="5" value="0"/>
	Thursday: <input type="text" id="time5" name="time5" size="5" value="0"/>
	Friday: <input type="text" id="time6" name="time6" size="5" value="0"/>
	Saturday: <input type="text" id="time7" name="time7" size="5" value="0"/>
	</p>
	<p><b>Submit: </b><input type="radio" name="sure" value="Yes" /> <b>Yes</b>
	<input type="radio" name="sure" value="No" checked="checked" /> <b>No</b></p>
	<p><input type="submit" name="submit" value="SUBMIT" /></p>
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
