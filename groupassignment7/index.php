<?php 
 // Start the session
    session_start();
    if (empty($_SESSION["loggedin"]))
    {
        header("Location:signin.php");
    }
    
 ?>
<!DOCTYPE html>
<!--
/**************************************
 * 
 *  File: index.php
 *  Created by: jsimpson
 *  Date: May 16, 2016 8:52:37 PM
 *  Description:
 * 
 ****************************************/
-->
<html>
    <head>
        <title>GroupProject 7.5</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
              
        <h2>Welcome <?php echo $_SESSION['name']; ?> to the Scripture Homepage.</h2><p/>
        <form class="search" id="login" action="add_verse.php" method="post"  >
            <div>Please Add your Scripture:</div>
            Book:
            <input type="text" name="book"><br/>
            Chapter: <input type="text" name="chapter"> 
            Verse: <input type="text" name="verse"><br/>
            Scriptures Topics:<br>
            <?php 
            
                
                $topics = getTopics();
            
                foreach($topics as $item)
                {
                    echo "<input type='checkbox' name='topics[]' value=";
                    echo $item['id'] . ">" .$item['name'] ."<br/>";
                }
        
            ?>          
            Scripture Content:<br> <textarea rows='4' cols='100' name="content"></textarea><br>
           <br>
            
          <input type="submit" name="submit" value="Submit"> 
        </form>
    </body>
</html>
    