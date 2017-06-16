<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$ord_date = $_POST["ord_date"];
$ord_expdel = $_POST["ord_expdel"];
$ord_qty = $_POST["ord_qty"];
$org_id = $_POST["org_id"];
$prod_id = $_POST["prod_id"];
$checkval = mysqli_query($mysqli, "select * from order_ where prod_id = '$prod_id' and org_id = '$org_id' and ord_date = '$ord_date'");
$numval = mysqli_num_rows($checkval);
if ($numval == 0)
{
	$sql1 = "INSERT INTO order_ VALUES (NULL, '$ord_date', '$ord_expdel', NULL, '$org_id', '$prod_id', '$ord_qty')";

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
$checkva2 = mysqli_query($mysqli, "select * from order_ where prod_id = '$prod_id' and org_id = '$org_id' and ord_date = '$ord_date'");
echo "<table id='tb1' border='2px'><tr> <th>Order ID</th> <th>Date ID</th><th>Expected Delivery Date</th><th>Actual Delivery Date</th><th>Customer ID</th><th>Product ID</th><th>Quantity Ordered</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 7 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>