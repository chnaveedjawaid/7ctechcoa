<?php 

class teachers_for_classes {
    
    public  $TableName = "teachers_for_classes";
    
    // GET teachers_for_classes
	// Author MOhiUddin 
 
    
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
        } catch(PDOException $e){
            $arr['err'] = true;
            $arr['msg'] = $e->getMessage();
        }
        return $arr;
    }
	
    // INSERT VALUES IN teachers_for_classes TABLE
    // @Parameter Teacher Id 
    // @Parameter Class Id
	// @Parameter Types
    
    public function Insert($teacher_id, $class_id, $types)
    {  
        global $db;
        echo $Sql = 'INSERT INTO '.$this->TableName.' (`Teacher_Id`, `Class_Id`, `Types`) VALUES ("'.$teacher_id.'","'.$class_id.'" , "'.$types.'")';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // UPDATE teachers_for_classes
    // @Parameter Teacher_Id  
    // @Parameter Class_Id  
    // @Parameter Types
    // @Parameter Condition
	 
    
    public function Update($teacher_id, $class_id, $types, $cond) {	
		
        global $db;

        $teacher_id = trim($teacher_id);
        $class_id = trim($class_id);
		$types = trim($types);
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($teacher_id != "") {
            $Sql .= " Teacher_Id = '".$teacher_id."' ,";
        }
		
        if ($class_id != "") {            
                $Sql .=" Class_Id = '".$class_id."' ,";
        }

        if ($types != "") {            
                $Sql .=" Types = '".$types."' ";
        }
		
		$Sql = substr($Sql, 0, strlen($Sql)-1);

        if ($cond != "") {          
                $Sql .= $cond;
                
                try{
                    $query = $db->prepare($Sql);
                    $query->execute();
                    return true;
                } catch(PDOException $e){
                    return $e->getMessage();
                }
        }else {
                  return false;
        }
        
    }
    
    //DELETE SPECIFIC teachers_for_classes
    //@Parameter Specific teachers_for_classes table
    public function Delete($cond)
    {
        global $db;
        if(!empty($cond)){
            $Sql = "DELETE FROM ".$this->TableName.$cond;
            try
            {
                $query = $db->prepare($Sql);
                $query->execute();
                return true;
            } catch(PDOException $e){
                return $e->getMessage();                    
            }
        }else { return false; }
        
    }
	
	

} 