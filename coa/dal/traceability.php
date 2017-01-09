<?php 
require (dirname(__DIR__).'/config/db.php');
class traceability {

    public $TableName = "traceability";
    
    // GET A SPECIFIC Traceability OR ALL Traceability
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
    
    // INSERT Traceability
    // @Parameter $TraceabilityEntityType
    // @Parameter $TraceabilityEntityName
    // @Parameter $TraceabilityDate
    // @Parameter $TraceabilityTime
    // @Parameter $TraceabilityActivityType
    public function Add($TraceabilityEntityType, $TraceabilityEntityName, $TraceabilityDate, $TraceabilityTime, $TraceabilityActivityType)
    {
        global $db;
		
        if($TraceabilityEntityType != "" && $TraceabilityEntityName != "" && $TraceabilityDate != "" && $TraceabilityTime != "" && $TraceabilityActivityType != ""){
            $Sql = 'INSERT INTO ' .$this->TableName. '(Entity_type,Entity_name, Date, Time, Activity_type)';
            $Sql = $Sql . 'VALUES("' . $TraceabilityEntityType . '","' . $TraceabilityEntityName . '","' . $TraceabilityDate . '","' . $TraceabilityTime . '","' . $TraceabilityActivityType . '")';
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
	
    // UPDATE Traceability
    // @Parameter $TraceabilityEntityType
    // @Parameter $TraceabilityEntityName
    // @Parameter $TraceabilityDate
    // @Parameter $TraceabilityTime
    // @Parameter $TraceabilityActivityType 
    // @Parameter $TraceabilityId
	public function Update($TraceabilityEntityType, $TraceabilityEntityName, $TraceabilityDate, $TraceabilityTime, $TraceabilityActivityType, $TraceabilityId){
            global $db;
            
            if($TraceabilityEntityType != "" && $TraceabilityEntityName != "" && $TraceabilityDate != "" && $TraceabilityTime != "" && $TraceabilityActivityType != ""&& $TraceabilityId != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET Entity_type = '.$TraceabilityEntityType.', Entity_name='.$TraceabilityEntityName.', Date='.$TraceabilityDate.', Time='.$TraceabilityTime.', Activity_type='.$TraceabilityActivityType.' WHERE Id='.$TraceabilityId;
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
	
        //DELETE Traceability
        //@Parameter $TraceabilityId
	public function Delete_record($TraceabilityId){
            global $db;
		
            if($ChartId != ""){
                $Sql = "DELETE FROM " . $this->TableName . " WHERE Id =" . $TraceabilityId;
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