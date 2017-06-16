<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$ord_id = $_POST["ord_id"];
$ord_actdel = $_POST["ord_actdel"];
$checkval = mysqli_query($mysqli, "select * from order_ where ord_id = '$ord_id' and ord_actdel is not null");
$numval = mysqli_num_rows($checkval);
//echo $numval;
if ($numval == 0)
{
	$sql1 = "update order_ set ord_actdel = '$ord_actdel' where ord_id = '$ord_id'";

	if (mysqli_query($mysqli, $sql1)) {
    	echo "Order Delivery details added successfully";
	} else {
    	echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
	}
}
else {
	echo "Error: The order delivery details have already been added.";
}
echo "<br><br>";
$checkva2 = mysqli_query($mysqli, "select * from order_ where ord_id = '$ord_id'");
echo "<table border='2px'><tr> <th>Order ID</th> <th>Date ID</th><th>Expected Delivery Date</th><th>Actual Delivery Date</th><th>Customer ID</th><th>Product ID</th><th>Quantity Ordered</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 7 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-2)'/>";
?>

