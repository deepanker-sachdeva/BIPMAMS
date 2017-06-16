<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';

if (isset($_POST['delete']) && isset($_POST['dept_id']))
{
$dept_id = $_POST['dept_id'];

$query1 = "DELETE FROM department WHERE dept_id='$dept_id'";

mysqli_query($mysqli, $query1); 
echo "<input type='button' value='BACK' id='b1' onclick='history.back(-2)'/>";
}
?>