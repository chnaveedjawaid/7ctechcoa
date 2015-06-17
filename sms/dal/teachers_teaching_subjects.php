<?php 

class teachers_teaching_subjects {
    
    public  $TableName = "teachers_teaching_subjects";
    
    // GET teachers_teaching_subjects
	// Author MOhiUddin 
    // @Parameter Where condtion Employee id
    
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
	
    // INSERT VALUES IN teachers_teaching_subjects TABLE
    // @Parameter Teacher Id 
    // @Parameter Class Id
    
    public function Insert($teacher_id, $class_id)
    {
		
        global $db;
        echo $Sql = 'INSERT INTO '.$this->TableName.' (`Teacher_Id`, `Class_Id`) VALUES ("'.$teacher_id.'","'.$class_id.'")';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // UPDATE expences
    // @Parameter Expense id  
    // @Parameter Expense name  
    // @Parameter Expense descryption  
    // @Parameter Expense acount id 
    
    public function Update($teacher_id, $class_id, $cond) {	
		
        global $db;

        $teacher_id = trim($teacher_id);
        $class_id = trim($class_id);
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($teacher_id != "") {
            $Sql .= " Teacher_Id = '".$teacher_id."' ";
        }
	
        if ($class_id != "") {            
                $Sql .=" , Class_Id = '".$class_id."' ";
        }
        
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
    
    //DELETE SPECIFIC expences
    //@Parameter expences ID For Specific expences table
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