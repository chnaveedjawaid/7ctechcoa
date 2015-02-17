<?php require("init.php");
$tr = new transaction_logic();
$Acc = new accounts_logic();
//$res = $Acc->DrCr(5, 100, 0, true);

//$Transaction = new transaction();
//$res = $Transaction->Add("1", "Testing Transaction", "2015-12-06", "10:00","glob_1");
//$Transaction->LastID();

$AllAcount = $Acc->LoadAllAcount();
//$res = $tr->PostTransection("Paid $5,000 as dividends.", "2015-02-16", "10:00:00", "1", 13, 1, 5000, "glob_1", true);
//$res = $tr->GetGeneralJournal();
//echo $res;
$res = $tr->GetGeneralJournal();
echo "<pre>";
print_r(json_decode($res));
//print_r(json_decode($res));
echo "</pre>";
?>