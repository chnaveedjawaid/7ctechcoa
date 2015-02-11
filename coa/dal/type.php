<?php require 'config/db.php';

class type {
    public $TableName = "type";
    
    public function type()
    {
        
    }
    
    public function Select(){
        $Sql = "SELECT * FROM ".$this->TableName." ".$Condtion;
        try
        {
            $query = $db->prepare($Sql);
            $query->execute();
            $result['err'] = false;
            $result['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);            
            
        } catch(PDOException $e)
        {
            $result['err'] = true;
            $result['msg'] = $e->getMessage();
        }
    }
    
    public function Add($TypeDescription, $TypeName){
        
        global $db;
        try
        {
            $Sql = 'INSERT INTO '.$this->TableName.'(type_description, type_name)';
            $Sql .= 'VALUES("'.$TypeDescription.'","'.$TypeName.'")';
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
            
        } catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function Update($TypeDescription, $TypeName, $TypeId){
        global $db;
        $TypeDescription = trim($TypeDescription);
        $TypeName = trim($TypeName);
        $TypeId = trim($TypeId);
        
        try{
            $Sql = "UPDATE ".$this->TableName." SET ";
            if ($TypeDescription != "") {
                $Sql .= "type_description = '".$TypeDescription."'";
            }
            if ($TypeName != "") {
                if($TypeDescription == "")
                {
                    $Sql .="type_name = '".$TypeName."'";
                } else $Sql .=", type_name = '".$TypeName."'";

            }
            
            $Sql .= "WHERE type_id=".$TypeId;        
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch (PDOException $ex) {
           return $ex->getMessage();     
        }
    }
    
    public function Delete_record($Typeid)
    {
        global $db;
        try {
             $Sql = "DELETE FROM ".$this->TableName." WHERE type_id =".$Typeid;
             $query = $db->prepare($Sql);
             $query->execute();
             return true;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
