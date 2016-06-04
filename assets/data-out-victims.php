<?php
session_start();

if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: ../index.php");
	die(); // we always include a die after redirects.
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Data on Victims</title>
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

    <h2>Data on Victims</h2>
<p>   
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

echo "DATABASE LIST - Victims<br><br>";

//Get selected radio button
$dbcolumn =  $_POST['data'];

//Check which Radio button was selected or NULL
if ($dbcolumn == "All" || $dbcolumn == NULL) {
    header("Location: showStats.php");
    die(); // we always include a die after redirects.
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
</p>
<br/>
<br/>
<!--    <br/>
    <p><a href="data-out.php" title="Return to Data Output Form">Return to Data Output Form</a></p>
-->
</div>
        
    </main>
    <footer>
        <?php include 'snip-cs313menu.php'; ?>
    </footer>
</body>
</html>