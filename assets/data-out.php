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
    <h2>Information on Disappeared Persons</h2>
    <p>Database OUTPUT Test (under development).</p>
    <br>
        <form class="search" id="survey" action="data-out-index.php" method="post"  >
            <div>Please select a List:</div>
            <input type="radio" name="data" value="All">All Data<br/>
            <input type="radio" name="data" value="Name">Names of Victims<br/>
            <input type="radio" name="data" value="Date">Date Disappeared<br/>
            <input type="radio" name="data" value="Country">Country of Disappearance<br/>
            <input type="submit" name="submit" value="Submit">
            <br/>
            <br/>
        </form>
    </main>
    <footer>
        <?php include 'snip-cs313menu.php'; ?>
    </footer>
</body>
</html>