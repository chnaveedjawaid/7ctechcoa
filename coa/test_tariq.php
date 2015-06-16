<?php require("init.php");

//To check if user is logedin and 50000 sec has been passed, It'll be logout
	//$valCheck = new validity_Check();

//Create an application 
//Return api key 
	//$app = new access_logic();
	//$bb = $app->CreateApplication('tiekapp2', 'testing application', true);

//Create or Login user
// @Parameter userIDcaller
// @Parameter app_key
	$app = new access_logic();
	$bb = $app->CreateUser(46, '65a1fede9361f46ee87d4542bab2c1ce', 'full', true);

// Check is user login
// @Parameter userIDcaller
// @Parameter app_key
	//$auth = new authentication_logic();
	//$bb = $auth->isLogin(46, '65a1fede9361f46ee87d4542bab2c1ce', true);



echo "<pre>" . print_r($bb) . "</pre>";

?> 