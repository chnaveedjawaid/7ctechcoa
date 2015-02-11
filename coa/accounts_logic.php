<?php //require 'dal/account.php';

class accounts_logic {
    public $Verbrose = true;
    
    
    public function CreateAccount($AccountName, $AccountDescription, $Account_Parent_id, $AccountTypeId,$_Verbrose){
         $output = new Output();
        $this->Verbrose = $_Verbrose;
        $arr = array();
        $Account = new account();
        $result = $Account->Add($AccountName, $AccountDescription, $Account_Parent_id, $AccountTypeId);
        return $output->ReturnOutputCUD($result,$_Verbrose);
    }
    
    public function LoadAllAcountFormated($_Verbrose){
        $output = new Output();
        $this->Verbrose = $_Verbrose;
        $Account = new account();
        $result = $Account->SelectFormated("");
        return $output->ReturnOutputV($result);
    }
    
    public function LoadAllAcount(){
        $output = new Output();
        $Account = new account();
        $result = $Account->Select("");
        return $output->ReturnOutputV($result);
    }
    
    public function LoadAcount($condition){
        $output = new Output();
        $Account = new account();
        $result = $Account->Select("Where id = $condition");
        return $output->ReturnOutputV($result);
    }
    
    public function UpdateAcout($AccountName, $AccountDescription, $AccountTypeId, $Account_Parent_id, $AccountId, $_Verbrose){
        $Account = new account();
        $this->Verbrose = $_Verbrose;
        $output = new Output();
        $result = $Account->Update($AccountName, $AccountDescription, $AccountTypeId, $Account_Parent_id, $AccountId);
        return $output->ReturnOutputCUD($result,$_Verbrose);
    }
    
    public function Select_Drcr($Account_id){
        $Account = new account();
        $output = new Output();
        $result = $Account->Select_Drcr($Account_id);
        $output->ReturnOutputV($result);
    }
    
    public function DrCr($Account_id, $Dr, $Cr, $_Verbrose){
         $output = new Output();
         $this->Verbrose = $_Verbrose;
         $Account = new account();
         $result = $Account->Insert_Drcr($Account_id, $Dr, $Cr);
         return $output->ReturnOutputCUD($result,$_Verbrose);
    }
    
}
