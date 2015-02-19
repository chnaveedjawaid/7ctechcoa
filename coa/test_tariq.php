<?php require("init.php");

/*$accObj = new accounts_logic();
$res = $accObj->CreateAccount('Miscellaneous Expense', 'Miscellaneous Expense', 1, 2, true);
$res = $accObj->LoadAllAcount();*/

$accObj = new accounts_logic();
$res = $accObj->LoadAllAcount();

echo "<pre>";
print_r(json_decode($res));
echo "</pre>";

//public function PostTransection($_TransectionDescription, $_TransectionDate, $_TransectionTime, $_TransectionType_id, $_Account_id, $_CorespondingAccount_id, $_Dabit, $_Verbrose){
	
$genObj = new transaction_logic();
$res = $genObj->PostTransection('Provided services to its customers and received $28,500 in cash.', '2015-01-13', '12:00:00', 1, 1, 9, 28500, true);

echo "<pre>";
print_r(json_decode($res));
echo "</pre>";

?>