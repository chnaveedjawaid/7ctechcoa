<?php 
require (dirname(__DIR__).'/config/db.php');

class loginvalidity {
    
    public  $TableName = "loginvalidity";

    
    // GET specific loginvalidity or all loginvalidity
    // @Parameter $validity (Optional) for Selecting Specific loginvalidity    
    public function Select($parm)
    {
		$cond = $parm["cond"];
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
			} catch(PDOException $e){
				$arr['err'] = true;
				$arr['msg'] = $e->getMessage();            
			} 
		}
        return $arr;
    }
    
    // INSERT loginvalidity
    // @Parameter $validity validity
    // @Parameter $calls_valid calls_valid
    public function Add($parm)
    {
		$validity = $parm["validity"];
		$calls_valid = $parm["calls_valid"];
        global $db;
        $inject = new injection_logic();
		if($inject->isSqlInjection($validity) == true || $inject->isSqlInjection($calls_valid) == true){
			$arr['err'] = true;
            $arr['msg'] = 'Injection Found';
		}else{
			$Sql = 'INSERT INTO '.$this->TableName.' (validity, calls_valid) VALUES ('.$validity.','.$calls_valid.')';
			try{
				$query = $db->prepare($Sql);
				$query->execute();
				return true;
			} catch(PDOException $e){
				return $e->getMessage();
			}
		}
    }
    
    
    // UPDATE loginvalidity
    // @Parameter $validity validity
    // @Parameter $calls_valid calls_valid
    public function Update($parm)
    {
		$validity = $parm["validity"];
		$calls_valid = $parm["calls_valid"];
        global $db;
            
            if($validity != "" && $calls_valid != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET validity = '.$validity.', calls_valid='.$calls_valid.' WHERE validity ='.$validity;
                
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
    //@Parameter validity
    public function Delete_record($parm)
    {
		$validity = $parm["validity"];
        global $db;
        $Sql = "DELETE FROM ".$this->TableName + " WHERE validity =".$validity;
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