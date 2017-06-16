<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$prod_name = $_POST["prod_name"];
$prod_catgy = $_POST["prod_catgy"];
$prod_price = $_POST["prod_price"];
$prod_desc = $_POST["prod_desc"];
$checkval = mysqli_query($mysqli, "select * from product where prod_name = '$prod_name'");
$numval = mysqli_num_rows($checkval);
if ($numval == 0)
{
	$sql1 = "INSERT INTO product VALUES (NULL, '$prod_name', '$prod_catgy', '$prod_price', '$prod_desc')";

	if (mysqli_query($mysqli, $sql1)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
	}
}
else {
	echo "Error: Such a product already exists";
}
echo "<br><br>";
$checkva2 = mysqli_query($mysqli, "select * from product where prod_name = '$prod_name'");
echo "<table id='tb1' border='2px'><tr> <th>Product ID</th> <th>Product Name</th><th>Category</th><th>Price per unit</th><th>Description</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 5 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>