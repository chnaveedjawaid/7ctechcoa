<?php require 'dal/account.php';

class accounts_logic {
    public $Responce;
    public $Verbrose = true;
    
    public function CreateAccount($AccountName, $AccountDescription, $Account_Parent_id, $AccountTypeId,$_Verbrose){
        
        $this->Verbrose = $_Verbrose;
        $arr = array();
        $Account = new account();
        $result = $Account->Add($AccountName, $AccountDescription, $Account_Parent_id, $AccountTypeId);
        if($result == true){
            $arr['resoult'] = 'Process completed successfuly';
            $arr['msg'] = true;
        } else {
            $arr['resoult'] = 'Process failed';
            $arr['msg'] = false;
            $arr['err_msg'] = $result;
        }
        return json_encode($arr);
    }
    
    public function LoadAllAcountFormated($_Verbrose){
        $this->Verbrose = $_Verbrose;
        $Account = new account();
        $result = $Account->Select("");
    }
    
}
