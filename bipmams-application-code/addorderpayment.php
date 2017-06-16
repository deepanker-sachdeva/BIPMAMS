<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$porder_date = new DateTime($_POST["porder_date"]);
$porder_date = $porder_date->format('Y-m-d');
$porder_mode = $_POST["porder_mode"];
$porder_amt = $_POST["porder_amt"];
$porder_details = $_POST["porder_details"];
$ord_id = $_POST["ord_id"];
$numval = 0;
//echo $numval;
if ($numval == 0)
{
	$sql1 = "INSERT INTO orderpayment VALUES (NULL, '$porder_amt', '$porder_mode', '$porder_date', '$porder_details', '$ord_id')";

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
$checkva2 = mysqli_query($mysqli, "select * from orderpayment where ord_id = '$ord_id' and porder_amt = '$porder_amt'"); //make changes here
echo "<table id='tb1' border='2px'><tr> <th>Order Payment ID</th> <th>Payment Mode</th><th>Total Amount Received</th><th>Date of Payment</th><th>Payment Details</th><th>Order ID</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 6 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>

