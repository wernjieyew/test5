
<?php // mysqli_connect.php
DEFINE('DB_USER', 'admin'); // root
DEFINE('DB_PASSWORD', 'database'); // no password
DEFINE('DB_HOST', 'myrds.cve8wc6o4b25.us-east-1.rds.amazonaws.com');
DEFINE('DB_NAME', 'assignment');
// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,
DB_NAME) OR die('Could not connect to MySQL:
'.mysqli_connect_error());
?>
