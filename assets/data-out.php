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
    <title>Database Outputs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cs313php.css" type="text/css" rel="stylesheet" media="screen">
</head>
  
<body>
    <header>
        <img src="prayer-bible.jpg" alt="Graphic Logo"/>
        <div>
        <p>-IN LOVING MEMORY-</p>
        <p>Remembering the Disappeared</p>
        <p>Please Select the Information</p>
        </div>
    </header>
        <?php include 'snip-mainmenu.php'; ?>
    <main>
        <div>
            <br /><br />
            <p>Username: <?= $username ?> is active -- <a href="../login/signOut.php">Sign Out</a> --</p>
        </div>
        <h2>Database OUTPUT Form</h2>
        <h3>Information on Disappeared Persons</h3>

            <form class="search" id="survey" action="data-out-victims.php" method="post"  >
                <div>Please select a List:</div>
                <input type="radio" name="data" value="All">All Data<br/>
                <input type="radio" name="data" value="Name">Names of Victims<br/>
                <input type="radio" name="data" value="Date">Date Disappeared<br/>
                <input type="radio" name="data" value="Country">Country of Disappearance<br/>
                <br/>
                <input type="submit" name="submit" value="Submit Request">
                <br/>
                <br/>
            </form>
        
        <h3>Information on Data Contributors</h3>

            <form class="search" id="survey" action="data-out-reporters.php" method="post"  >
                <div>Please select a List:</div>
                <input type="radio" name="data" value="All">All Data<br/>
                <input type="radio" name="data" value="Name">Names of Contributors<br/>
                <input type="radio" name="data" value="Date">Date of Input<br/>
                <input type="radio" name="data" value="Country">Source of Data<br/>
                <br/>
                <input type="submit" name="submit" value="Submit Request">
                <br/>
                <br/>
            </form>
    </main>
    <footer>
        <?php include 'snip-cs313menu.php'; ?>
    </footer>
</body>
</html>