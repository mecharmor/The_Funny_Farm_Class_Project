<!DOCTYPE html>
<head>
<title>The Funny Farm</title>
<!--Load Bootstrap-->
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous">
</head>

<h1>The Funny Farm</h1>

<?php

// db connection
$user = 'root';
$pass = '';
$db = 'farm';

$dbConnection = mysqli_connect('localhost',$user, $pass, $db) or die("Unable to connect to the database");

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$search = $_REQUEST['employee'];

	// Define the query:
	$q = "SELECT ssn, first_name, last_name, street, city, state, zip, phone, salary, job
	FROM employees
	WHERE last_name LIKE '%$search%'";
	$r = @mysqli_query ($dbConnection, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
	// table header
	echo '<fieldset>';
	echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
	<tr>
	<td align="left"><b>SSN</a></b></td>
	<td align="left"><b>First Name</a></b></td>
	<td align="left"><b>Last Name</a></b></td>
	<td align="left"><b>Address</a></b></td>
	<td align="left"><b>City</a></b></td>
	<td align="left"><b>State</a></b></td>
	<td align="left"><b>Zip</a></b></td>
	<td align="left"><b>Phone</a></b></td>
	<td align="left"><b>Salary</a></b></td>
	<td align="left"><b>Job</a></b></td>
	<td align="left"><b>Delete</b></td>
	</td>
	';

	// fetch and print the records
	$bg = '#eeeee';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
		<td align="left">' . $row['ssn'] . '</td>
		<td align="left">' . $row['first_name'] . '</td>
		<td align="left">' . $row['last_name'] . '</td>
		<td align="left">' . $row['street'] . '</td>
		<td align="left">' . $row['city'] . '</td>
		<td align="left">' . $row['state'] . '</td>
		<td align="left">' . $row['zip'] . '</td>
		<td align="left">' . $row['phone'] . '</td>
		<td align="left">' . $row['salary'] . '</td>
		<td align="left">' . $row['job'] . '</td>
		<td align="left"><a href="delete_driver.php?id=' . $row['ssn'] . '">Delete</a></td>
		</tr>
		';
	}

echo '</table>';
echo '</fieldset>';
echo '<div class="home">
<a href="farm_front_page.php">Home</a>
<a href="search_employee.php">Search..</a>
</div>';

mysqli_free_result ($r);
mysqli_close($dbConnection);
	} else {
		echo '<p><h3><u>Sorry we cannot find any matching search results</u></h3></p>';
		echo '<div class="home">';
		echo '<a href="farm_front_page.php" type="button" class="btn btn-primary" >Home</a>';
		echo '<a href="search_employee.php" type="button" class="btn btn-primary" >Back</a>';
		echo '</div>';
	}

} else { //show the form

?>
<!DOCTYPE html>
<form action="search_employee.php" id="searchEmployee" novalidate="novalidate" method="post">
<fieldset><legend>Search employees</legend>
<p><label>Enter employee last name: <input type="text" id="employee" name="employee" size="20" maxlength="60" /></p>
<p id="searchError" class="errorMsg"></p>
<p>
<input type="submit" name="submit" value="SEARCH!" />
</p>
</fieldset>
<div class="home">
<a href="farm_front_page.php">Home</a>
</div>
</form>
<script>
//checks to see if value entered in search field
var formValidity = true;
function validateSearch(){
	var searchInput = document.getElementById("employee");
	var errorDiv = document.getElementById("searchError");
	try{
		if (searchInput.value == ""){
			throw "Please enter a value in the search field";
		}
	searchInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		searchInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}
// create event listeners
function createEventListeners(){
	var employee = document.getElementById("employee");
	if (employee.addEventListener){
		employee.addEventListener("change", validateSearch, false);
	} else if (employee.attachEvent){
		employee.attachEvent("onchange", validateSearch);
	}
	var searchEmployee = document.getElementById("searchEmployee");
	if (searchEmployee.addEventListener){
		searchEmployee.addEventListener("submit", validateForm, false);
	} else if (searchEmployee.attachEvent){
		serachEmployee.attachEvent("onsubmit", validateForm);
	}
}
//final form validation and prevent submission
function validateForm(evt){
	formValidity = true;
	validateSearch();
	if (formValidity === false){
		if (evt.preventDefault){
			evt.preventDefault();
		} else {
			evt.returnValue = false;
		}
	}
}
// form load
if (window.addEventListener){
	window.addEventListener("load", createEventListeners, false);
} else if (window.attachEvent){
	window.attachEvent("onload", createEventListeners);
}
</script>
<?php
}
?>
</body>
</html>
