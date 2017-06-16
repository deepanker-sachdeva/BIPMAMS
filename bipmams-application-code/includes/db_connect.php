<?php
include_once 'psl-config.php';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$mysqli) die("Unable to connect to MySQL: " . mysqli_error($mysqli));

mysqli_select_db($mysqli,$db_database)
or die("Unable to select database: " . mysqli_error($mysqli));

?>
