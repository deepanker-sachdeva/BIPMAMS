<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$stk_regdate = new DateTime($_POST["stk_regdate"]);
$stk_regdate = $stk_regdate->format('Y-m-d');
$stk_qty = $_POST["stk_qty"];
$prod_id = $_POST["prod_id"];
$numval = 0;
//echo $numval;
if ($numval == 0)
{
	$sql1 = "INSERT INTO stock VALUES (NULL, '$stk_qty', '$stk_regdate', '$prod_id')";

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
$checkva2 = mysqli_query($mysqli, "select * from stock where stk_qty='$stk_qty' and stk_regdate='$stk_regdate' and prod_id = '$prod_id'"); //make changes here
echo "<table id='tb1' border='2px'><tr> <th>Stock ID</th> <th>Quantity</th><th>Stock Date</th><th>Product ID</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 4 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>

