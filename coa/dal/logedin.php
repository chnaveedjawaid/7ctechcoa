<?php require '../config/db.php';

class logedin {
    
    public  $TableName = "logedin";

    
    // GET specific logedin or all logedins
    // @Parameter $userID (Optional) for Selecting Specific logedin    
    public function Select($cond)
    {
        global $db;
        if($cond=="")
        {
            $sql = "SELECT * FROM ".$this->TableName;
        } else
        {
           $sql = "SELECT * FROM ". $this->TableName." ".$cond;
        }
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $arr['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
            $arr['err'] = false;
			$arr['num_rows'] = $query->rowCount();
        } catch(PDOException $e){
            $arr['err'] = true;
            $arr['msg'] = $e->getMessage();            
        } 
        return $arr;
    }
    
    // INSERT logedin
    // @Parameter $userID userID
    // @Parameter $logintime logintime
    // @Parameter $validity validity
    public function Add($userID,$logintime,$validity)
    {
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (userID , logintime , validity) VALUES ("'.$userID.'","'.$logintime.'","'.$validity.'")';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    
    // UPDATE logedin
    // @Parameter $userID userID
    // @Parameter $logintime logintime
    // @Parameter $validity validity
    public function Update($userID,$logintime,$validity)
    {
        global $db;
            
            if($userID != "" && $logintime != "" && $validity != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET userID = '.$userID.', logintime='.$logintime.', validity='.$validity.' WHERE userID ='.$userID;
                
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
    
    //DELETE SPECIFIC RECORD
    //@Parameter UserID
    public function Delete($userID)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName." WHERE userID='$userID'";
        try
        {
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();                    
        }
    }

} 