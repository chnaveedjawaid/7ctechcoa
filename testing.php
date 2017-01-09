<?php require("coa/init.php");





$testObject = new account();

$app = new access_logic();

$aut_key = "a4382bffac0e9acc37b87f7ec307eb36";

$class = $_GET['class'];

$function = $_GET['function'];

$arr = json_decode($_GET['para']);

$bb = $app->call($aut_key,$class,$function,$arr);

echo  $ret =  json_encode($bb);
//echo json_decode($ret);
die();



