<?php
/**********************************************************
* File: singup.php
* Author: Br. Burton
* Adapted by Michael Cavey for project web site.
* Description: Allows a user to enter a new username
*   and password to add to the DB.
*
* It actually posts to a file called "createAccount.php"
*   which does the actual creation.
*
***********************************************************/

// used for password hashing. If we don't have php 5.5 or later (e.g. openshift)
// then we will need to have this file in our path (e.g., in the current directory)
require("password.php");

// get the data from the POST
$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];

if (!isset($username) || $username == ""
	|| !isset($password) || $password == "")
{
	header("Location: signUp.php");
	die(); // we always include a die after redirects.
}

// Let's not allow HTML in our usernames. It would be best to detect this before
// submitting the form and preven the submission.
$username = htmlspecialchars($username);

// Get the hashed password.
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


// It would be better to store these in a different file
//$dbUser = 'ta6user';
//$dbPass = 'ta6pass';
//$dbName = 'LoginTest';
//$dbHost = '127.0.0.1'; // for my configuration, I need this rather than 'localhost'

function dbConnect() {

	$dbHost = '';
	$dbPort = '';
	$dbUser = '';
	$dbPassword = '';
	$dbName = 'LoginTest';

	$onOpenShift = getenv('OPENSHIFT_MYSQL_DB_HOST');

	if ($onOpenShift === null || $onOpenShift== "") 
	{
		// in our localhost environment
		$dbHost = '127.0.0.1';
		$dbPort = '8889';
		$dbUser = 'root';
		$dbPassword = 'root';
	}
	else {
		//in our OpenShift environment
		$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
		$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
		$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	}
        
//mac	echo "DB HOST:$dbHost:$dbPort dbName:$dbName user:$dbUser";

	$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	return $db;
}

try
{
	// Create the PDO connection
//mac	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $db = dbConnect();

	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$query = 'INSERT INTO login(username, password) VALUES(:username, :password)';

	$statement = $db->prepare($query);

	$statement->bindParam(':username', $username);

	// **********************************************
	// NOTICE: We are submitting the hashed password!
	// **********************************************
	$statement->bindParam(':password', $hashedPassword);

	$statement->execute();
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}


// finally, redirect them to the sign in page
header("Location: signIn.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.

?>