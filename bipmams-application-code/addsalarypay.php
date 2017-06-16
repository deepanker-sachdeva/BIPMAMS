<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$emp_id = $_POST["emp_id"];
$pay = $_POST["pay"];
$pay_mode = $_POST["pay_mode"];
$pay_date = $_POST["pay_date"];
$pay_details = $_POST["pay_details"];
$checkval = mysqli_query($mysqli, "select * from payment where emp_id = '$emp_id' and pay_date = '$pay_date'");
$numval = mysqli_num_rows($checkval);
if ($numval == 0)
{
	$sql1 = "INSERT INTO payment VALUES ('$emp_id', NULL, '$pay', '$pay_mode', '$pay_date', '$pay_details')";

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
$checkva2 = mysqli_query($mysqli, "select * from payment where emp_id = '$emp_id' and pay_date = '$pay_date'");
echo "<table id='tb1' border='2px'><tr> <th>Employee ID</th> <th>Payment ID</th><th>Amount Paid</th><th>Mode</th><th>Date</th><th>Details</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 6 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>