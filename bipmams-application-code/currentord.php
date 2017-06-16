<?php
include_once 'includes/db_connect.php';

$checkva2 = mysqli_query($mysqli, "select ord_id, ord_expdel from order_ where ord_actdel IS NULL");
	echo "<table id='tb1'><tr> <th>Order ID | </th> <th>Exp. Del.</th></tr>";
	//$row = mysqli_fetch_row($checkva2);
	if (!$checkva2) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
	while($row = mysqli_fetch_array($checkva2, MYSQLI_NUM))
	{echo "<tr>";
	for ($k = 0 ; $k < 2 ; ++$k)
	echo "<td>$row[$k]</td>";
    echo "</table>";
	}
	?>