<?php require 'config/db.php';

class transaction_general_general {
    public $TableName = "transaction_general_general";
    
    public function transaction_general_general()
    {
        
    }
    
    public function Select(){
        $Sql = "SELECT * FROM ".$this->TableName." ".$Condtion;
        try
        {
            $query = $db->prepare($Sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function Add($TransactionSubAccountId, $TransactionDebit, $TransactionCredit){
        
        global $db;
        try
        {
            $Sql = 'INSERT INTO '.$this->TableName.'(account_id, debit, credit)';
            $Sql .= 'VALUES("'.$TransactionSubAccountId.'","'.$TransactionDebit.'","'.$TransactionCredit.'")';
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
            
        } catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function Update($TransactionSubAccountId, $TransactionDebit, $TransactionCredit, $TransactionId){
        global $db;
        $TransactionSubAccountId = trim($TransactionSubAccountId);
        $TransactionDebit = trim($TransactionDebit);
        $TransactionCredit = trim($TransactionCredit);
        $TransactionId = trim($TransactionId);
        try{
            $Sql = "UPDATE ".$this->TableName." SET ";
            if ($TransactionSubAccountId != "") {
                $Sql .= "sub_account_id = '".$TransactionSubAccountId."'";
            }
            if ($TransactionDebit != "") {
                if($TransactionSubAccountId == "")
                {
                    $Sql .="debit = '".$TransactionDebit."'";
                } else $Sql .=", debit = '".$TransactionDebit."'";

            }
            if ($TransactionCredit != "") {
                if($TransactionSubAccountId=="" && $TransactionDebit=="")
                {
                    $Sql .= "credit = '".$TransactionCredit."'";
                } else $Sql .= ", credit = '".$TransactionCredit."'";

            }
            $Sql .= "WHERE transaction_id=".$TransactionId;        
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch (PDOException $ex) {
           return $ex->getMessage();     
        }
    }
    
    public function Delete_record($TransactionId)
    {
        global $db;
        try {
             $Sql = "DELETE FROM ".$this->TableName." WHERE transaction_id =".$TransactionId;
             $query = $db->prepare($Sql);
             $query->execute();
             return true;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    
}
