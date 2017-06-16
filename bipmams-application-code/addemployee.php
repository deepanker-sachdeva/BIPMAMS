<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">

<?php
include_once 'includes/db_connect.php';
$emp_name = $_POST["emp_name"];
$emp_addr = $_POST["emp_addr"];
$emp_area = $_POST["emp_area"];
$emp_city = $_POST["emp_city"];
$emp_pincode = $_POST["emp_pincode"];
$emp_phno1 = $_POST["emp_phno1"];
$emp_phno2 = $_POST["emp_phno2"];

$dept_id = $_POST["dept_id"];
$sal_jobcat = $_POST["sal_jobcat"];

$emp_dob = new DateTime($_POST["emp_dob"]);
$emp_dob = $emp_dob->format('Y-m-d');
$emp_accno = $_POST["emp_accno"];
$emp_jobtitle = $_POST["emp_jobtitle"];
$checktp = $_POST["checktp"];
$w_govtid = $_POST["w_govtid"];
$w_bonus = $_POST["w_bonus"];
$w_insurance = $_POST["w_insurance"];
$m_panno = $_POST["m_panno"];
$m_bonus = $_POST["m_bonus"];
$m_insurance = $_POST["m_insurance"];

//echo $dept_id;

$checkval = mysqli_query($mysqli, "select emp_id from employee where emp_name = '$emp_name' and emp_dob = '$emp_dob'");
$numval = mysqli_num_rows($checkval);
//echo $numval;

if ($numval == 0)
{
	$sql1 = "INSERT INTO employee VALUES (NULL, '$emp_name', '$emp_accno', '$emp_jobtitle', '$emp_phno1', '$emp_phno2', '$emp_dob',  '$emp_addr', '$emp_area', '$emp_city', '$emp_pincode', '$dept_id', '$sal_jobcat')";
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
$checkva2 = mysqli_query($mysqli, "select * from employee where emp_name = '$emp_name' and emp_dob = '$emp_dob'");
echo "<table id='tb1' border='2px'><tr> <th>Employee ID</th> <th>Name</th><th>Account No.</th><th>Job Title</th><th>Phone No. 1</th><th>Phone No. 2</th><th>Date of Birth</th><th>Street Address</th><th>Area</th><th>City</th><th>Pincode</th><th>Department ID</th><th>Job Category</th></tr>";
$row = mysqli_fetch_row($checkva2);
echo "<tr>";
for ($k = 0 ; $k < 13 ; ++$k)
echo "<td>$row[$k]</td>";
echo "</tr></table>";
echo "<br><br>";



if ($checktp == 'manufworker')
{
	$sql2 = "INSERT INTO manufworker VALUES ('$w_govtid', '$w_bonus', '$w_insurance', '$row[0]')";
  if (mysqli_query($mysqli, $sql2)) {
    	echo "";
	} else {
    	echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
	}
	echo "<table id='tb1' border='2px'><tr> <th>Government issued ID</th> <th>Annual Bonus</th><th>Insurance Details</th></tr>";
	$checkva3="select w_govtid, w_bonus, w_insurance from manufworker where emp_id='$row[0]'";
	$row1 = mysqli_fetch_row($checkva3);
echo "<tr>";
for ($k = 0 ; $k < 3 ; ++$k)
echo "<td>$row1[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
}

else if ($checktp == 'management')
{
	$sql2 = "INSERT INTO management VALUES ('$m_panno', '$m_bonus', '$m_insurance', '$row[0]')";
  if (mysqli_query($mysqli, $sql2)) {
    	echo "";
	} else {
    	echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
	}
	echo "<table id='tb1' border='2px'><tr> <th>PAN Number</th> <th>Annual Bonus</th><th>Insurance Details</th></tr>";
	$checkva3="select m_panno, m_bonus, m_insurance from management where emp_id='$row[0]'";
	$row1 = mysqli_fetch_row($checkva3);
echo "<tr>";
for ($k = 0 ; $k < 3 ; ++$k)
echo "<td>$row1[$k]</td>";
echo "</tr></table>";
echo "<br><br>";
	
}


echo "<input type='button' value='Create New Entry' id='b1' onclick='history.back(-1)'/>";
?>
