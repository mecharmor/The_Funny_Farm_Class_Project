<!DOCTYPE html>
<<head>
  <title>Employees</title>

  <!--Load jQuery3 & Bootstrap-->
  <script
      src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
      crossorigin="anonymous">
    </script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <!--Load Bootstrap-->
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous">

      <!-- My Custom Styles -->
        <link href="styles.css" rel="stylesheet" type="text/css">

</head>


<body id="master">

<!--Navbar-->
  <nav class="navbar navbar-default navbar-fixed-top BoxShadow">
  <div class="container">
        <a class="navbar-brand"><img style="width:20px; height:20px;" src="img/Logo_employee.png" alt="Logo"></a>
    <ul class="nav navbar-nav">
      <li><a href="index.html">HOME</a></li>
      <li><a href="Tractors.html">Tractors</a></li>
      <li><a href="Watering.html">Watering</a></li>
      <li class="active"><a href = "farm_front_page.php">Employees</a></li>
    </ul>
  </div>
</nav>
<!--End Navbar-->


<form action="farm_front_page.php" id="myform" method="post" style="padding-top:50px;">
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