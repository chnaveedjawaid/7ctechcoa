<?php

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
        $query = $db->prepare($sql);
        $query->execute();
                $result['msg'] = true;
                $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
                $result['msg'] = false;
                $result['data'] = $e->getMessage();
        }

        return $result;
    }

    public function Add($ActivityType,$ActivityDescription)
    {
        global $db;
		
        $Sql = 'INSERT INTO '.$this->TableName.' VALUES ('.$ActivityType.','.$ActivityDescription.')';
        try{
        $query = $db->prepare($sql);
        $query->execute();
                $result['msg'] = true;
                $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
                $result['msg'] = false;
                $result['data'] = $e->getMessage();
        }
		
	return $result;
        
    }
	
	public function Update($ActivityType,$ActivityDescription,$ActivityId){
            global $db;
            $Sql = 'UPDATE '.$this->TableName.' SET name = '.$ActivityType.', description='.$ActivityDescription.' WHERE id ='.$ActivityId;
            try{
            $query = $db->prepare($sql);
            $query->execute();
                    $result['msg'] = true;
                    $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                    $result['msg'] = false;
                    $result['data'] = $e->getMessage();
            }

            return $result;
	}
	
	public function Delete_record($ActivityId){
            global $db;
		
            $Sql = "DELETE FROM " . $this->TableName . " WHERE id =" . $ActivityId;
            try{
            $query = $db->prepare($sql);
            $query->execute();
                $result['msg'] = true;
                $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                $result['msg'] = false;
                $result['data'] = $e->getMessage();
            }

            return $result;
	}


} 