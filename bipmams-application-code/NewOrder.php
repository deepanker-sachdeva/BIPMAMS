<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>New Order</h1>
<form id="f9" action="addneworder.php" method="post">
<div id="d13" align='center'>
<table id='tb1'>
<tr>	<td>Order Date</td>		<td><input type="date" id="in2" name="ord_date" required></td>	</tr>
<tr>	<td>Expected Delivery Date</td>		<td><input type="date" id="in3" name="ord_expdel"></td>	</tr>
<tr>	<td>Quantity Ordered</td>		<td><input type="number" id="in4" required min="1" name="ord_qty"></td>		<td><sub>unit</sub></td></tr>	
<tr>	<td>Customer</td>	<td><select name="org_id" required><?php include_once 'includes/db_connect.php';
											 $checkva2 = mysqli_query($mysqli, "select organization.org_id, org_name from organization, customer where organization.org_id = customer.org_id");
                                             while($row = mysqli_fetch_row($checkva2)){
                                             echo "<option value='$row[0]'>$row[1]</option>";}
                                             ?></select></td>	</tr>
<tr>	<td>Product</td>	<td><select name="prod_id" required><?php include_once 'includes/db_connect.php';
											 $checkva2 = mysqli_query($mysqli, "select prod_id, prod_name from product");
                                             while($row = mysqli_fetch_row($checkva2)){
                                             echo "<option value='$row[0]'>$row[1]</option>";}
                                             ?></select></td>	</tr>
</table>
</div>
<br><br>
<div align="center">
  <table id='tb1'>
    <tr>
      <td><input type="submit"  value="Submit" align="middle" id='b1'></td>
      <td><input type="reset" id="b1"></td>
    </tr>
  </table>
</div>
</form>


</body>
</html>
