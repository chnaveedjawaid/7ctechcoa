<?php require("class/init.php");
$AccObj = new Account();
$res = $AccObj->Select();
print_r($res);

?>