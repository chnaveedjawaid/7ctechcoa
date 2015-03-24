<?php require("../init.php");

//To check if user is logedin and 50000 sec has been passed, It'll be logout
	//$valCheck = new validity_Check();

//Create an application 
// @Parameter App Name
// @Parameter App Description 
// @Return api key 
	$app = new access_logic();
	$bb = $app->CreateApplication('tariq ali is', 'tariq app is the best', true);

//Create or Login user
// @Parameter userIDcaller
// @Parameter app_key
	//$app = new access_logic();
	//$bb = $app->CreateUser(80, '3654330402a5826100c8154122aaa6de', 'full', true);

// Check is user login
// @Parameter userIDcaller
// @Parameter app_key
	//$auth = new authentication_logic();
	//$bb = $auth->isLogin(80, '3654330402a5826100c8154122aaa6de', true);



echo "<pre>";
print_r($bb);
echo "</pre>";

?>
