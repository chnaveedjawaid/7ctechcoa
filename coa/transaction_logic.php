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
    
    public function PostTransection($_TransectionDescription, $_TransectionDate, $_TransectionTime, $_TransectionType_id, $_Account_id, $_CorespondingAccount_id, $_Dabit, $_Verbrose){
        $Account = new accounts_logic();
        $Account->DrCr($_Account_id, $_Dabit, 00, false);
        $Account->DrCr($_CorespondingAccount_id, 00, $_Dabit, false);
        $General = new general_logic();
        $General->NewTransection($_Account_id, $_Dabit, 00, false);
        $General->NewTransection($_CorespondingAccount_id, 00, $_Dabit, false);
        $Transaction = new transaction();
        $Transaction->Add($_TransectionType_id, $_TransectionDescription, $_TransectionDate, $_TransectionTime);
        $result = $Transaction->LastID();
        $Output = new Output();
        return $Output->ReturnOutputV($result);
    }
    
    public function GetGeneralJournal(){
        $trans = new transaction_general_general();
        $output = new Output();
        $res = $trans->SelectFormatted();
        return $output->ReturnOutputV($res);
    }
}
