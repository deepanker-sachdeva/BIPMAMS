<!DOCTYPE html>
<html>
<body>
<form>
<input type="date" id=1>l</form>
<?php
$date=date_create("2013-03-15");
echo date_format($date,"d M,Y H:i:s");
?>

</body>
</html>