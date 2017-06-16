<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <form method="post" action="">
    <div>

        <h2>Search</h2> 

        <label for="searchquery">Query:</label>

        <input type="text" id="query" name="query" value="" placeholder="Enter search query here..." required="required" autofocus />
		<br><br>
        <label for="tablename">Search in: </label>

        <select id="tablename" name="tablename">
        	<option value="none">Select...</option>
            <option value="organization">Customer/Supplier</option>
            <option value="product">Product</option>
            <option value="order_">Order</option>
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

    <div>
		<br>
        <input type="submit" value="Search" id="submit" />

    </div>

</form>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>