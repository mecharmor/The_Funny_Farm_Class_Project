<!DOCTYPE html>
<head>
<title>The Funny Farm</title>
</head>

<h1>The Funny Farm</h1>
<body id="master">
<?php
 // db connection
$user = 'root';
$pass = '';
$db = 'farm';

$dbConnection = mysqli_connect('localhost',$user, $pass, $db) or die("Unable to connect to the database");
	
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
		
		// check for unique SSN
		$q = "SELECT ssn FROM employees WHERE ssn = '$ssn'";
		$r = @mysqli_query($dbConnection, $q);
		if (mysqli_num_rows($r) == 0){
			// make the add query
			$q = "INSERT INTO employees
			(ssn, first_name, last_name, street, city, state, zip, phone, salary, job)
			VALUES
			('$ssn', '$first_name', '$last_name', '$street', '$city', '$state', '$zip', '$phone', '$salary', '$job')";
			$r = @mysqli_query ($dbConnection, $q);
			if ($r) {
				echo'<p><h2>New employee added.</h2></p>';
			} else {
				echo'<p><h2>Employee cannot be added due to a system error.</h2></p>';
			}
		} else {
			echo'<p><h2>Sorry, the employee already exists.</h2></p>';
		}
	}

	?>	

<form action="add_employee.php" id="myform" method="post">
<fieldset><legend><b>New Employee</b></legend>
<p>SSN: <input type="text" id="emp_id" name="emp_id" size="10" value=""/></p>
<p id="empError" class="errorMsg"></p>
<p>First Name: <input type="text" id="first_name" name="first_name" size="20" value=""/></p>
<p id="firstNameError" class="errorMsg"></p>
<p>Last Name: <input type="text" id="last_name" name="last_name" size="20" value=""/></p>
<p id="lastNameError" class="errorMsg"></p>
<p>Street: <input type="text" id="street" name="street" size="20" value=""/></p>
<p id="streetError" class="errorMsg"></p>
<p>City: <input type="text" id="city" name="city" size="20" value=""/></p>
<p id="cityError" class="errorMsg"></p>
<p>State: <input type="text" id="state" name="state" size="20" value=""/></p>
<p id="stateError" class="errorMsg"></p>
<p>Zip: <input type="text" id="zip" name="zip" size="20" value=""/></p>
<p id="zipError" class="errorMsg"></p>
<p>Phone: <input type="text" id="phone" name="phone" size="20" value=""/></p>
<p id="phoneError" class="errorMsg"></p>
<p>Salary: <input type="text" id="salary" name="salary" size="20" value=""/></p>
<p id="salaryError" class="errorMsg"></p>
<p>Job: <input type="text" id="job" name="job" size="20" value=""/></p>
<p id="jobError" class="errorMsg"></p>
<p><input type="submit" name="submit" value="Submit"/></p>
<br/>
</fieldset>
<div class="home">
<a href="farm_front_page.php">Home</a>
</div>
</form>

<script>
//checks to see if value entered in field

var formValidity = true;


function validateEmpolyee(){
	var employeeInput = document.getElementById("emp_id");
	var errorDiv = document.getElementById("empError");
	 	try {
		if (employeeInput.value == ""){
			throw "Please enter a SSN.";
		} else if (/^[0-9]+$/.test(employeeInput.value)=== false){
			throw "The SSN must be numeric."
		}
	employeeInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		employeeInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateFirst(){
	var firstInput = document.getElementById("first_name");
	var errorDiv = document.getElementById("firstNameError");
	try{
		if (firstInput.value == ""){
			throw "Please enter a first name.";
		} 
	firstInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		firstInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateLast(){
	var lastInput = document.getElementById("last_name");
	var errorDiv = document.getElementById("lastNameError");
	try{
		if (lastInput.value == ""){
			throw "Please enter a last name.";
		} 
	lastInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		lastInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateStreet(){
	var streetInput = document.getElementById("street");
	var errorDiv = document.getElementById("streetError");
	try{
		if (streetInput.value == ""){
			throw "Please enter a street address.";
		} 
	streetInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		streetInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateCity(){
	var cityInput = document.getElementById("city");
	var errorDiv = document.getElementById("cityError");
	try{
		if (cityInput.value == ""){
			throw "Please enter a city.";
		} 
	cityInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		cityInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateState(){
	var stateInput = document.getElementById("state");
	var errorDiv = document.getElementById("stateError");
	try{
		if (stateInput.value == ""){
			throw "Please enter a state.";
		} 
	stateInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		stateInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateZip(){
	var zipInput = document.getElementById("zip");
	var errorDiv = document.getElementById("zipError");
	 	try {
		if (zipInput.value == ""){
			throw "Please enter a zip code.";
		} else if (/^[0-9]+$/.test(zipInput.value)=== false){
			throw "The zip code must be numeric."
		}
	zipInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		zipInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validatePhone(){
	var phoneInput = document.getElementById("phone");
	var errorDiv = document.getElementById("phoneError");
	 	try {
		if (phoneInput.value == ""){
			throw "Please enter a phone number.";
		} else if (/^[0-9]+$/.test(phoneInput.value)=== false){
			throw "The phone number must be numeric."
		}
	phoneInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		phoneInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateSalary(){
	var salaryInput = document.getElementById("salary");
	var errorDiv = document.getElementById("salaryError");
	 	try {
		if (salaryInput.value == ""){
			throw "Please enter a salary.";
		} else if (/^[0-9]+$/.test(salaryInput.value)=== false){
			throw "The salary must be numeric."
		}
	salaryInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		salaryInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

function validateJob(){
	var jobInput = document.getElementById("job");
	var errorDiv = document.getElementById("jobError");
	try{
		if (jobInput.value == ""){
			throw "Please enter a job title.";
		} 
	jobInput.style.background = "";
	errorDiv.style.display = "none";
	errorDiv.innerHTML = "";
	}
	catch(msg){
		errorDiv.style = "block";
		errorDiv.style.color = "DarkRed";
		errorDiv.innerHTML = msg;
		jobInput.style.background = "rgb(255,233,233)";
		formValidity = false;
	}
}

// create event listeners
function createEventListeners(){
	var first_name = document.getElementById("first_name")
	var last_name = document.getElementById("last_name")
	var emp_id = document.getElementById("emp_id")
	var street = document.getElementById("street")
	var city = document.getElementById("city")
	var state = document.getElementById("state")
	var zip = document.getElementById("zip")
	var phone = document.getElementById("phone")
	var salary = document.getElementById("salary")
	var job = document.getElementById("job")
	if (first_name.addEventListener){
		first_name.addEventListener("change", validateFirst, false);
		last_name.addEventListener("change", validateLast, false);
		emp_id.addEventListener("change", validateEmpolyee, false);
		street.addEventListener("change", validateStreet, false);
		city.addEventListener("change", validateCity, false);
		state.addEventListener("change", validateState, false);
		zip.addEventListener("change", validateZip, false);
		phone.addEventListener("change", validatePhone, false);
		salary.addEventListener("change", validateSalary, false);
		job.addEventListener("change", validateJob, false);
	} else if (first_name.attachEvent){
		first_name.attachEvent("onchange", validateFirst);
		last_name.attachEvent("onchange", validateLast);
		emp_id.attachEvent("onchange", validateEmpolyee);	
		street.attachEvent("change", validateStreet);
		city.attachEvent("change", validateCity);
		state.attachEvent("change", validateState);
		zip.attachEvent("change", validateZip);
		phone.attachEvent("change", validatePhone);
		salary.attachEvent("change", validateSalary);
		job.attachEvent("change", validateJob);
	}
	var myform = document.getElementById("myform");
	if (myform.addEventListener){
		myform.addEventListener("submit", validateForm, false);
	} else if (myform.attachEvent){
		myform.attachEvent("onsubmit", validateForm);
	}
}


//final form validation and prevent submission
function validateForm(evt){
	formValidity = true;
	validateFirst();
	validateLast();
	validateEmpolyee();
	validateStreet();
	validateCity();
	validateState();
	validateZip();
	validatePhone();
	validateSalary();
	validateJob();
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

</body>
</html>