<!DOCTYPE html> 
<html lang="en-US">
<head>
    <title>Team Survey Form</title>
</head>
<body>
    <h2>Week-3 Team Activity</h2>
    <h3>Take the Team Survey:</h3>
    <form method="post" action="wk3act-index.php">
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" size="20" required="true"/>
        <br/>
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" size="30" required="true"/>
        <br/>
        <p>Major:</p>
        <input type="radio" name="major" value="Computer Engineering"/>Computer Engineering<br/>
        <input type="radio" name="major" value="Computer Information Technology"/>Computer Information Technology<br/>
        <input type="radio" name="major" value="Computer Science"/>Computer Science<br/>
        <input type="radio" name="major" value="Web Design and Development"/>Web Design and Development<br/>
                
    <p>Continents you have visited:</p>
        <input type="checkbox" name="africa" value="Africa"/>Africa<br/>
        <input type="checkbox" name="antarctica" value="Antarctica"/>Antarctica<br/>
        <input type="checkbox" name="asia" value="Asia"/>Asia<br/>
        <input type="checkbox" name="australia" value="Australia"/>Australia<br/>
        <input type="checkbox" name="europe" value="Europe"/>Europe<br/>
        <input type="checkbox" name="northamerica" value="North America"/>North America<br/>
        <input type="checkbox" name="southamerica" value="South America"/>South America<br/>
        
        <p>Message</p>
        <textarea name="message" id="message" rows="8" cols="60" required="true"></textarea>
        <br/><br/>
        <input type="submit" name="action" id="action" value="Send"/>
    </form>
    <p><a href="assignments.php" title="Return to Assignments">Return to Assignments</a></p>
    
</body>
</html>