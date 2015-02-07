<?php

class traceability {

    public $TableName = "traceability";

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
                $result['msg'] = true;
                $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
                $result['msg'] = false;
                $result['data'] = $e->getMessage();
        }

        return $result;
    }

    public function Add($TraceabilityEntityType, $TraceabilityEntityName, $TraceabilityDate, $TraceabilityTime, $TraceabilityActivityType)
    {
        global $db;
		
        if($TraceabilityEntityType != "" && $TraceabilityEntityName != "" && $TraceabilityDate != "" && $TraceabilityTime != "" && $TraceabilityActivityType != ""){
            $Sql = 'INSTER INTO ' .$this->TableName. '(entity_type,entity_name, date, time, activity_type)';
            $Sql = $Sql . 'VALUES("' . $TraceabilityEntityType . '","' . $TraceabilityEntityName . '","' . $TraceabilityDate . '","' . $TraceabilityTime . '","' . $TraceabilityActivityType . '")';
            try{
            $query = $db->prepare($Sql);
            $query->execute();
                    $result['msg'] = true;
                    $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                    $result['msg'] = false;
                    $result['data'] = $e->getMessage();
            }
        }else{
            $result['msg'] = false;
            $result['data'] = 'Invalid parameters';
        }
		
		return $result;
        
    }
	
	public function Update($TraceabilityEntityType, $TraceabilityEntityName, $TraceabilityDate, $TraceabilityTime, $TraceabilityActivityType, $TraceabilityId){
            global $db;
            
            if($TraceabilityEntityType != "" && $TraceabilityEntityName != "" && $TraceabilityDate != "" && $TraceabilityTime != "" && $TraceabilityActivityType != ""&& $TraceabilityId != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET entity_type = '.$TraceabilityEntityType.', entity_name='.$TraceabilityEntityName.', date='.$TraceabilityDate.', time='.$TraceabilityTime.', activity_type='.$TraceabilityActivityType.' WHERE id ='.$TraceabilityId;
                try{
                $query = $db->prepare($Sql);
                $query->execute();
                        $result['msg'] = true;
                        $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
                }catch(PDOException $e){
                        $result['msg'] = false;
                        $result['data'] = $e->getMessage();
                }
            }else{
                $result['msg'] = false;
                $result['data'] = 'Invalid parameters';
            }

            return $result;
	}
	
	public function Delete_record($TraceabilityId){
            global $db;
		
            if($ChartId != ""){
                $Sql = "DELETE FROM " . $this->TableName . " WHERE id =" . $TraceabilityId;
                try{
                $query = $db->prepare($Sql);
                $query->execute();
                    $result['msg'] = true;
                    $result['data'] = $query->fetchAll(PDO::FETCH_ASSOC);
                }catch(PDOException $e){
                    $result['msg'] = false;
                    $result['data'] = $e->getMessage();
                }
            }else{
                 $result['msg'] = false;
                 $result['data'] = 'Invalid parameters';
            }

            return $result;
	}


} 