<?php
/**********************************************************
* File: topicEntry.php
* Author: Br. Burton
* 
* Description: This is the PHP file that the user starts with.
*   It has a form to enter a new scripture and topic.
*   It posts to the insertTopic.php page.
***********************************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Topic Entry</title>
</head>

<body>
<div>
    <h2>Week-6 Solution</h2>

    <h2>Enter New Scriptures and Topics</h2>

    <form id="mainForm" action="insertTopic.php" method="POST">

            <input type="text" id="txtBook" name="txtBook"></input>
            <label for="txtBooK">Book</label>
            <br /><br />

            <input type="text" id="txtChapter" name="txtChapter"></input>
            <label for="txtChapter">Chapter</label>
            <br /><br />

            <input type="text" id="txtVerse" name="txtVerse"></input>
            <label for="txtVerse">Verse</label>
            <br /><br />

            <label for="txtContent">Content:</label><br />
            <textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
            <br /><br />

            <label>Topics:</label><br />

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
	$dbName = 'teamActivity4';

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

</form>
    
    <p><a href="showTopics.php" title="Display Scriptures Database">Display Scriptures Databases</a></p>

    <p><a href="assignments.php" title="Return to Assignments">Return to Assignments</a></p>

</div>
    
</body>
</html>