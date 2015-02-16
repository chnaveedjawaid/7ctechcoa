<?php require("init.php");
$AccObj = new general_logic();
$res = $AccObj->NewTransection(2, 100, 0, true);
//echo $res;
echo "<pre>";
print_r(json_decode($res));
echo "</pre>";
?>