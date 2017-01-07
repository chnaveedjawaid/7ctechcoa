<?php require (dirname(__DIR__).'/config/db.php');

class type {
    public $TableName = "type";
    
    public function type()
    {
        
    }
    
    // GET A SPECIFIC Type OR ALL Type
    // @Parameter $condition 
    public function Select($condition){
        
        global $db;
        $Sql = "SELECT * FROM ".$this->TableName." ".$condition;
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
    
    // INSERT TYPE
    // @Parameter $TypeDescription
    // @Parameter $TypeName
    public function Add($TypeDescription, $TypeName){
        
        global $db;
        try
        {
            $Sql = 'INSERT INTO '.$this->TableName.'(Type_description, Type_name)';
            $Sql .= 'VALUES("'.$TypeDescription.'","'.$TypeName.'")';
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
            
        } catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
    // UPDATE TYPE
    // @Parameter $TypeDescription
    // @Parameter $TypeName
    // @Parameter $TypeId
    public function Update($TypeDescription, $TypeName, $TypeId){
        global $db;
        $TypeDescription = trim($TypeDescription);
        $TypeName = trim($TypeName);
        $TypeId = trim($TypeId);
        
        try{
            $Sql = "UPDATE ".$this->TableName." SET ";
            if ($TypeDescription != "") {
                $Sql .= "Type_description = '".$TypeDescription."'";
            }
            if ($TypeName != "") {
                if($TypeDescription == "")
                {
                    $Sql .="Type_name = '".$TypeName."'";
                } else $Sql .=", Type_name = '".$TypeName."'";

            }
            
            $Sql .= "WHERE Type_id=".$TypeId;        
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch (PDOException $ex) {
           return $ex->getMessage();     
        }
    }
    
    //DELETE TYPE
    //@Parameter $Typeid
    public function Delete_record($Typeid)
    {
        global $db;
        try {
             $Sql = "DELETE FROM ".$this->TableName." WHERE Type_id =".$Typeid;
             $query = $db->prepare($Sql);
             $query->execute();
             return true;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
