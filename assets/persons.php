<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Individual Profiles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cs313php.css" type="text/css" rel="stylesheet" media="screen">
</head>
  
<body>
    <header>
        <img src="prayer-bible.jpg" alt="Graphic Logo"/>
        <div>
        <p>-IN LOVING MEMORY-</p>
        <p>Remembering the Disappeared</p>
        <p>Please Input your Information</p>
        </div>
    </header>
        <?php include 'snip-mainmenu.php'; ?>
    <main>
    <div>

<h1>Profiles of the Disappeared</h1>

<form id="mainForm" action="insertVictim.php" method="POST">

	<input type="text" id="txtBook" name="txtBook"></input>
	<label for="txtBooK">Name of Victim</label>
	<br /><br />

	<input type="text" id="txtChapter" name="txtChapter"></input>
	<label for="txtChapter">Date Disappeared</label>
	<br /><br />

	<input type="text" id="txtVerse" name="txtVerse"></input>
	<label for="txtVerse">Country of Disappearance</label>
	<br /><br />

	<label for="txtContent">Personal Story:</label><br />
	<textarea id="txtContent" name="txtContent" rows="8" cols="80"></textarea>
	<br /><br />

	<label>Statistics:</label><br />

<?php
// This section will now generate the available check boxes for topics
// based on what is in the database


// It would be better to store these in a different file
//mac $dbUser = 'ta4User';
//mac $dbPass = 'ta4pass';
//mac $dbName = 'teamActivity4';
//mac $dbHost = '127.0.0.1'; // for my configuration, I need this rather than 'localhost'

function dbConnect() {

	$dbHost = '';
	$dbPort = '';
	$dbUser = '';
	$dbPassword = '';
	$dbName = 'php';

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
	// prepare the statement
	$statement = $db->prepare('SELECT id, name FROM topic');
	$statement->execute();

	// Go through each result
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo '<input type="checkbox" name="chkTopics[]" value="' . $row["id"] . '">';
		echo $row['name'];
		echo '</input><br />';

		// put a newline out there just to make our "view source" experience better
		echo "\n";
	}

}
catch (PDOException $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error connecting to DB. Details: $ex";
	die();
}

?>

	<br />

	<input type="submit" value="Add to Database" />
        
        <br />

</form>

</div>
</main>
    <footer>
        <?php include 'snip-cs313menu.php'; ?>
    </footer>
</body>
</html>