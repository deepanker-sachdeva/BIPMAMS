<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
<?php
include_once 'includes/db_connect.php';
$sal_jobcat = $_POST["sal_jobcat"];
$sal_basic = $_POST["sal_basic"];
$sal_da = $_POST["sal_da"];
$sal_hra = $_POST["sal_hra"];
$sal_details = $_POST["sal_details"];

$checkval = mysqli_query($mysqli, "select * from salary where sal_jobcat = '$sal_jobcat'");
$numval = mysqli_num_rows($checkval);
//echo $numval;
if ($numval == 0)
{
	$sql1 = "INSERT INTO salary VALUES ('$sal_jobcat', '$sal_basic', '$sal_da', '$sal_hra', '$sal_details')";

	if (mysqli_query($mysqli, $sql1)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
	}
}
else {
	echo "Error: Such a record already exists";
}
$sal_tot = $sal_basic*(1 + ($sal_da + $sal_hra)/100);
echo "<br><br>";
$checkva2 = mysqli_query($mysqli, "select sal_jobcat, sal_basic, sal_da, sal_hra, sal_details, sal_basic + sal_da*sal_basic/100 + sal_hra*sal_basic/100 from salary where sal_jobcat = '$sal_jobcat'");
echo "<table id='tb1' border='2px'><tr> <th>Job Category</th> <th>Basic Salary</th><th>Dearness Allowance</th><th>House Rent Allowance</th><th>Details</th><th>Total Salary</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 6 ; ++$k)
echo "<td>$row[$k]</td>";
//echo "<td>$sal_tot</td>";
echo "</tr></table>";
echo "<br><br>";
echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>

