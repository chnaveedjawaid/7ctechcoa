<?php require 'config/db.php';


class transaction_transaction_type {
     public $TableName = "transaction_type";
    
    public function transaction_transaction_type()
    {
        
    }
    
    public function Select(){
        $Sql = "SELECT * FROM ".$this->TableName." ".$Condtion;
        try
        {
            $query = $db->prepare($Sql);
            $query->execute();
            $result['err'] = false;
            $result['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);            
            
        } catch(PDOException $e)
        {
            $result['err'] = true;
            $result['msg'] = $e->getMessage();
        }
    }
    
    public function Add($TransactionName, $TransactionDescription){
        
        global $db;
        try
        {
            $Sql = 'INSERT INTO '.$this->TableName.'(Name, Description)';
            $Sql .= 'VALUES("'.$TransactionName.'","'.$TransactionDescription.'")';
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
            
        } catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function Update($TransactionName, $TransactionDescription, $TransactionTypeId){
        global $db;
        $TransactionName = trim($TransactionName);
        $TransactionDescription = trim($TransactionDescription);
        $TransactionTypeId = trim($TransactionTypeId);
        
        try{
            $Sql = "UPDATE ".$this->TableName." SET ";
            if ($TransactionName != "") {
                $Sql .= "Name = '".$TransactionName."'";
            }
            if ($TransactionDescription != "") {
                if($TransactionName == "")
                {
                    $Sql .="Description = '".$TransactionDescription."'";
                } else $Sql .=", Description = '".$TransactionDescription."'";

            }
            
            $Sql .= "WHERE Type_id=".$TransactionTypeId;        
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch (PDOException $ex) {
           return $ex->getMessage();     
        }
    }
    
    public function Delete_record($TransactionTypeId)
    {
        global $db;
        try {
             $Sql = "DELETE FROM ".$this->TableName." WHERE Type_id =".$TransactionTypeId;
             $query = $db->prepare($Sql);
             $query->execute();
             return true;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
