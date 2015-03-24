<?php require '../config/db.php';

class transaction {

    public $TableName = "transaction";
    
    // GET A SPECIFIC Transaction OR ALL Transaction
    // @Parameter $Condition 
    public function Select($Condition)
    {
        global $db;
        
        if ($Condition == "") {
            $Sql = "SELECT * FROM ".$this->TableName;
        }
        else {
            $Sql = "SELECT * FROM ".$this->TableName." ".$Condition;
        }
        
        try{
        $query = $db->prepare($Sql);
        $query->execute();
                $result['err'] = false;
                $result['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
                $result['err'] = true;
                $result['msg'] = $e->getMessage();
        }

        return $result;
    }
	
    // GET A LAST ID
    public function LastID()
    {
        global $db;
        
        $Sql = "SELECT MAX(Id) 'Id' FROM ".$this->TableName;
        
        try{
        $query = $db->prepare($Sql);
        $query->execute();
                $result['err'] = false;
                $result['rows'] = $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
                $result['err'] = true;
                $result['msg'] = $e->getMessage();
        }

        return $result;
    }
    
    // INSERT TRANSACTION
    // @Parameter $TransactionTypeId
    // @Parameter $TransactionDescription
    // @Parameter $TransactionDate
    // @Parameter $TransactionTime
    // @Parameter $UserId
    public function Add($TransactionTypeId, $TransactionDescription, $TransactionDate, $TransactionTime,$UserId)
    {
        global $db;
		
        if($TransactionTypeId != "" && $TransactionDescription != "" && $TransactionDate != "" && $TransactionTime != "" && $UserId){
            $Sql = 'INSERT INTO ' .$this->TableName. '(User_Id,Type_id, Description, Date, Time)';
            $Sql = $Sql . 'VALUES("'.$UserId.'", "' . $TransactionTypeId . '","' . $TransactionDescription . '","' . $TransactionDate . '","' . $TransactionTime . '")';
            try{
                $query = $db->prepare($Sql);
                $query->execute();
                $result = true;
                
            }catch(PDOException $e){
                
                $result = $e->getMessage();
            }
        }else{
            $result = 'Invalid parameters';
        }
		
		return $result;
    }
	
    // UPDATE TRANSACTION
    // @Parameter $TransactionTypeId
    // @Parameter $TransactionDescription
    // @Parameter $TransactionDate
    // @Parameter $TransactionTime
    // @Parameter $TransactionId
    // @Parameter $UserId
	public function Update($TransactionTypeId, $TransactionDescription, $TransactionDate, $TransactionTime, $TransactionId, $UserId){
            global $db;            
            if($TransactionTypeId != "" && $TransactionDescription != "" && $TransactionDate != "" && $TransactionTime != "" && $TransactionId != "" && $UserId!=""){
                $Sql = 'UPDATE '.$this->TableName.' SET User_id = '.$UserId.', Type_id = '.$TransactionTypeId.', Description='.$TransactionDescription.', Date='.$TransactionDate.', Time='.$TransactionTime.' WHERE Id ='.$TransactionId;
                try{
                    $query = $db->prepare($Sql);
                    $query->execute();
                    $result = true;                        
                }catch(PDOException $e){                        
                    $result = $e->getMessage();
                }
            }else{                
                $result = 'Invalid parameters';
            }
            return $result;
	}
	//DELETE TRANSACTION
        //@Parameter $TransactionId
	public function Delete_record($TransactionId){
            global $db;
		
            if($TransactionId != ""){
                $Sql = "DELETE FROM " . $this->TableName . " WHERE Id =" . $TransactionId;
                try{
                $query = $db->prepare($Sql);
                $query->execute();
                $result = true;                    
                }catch(PDOException $e){
                    
                    $result = $e->getMessage();
                }
            }else{
                 
                 $result = 'Invalid parameters';
            }

            return $result;
	}


} 