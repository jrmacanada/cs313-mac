<?php
/**********************************************************
* File: singup.php
* Author: Br. Burton
* 
* Description: Allows a user to enter a new username
*   and password to add to the DB.
*
* It actually posts to a file called "createAccount.php"
*   which does the actual creation.
*
***********************************************************/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>

<body>
<div>
    
<h2>Week-7 Solution</h2>

<h2>Sign up for new account</h2>

<form id="mainForm" action="createAccount.php" method="POST">

	<input type="text" id="txtUser" name="txtUser"></input>
	<label for="txtUser">Username</label>
	<br /><br />

	<input type="password" id="txtPassword" name="txtPassword"></input>
	<label for="txtPassword">Password</label>
	<br /><br />

	<input type="submit" value="Create Account" />

</form>

<p><a href="assignments.php" title="Return to Assignments">Return to Assignments</a></p>

</div>

</body>
</html>