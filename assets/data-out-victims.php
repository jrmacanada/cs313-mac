<!DOCTYPE html>
<html>
<head>
	<title>Data on Victims</title>
</head>

<body>
<div>

<?php
//This file is used (called out) on "data_out.php"
//Open DB
try 
{   
    $db = OpenDB("php");
    
} catch (Exception $ex) 
{
    echo "Connection failed: " . $ex->getMessage();
    die();
}

echo "DATABASE LIST Victims<br><br>";

//Get selected radio button
$dbcolumn =  $_POST['data'];

//Check which Radio button was selected or NULL
if ($dbcolumn == "All" || $dbcolumn == NULL) {
    $statement = $db->query("SELECT id, name, date, country FROM disappeared ORDER BY country, name, date");
} else if ($dbcolumn == "Name") {
    $statement = $db->query("SELECT name FROM disappeared ORDER BY name");
} else if ($dbcolumn == "Date") {
    $statement = $db->query("SELECT date FROM disappeared ORDER BY date");
} else if ($dbcolumn == "Country") {
    $statement = $db->query("SELECT country FROM disappeared ORDER BY country");
}

//Get the data from the database
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

//Display the results
foreach ($results as $row)
{
    echo "<b>" . $row["name"]. " : " . $row["date"]. " : " . $row["country"]."<br>";
}

$db = null;  //Close out the DB



// *******************
// Function to open DB on localhost or OpenShift
function openDB($dbname)
{
    $onOpenShift = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($onOpenShift === null || $onOpenShift == "")
    {
        // Not in the OpenShift environment
        $servername = "localhost";
        $username = "localuser";
        $password = "user-login";
    }
    else 
    { 
        // In the OpenShift environment
        $servername = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');        
    } 

// Create connection
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

return $db;

}

?>
    <br/>
    <p><a href="data-out.php" title="Return to Data Output Form">Return to Data Output Form</a></p>

</div>

</body>
</html>