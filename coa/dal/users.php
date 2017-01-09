<?php 
require (dirname(__DIR__).'/config/db.php');

class users {
    
    public  $TableName = "users";

    
    // GET specific user or all users
    // @Parameter $userid (Optional) for Selecting Specific user    
    public function Select($cond)
    {
        global $db;
        $inject = new injection_logic();
		if($inject->isSqlInjection($cond)){
			$arr['err'] = true;
            $arr['msg'] = 'Injection Found';
		}else{
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
		}
      return $arr;
    }
    
    // INSERT USER
    // @Parameter $userid_local userID_local
    // @Parameter $userid_caller userID_caller
    // @Parameter $appid appID
	// @Parameter $appauth appauthlevel
    public function Add($userid_local,$userid_caller,$appid,$appauth)
    {
        global $db;
        $inject = new injection_logic();
		if($inject->isSqlInjection($userid_local) == true || $inject->isSqlInjection($userid_caller) == true || $inject->isSqlInjection($appid) == true  || $inject->isSqlInjection($appauth) == true){
			$arr['err'] = true;
            $arr['msg'] = 'Injection Found';
		}else{
			$Sql = 'INSERT INTO '.$this->TableName.' (userID_local , userID_caller , appID, appauthlevel) VALUES ("'.$userid_local.'","'.$userid_caller.'","'.$appid.'","'.$appauth.'")';
			try{
				$query = $db->prepare($Sql);
				$query->execute();
				return true;
			} catch(PDOException $e){
				return $e->getMessage();
			}
		}
    }
    
    
    // UPDATE USER
    // @Parameter $userid_local userID_local
    // @Parameter $userid_caller userID_caller
    // @Parameter $appid appID
    public function Update($userid_local,$userid_caller,$appid)
    {
        global $db;
            
            if($userid_local != "" && $userid_caller != "" && $appid != ""){
              $Sql = 'UPDATE '.$this->TableName.' SET last_call=now(), count=0 WHERE userid_local = "'.$userid_local.'" AND userid_caller="'.$userid_caller.'" AND appid="'.$appid.'"';
                
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
	
	// UPDATE USER WITH Count
    // @Parameter $userid_local userID_local
    // @Parameter $userid_caller userID_caller
    // @Parameter $appid appID
    public function UpdateWithCount($userid_local,$userid_caller,$appid)
    {
        global $db;
            
            if($userid_local != "" && $userid_caller != "" && $appid != ""){
             $Sql = 'UPDATE '.$this->TableName.' SET last_call=now(), count=count+1 WHERE userid_local = "'.$userid_local.'" AND userid_caller="'.$userid_caller.'" AND appid="'.$appid.'"';
                
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
    //@Parameter UserID Local
    public function Delete_record($userid_local)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName + " WHERE userid_local =".$userid_local;
        try
        {
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();                    
        }
    }
	
	public function countAllUsers(){
		global $db;
        
        $sql = "SELECT COUNT(userID_local) as count FROM ".$this->TableName;
        
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $arr['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
            $arr['err'] = false;
        } catch(PDOException $e){
            $arr['err'] = true;
            $arr['msg'] = $e->getMessage();            
        } 
        return $arr;
	}

} 