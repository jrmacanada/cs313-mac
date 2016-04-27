<html>
<head>
<?php 
if(isset($_POST['name'])) {
$name = $_POST['name'];
$jquery = $_POST['jquery'];
$php = $_POST['php'];
$drop = $_POST['drop'];
}
?>
</head>
<body>
<?php
if (isset($name)) {
print "Surveyed: $name\n<br/><br/>";
print "jquery Skills: $jquery\n<br/><br/>";
print "PHP Skills: $php\n<br/><br/>";
print "Drop Class: $drop\n<br/><br/>";
print "Classes you have taken before CS313:\n<br/>";
if (isset($_POST['cit336'])) {
print $_POST['cit336'] . "\n<br/>";
}
if (isset($_POST['cit230'])) {
print $_POST['cit230'] . "\n<br/>";
}
if (isset($_POST['cs246'])) {
print $_POST['cs246'] . "\n<br/>";
}
if (isset($_POST['cs235'])) {
print $_POST['cs235'] . "\n<br/>";
}
if (isset($_POST['cs213'])) {
print $_POST['cs213'] . "\n<br/>";
}
if (isset($_POST['cs165'])) {
print $_POST['cs165'] . "\n<br/>";
}
if (isset($_POST['cs124'])) {
print $_POST['cs124'] . "\n<br/>";
}
} else {
print "no data was sent\n";
}
?>
    <p><a href="assignments.php" title="Return to Assignments">Return to Assignments</a></p>
    <br>
</body>
</html>