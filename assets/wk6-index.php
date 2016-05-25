<?php
// Start the session [session logic adopted from ALEXANDER CASAL's website]
session_start();
if (!isset($_SESSION['complete'])) {
	$_SESSION['complete'] = 0;
} else if ($_SESSION['complete'] == 1) {
        header('Location: '.'http://php-cavey313.rhcloud.com/assets/phpsurvey-index.php');
	//header('Location: '.'http://www.recordado.org/cs313php/assets/phpsurvey-index.php');
}
?>

<!DOCTYPE html> 
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Scripture INPUT Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cs313php.css" type="text/css" rel="stylesheet" media="screen">
</head>
  
<body>
    <header>
        <img src="prayer-bible.jpg" alt="Graphic Logo"/>
        <div>
        <p>-IN LOVING MEMORY-</p>
        <p>Remembering the Disappeared</p>
        <p>Please Input your Scripture</p>
        </div>
    </header>
        <?php include 'snip-mainmenu.php'; ?>
    <main>
        <h2>Scripture INPUT Form</h2>
        <form id="survey-form" method="post" action="scripture-index.php">
            <label for="name">Please identify the Book:</label>
            <input type="text" name="name" id="name" size="30" required="true"/>
            <br/><br/>
            <label for="name">Please enter the Chapter:</label>
            <input type="text" name="name" id="name" size="30" required="true"/>
            <br/><br/>
            <label for="name">Please identify the Verse:</label>
            <input type="text" name="name" id="name" size="30" required="true"/>
            <br/>
            <h4>Content <p>(copy and paste your scripture into the box)</p></h4>
        <textarea name="message" id="message" rows="10" cols="100" required="true"></textarea>
        <br/>
            <h4>What topics does your scripture relate too? <p>(select as many as apply)</p></h4>
            <input type="checkbox" name="faith" value="faith"/>Faith<br/>
            <input type="checkbox" name="sacrifice" value="sacrifice"/>Sacrifice<br/>
            <input type="checkbox" name="charity" value="charity"/>Charity<br/>
            <br/>
            <label for="name">Please start a NEW topic.</label>
            <input type="text" name="name" id="name" size="30" required="true"/>
            <br/>
        </form>
        <p><a href="team-index.html" title="Go to Data Query">Go to Data Query</a></p>
        <br>
    </main>
    <footer>
        <?php include 'snip-cs313menu.php'; ?> 
    </footer>
</body>
</html>
