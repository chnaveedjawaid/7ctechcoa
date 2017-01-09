<?php 
require (dirname(__DIR__).'/config/db.php');

class applications {
    
    public  $TableName = "applications";

    
    // GET specific application or all applications
    // @Parameter $appID (Optional) for Selecting Specific application    
    public function Select($parm)
    {
	
        global $db;
		$inject = new injection_logic();
                 $cond = $parm['cond'];
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
    
    // INSERT Application
    // @Parameter $appname appname
    // @Parameter $appdisc appdisc
	// @Parameter $appdisc app_key
    public function Add($parm)
    {
		$appname = $parm["appname"];
		$appdisc = $parm["appdisc"];
		$app_key = $parm["app_key"];
        global $db;
		$inject = new injection_logic();
		if($inject->isSqlInjection($appname) == true || $inject->isSqlInjection($appdisc) == true || $inject->isSqlInjection($app_key) == true){
			$arr['err'] = true;
            $arr['msg'] = 'Injection Found';
		}else{
			$Sql = 'INSERT INTO '.$this->TableName.' (appname , appdisc , app_key) VALUES ("'.$appname.'","'.$appdisc.'","'.$app_key.'")';
			try{
				$query = $db->prepare($Sql);
				$query->execute();
				$id = $db->lastInsertId();
				$sql = "SELECT app_key FROM ".$this->TableName." WHERE appID=".$id;
				try{
					$query = $db->prepare($sql);
					$query->execute();
					$arr['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
					$arr['err'] = false;
				}catch(PDOException $e){
					$arr['err'] = true;
					$arr['msg'] = $e->getMessage();            
				} 
			} catch(PDOException $e){
				$arr['err'] = true;
				$arr['msg'] = $e->getMessage();    
			}
		}
		return $arr;
    }
    
    
    // UPDATE Application
    // @Parameter $appname appname
    // @Parameter $appdisc appdisc
    // @Parameter $registrationdate registrationdate
	// @Parameter $appID appID
    public function Update($parm)
    {
		$appname = $parm["appname"];
		$appdisc = $parm["appdisc"];
		$registrationdate = $parm["registrationdate"];
		$appID = $parm["appID"];
        global $db;
            
            if($appname != "" && $appdisc != "" && $registrationdate != "" && $appID != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET appname = "'.$appname.'", appdisc="'.$appdisc.'", registrationdate="'.$registrationdate.'" WHERE appID ='.$appID;
                
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
    //@Parameter appID
    public function Delete_record($parm)
    {
		$appID = $parm["appID"];
        global $db;
        $Sql = "DELETE FROM ".$this->TableName + " WHERE appID =".$appID;
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