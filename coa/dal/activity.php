<?php require 'config/db.php';

class activity {

    public $TableName = "activity_type";

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
            if($query->rowCount()>0){
                $result['err'] = false;
                $result['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $result['err'] = true;
                $result['msg'] = "No Records Available";
            }
        }catch(PDOException $e){
            $result['err'] = true;
            $result['msg'] = $e->getMessage();
        }

        return $result;
    }

    public function Add($ActivityType,$ActivityDescription)
    {
        global $db;
        
        if($ActivityType != "" && $ActivityDescription != ""){
		
            $Sql = 'INSERT INTO '.$this->TableName.' VALUES ('.$ActivityType.','.$ActivityDescription.')';
            try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;                    
            }catch(PDOException $e){
              return $e->getMessage();
            }
        }else{
             
             return $str = 'Invalid parameters';
        }
       
    }
	
	public function Update($ActivityType,$ActivityDescription,$ActivityId){
            global $db;
            
            if($ActivityType != "" && $ActivityDescription != "" && $ActivityId != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET Type = '.$ActivityType.', Description='.$ActivityDescription.' WHERE Id ='.$ActivityId;
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
	
	public function Delete_record($ActivityId){
            global $db;
		
            if($ActivityId != ""){
                $Sql = "DELETE FROM " . $this->TableName . " WHERE Id =" . $ActivityId;
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