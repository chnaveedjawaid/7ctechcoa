<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class authentication_logic {
	public $Verbrose = true;
	
	
	public function isLogin($parm)
	{
		$userid_caller = $parm["userid_caller"];
		$app_key = $parm["app_key"];
		$Verbrose = $parm["Verbrose"];
		
		$Output = new Output();
		$Users = new users();
		$Application = new applications();
		$App = $Application->Select("WHERE app_key='$app_key'");
		if($App['num_rows'] > 0){
			$appID = $App['rows'][0]['appID'];
			$user = $Users->Select("WHERE userID_caller='$userid_caller' AND appID='$appID'");
			if($user['num_rows'] == 1){
				$userId_local = $user['rows'][0]['userID_local'];
				$Logedin = new logedin;
				$loginvalidity = new loginvalidity;
				$loginValid = $loginvalidity->Select("");
				$logdin = $Logedin->Select(" WHERE userID = '$userId_local'");
				if($logdin['num_rows'] == 1){
					$resUpd = $Users->UpdateWithCount($userId_local,$userid_caller,$appID);
					if(time() - $logdin['rows'][0]['logintime'] < $logdin['rows'][0]['validity'] && $user['rows'][0]['count'] > $loginValid['rows'][0]['calls_valid']) { 
						$delUsers = $Logedin->Delete($userId_local);
						$res['err_msg'] = 'Too many request';
					}else{
						$res = true;
					}
				}else{
					$res['err_msg'] = 'Session Expired';
				}
			}else{
				$res['err_msg'] = 'Invalid User';
			}
		}else{
			$res['err_msg'] = 'Invalid Key';
		}
		return $Output->ReturnOutputCUD($res, $Verbrose);
	}
	
}