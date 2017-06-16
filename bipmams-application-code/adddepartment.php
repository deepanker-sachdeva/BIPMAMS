<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
<?php
include_once 'includes/db_connect.php';
$dept_name = $_POST["dept_name"];
$dept_intercom = $_POST["dept_intercom"];
$checkval = mysqli_query($mysqli, "select * from department where dept_name = '$dept_name' and dept_intercom = '$dept_intercom'");
$numval = mysqli_num_rows($checkval);
//echo $numval;
if ($numval == 0)
{
	$sql1 = "INSERT INTO department VALUES (NULL, '$dept_name', '$dept_intercom')";

	if (mysqli_query($mysqli, $sql1)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
	}
}
else {
	echo "Error: Such a record already exists";
}
echo "<br><br>";
$checkva2 = mysqli_query($mysqli, "select * from department where dept_name = '$dept_name' and dept_intercom = '$dept_intercom'");
echo "<table id='tb1' border='2px'><tr> <th>Department ID</th> <th>Department Name</th><th>Intercom No.</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 3 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>

