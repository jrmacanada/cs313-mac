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
    <title>Contact Form</title>
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
    <h2>CONTACT FORM</h2>
    <p>Placeholder Page: Content under development.</p>
    <p>(not part of the CS-313 project)</p>
    <br>
    </main>
    <footer>
        <?php include 'snip-cs313menu.php'; ?>
    </footer>
</body>
</html>