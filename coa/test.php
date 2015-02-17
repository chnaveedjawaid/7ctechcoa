<?php require("init.php");
$tr = new transaction_logic();
$Acc = new accounts_logic();
$AllAcount = $Acc->LoadAllAcount();
$res = $tr->PostTransection("Miscellaneous expenses paid during the month totaled $3,470", "2015-02-16", "10:00:00", "1", 17, 1, 3470, true);
echo "<pre>";
print_r(json_decode($AllAcount));
print_r(json_decode($res));
echo "</pre>";
?>