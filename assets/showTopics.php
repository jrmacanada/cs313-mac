<?php
/**********************************************************
* File: viewScriptures.php
* Author: Br. Burton
* 
* Description: This file shows an example of how to query a
*   MySql database from PHP.
***********************************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Scripture and Topic List</title>
</head>

<body>
<div>

<h1>Scripture and Topic List</h1>

<?php

// It would be better to store these in a different file
// mac $dbUser = 'ta4User';
// mac $dbPass = 'ta4pass';
// mac $dbName = 'teamActivity4';
// mac $dbHost = '127.0.0.1'; // for my configuration, I need this rather than 'localhost'

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
// mac 	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $db = dbConnect();
	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


	// For this example, we are going to make a call to the DB to get the scriptures
	// and then for each one, make a separate call to get its topics.
	// This could be done with a single query (and then more processing of the resultset)
	// as follows:

	//	$statement = $db->prepare('SELECT book, chapter, verse, content, t.name FROM scripture s'
	//	. ' INNER JOIN scripture_topic st ON s.id = st.scriptureId'
	//	. ' INNER JOIN topic t ON st.topicId = t.id');


	// prepare the statement
	$statement = $db->prepare('SELECT id, book, chapter, verse, content FROM scripture');
	$statement->execute();

	// Go through each result
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo '<p>';
		echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
		echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
		echo '<br />';
		echo 'Topics: ';

		// get the topics now for this scripture
		$stmtTopics = $db->prepare('SELECT name FROM topic t'
			. ' INNER JOIN scripture_topic st ON st.topicId = t.id'
			. ' WHERE st.scriptureId = :scriptureId');

		$stmtTopics->bindParam(':scriptureId', $row['id']);

		$stmtTopics->execute();

		// Go through each topic in the result
		while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
		{
			echo $topicRow['name'] . ' ';
		}

		echo '</p>';
	}


}
catch (PDOException $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}

?>

</div>
    
    <p><a href="topicEntry.php" title="Return to Scripture Input Form">Return to Scripture Input Form</a></p>
    <p><a href="assignments.php" title="Return to Assignments">Return to Assignments</a></p>
    
</body>
</html>