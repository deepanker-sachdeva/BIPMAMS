<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$pur_date = new DateTime($_POST["pur_date"]);
$pur_date = $pur_date->format('Y-m-d');
$pur_rate = $_POST["pur_rate"];
$pur_qty = $_POST["pur_qty"];
$pur_details = $_POST["pur_details"];
$mat_id = $_POST["mat_id"];
$org_id = $_POST["org_id"];
$numval = 0;
//echo $numval;
if ($numval == 0)
{
	$sql1 = "INSERT INTO purchaseraw VALUES (NULL, '$pur_rate', '$pur_qty', '$pur_date', '$pur_details')";
	if (mysqli_query($mysqli, $sql1)) {
    	echo " ";
	} else {
    	echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
	}
}
else {
	echo "Error: Such a record already exists";
}
echo "<br><br>";
$total_amt = $pur_rate*$pur_qty;
$checkva2 = mysqli_query($mysqli, "select * from purchaseraw where pur_date = '$pur_date' and pur_details = '$pur_details'" ); 
echo "<table id='tb1' border='2px'><tr> <th>Purchase ID</th> <th>Unit Rate</th><th>Quantity</th><th>Date of Purchase</th><th>Details</th><th>Total Amount</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 5 ; ++$k)
echo "<td>$row[$k]</td>";
echo "<td>$total_amt</td>";
echo "</tr></table>";

$sql2 = "INSERT INTO intpursup VALUES ($row[0], '$mat_id', '$org_id')";
	if (mysqli_query($mysqli, $sql2)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
	}
	echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>

