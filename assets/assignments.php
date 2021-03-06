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
    <title>Assignments</title>
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
            <br /><br />
            <p>Username: <?= $username ?> is active -- <a href="../login/signOut.php">Sign Out</a> --</p>
        </div>
        <h2>List of Assignments</h2>
        <p>Click the link to view assignment.</p>
        <ul>
            <li><a href="spiritual-1.php" title="Week-1 Spiritual Thought">Week-1 Spiritual Thought</a></li>
            <li><a href="spiritual-2.php" title="Week-2 Spiritual Thought">Week-2 Spiritual Thought</a></li>
            <li><a href="wk3-activity.php" title="Week-3 Team Activity">Week-3 Team Activity</a></li>
            <li><a href="php-survey.php" title="Week-3 PHP Survey">Week-3 PHP Survey</a></li>
            <li><a href="team-index.html" title="Week-5 Team Activity">Week-5 Team Activity</a></li>
            <li><a href="wk6-index.php" title="Week-6 Solo Attempt">Week-6 Solo Attempt</a></li>
            <li><a href="index.php" title="Week-6 Team Activity">Week-6 Team Activity</a></li>
            <li><a href="topicEntry.php" title="Week-6 Solution">Week-6 Solution</a></li>
            <li><a href="../account/index.php" title="Week-7 Solo Attempt">Week-7 Solo Attempt</a></li>
            <li><a href="../groupassignment7/index.php" title="Week-7 Team Activity">Week-7 Team Activity</a></li>
            <li><a href="../groupsolution7/signIn.php" title="Week-7 Solution">Week-7 Solution</a></li>
        </ul>
        
       <br>
    </main>
    <footer>
        <?php include 'snip-cs313menu.php'; ?>
    </footer>
</body>
</html>