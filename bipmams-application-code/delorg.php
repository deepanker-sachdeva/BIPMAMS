<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';

if (isset($_POST['delete']) && isset($_POST['org_id']))
{
$org_id = $_POST['org_id'];

$query1 = "DELETE FROM supplier WHERE org_id='$org_id'";
$query2 = "DELETE FROM customer WHERE org_id='$org_id'";

$query3 = "DELETE FROM organization WHERE org_id='$org_id'";
mysqli_query($mysqli, $query1); 
mysqli_query($mysqli, $query2);
mysqli_query($mysqli, $query3);
echo "<input type='button' value='BACK' id='b1' onclick='history.back(-2)'/>";
}
?>