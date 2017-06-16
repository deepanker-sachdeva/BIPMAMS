

<!doctype html>
<html>
<head>
<link href="css/button.css" rel="stylesheet" type="text/css"> <link href="css/tab.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<form method="post" action="searchresult.php">
        <h2>Search</h2>
    <div align="center">

 

        <label for="searchquery">Query:</label>

        <input type="text" id="squery" name="squery" value="" placeholder="Enter search query here..." autofocus />
		<br><br>
        <label for="tablename">Search in: </label>

        <select id="tablename" name="catgy">
        	<option value="none">Select...</option>
            <option value="customer">Customer</option>
            <option value="supplier">Supplier</option>
            <option value="product">Product</option>
            <option value="stock">Stock</option>
            <option value="order_">Order</option>
            <option value="liveord">LIVE ORDERS</option>
            <option value="orderpayment">Order Payments</option>
            <option value="invoice">Invoice</option>
            <option value="rawmaterial">Raw Materials</option>
            <option value="purchaseraw">Purchase of Raw Materials</option>
            <option value="department">Departments</option>
            <option value="employee">Employees</option>
            <option value="salary">Salary Grades</option>
        </select>

    </div>
    <div>

    <div align="center">
		<br>
        <input type="submit" value="Search" id='b1' id="submit" />

    </div>

</form>


<body>
</body>
</html>