<?php
/**********************************************************
* File: insertTopic.php
* Author: Br. Burton
* 
* Description: Takes input posted from topicEntry.php
*   This file enters a new scripture into the database
*   along with its associated topics.
*
*   This file actually does not do any rendering at all,
*   instead it redirects the user to showTopics.php to see
*   the resulting list.
***********************************************************/

// get the data from the POST
$book = $_POST['txtBook'];
$chapter = $_POST['txtChapter'];
$verse = $_POST['txtVerse'];
$content = $_POST['txtContent'];
$topicIds = $_POST['chkTopics'];

echo "book=$book\n";
echo "chapter=$chapter\n";
echo "verse=$verse\n";
echo "content=$content\n";

// we could put additional checks here to verify that all this data is actually provided


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

	echo "DB HOST:$dbHost:$dbPort dbName:$dbName user:$dbUser";

	$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	return $db;
}

try
{
	// Create the PDO connection
//mac 	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $db = dbConnect();
	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// First Add the Scripture
	$query = 'INSERT INTO scripture(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';

	$statement = $db->prepare($query);

	$statement->bindParam(':book', $book);
	$statement->bindParam(':chapter', $chapter);
	$statement->bindParam(':verse', $verse);
	$statement->bindParam(':content', $content);

	$statement->execute();

	// get the new id
	$scriptureId = $db->lastInsertId();

	// Now go through each topic id in the list from the user's checkboxes
	foreach ($topicIds as $topicId)
	{
		$statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');

		$statement->bindParam(':scriptureId', $scriptureId);
		$statement->bindParam(':topicId', $topicId);

		$statement->execute();
	}
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: showTopics.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.

?>