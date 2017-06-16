<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';

if (isset($_POST['delete']) && isset($_POST['emp_id']))
{
$emp_id = $_POST['emp_id'];

$query1 = "DELETE FROM manufworker WHERE emp_id='$emp_id'";
$query2 = "DELETE FROM management WHERE emp_id='$emp_id'";

$query3 = "DELETE FROM employee WHERE emp_id='$emp_id'";

mysqli_query($mysqli, $query1);
mysqli_query($mysqli, $query2);
mysqli_query($mysqli, $query3); 
echo "<input type='button' value='BACK' id='b1' onclick='history.back(-2)'/>";
}
?>