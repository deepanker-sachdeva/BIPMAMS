<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$invoice_date = new DateTime($_POST["invoice_date"]);
$invoice_date = $invoice_date->format('Y-m-d');
$invoice_totprice = $_POST["invoice_totprice"];
$ord_id = $_POST["ord_id"];
$numval = 0;
//echo $numval;
if ($numval == 0)
{
	$sql1 = "INSERT INTO invoice VALUES (NULL, '$invoice_date', '$invoice_totprice', '$ord_id')";

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
$checkva2 = mysqli_query($mysqli, "select * from invoice where ord_id = '$ord_id' and invoice_totprice = '$invoice_totprice' ");
echo "<table id='tb1' border='2px'><tr> <th>Invoice ID</th> <th>Invoice Date</th><th>Total Price</th><th>Order ID</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 4 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>

