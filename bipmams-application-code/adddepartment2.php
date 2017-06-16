<?php
include_once 'includes/db_connect.php';
include_once 'addorganization.php';
//if($numval == 0)
$orgid1 = mysqli_query($mysqli, "select * from organization where org_name = '$org_name' and org_TIN_no = '$org_TIN_no' and org_phone1='$org_phone1'");
	$orgid = mysqli_fetch_row($orgid1);
	if (!$orgid) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	
	if ($org_type == "customer") {
		$sql2 = "INSERT INTO customer VALUES ('$cust_type', '$cust_regdate', '$orgid[0]')";
		if (mysqli_query($mysqli, $sql2)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
		//echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
	}
	}
	else if ($org_type == "supplier") {
		$sql2 = "INSERT INTO supplier VALUES ('$sup_accno', '$sup_type', '$orgid[0]')";
		if (mysqli_query($mysqli, $sql2)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
		//echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
	}
	}
	
	
		echo "<br><br>";

if ($org_type == "customer"){
	echo "<h3>Customer</h3><br>";
	$checkva2 = mysqli_query($mysqli, "sselect organization.org_id, org_name, concat(org_addr, ', ', org_area, ', ', org_city, ' (', org_pincode, ')'), org_phone1, org_phone2, org_email, org_fax, org_TIN_no, cust_type, cust_regdate from organization, customer where organization.org_id = customer.org_id and organization.org_id = '$orgid[0]' ");
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
	$checkva2 = mysqli_query($mysqli, "sselect organization.org_id, org_name, concat(org_addr, ', ', org_area, ', ', org_city, ' (', org_pincode, ')'), org_phone1, org_phone2, org_email, org_fax, org_TIN_no, sup_accno, sup_type from organization, supplier where organization.org_id = supplier.org_id and organization.org_id = '$orgid[0]' ");
	echo "<table id='tb1' border='2px'><tr> <th>Organization ID</th> <th>Name</th><th>Address</th><th>Phone No. 1</th><th>Phone No. 2</th><th>Email</th><th>Fax</th><th>TIN No.</th><th>Supplier Account No.</th><th>Supplier Type</th></tr>";
	$row = mysqli_fetch_row($checkva2);
	echo "<tr>";
	for ($k = 0 ; $k < 10 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "</tr></table>";
	echo "<br><br>";
}

//echo "<input type='button' value='Create New Entry' onclick='history.back(-2)'/>";	

?>