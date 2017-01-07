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
	
	// CREATE Application
    // @Parameter $appname appname
    // @Parameter $appdisc appdisc
	// @Parameter $_Verbrose Verbrose
	
	
	
	public function call($class,$function,$para=false)
	{
		
			
			$new_class = new $class();
			
			$res = $new_class->$function($para);
			
			return json_encode($res);
			
		
		
	}
		
		
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
	
	public function CreateAcount($userid_caller,$appID,$acountName,$acountDesc,$parentId,$acountTypeId,$isType=false){
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
			if($isType==""){
				
				echo $add_acount = $acount->Add($acountName,$acountDesc,$parentId,$acountTypeId,$userid_caller,$acountTypeId);
				
			}
			else
			echo $add_acount = $acount->Add($acountName,$acountDesc,$parentId,$acountTypeId,$userid_caller,$isType);
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
	
	public function incomeStatement($id){
		$acount = new account();
		$total_revenue = "";
		$total_expense = "";
		$new_debt="";
		$new_cred = "";
		$rev_cond = "WHERE User_id='".$id."' AND Chart_id=5 AND Is_type=5";
		$val = $acount->Select($rev_cond);
                
		$exp_cond = "WHERE User_id='".$id."' AND Chart_id=2 AND Is_type=2";
		$exp = $acount->Select($exp_cond);
		$rev = $this->get_revenue($val);
		$data['all_data_rev'] = $rev;
		//print_r($rev);
		//print_r($exp);
		
		$tot_exp = $this->get_expense($exp);
		$data['all_data_exp'] = $tot_exp;
		
		$data['all_total'] = $rev['total']-$tot_exp['total'];
		return $data;
		
		
		
		
		
		
	}
	
	
	
	public function get_revenue($rev_n){
		
		$Type = new type();
		$trans  = new transaction_general_general();
		$Transaction = new transaction();
                $Account =  new account();
		$rev_num = count($rev_n['rows']);
		$new_debt="";
		$new_cred = "";
		$group = 1;
                print_r($rev_n['rows']);
		if($rev_num>0)
		{
			$rev['Group'] =  "<h1>Revenue Group</h1>";
			foreach($rev_n['rows'] as $val):
                          
				$res = $Account->Select("where (is_type = ".$val['Is_type'].")");
				$rev['type_name'] =  "<h3>Acount Name = ".$val['Name']."</h3>";	
                                print_r($res);
				foreach($res['rows'] as $tp):
						
						//$rev['Group_name'] =  "<h4>Group No:".$group." ".$tp['Type_name']."</h4>";	
						$where_gen = "WHERE Account_id='".$val['Id']."'";
						$res = $trans->Select($where_gen);
                                               print_r($res);
					//echo "<tr>";
					foreach($res['rows'] as $vv):
								$where_trans_id = "WHERE Id='".$vv['Transaction_id']."'";
								$res = $Transaction->Select($where_trans_id);
								if($vv['Debit']!=0){
								$rev['list_debit'] =  "<li>Debit    -------- ".$vv['Debit']."</li>";
								$new_debt +=  $vv['Debit'];
								}
								if($vv['Credit']!=0){
								$rev['list_credit'] = "<li>Credit   -------- ".$vv['Credit']."</li>";
								$new_cred +=  $vv['Credit'];}
					endforeach;	
				endforeach;			
				
				
				$rev['total_debit'] =  "<li>Total Debit = ".$rev['debit'] = $new_debt."</li>";
				$rev['total_credit'] =  "<li>Total Credit = ".$rev['credit'] = $new_cred."</li>";
				
				$rev['result'] =  "<li>Result = ".$rev['total'] =  $new_debt-$new_cred."</li>";
			$group++;	
			endforeach;
			
			return $rev;
			
		
		}
		
	}
	
	public function get_expense($exp){
		
		$Type = new type();
		$trans  = new transaction_general_general();
		$Transaction = new transaction();
		$group = 1;
                $Account =  new account();
		$new_debt="";
		$new_cred = "";
		$exp_num = count($exp['rows']);
		if($exp_num>0)
		{
			$exp['Group'] =  "<h1>Expense Group</h1>";
			foreach($exp['rows'] as $val):
				$res = $Account->Select("where (is_type = ".$val['Is_type'].")");
				$exp['type_name_exp'] = "<h3>Acount Name = ".$val['Name']."</h3>";	

				foreach($res['rows'] as $tp):
						
						//$exp['Group_name'] = "<h4>Group No:".$group." ".$tp['Type_name']."</h4>";	
						$where_gen = "WHERE Account_id='".$val['Id']."'";
						$res = $trans->Select($where_gen);
					
					foreach($res['rows'] as $vv):
					
								$where_trans_id = "WHERE Id='".$vv['Transaction_id']."'";
								$res = $Transaction->Select($where_trans_id);
					endforeach;	
						if($vv['Debit']!=0){
							$exp['list_debit_exp'] = "<li>Debit ------- ".$vv['Debit']."</li>";
							$new_debt +=  $vv['Debit'];
						
						}
						if($vv['Credit']!=0){
							$exp['list_credit'] = "<li>Credit ------ ".$vv['Credit']."</li>";
							$new_cred +=  $vv['Credit'];
						
						}
						
				endforeach;			
				
				if($new_debt==""){
					$new_debt = 0;
				}
				$exp['total_debit_exp'] = "<li>Total Debit = ".$exp['debit'] = $new_debt."</li>";
				$exp['total_credit_exp'] = "<li>Total Credit = ".$exp['credit'] = $new_cred."</li>";
				$exp['result_exp'] = "<li>Result = ".$exp['total'] =  $new_debt-$new_cred."</li>";
				$group++;
			endforeach;
			
			
			
		
			
			return $exp;
		
		}
			
	}
	
	
	public function selectType($userid_caller,$appID,$condition=false){
		
		$Output = new Output();
		$Users = new users();
		$Type = new type();
		
		$login = $this->loginUser($userid_caller, $appID);
		if(!$login){
			
			$result['msg'] = 'Invalid App Key';
			$result['err'] = true;
			return $result;
		
		}else
		
		{
			$res = $Type->Select($condition);
			return $res;
		
		}
	}
	
	public function Add($userid_caller,$appID,$type_dec,$type_name){
		
		$Output = new Output();
		$Users = new users();
		$Type = new type();
		
		$login = $this->loginUser($userid_caller, $appID);
		if(!$login){
			
			$result['msg'] = 'Invalid App Key';
			$result['err'] = true;
			return $result;
		
		}else
		
		{
			$res = $Type->Add($type_dec,$type_name);
			return $res;
		
		}
	}
	
	
}