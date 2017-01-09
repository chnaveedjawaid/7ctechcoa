<?php require("account.php");
require("access_logic.php");
require("Output.php");
require("applications.php");
require("injection_logic.php");
require("users.php");
$testObject = new account();


$result = $testObject->Select_Drcr(1);
$app = new access_logic();
$bb = $app->CreateApplication('naveed', 'naveed_testing','1234', true);

$user = $app->CreateUser(99,'47f59cca80e538ad9660a318d5877e5c','full',true);
print_r($user);

?>