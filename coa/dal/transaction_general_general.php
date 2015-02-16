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
            $arr['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
            $arr['err'] = false;
        } catch(PDOException $e){
            $arr['err'] = true;
            $arr['msg'] = $e->getMessage();
        }
        return $arr;
    }
    
    public function Add($TransactionSubAccountId, $TransactionDebit, $TransactionCredit){
        
        global $db;
        try
        {
            $Sql = 'INSERT INTO '.$this->TableName.'(Account_id, Debit, Credit)';
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
                $Sql .= "Account_id = '".$TransactionSubAccountId."'";
            }
            if ($TransactionDebit != "") {
                if($TransactionSubAccountId == "")
                {
                    $Sql .="Debit = '".$TransactionDebit."'";
                } else $Sql .=", Debit = '".$TransactionDebit."'";

            }
            if ($TransactionCredit != "") {
                if($TransactionSubAccountId=="" && $TransactionDebit=="")
                {
                    $Sql .= "Credit = '".$TransactionCredit."'";
                } else $Sql .= ", Credit = '".$TransactionCredit."'";

            }
            $Sql .= "WHERE Transaction_id=".$TransactionId;        
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
             $Sql = "DELETE FROM ".$this->TableName." WHERE Transaction_id =".$TransactionId;
             $query = $db->prepare($Sql);
             $query->execute();
             return true;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    
}
