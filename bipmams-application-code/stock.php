<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Stock</h1>
<form id="f2" action="addstock.php" method="post">

<div id="d6" align="center">
<table id='tb1'>
<tr>	<td>Product</td>	<td><select name="prod_id">
								<?php include_once 'includes/db_connect.php';
								$query="select prod_id, prod_name from product";
                                $insertval=mysqli_query($mysqli, $query);
                                while($row = mysqli_fetch_row($insertval)){
                                echo "<option value='$row[0]'>$row[1]</option>";}
                                ?>
                                </select></td>	</tr>
<tr>	<td>Quantity</td>	<td><input type="number" id="in1" name="stk_qty"></td>		</tr>
<tr>	<td>Date of Entry</td>	<td><input type="date" name="stk_regdate"></td>	</tr>
</table>
</div>
<br><br>
<div align="center">
  <table id='tb1'>
    <tr>
      <td><input type="submit" id="b1" value="Submit"  align="middle"></td>
      <td><input type="reset" id="b1"></td>
    </tr>
  </table>
</div>

</form>
</body>
</html>
