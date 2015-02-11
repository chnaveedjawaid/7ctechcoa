<?php require("init.php");
$AccObj = new accounts_logic();
$res = $AccObj->LoadAcount("");
//echo $res;
echo "<pre>";
print_r(json_decode($res));
echo "</pre>";
?>