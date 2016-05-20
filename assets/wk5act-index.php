<?php
//This file is used (called out) on "data_out.php"
//Open DB
try 
{   
    $db = OpenDB("cavey313");
    
} catch (Exception $ex) 
{
    echo "Connection failed: " . $ex->getMessage();
    die();
}

echo "Scripture Resources<br>";

//Get selected radio button
$dbcolumn =  $_POST['data'];

//Check if Radio button was selected or "All" was chosen
if($dbcolumn == "All" || $dbcolumn == NULL)
{
    $statement = $db->query("SELECT id, book, chapter, verse, content FROM scriptures");
}
else {
    $statement = $db->query("SELECT id, book, chapter, verse, content FROM scriptures where book = " . $db->quote($dbcolumn) );  //use ->quote() to wrap "quotes" around variable
}
//Got get the data from the database
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

//Display the results
foreach ($results as $row)
{
    echo "<b>" . $row["book"]. " " . $row["chapter"]. ":" . $row["verse"]. "</b> - ". $row["content"]."<br>";
}

$db = null;  //Close out the DB



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