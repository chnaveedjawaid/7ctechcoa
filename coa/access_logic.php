<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class access_logic {
	public $Verbrose = true;
	private $auth_key = '54eedd81276de';
	public $test = true;
	
	// Call Functions
    // @Parameter class name 
    // @Parameter function name
	// @Parameter function parameters
	
	
	
	public function call($class,$function,$para=false)
	{
		
			
			$new_class = new $class();
			
			$res = $new_class->$function(...$para);
			
			return json_encode($res);
			
		
		
	}
		
	

	// Create application
    // @Parameter application name 
    // @Parameter application description
	// @Parameter Authentication key
	// @Parameter verbrose 	
	public function CreateApplication($appname,$appdisc,$_authkey,$_Verbrose){
		
		
		
		
        $auth_key = $_authkey;
		$Output = new Output();
	   
		if(md5(md5($this->auth_key))){
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
	
	// Create Acount
    // @Parameter $userid_caller 
    // @Parameter $appID appID
	// @Parameter Acount Name
	// @Parameter Acount discription
	// @Parameter parent id
	// @Parameter Acount type
	
	
	public function CreateAcount($userid_caller,$appID,$acountName,$acountDesc,$parentId,$acountTypeId){
		$Output = new Output();
		$Users = new users();
		$login = $this->loginUser($userid_caller, $appID);
		if(!$login){
			$result['msg'] = 'Invalid App Key';
			$result['err'] = true;
			return $result;
		}else
		{
			$acount = new account();
			echo $add_acount = $acount->Add($acountName,$acountDesc,$parentId,$acountTypeId,$userid_caller);
		}
	}
	
	
	public function CreateTransiction($userid_caller,$appID,$type_id,$disc){
		
		$Output = new Output();
		$Users = new users();
		$login = $this->loginUser($userid_caller, $appID);
		if(!$login){
			$result['msg'] = 'Invalid App Key';
			$result['err'] = true;
			return $result;
		}else
		{
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$transactions = new transaction();
			echo $add_transaction = $transactions->Add($type_id,$disc,$date,$time,$userid_caller);
			
			
			
			
		}
	}	
		
	public function Select_view($userid_caller,$appID){
		
		$Output = new Output();
		$Users = new users();
		$login = $this->loginUser($userid_caller, $appID);
		if(!$login){
			$result['msg'] = 'Invalid App Key';
			$result['err'] = true;
			return $result;
		}else
		{
			
			$acount = new account();
			$add_acount = $acount->Select();
			print_r($add_acount);
		}
		
		
	}	
	
	public function PostTransection($userid_caller,$appID,$_TransectionDescription,$_Account_id,$_Dabit, $_Verbrose)
	
	{
		
		$Output = new Output();
		$Users = new users();
		$login = $this->loginUser($userid_caller, $appID);
		if(!$login){
			$result['msg'] = 'Invalid App Key';
			$result['err'] = true;
			return $result;
		}else
		{
		 
		$_TransectionDate = date("Y-m-d");
		$_TransectionTime = date("h:i:s");
		$_CorespondingAccount_id = $_Account_id-1;
		$_TransectionType_id = 1;
		
		$Account = new accounts_logic();
        $Account->DrCr($_Account_id, $_Dabit, 00, false);
        $Account->DrCr($_CorespondingAccount_id, 00, $_Dabit, false);
		
		
        $Transaction = new transaction();
        $Transaction->Add($_TransectionType_id, $_TransectionDescription, $_TransectionDate, $_TransectionTime,$userid_caller);
        $res = $Transaction->LastID();
        $TransactionId = $res['rows']['Id'];
        $General = new general_logic();
        $General->NewTransection($TransactionId,$_Account_id, $_Dabit, 00, false);
        $result = $General->NewTransection($TransactionId,$_CorespondingAccount_id, 00, $_Dabit, false);
        $Output = new Output();
        return $Output->ReturnOutputCUD($res,$_Verbrose);
		
		}
    }
	
	
	public function GetGeneralJournal($userid_caller,$appID,$cond){
        $trans = new transaction_general_general();
        $output = new Output();
		
        $res = $trans->Select($cond);
        return $output->ReturnOutputV($res);
    }
	
	
}