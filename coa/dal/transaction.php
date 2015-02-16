<?php require 'config/db.php';

class transaction {

    public $TableName = "transaction";

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
	
	public function LastID()
    {
        global $db;
        
        $Sql = "SELECT MAX(Id) FROM ".$this->TableName;
        
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

    public function Add($TransactionTypeId, $TransactionDescription, $TransactionDate, $TransactionTime)
    {
        global $db;
		
        if($TransactionTypeId != "" && $TransactionDescription != "" && $TransactionDate != "" && $TransactionTime != ""){
            $Sql = 'INSTER INTO ' .$this->TableName. '(Type_id, Description, Date, Time)';
            $Sql = $Sql . 'VALUES("' . $TransactionTypeId . '","' . $TransactionDescription . '","' . $TransactionDate . '","' . $TransactionTime . '")';
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
	
	public function Update($TransactionTypeId, $TransactionDescription, $TransactionDate, $TransactionTime, $TransactionId){
            global $db;
            
            if($TransactionTypeId != "" && $TransactionDescription != "" && $TransactionDate != "" && $TransactionTime != "" && $TransactionId != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET Type_id = '.$TransactionTypeId.', Description='.$TransactionDescription.', Date='.$TransactionDate.', Time='.$TransactionTime.' WHERE Id ='.$TransactionId;
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