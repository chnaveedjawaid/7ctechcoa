<?php 
require (dirname(__DIR__).'/config/db.php');


class transaction_transaction_type {
     public $TableName = "transaction_type";
    
    public function transaction_transaction_type()
    {
        
    }
    
    // GET A SPECIFIC Transaction Type OR ALL Transaction Type
    // @Parameter $condition 
    public function Select($Condtion){
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
    
    // INSERT TRANSACTION Type
    // @Parameter $TransactionName
    // @Parameter $TransactionDescription
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
    
    // UPDATE TRANSACTION Type
    // @Parameter $TransactionName
    // @Parameter $TransactionDescription
    // @Parameter $TransactionTypeId
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
    
    //DELETE TRANSACTION TYPE
    //@Parameter $TransactionTypeId
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
