<?php

require("password.php"); // used for password hashing.

session_start();

$badLogin = false;

// First check to see if we have post variables, if not, just
// continue on as always.

if (isset($_POST['txtUser']) && isset($_POST['txtPassword']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['txtUser'];
	$password = $_POST['txtPassword'];

	// Get the hashed password from the DB
	// It would be better to store these in a different file
//	$dbUser = 'ta6user';
//	$dbPass = 'ta6pass';
//	$dbName = 'LoginTest';
//	$dbHost = '127.0.0.1'; // for my configuration, I need this rather than 'localhost'
        
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
//mac		$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $db = dbConnect();

		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		$query = 'SELECT password FROM login WHERE username=:username';

		$statement = $db->prepare($query);
		$statement->bindParam(':username', $username);

		$result = $statement->execute();

		if ($result)
		{
			$row = $statement->fetch();
			$hashedPasswordFromDB = $row['password'];

			// now check to see if the hashed password matches
			if (password_verify($password, $hashedPasswordFromDB))
			{
				// password was correct, put the user on the session, and redirect to home
				$_SESSION['username'] = $username;
				header("Location: ../view/index.php");
				die(); // we always include a die after redirects.
			}
			else
			{
				$badLogin = true;
			}

		}
		else
		{
			$badLogin = true;
		}
	}
	catch (Exception $ex)
	{
		// Please be aware that you don't want to output the Exception message in
		// a production environment
		echo "Error with DB. Details: $ex";
		die();
	}

}
?>

<!DOCTYPE html> 
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/cs313php.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body>
    <header>
        <img src="assets/prayer-bible.jpg" alt="Image Logo"/>
        <div>
        <p>-IN LOVING MEMORY-</p>
        <p>Remembering the Disappeared</p>
        <p>Please Input your Information</p>
        </div>
    </header>
        <nav>
            <ul>
                <li><a href="login/alert.php" title="Enter valid ID">HOME</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Data</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Profiles</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">FORM</a></li>
            </ul>
        </nav>  
    <main> 
        <div style="color: red;">
        <?php
        if ($badLogin)
        {
                echo "WARNING:<br /><br />\n";
                echo "Incorrect username or password!<br /><br />\n";
                echo "Try again or create a new account.<br /><br />\n";
        }
        ?>
        </div>

        <h2>Please login with a valid username and password:</h2>

        <form id="mainForm" action="index.php" method="POST">

                <input type="text" id="txtUser" name="txtUser"></input>
                <label for="txtUser">Username</label>
                <br /><br />

                <input type="password" id="txtPassword" name="txtPassword"></input>
                <label for="txtPassword">Password</label>
                <br /><br />

                <input type="submit" value="Login" />

        </form>

        <br /><br />

        <p>Or <a href="login/signUp.php">Sign-Up</a> for a new account.</p>

        <br /><br />
        
    </main> 
    <footer>
        <nav>
            <ul>
                <li><a href="login/alert.php" title="Enter valid ID">HOME</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Site Plan</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Site Map</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Assignments</a></li>
            </ul>
        </nav>
        <br>
        <br>
        <br>
            <p><strong>Disclaimer:</strong> This web site is presented as course work for CS-313 at BYU-Idaho.</p>
            <p>&#169; 2016 Michael Cavey. All rights reserved.</p>
    </footer>
</body>
</html>