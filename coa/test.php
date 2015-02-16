<?php require("init.php");
//$AccObj = new general_logic();
$Chart = new chart_logic();
//$res = $AccObj->NewTransection(2, 100, 0, true);
$chr = $Chart->SelectChart();

echo "<pre>";
//print_r(json_decode($res));
print_r(json_decode($chr));
echo "</pre>";
?>