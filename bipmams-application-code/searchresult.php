<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
<?php
include_once 'includes/db_connect.php';
$catgy = $_POST["catgy"];
$squery = $_POST["squery"];
switch($catgy){
	case "none": echo "Please select a category";
				break;
				
				
				
	case "supplier":  $checkva2 = mysqli_query($mysqli, "select organization.org_id, org_name, concat(org_addr, ', ', org_area, ', ', org_city, ' (', org_pincode, ')'), org_phone1, org_phone2, org_email, org_fax, org_TIN_no, sup_accno, sup_type from organization, supplier where organization.org_id = supplier.org_id and (org_name like '%{$squery}%' or org_addr like '%{$squery}%' or org_area like '%{$squery}%' or org_city like '%{$squery}%' or org_phone1 = '{$squery}' or org_phone2 = '{$squery}' or org_email like '%{$squery}%' or org_fax = '{$squery}' or org_TIN_no = '{$squery}' or sup_accno = '{$squery}' or sup_type like '%{$squery}%')" );
	echo "<table id='tb1' border='2px'><tr> <th>Organization ID</th> <th>Name</th><th>Address</th><th>Phone No. 1</th><th>Phone No. 2</th><th>Email</th><th>Fax</th><th>TIN No.</th><th>Supplier Account No.</th><th>Supplier Type</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 10 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delorg.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='org_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updorg.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='org_id' value='$row[0]'>
<input type='submit' id='b1' value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	case "customer":  $checkva2 = mysqli_query($mysqli, "select organization.org_id, org_name, concat(org_addr, ', ', org_area, ', ', org_city, ' (', org_pincode, ')'), org_phone1, org_phone2, org_email, org_fax, org_TIN_no, cust_type, cust_regdate from organization, customer where organization.org_id = customer.org_id and (org_name like '%{$squery}%' or org_addr like '%{$squery}%' or org_area like '%{$squery}%' or org_city like '%{$squery}%' or org_phone1 = '{$squery}' or org_phone2 = '{$squery}' or org_email like '%{$squery}%' or org_fax = '{$squery}' or org_TIN_no = '{$squery}' or cust_type like '%{$squery}%')" );
	echo "<table id='tb1' border='2px'><tr> <th>Organization ID</th> <th>Name</th><th>Address</th><th>Phone No. 1</th><th>Phone No. 2</th><th>Email</th><th>Fax</th><th>TIN No.</th><th>Customer Type</th><th>Registration Date</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 10 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delorg.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='org_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updorg.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='org_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	case "product": $checkva2 = mysqli_query($mysqli, "select prod_id, prod_name, prod_catgy, prod_price, prod_desc from product where (prod_name like '%{$squery}%' or prod_catgy like '%{$squery}%' or prod_id = '{$squery}')" );
	echo "<table id='tb1' border='2px'><tr> <th>Product ID</th> <th>Name</th><th>Category</th><th>Price</th><th>Description</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 5 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delprod.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='prod_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updprod.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='prod_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	case "stock": $checkva2 = mysqli_query($mysqli, "select stk_id, stock.prod_id, product.prod_name, stk_qty, stk_regdate from stock, product where stock.prod_id = product.prod_id and (prod_name like '%{$squery}%' or prod_catgy like '%{$squery}%' or product.prod_id = '{$squery}' or stk_id = '{$squery}')" );
	echo "<table id='tb1' border='2px'><tr> <th>Stock ID</th> <th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Stock Reg. Date</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 5 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delstk.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='stk_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updstk.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='stk_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	



	
	
	case "order_": $checkva2 = mysqli_query($mysqli, "select ord_id, ord_date, ord_expdel, ord_actdel, organization.org_id, organization.org_name, product.prod_id, product.prod_name, ord_qty from order_, organization, product where order_.org_id = organization.org_id and order_.prod_id = product.prod_id and (prod_name like '%{$squery}%' or org_name like '%{$squery}%' or prod_catgy like '%{$squery}%' or order_.prod_id = '{$squery}' or ord_id = '{$squery}' or order_.org_id = '{$squery}')" );
	echo "<table id='tb1' border='2px'><tr> <th>Order ID</th> <th>Order Date</th><th>Expected Delivery Date</th><th>Actual Delivery Date</th><th>Customer Organization ID</th><th>Customer Name</th><th>Product ID</th><th>Product Name</th><th>Quantity of Order</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 9 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delord.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='ord_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updord.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='ord_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	
	case "liveord": $checkva2 = mysqli_query($mysqli, "select ord_id, ord_date, ord_expdel, ord_actdel, organization.org_id, organization.org_name, product.prod_id, product.prod_name, ord_qty from order_, organization, product where order_.org_id = organization.org_id and order_.prod_id = product.prod_id and ord_actdel IS NULL");
	echo "<table id='tb1' border='2px'><tr> <th>Order ID</th> <th>Order Date</th><th>Expected Delivery Date</th><th>Customer Organization ID</th><th>Customer Name</th><th>Product ID</th><th>Product Name</th><th>Quantity of Order</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	if (!$checkva2) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 9 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delord.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='ord_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updord.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='ord_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	
	
	case "orderpayment": $checkva2 = mysqli_query($mysqli, "select orderpayment.ord_id, porder_id, porder_mode, porder_amt, porder_date, porder_details from orderpayment, order_ where order_.ord_id = orderpayment.ord_id and (porder_id = '{$squery}' or orderpayment.ord_id = '{$squery}')");
	echo "<table id='tb1' border='2px'><tr> <th>Order ID</th> <th>Payment ID</th><th>Payment Mode</th><th>Amount</th><th>Date of Payment</th><th>Details</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	if (!$checkva2) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 6 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delordpay.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='porder_id' value='$row[1]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updordpay.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='porder_id' value='$row[1]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	
	
	case "invoice": $checkva2 = mysqli_query($mysqli, "select invoice.ord_id, invoice_id, invoice_date, invoice_totprice from invoice, order_ where order_.ord_id = invoice.ord_id and (invoice_id = '{$squery}' or invoice.ord_id = '{$squery}')");
	echo "<table id='tb1' border='2px'><tr> <th>Order ID</th> <th>Invoice ID</th><th>Invoice Date</th><th>Total Amount on Invoice</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	if (!$checkva2) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 4 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delinv.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='invoice_id' value='$row[1]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updinv.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='invoice_id' value='$row[1]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	
	case "rawmaterial": $checkva2 = mysqli_query($mysqli, "select mat_id, mat_name, mat_desc from rawmaterial where (mat_name like '%{$squery}%' or mat_id = '{$squery}')" );
	echo "<table id='tb1' border='2px'><tr> <th>Material ID</th> <th>Name</th><th>Description</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 3 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delrwmat.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='mat_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updrwmat.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='mat_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	
	case "purchaseraw": $checkva2 = mysqli_query($mysqli, "select purchaseraw.pur_id, rawmaterial.mat_id, rawmaterial.mat_name, pur_rate, pur_qty, pur_date, pur_details, organization.org_id, organization.org_name from purchaseraw, intpursup, rawmaterial, organization where purchaseraw.pur_id = intpursup.pur_id and rawmaterial.mat_id = intpursup.mat_id and organization.org_id = intpursup.org_id and (purchaseraw.pur_id = '{$squery}' or mat_name like '%{$squery}%' or org_name like '%{$squery}%' or organization.org_id = '{$squery}' or rawmaterial.mat_id = '{$squery}')");
	echo "<table id='tb1' border='2px'><tr> <th>Purchase ID</th><th>Material ID</th><th>Material Name</th><th>Unit Rate</th><th>Quantity</th><th>Date of Purchase</th><th>Details</th><th>Supplier ID</th><th>Supplier Name</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 9 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delrawpur.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='pur_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updrawpur.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='pur_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	
	case "department": $checkva2 = mysqli_query($mysqli, "select dept_id, dept_name, dept_intercom from department where dept_name like '%{$squery}%' or dept_id = '{$squery}' or dept_intercom = '{$squery}'" );
	echo "<table id='tb1' border='2px'><tr> <th>Department ID</th> <th>Department Name</th><th>Intercom No.</th></tr>";
	if (!$checkva2) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	//$row = mysqli_fetch_row($checkva2);
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 3 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='deldept.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='dept_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='upddept.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='dept_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	
	case "employee":  $checkva2 = mysqli_query($mysqli, "select emp_id, emp_name, concat(emp_addr, ', ', emp_area, ', ', emp_city, ' (', emp_pincode, ')'), emp_phno1, emp_phno2, emp_accno, emp_jobtitle, emp_dob, department.dept_id, department.dept_name, sal_jobcat from employee, department where department.dept_id = employee.dept_id and (emp_name like '%{$squery}%' or emp_addr like '%{$squery}%' or emp_area like '%{$squery}%' or emp_city like '%{$squery}%' or emp_phno1 = '{$squery}' or emp_phno2 = '{$squery}' or emp_jobtitle like '%{$squery}%' or sal_jobcat = '{$squery}' or department.dept_id = '{$squery}' )" );
	echo "<table id='tb1' border='2px'><tr> <th>Employee ID</th> <th>Name</th><th>Address</th><th>Phone No. 1</th><th>Phone No. 2</th><th>Account No.</th><th>Job Title</th><th>Date of Birth</th><th>Department ID</th><th>Department Name</th><th>Job Category</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	if (!$checkva2) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 11 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delemp.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='emp_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updemp.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='emp_id' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
	
	
	
	case "salary": $checkva2 = mysqli_query($mysqli, "select sal_jobcat, sal_basic, sal_da, sal_hra, sal_basic + sal_da*sal_basic/100 + sal_hra*sal_basic/100, sal_details from salary where sal_jobcat like '%{$squery}%'" );
	echo "<table id='tb1' border='2px'><tr> <th>Job Category</th> <th>Basic Salary</th><th>Dearness Allowance</th><th>House Rent Allowance</th><th>Total Salary</th><th>Details</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	if (!$checkva2) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 6 ; ++$k)
	echo "<td>$row[$k]</td>";
	echo "<td><form action='delsal.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='sal_jobcat' value='$row[0]'>
<input type='submit' id='b1' 
 value='DELETE RECORD'></form></td>";
echo "<td><form action='updsal.php' method='post'>
<input type='hidden' name='update' value='yes'>
<input type='hidden' name='sal_jobcat' value='$row[0]'>
<input type='submit' id='b1' 
 value='UPDATE RECORD'></form></td>";
	echo "</tr>";
	}
	echo "</table>";
	break;
	
}
	
	
	
	


?>