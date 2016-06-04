<?php 

require("password.php"); // used for password hashing.
 // Start the session
    session_start();
    if (empty($_SESSION["loggedin"]))
    {
        header("Location:signin.php");
    }
    
 ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Access the Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
              
        <h2>Welcome <?php echo $_SESSION['name']; ?> -</h2><p/>
        <p>Click the link below to access the Home Page.</p>
        <p><a href="../login/signOut.php" title="Access the Home Page">Access the Home Page</a></p>
        
    </body>
</html>
    