<?php 
require (dirname(__DIR__).'/config/db.php');;

class transaction_general_general {
    public $TableName = "transaction_general_general";
    
    public function transaction_general_general()
    {
        
    }
    
    // GET A SPECIFIC Transaction GG OR ALL Transaction GG
    // @Parameter $condition 
    public function Select($parm){
		$condition = $parm["condition"];
        global $db;
        $Sql = "SELECT * FROM ".$this->TableName." ".$condition;
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
    
    // GET Transactions GG With Account Information
    public function SelectFormatted(){
        global $db;
        $result = array();
        $sql = "SELECT a.`Transaction_id` , a.`Account_id` , b.`Name` , a.`Debit` , a.`Credit`  FROM `transaction_general_general` a LEFT JOIN account b ON a.`Account_id` = b.`Id`";
        try
        {
            $query = $db->prepare($sql);
            $query->execute();
            if($query->rowCount()>0)
            {
                $result['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
                $result['err'] = false;
            } else 
            {
                $result['err'] = true;
                $result['msg'] = "No Record Available";
            }            
        } catch (PDOException $ex) {
             $result['err'] = true;
             $result['msg'] = $ex->getMessage();
        }
        return $result;         
    }
    
    // INSERT TRANSACTION
    // @Parameter $TransactionId
    // @Parameter $TransactionSubAccountId
    // @Parameter $TransactionDebit
    // @Parameter $TransactionCredit
    public function Add($parm){ 
		$TransactionId = $parm["TransactionId"];
		$TransactionSubAccountId = $parm["TransactionSubAccountId"];
		$TransactionDebit = $parm["TransactionDebit"];
		$TransactionCredit = $parm["TransactionCredit"];     
        global $db;
        try
        {
            $Sql  = 'INSERT INTO '.$this->TableName.'(Transaction_id,Account_id, Debit, Credit)';
            $Sql .= 'VALUES("'.$TransactionId.'","'.$TransactionSubAccountId.'","'.$TransactionDebit.'","'.$TransactionCredit.'")';
            $query = $db->prepare($Sql);
            $query->execute();
            return true;            
        } catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
    // UPDATE TRANSACTION
    // @Parameter $TransactionSubAccountId
    // @Parameter $TransactionDebit
    // @Parameter $TransactionCredit
    // @Parameter $TransactionId
    public function Update($parm){
		$TransactionSubAccountId = $parm["TransactionSubAccountId"];
		$TransactionDebit = $parm["TransactionDebit"];
		$TransactionCredit = $parm["TransactionCredit"];
		$TransactionId = $parm["TransactionId"];
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
    
    //DELETE TRANSACTION
    //@Parameter $TransactionId
    public function Delete_record($parm){
		$TransactionId = $parm["TransactionId"];
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
