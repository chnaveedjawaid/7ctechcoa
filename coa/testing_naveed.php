<?php require("init.php");





$testObject = new account();

$app = new access_logic();

$aut_key = "a4382bffac0e9acc37b87f7ec307eb36";

$class = $_GET['class'];

$function = $_GET['function'];

$arr = json_decode($_GET['para']);

$bb = $app->call($aut_key,$class,$function,$arr);

echo $bb;

die();






























/// access logic
$app = new access_logic();
//$result = $app->CreateApplication('naveed_1', 'naveed_testing_1','12345', true); ///tested
//$result = $app->CreateUser(56,'a2ee3b08a9d57a54b7a50420f047c584','full',true);   /// tested
//$result = $app->loginUser(55,15); /// tested


/// output 
$output = new Output();
//$result = $output->ReturnOutputCUD(true,true); /// tested
//$result = $output->ReturnOutputV(true); /// tested


$applications = new applications();
//$cond = "WHERE appID=15";
//$result = $applications->Select($cond); tested
//$result = $applications->Add('Test_app_name','global testing','a2ee3b08a9d57a54b7a50420f047c584'); tested
//$result = $applications->Update('Test_app_name_updateds','global testing','2015-05-22 16:54:40', 17); tested


$result = $applications->Delete_record('17');    ////////////////  ///////////////////////////////////////////////////////   Not run



//// injection_logic

$inj= new injection_logic();
//$param = "Select";
//$result = $inj->isSqlInjection($param); /// tested


$user = new users();
//$cond = "WHERE userID_local='naveed_18'";
//$result = $user->Select($cond);   ///  tested
//$result = $user->Update('naveed_18',55,15);
//$result = $user->UpdateWithCount('naveed_18',55,15);
//$result = $user->Delete_record("naveed_18");              ///////////////////////////////////////////////////////////////// not run 
//$result = $user->countAllUsers();


$loged = new logedin();
//$cond = "WHERE userID='naveed_18'";
//$result = $loged->Select($cond);
//$result = $loged->Add('naveed_18','1432274674','50000');
//$result = $loged->Update('naveed_1_19','1432274674','50000'); ////////////////////////////////////////////////////////////not run 
//$result = $loged->Delete('naveed_1_19');


$validity = new loginvalidity();
//$result = $validity->select();
//$result = $validity->Add('5000','10');
//$result = $validity->Update('5000','10');


echo "<pre>";
print_r($result);
?>