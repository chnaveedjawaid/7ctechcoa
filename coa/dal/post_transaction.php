<?php require 'config/db.php';

class post_transaction {
    public $TableName = "traceability";
    
    public function post_transaction()
    {
        
    }
    
    public function Select(){
        $Sql = "SELECT * FROM ".$this->TableName." ".$Condtion;
        try
        {
            $query = $db->prepare($Sql);
            $query->execute();
            $result['err'] = false;
            $result['rows'] =  $query->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e)
        {
            $result['err'] = true;
            $result['msg'] = $e->getMessage();
        }
        return $result;
    }
    
    public function Add($TraceabilityEntityType, $TraceabilityEntityName, $TraceabilityDate, $TraceabilityTime, $TraceabilityActivityType){
        
        global $db;
        try
        {
            $Sql = 'INSTER INTO '.$this->TableName.'(entity_type,entity_name, date, time, activity_type)';
            $Sql .= 'VALUES("'.$TraceabilityEntityType.'","'.$TraceabilityEntityName.'","'.$TraceabilityTime.'","'.$TraceabilityActivityType.'")';
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
            
        } catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function Update($TraceabilityEntityType, $TraceabilityEntityName, $TraceabilityDate, $TraceabilityTime, $TraceabilityActivityType, $TraceabilityId){
        global $db;
        $TraceabilityEntityType = trim($TraceabilityEntityType);
        $TraceabilityEntityName = trim($TraceabilityEntityName);
        $TraceabilityDate = trim($TraceabilityDate);
        $TraceabilityTime = trim($TraceabilityTime);
        $TraceabilityActivityType = trim($TraceabilityActivityType);
        $TraceabilityId = trim($TraceabilityId);
        try{
            $Sql = "UPDATE ".$this->TableName." SET ";
            if ($TraceabilityEntityType != "") {
                $Sql .= "entity_type = '".$TraceabilityEntityType."'";
            }
            if ($TraceabilityEntityName != "") {
                if($TraceabilityEntityType == "")
                {
                    $Sql .="entity_name = '".$TraceabilityEntityName."'";
                } else $Sql .=", entity_name = '".$TraceabilityEntityName."'";

            }
            if ($TraceabilityDate != "") {
                if($TraceabilityEntityType=="" && $TraceabilityEntityName=="")
                {
                    $Sql .= "date = '".$TraceabilityDate."'";
                } else $Sql .= ", date = '".$TraceabilityDate."'";

            }
            if ($TraceabilityTime != "") {
                if($TraceabilityEntityType == "" && $TraceabilityEntityName == "" && $TraceabilityDate == "")
                {
                    $Sql .= "time = '".$TraceabilityTime."'";
                } else $Sql .= ", time = '".$TraceabilityTime."'";

            }
            if ($TraceabilityActivityType != "") {
                if($TraceabilityEntityType == "" && $TraceabilityEntityName == "" && $TraceabilityDate == "" && $TraceabilityTime==""){
                    $Sql .= "activity_type = '".$TraceabilityActivityType."'";
                } else $Sql .= ", activity_type = '".$TraceabilityActivityType."'";            
            }
        		
            $Sql .= "WHERE id=".$TraceabilityId;        
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch (PDOException $ex) {
           return $ex->getMessage();     
        }
    }
    
    public function Delete_record($TraceabilityId)
    {
        global $db;
        try {
             $Sql = "DELETE FROM ".$this->TableName." WHERE id =".$TraceabilityId;
             $query = $db->prepare($Sql);
             $query->execute();
             return true;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    
}
