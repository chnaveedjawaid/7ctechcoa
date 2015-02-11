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
        
        $Sql = "SELECT MAX(ID) FROM ".$this->TableName;
        
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
            $Sql = 'INSTER INTO ' .$this->TableName. '(type_id, description, date, time)';
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
                $Sql = 'UPDATE '.$this->TableName.' SET type_id = '.$TransactionTypeId.', description='.$TransactionDescription.', date='.$TransactionDate.', time='.$TransactionTime.' WHERE id ='.$TransactionId;
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
                $Sql = "DELETE FROM " . $this->TableName . " WHERE id =" . $TransactionId;
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