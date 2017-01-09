<?php //require 'dal/account.php';

class accounts_logic {
    public $Verbrose = true;
    
    
    public function CreateAccount($parm){
        
        $AccountName = $parm["AccountName"];
		$AccountDescription = $parm["AccountDescription"];
		$Account_Parent_id = $parm["Account_Parent_id"];
		$AccountTypeId = $parm["AccountTypeId"];
		$_Verbrose = $parm["_Verbrose"];
		$output = new Output();
        $this->Verbrose = $_Verbrose;
        $arr = array();
        $Account = new account();
        $result = $Account->Add($AccountName, $AccountDescription, $Account_Parent_id, $AccountTypeId);
        return $output->ReturnOutputCUD($result,$_Verbrose);
    }
    
    public function LoadAllAcountFormated($parm){
	$_Verbrose = $parm["_Verbrose"];
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
    
    public function LoadAcount($parm){
		$condition = $parm["condition"];
        $output = new Output();
        $Account = new account();
        $result = $Account->Select("Where id = $condition");
        return $output->ReturnOutputV($result);
    }
    
    public function UpdateAcout($parm){
		$AccountName = $parm["AccountName"];
		$AccountDescription = $parm["AccountDescription"];
		$AccountTypeId = $parm["AccountTypeId"];
		$Account_Parent_id = $parm["Account_Parent_id"];
		$AccountId = $parm["AccountId"];
		$_Verbrose = $parm["_Verbrose"];
        $Account = new account();
        $this->Verbrose = $_Verbrose;
        $output = new Output();
        $result = $Account->Update($AccountName, $AccountDescription, $AccountTypeId, $Account_Parent_id, $AccountId);
        return $output->ReturnOutputCUD($result,$_Verbrose);
    }
    
    public function Select_Drcr($parm){
		$Account_id = $parm["Account_id"];
        $Account = new account();
        $output = new Output();
        $result = $Account->Select_Drcr($Account_id);
        $output->ReturnOutputV($result);
    }
    
    public function DrCr($parm){
		$Account_id = $parm["Account_id"];
		$Dr = $parm["Dr"];
		$Cr = $parm["Cr"];
		$_Verbrose = $parm["_Verbrose"];
         $output = new Output();
         $this->Verbrose = $_Verbrose;
         $Account = new account();
         $result = $Account->Insert_Drcr($Account_id, $Dr, $Cr);
         return $output->ReturnOutputCUD($result,$_Verbrose);
    }
    
}
