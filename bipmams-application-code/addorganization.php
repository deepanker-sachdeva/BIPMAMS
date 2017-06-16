<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$org_name = $_POST["org_name"];
$org_addr = $_POST["org_addr"];
$org_area = $_POST["org_area"];
$org_city = $_POST["org_city"];
$org_pincode = $_POST["org_pincode"];
$org_phone1 = $_POST["org_phone1"];
$org_phone2 = $_POST["org_phone2"];
$org_email = $_POST["org_email"];
$org_fax = $_POST["org_fax"];
$org_TIN_no = $_POST["org_TIN_no"];
$cust_type = $_POST["cust_type"];
$cust_regdate = new DateTime($_POST["cust_regdate"]);
$cust_regdate = $cust_regdate->format('Y-m-d');
$sup_accno = $_POST["sup_accno"];
$sup_type = $_POST["sup_type"];
$org_type = $_POST["org_type"];
$checkval = mysqli_query($mysqli, "select org_id from organization where org_name = '$org_name' or org_TIN_no = '$org_TIN_no'");
$numval = mysqli_num_rows($checkval);
//echo $numval;

if ($numval == 0)
{
	$sql1 = "INSERT INTO organization VALUES (NULL, '$org_name', '$org_addr', '$org_area', '$org_city', '$org_pincode', '$org_phone1', '$org_phone2', '$org_email', '$org_fax', '$org_TIN_no')";
	//mysqli_query($mysqli, $sql1);
  //header( "Location: adddepartment2.php" );
  //exit();
	if (mysqli_query($mysqli, $sql1)) {
    	echo " ";
	} else {
    	echo "Error@: " . $sql1 . "<br>" . mysqli_error($mysqli);
	}





$orgid1 = mysqli_query($mysqli, "select org_id from organization where org_name = '$org_name' and org_TIN_no = '$org_TIN_no'");
	$orgid = mysqli_fetch_row($orgid1);
	if (!$orgid) {
    printf("Error1: %s\n", mysqli_error($mysqli));
    exit();
}
	
	if ($org_type == "customer") {
		$sql2 = "INSERT INTO customer VALUES ('$cust_type', '$cust_regdate', '$orgid[0]')";
		if (mysqli_query($mysqli, $sql2)) {
    	echo "New record created successfully";
	} else {
    	echo "Error2: " . $sql2 . "<br>" . mysqli_error($mysqli);
		//echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
	}
	}
	else if ($org_type == "supplier") {
		$sql2 = "INSERT INTO supplier VALUES ('$sup_accno', '$sup_type', '$orgid[0]')";
		if (mysqli_query($mysqli, $sql2)) {
    	echo "New record created successfully";
	} else {
    	echo "Error3: " . $sql2 . "<br>" . mysqli_error($mysqli);
		//echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
	}
	}
	
	
		echo "<br><br>";

if ($org_type == "customer"){
	echo "<h3>Customer</h3><br>";
	$checkva2 = mysqli_query($mysqli, "select organization.org_id, org_name, concat(org_addr, ', ', org_area, ', ', org_city, ' (', org_pincode, ')'), org_phone1, org_phone2, org_email, org_fax, org_TIN_no, cust_type, cust_regdate from organization, customer where organization.org_id = customer.org_id and organization.org_id = '$orgid[0]' ");
	echo "<table id='tb1' border='2px'><tr> <th>Organization ID</th> <th>Name</th><th>Address</th><th>Phone No. 1</th><th>Phone No. 2</th><th>Email</th><th>Fax</th><th>TIN No.</th><th>Customer Type</th><th>Customer Registration Date</th></tr>";
	$row = mysqli_fetch_row($checkva2);
	echo "<tr>";
	for ($k = 0 ; $k < 10 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "</tr></table>";
	echo "<br><br>";
}
else if ($org_type == "supplier"){
	echo "<h3>Supplier</h3><br>";
	$checkva2 = mysqli_query($mysqli, "select organization.org_id, org_name, concat(org_addr, ', ', org_area, ', ', org_city, ' (', org_pincode, ')'), org_phone1, org_phone2, org_email, org_fax, org_TIN_no, sup_accno, sup_type from organization, supplier where organization.org_id = supplier.org_id and organization.org_id = '$orgid[0]' ");
	echo "<table id='tb1' border='2px'><tr> <th>Organization ID</th> <th>Name</th><th>Address</th><th>Phone No. 1</th><th>Phone No. 2</th><th>Email</th><th>Fax</th><th>TIN No.</th><th>Supplier Account No.</th><th>Supplier Type</th></tr>";
	$row = mysqli_fetch_row($checkva2);
	echo "<tr>";
	for ($k = 0 ; $k < 10 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "</tr></table>";
	echo "<br><br>";
}


}

else {
	echo "Error: Such a record already exists";
	
}

echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>
