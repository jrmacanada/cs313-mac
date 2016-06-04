<?php //require("login/signIn.php"); ?>

<!DOCTYPE html> 
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/cs313php.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body>
    <header>
        <img src="assets/prayer-bible.jpg" alt="Image Logo"/>
        <div>
        <p>-IN LOVING MEMORY-</p>
        <p>Remembering the Disappeared</p>
        <p>Please Input your Information</p>
        </div>
    </header>
        <nav>
            <ul>
                <li><a href="login/alert.php" title="Enter valid ID">HOME</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Data</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Profiles</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">FORM</a></li>
            </ul>
        </nav>  
    <main> 
        <div style="color: red;">
        <?php
        if ($badLogin)
        {
                echo "WARNING:<br /><br />\n";
                echo "Incorrect username or password!<br /><br />\n";
                echo "Try again or create a new account.<br /><br />\n";
        }
        ?>
        </div>

        <h2>Please login with a valid username and password:</h2>

        <form id="mainForm" action="login/signIn.php" method="POST">

                <input type="text" id="txtUser" name="txtUser"></input>
                <label for="txtUser">Username</label>
                <br /><br />

                <input type="password" id="txtPassword" name="txtPassword"></input>
                <label for="txtPassword">Password</label>
                <br /><br />

                <input type="submit" value="Login" />

        </form>

        <br /><br />

        <p>Or <a href="login/signUp.php">Sign-Up</a> for a new account.</p>

        <br /><br />
        
    </main> 
    <footer>
        <nav>
            <ul>
                <li><a href="login/alert.php" title="Enter valid ID">HOME</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Site Plan</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Site Map</a></li>
                <li><a href="login/alert.php" title="Enter valid ID">Assignments</a></li>
            </ul>
        </nav>
        <br>
        <br>
        <br>
            <p><strong>Disclaimer:</strong> This web site is presented as course work for CS-313 at BYU-Idaho.</p>
            <p>&#169; 2016 Michael Cavey. All rights reserved.</p>
    </footer>
</body>
</html>