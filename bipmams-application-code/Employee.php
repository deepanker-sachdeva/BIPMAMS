<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="js/emp.js"></script>
<link href="../css/emporg.css" rel="stylesheet" />
<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
</head>
<link rel="stylesheet" type="text/css" href="css/color.css" />
<body>
<div class="wrapper">
<div class="container">

<h1>Employee</h1>
<form id="f12" action="addemployee.php" method="post">


<div style="width:680px;float:left;height:350px">

<div id="d16">
<table id='tb1'>
<tr>	<td width="100">Name</td>	<td width="144"><input type="text" id="in1" name="emp_name" required></td></tr>
<tr>	<td>Job Title</td>	<td colspan="3"><input type="text" id="in2" name="emp_jobtitle" required></td><td width="91">Department</td><td width="144"><select name="dept_id" required><?php include_once 'includes/db_connect.php';
											 $checkva2 = mysqli_query($mysqli, "select dept_id, dept_name from department");
                                             while($row = mysqli_fetch_row($checkva2)){
                                             echo "<option value='$row[0]'>$row[1]</option>";}
                                             ?></select></td></tr>
<tr>	<td>Account No.</td>	<td colspan="2"><input type="number" id="in3" name="emp_accno" required></td><td width="48" id="s1"></td> <td>Job Category</td><td><select name="sal_jobcat"><?php include_once 'includes/db_connect.php';
											 $checkva2 = mysqli_query($mysqli, "select sal_jobcat from salary");
                                             while($row = mysqli_fetch_row($checkva2)){
                                             echo "<option value='$row[0]'>$row[0]</option>";}
                                             ?></select></td>	</tr>
<tr align="right">	<td></td><td colspan="3"><sup id="x"></sup></td>	</tr>
<tr>	<td>Phone No.-1</td>	<td colspan="2"><input type="number" id="in4" name="emp_phno1" required></td><td id="s2"></td>	<td>Phone No.-2</td>	<td><input type="number" id="in5" name="emp_phno2"></td><td width="58" id="s3"></td></tr>
<tr>	<td>Date of Birth</td>	<td><input type="date" id="in6" name="emp_dob" required></td>	</tr>
</table>
</div>
<div id="d17" name="address">

<fieldset>
<legend>Address</legend>	
<table id='tb1'>
<tr>	<td>Address Line</td> <td colspan="3"><textarea type="text" rows="3" cols="40" name="emp_addr"></textarea></td></td>	</tr>	
<tr>	<td>Area</td>		<td><input type="text" id="in8" name="emp_area"></td>	<td>City</td>	<td><input type="text" id="in9" name="emp_city" required></td>	</tr>
<tr>	<td>Pin-Code</td>	<td><input type="number" id="in10" name="emp_pincode" required></td><td id="s4"></td>	</tr>
</table>
</fieldset>

</div>

</div>
<div style="padding:10px;width:400px;float:left;height:auto" id="d18">
<table id='tb1'><tr>	<td>Type:</td><td><input type="radio" id="in11" name="checktp" value="manufworker" checked onClick="hideshow(document.getElementById('d19'),document.getElementById('d20'),'d20','d19')"></td>	<td>Manufacturing Worker</td>	<td>&nbsp;</td><td><input type="radio" id="in12" name="checktp" value="management" onClick="hideshow(document.getElementById

('d20'),document.getElementById('d19'),'d20','d19')"></td>	<td>Management</td>	</tr>
</table>
</div>

<div style="padding:10px;width:450px;float:left;height:auto;display:block" id="d19">
<table id='tb1' width="377" align="center">
<tr>	<td>Govt. Id (with details)</td>	<td><input type="text" id="in13" size="30" maxlength="60" name="w_govtid" ></td>	</tr>
<tr>	<td>Bonus</td>	<td><input type="number" id="in14" name="w_bonus"></td>	</tr>
<tr>	<td>Insurance Details</td>	<td><input type="text" id="in15" maxlength="50" size="30" name="w_insurance"></td>	</tr>

</table>
</div>

<div style="padding:10px;width:450px;float:left;height:auto;display:none" id="d20">
<table id='tb1' align="center">
<tr>	<td width="103">PAN No.</td>	<td width="148"><input type="text" id="in16" name="m_panno" ></td><td width="102" id="s5"></td>	</tr>
<tr>	<td>Bonus</td>	<td><input type="number" id="in17" name="m_bonus"></td>	</tr>
<tr>	<td>Insurance Details</td>	<td colspan="2"><input type="text" id="in18" maxlength="50" size="30" name="m_insurance"></td>	</tr>

</table>
</div>
<div align="center" style="clear:both">
  <table id='tb1'>
    <tr>
      <td><input type="submit"  value="Submit" align="middle" id="b1" onMouseOver="return emp();" onFocus="return emp();"></td>
      <td><input type="reset" id="b1"></td>
    </tr>
  </table>
</div>
</form>
</div>
</div>
</body>
</html>
