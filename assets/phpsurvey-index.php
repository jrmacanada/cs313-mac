<?php
// Start the session [session logic adopted from ALEXANDER CASAL's website]
session_start();
if (!isset($_SESSION['complete'])) {
	$_SESSION['complete'] = 0;
}
// Save form data to file
if ($_SESSION["complete"] == 0) {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] == "Send") {
		$surveyfile = fopen("surveydata.txt", "a") or die("Unable to open file!");
		$span_style = "<span style='font-weight: bold'>";
		$form_data  = $span_style . "Surveyed: " . "</span>" . $_POST['name'] . "</br>";
                $form_data .= $span_style . "Other Classes: " . "</span>" . $_POST['cit336'] ."/". $_POST['cit230'] ."/". $_POST['cs246'] ."/". $_POST['cs235'] ."/". $_POST['cs213'] ."/". $_POST['cs165'] ."/". $_POST['cs124'] ."/". $_POST['none'] . "</br>";
		if (isset($_POST['jquery'])) {
			$form_data .= $span_style . "jquery Skills: " . "</span>" . $_POST['jquery'] . "</br>";
		} else {
			$form_data .= $span_style . "jquery Skills: " . "</span>No response</br>";
		}
		$form_data .= $span_style . "PHP Skills: " . "</span>" . $_POST['skills'] . "</br>";
		$form_data .= $span_style . "Drop CS313: " . "</span>" . $_POST['drop'] . "</br></br>";
		fwrite($surveyfile, $form_data);
		fclose($surveyfile);
		$_SESSION["complete"] = 1;
	}
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
    <h2>Survey Results:</h2>

<p>
<?php
    $surveyfile = @fopen("surveydata.txt", "r");
    if ($surveyfile) {
        echo fread($surveyfile,filesize("surveydata.txt"));
        fclose($surveyfile);
    }
?>
</p>
    <p><a href="assignments.php" title="Return to Assignments">Return to Assignments</a></p>
    <br>
    </main>
    <footer>
        <?php include 'stop-cs313menu.php'; ?> 
    </footer>
</body>
</html>