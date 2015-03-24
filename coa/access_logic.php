<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class access_logic {
	public $Verbrose = true;
	private $auth_key = '54eedd81276de';
	
	// CREATE Application
    // @Parameter $appname appname
    // @Parameter $appdisc appdisc
	// @Parameter $_Verbrose Verbrose
	public function CreateApplication($appname,$appdisc,$_Verbrose){
		$Output = new Output();
	   	$str = file_get_contents('../data.json');
		$json = json_decode($str, true);
		if(md5(md5($this->auth_key)) == $json['data']['auth_key']){
			$Application = new applications();
			$appname = str_replace(' ', '_', $appname);
			$resChk = $Application->Select(" WHERE appname = '$appname'");
			if($resChk['num_rows'] > 0){
				$res['msg'] = 'App name already registered';
				$res['err'] = true;
			}else{
				$app_key = md5(md5(uniqid()));
				$res = $Application->Add($appname,$appdisc,$app_key);
			}
			return $Output->ReturnOutputV($res);
		}else{
			$result['msg'] = 'Invalid Key';
			$result['err'] = true;
			return $Output->ReturnOutputV($result);
		}
    }
	
	// CREATE User
    // @Parameter $userid_caller userid_caller
    // @Parameter $app_key app_key
	// @Parameter $appauthlevel appauthlevel
	// @Parameter $_Verbrose Verbrose
	public function CreateUser($userid_caller,$app_key,$appauthlevel,$_Verbrose){
		$Output = new Output();
		$Application = new applications();
		$App = $Application->Select("WHERE app_key='$app_key'");
		if(!empty($App['rows'])){
			$Users = new users();
			$appID = $App['rows'][0]['appID'];
			$login = $this->loginUser($userid_caller, $appID);
			if(!$login){
				$chkUser = $Users->Select(" WHERE userID_caller = '$userid_caller'");
				if($chkUser['num_rows'] > 0){
					$res['msg'] = 'User ID Already registered';
					$res['err'] = true;
				}else{
					$countUser = $Users->countAllUsers();
					$count = $countUser['rows'][0]['count']+1;
					$userID_local = $App['rows'][0]['appname'].'_'.$count;
					$res = $Users->Add($userID_local,$userid_caller,$appID,$appauthlevel);
					$login = $this->loginUser($userid_caller, $appID);
				}
			}else{
				$res = $login;
			}
			return $Output->ReturnOutputV($res);
		}else{
			$result['msg'] = 'Invalid App Key';
			$result['err'] = true;
			return $Output->ReturnOutputV($result);
		}	
    }
	
	// LOGIN User
    // @Parameter $userid_caller userid_caller
    // @Parameter $appID appID
	public function loginUser($userid_caller, $appID){
		$Output = new Output();
		$Users = new users();
		$user = $Users->Select("WHERE userID_caller='$userid_caller' AND appID='$appID'");
		if($user['num_rows'] == 1){
			$userId_local = $user['rows'][0]['userID_local'];
			$res = $Users->Update($userId_local,$userid_caller,$appID);
			$Logedin = new logedin;
			$logdin = $Logedin->Select(" WHERE userID = '$userId_local'");
			if($logdin['num_rows'] == 0){
				$loginvalidity = new loginvalidity;
				$loginVal = $loginvalidity->Select("");
				$time = time();
				$res = $Logedin->Add($userId_local,$time,$loginVal['rows'][0]['validity']);
				$Account = new account();
				$view = $Account->Create_view($userId_local);
				if($view){
					$res = true;
				}else{
					$res = false;
				}
			}else{
				$res = true;
			}
		}else{
			$res = false;
		}
		return $res;
	}
	
}