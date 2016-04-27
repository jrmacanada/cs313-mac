<html>
<head>
<?php 
if(isset($_POST['name'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$major = $_POST['major'];
}
?>
</head>
<body>
<?php
if (isset($name)) {
print "Name: $name\n<br/>";
print "Email: <a href=\"$email\">$email</a>\n<br/>";
print "Message: <pre>$message</pre>\n<br/>";
print "Major: $major\n<br/><br/><br/>";
print "Continents you have visited:\n<br/>";
if (isset($_POST['africa'])) {
print $_POST['africa'] . "\n<br/>";
}
if (isset($_POST['antarctica'])) {
print $_POST['antarctica'] . "\n<br/>";
}
if (isset($_POST['asia'])) {
print $_POST['asia'] . "\n<br/>";
}
if (isset($_POST['australia'])) {
print $_POST['australia'] . "\n<br/>";
}
if (isset($_POST['europe'])) {
print $_POST['europe'] . "\n<br/>";
}
if (isset($_POST['northamerica'])) {
print $_POST['northamerica'] . "\n<br/>";
}
if (isset($_POST['southamerica'])) {
print $_POST['southamerica'] . "\n<br/>";
}
} else {
print "no data was sent\n";
}
?>
    <p><a href="assignments.php" title="Return to Assignments">Return to Assignments</a></p>
    <br>
</body>
</html>