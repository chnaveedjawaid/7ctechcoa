<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of transaction_logic
 *
 * @author Faizan
 */
class transaction_logic {
    ////long
    
    public function PostTransection_($_TransectionDescription, $_TransectionDate, $_TransectionTime, $_TransectionType_id, $_Account_id, $_CorespondingAccount_id, $_Dabit,$UserId, $_Verbrose){
        $Account = new accounts_logic();
        $Account->DrCr($_Account_id, $_Dabit, 00, false);
        $Account->DrCr($_CorespondingAccount_id, 00, $_Dabit, false);
        $Transaction = new transaction();
        $Transaction->Add($_TransectionType_id, $_TransectionDescription, $_TransectionDate, $_TransectionTime,$UserId);
        $res = $Transaction->LastID();
        $TransactionId = $res['rows']['Id'];
        $General = new general_logic();
        $General->NewTransection($TransactionId,$_Account_id, $_Dabit, 00, false);
        $result = $General->NewTransection($TransactionId,$_CorespondingAccount_id, 00, $_Dabit, false);
        $Output = new Output();
        return $Output->ReturnOutputCUD($res,$_Verbrose);
    }
    
    public function GetGeneralJournal_(){
        $trans = new transaction_general_general();
        $output = new Output();
        $res = $trans->SelectFormatted();
        return $output->ReturnOutputV($res);
    }
    ////long
    public function PostTransection($parm)
	{       
		$_TransectionDescription = $parm["_TransectionDescription"];
		$_TransectionDate = $parm["_TransectionDate"];
		$_TransectionTime = $parm["_TransectionTime"];
		$_TransectionType_id = $parm["_TransectionType_id"];
		$_Account_id = $parm["_Account_id"];
		$_CorespondingAccount_id = $parm["_CorespondingAccount_id"];
		$_Dabit = $parm["_Dabit"];
		$UserId = $GLOBALS['userID'];
		$_Verbrose = $parm["_Verbrose"];		
        $Account = new accounts_logic();        
        $Account->DrCr_($_Account_id, $_Dabit, 00, false);
        $Account->DrCr_($_CorespondingAccount_id, 00, $_Dabit, false);
        $Transaction = new transaction();
        $Transaction->Add($_TransectionType_id, $_TransectionDescription, $_TransectionDate, $_TransectionTime,$UserId);
        $res = $Transaction->LastID();      
        $TransactionId = $res['rows']['Id'];
        $General = new general_logic();
        $General->NewTransection_($TransactionId,$_Account_id, $_Dabit, 00, false);
        $General->NewTransection_($TransactionId,$_CorespondingAccount_id, 00, $_Dabit, false);
        $Output = new Output();       
        return $Output->ReturnOutputCUD($res,$_Verbrose);
    }
    
    public function GetGeneralJournal(){
        $trans = new transaction_general_general();
        $output = new Output();
        $res = $trans->SelectFormatted();
        return $output->ReturnOutputV($res);
    }
}
