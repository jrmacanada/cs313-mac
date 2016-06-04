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
    <title>PHP Survey Form</title>
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
        <?php include 'stop-mainmenu.php'; ?>
    <main>
    <h2>You may take the PHP Survey once:</h2>
    <form id="survey-form" method="post" action="phpsurvey-index.php">
        <label for="name">What is your unique identifier (username)?</label>
        <input type="text" name="name" id="name" size="30" required="true"/>
        <br/>
        <h4>What classes did you take before CS313?</h4>
        <input type="checkbox" name="cit336" value="CIT336"/>CIT336<br/>
        <input type="checkbox" name="cit230" value="CIT230"/>CIT230<br/>
        <input type="checkbox" name="cs246" value="CS246"/>CS246<br/>
        <input type="checkbox" name="cs235" value="CS235"/>CS235<br/>
        <input type="checkbox" name="cs213" value="CS213"/>CS213<br/>
        <input type="checkbox" name="cs165" value="CS165"/>CS165<br/>
        <input type="checkbox" name="cs124" value="CS124"/>CS124<br/>
        <input type="checkbox" name="none" value="None"/>None<br/>
        <br/>
        <h4>Do you know "jquery"?</h4>
        <input type="radio" name="jquery" value="YES"/>YES<br/>
        <input type="radio" name="jquery" value="NO"/>NO<br/>
                <br/>
        <label>Rate your PHP skills:</label></br>
		<select name="skills" form="survey-form">
                    <option value="No Response">Pull Down Menu</option>
                    <option value="EXCELLENT">Excellent</option>
                    <option value="GOOD">Good</option>
                    <option value="FAIR">Fair</option>
                    <option value="POOR">Poor</option>
		</select>                
                <br/>
        <h4>Do you think you might drop CS313?</h4>
        <input type="radio" name="drop" value="YES"/>YES<br/>
        <input type="radio" name="drop" value="NO"/>NO<br/>
        <input type="radio" name="drop" value="MAYBE"/>Time will tell<br/>
                <br/>
        <input type="submit" name="action" id="action" value="Send"/>
    </form>
    <p><a href="phpsurvey-index.php" title="Go to Survey Results">Go to Survey Results</a></p>
    <br>
    </main>
    <footer>
        <?php include 'stop-cs313menu.php'; ?> 
    </footer>

</body>
</html>