<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Raw Material Purchase</h1>
<form id="f5" action="addrawpurchase.php" method="post">
<div id="d9" align="center">
<table id='tb1'>
<tr>	<td width="51">Date</td>	<td width="144"><input type="date" id="in1" name="pur_date" required></td>	</tr>
<tr>	<td>Quantity</td>	<td colspan="2"><input type="number" id="in2" name="pur_qty"><sub> unit</sub></td>	</tr>
<tr>	<td>Rate</td>	<td width="69" colspan="2"><input type="number" id="in3" name="pur_rate" required><sub> ₹/unit</sub></td></tr>
<tr>	<td>Details</td>	<td colspan="2"><input type="text" id="in4" size="35" name="pur_details"></td></tr><tr><td width="91">Raw Material</td><td width="144"><select name="mat_id" required><?php include_once 'includes/db_connect.php';
											 $checkva2 = mysqli_query($mysqli, "select mat_id, mat_name from rawmaterial");
                                             while($row = mysqli_fetch_row($checkva2)){
                                             echo "<option value='$row[0]'>$row[1]</option>";}
                                             ?></select></td></tr><tr><td width="91">Supplier</td><td width="144"><select name="org_id" required><?php include_once 'includes/db_connect.php';
											 $checkva2 = mysqli_query($mysqli, "select organization.org_id, org_name from organization, supplier where organization.org_id = supplier.org_id");
                                             while($row = mysqli_fetch_row($checkva2)){
                                             echo "<option value='$row[0]'>$row[1]</option>";}
                                             ?></select></td></tr>
</table>
</div>
<br><br>
<div align="center">
  <table id='tb1'>
    <tr>
      <td><input type="submit" id="b1" value="Submit" align="middle"></td>
      <td><input type="reset" id="b1"></td>
    </tr>
  </table>
</div>
</form>

</body>
</html>

