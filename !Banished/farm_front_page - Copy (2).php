<!DOCTYPE html>
<head>
<title>The Funny Farm</title>
</head>

<h1>The Funny Farm</h1>
<body id="master">
<form action="farm_front_page.php" id="myform" method="post">
<fieldset>
<?php
echo '<legend><b>Please Choose a Link Below:</b></legend>';
//table with links to pages
echo '<table class="nav_bar" align="left" cellspacing="0" cellpadding="5" width="75%">
<tr>
<td align="left"><b><a href="display_employee.php?">View Employee Information</a></b></td>
</tr>
<tr>
<td align="left"><b><a href="search_employee.php?">Search Employee Information</a></b></td>
</tr>
<tr>
<td align="left"><b><a href="add_employee.php?">Add a New Employee</a></b></td>
</tr>
<tr>
<td align="left"><b><a href="clock_in_front.php?">Edit Employee Timecard</a></b></td>
</tr>
<tr>
<td align="left"><b><a href="employee_paycheck_front.php?">View Employee Paycheck</a></b></td>
</tr>
';

?>
<tr>
<td align="left"><b><a href="index.html">Home</a></b></td>
</tr>
</fieldset>
</form>


</body>

</html>