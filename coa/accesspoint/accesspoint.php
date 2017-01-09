<?php 
require (dirname(__DIR__).'/init.php');
//To check if user is logedin and 50000 sec has been passed, It'll be logout
	//$valCheck = new validity_Check();

//Create an application 
// @Parameter App Name
// @Parameter App Description 
// @Parameter Master Authkey
// @Return api key 
	//$app = new access_logic();
	//$bb = $app->CreateApplication($_GET["app_name"], $_GET["app_desc"],$_GET["auth_key"], true);
        ///....
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



//echo "<pre>";
//print_r($bb);
//echo "</pre>";
class accessPoint{
   var $accessLogic;
   public  function checkLogin($recivedParam){
        $auth = new authentication_logic();            
        return $auth->isLogin($recivedParam['userID'], $recivedParam['appKey'], $recivedParam['_Verbrose']);     
   }
    public function MainCall($cname, $fname, $action = NULL, $param = FALSE) {
        try{
             $recivedParam = json_decode($param,true);
            if(!$this->checkLogin($recivedParam)){
               // return "-1-Not Loged in";
            }
             $GLOBALS['userID']= $recivedParam['userID'];
        if($action == "checkLogin"){
            $auth = new authentication_logic();            
            $recivedParam = json_decode($param,TRUE);
           // return $auth->isLogin($recivedParam['userID'], $recivedParam['appKey'], $recivedParam['verb']);            
        }
        $accessLogic = new access_logic();
        
        return $accessLogic->call($cname, $fname, $param);
                
        }
        catch(Exception $e){
            return "-1";
        }
    }
    
}

?>
