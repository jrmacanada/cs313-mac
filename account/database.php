<?php
// Set up the database connection
//$dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
$dsn = 'mysql:host=localhost;dbname=zemahorg_mormonstore';
$username = 'zemahorg_iClient';
//$username = 'mgs_user';
$password = 'pa55word';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('db_error_connect.php');
    exit();
}
?>