<?php require("dal/init.php");
$AccObj = new Account();
$res = $AccObj->Select("WHERE type_id = 1");
print_r($res);

?>