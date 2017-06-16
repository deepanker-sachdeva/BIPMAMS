<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
<?php
include_once 'includes/db_connect.php';
$mat_name = $_POST["mat_name"];
$mat_desc = $_POST["mat_desc"];
$checkval = mysqli_query($mysqli, "select * from rawmaterial where mat_name = '$mat_name'");
$numval = mysqli_num_rows($checkval);
//echo $numval;
if ($numval == 0)
{
	$sql1 = "INSERT INTO rawmaterial VALUES (NULL, '$mat_name', '$mat_desc')";

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
$checkva2 = mysqli_query($mysqli, "select * from rawmaterial where mat_name = '$mat_name'");
echo "<table id='tb1' border='2px'><tr> <th>Raw Material ID</th> <th>Raw Material Name</th><th>Description</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 3 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>

