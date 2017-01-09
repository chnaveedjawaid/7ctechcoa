<?php 

class subjects {
    
    public  $TableName = "subjects";
    
    // GET subject DETAIL 
	// Author Naveed 
    // @Parameter Where condtion 
    
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
	
	// GET SPECIFIC FIELD 
	// @Parameter $field_name  Specific column  
	// @Parameter Where condtion 
	
	public function SelectField($fieldName,$cond_id)
	
    {
		global $db;
        if($fieldName=="" && cond_id=="")
        {
            $sql = "SELECT * FROM ".$this->TableName;
        } else
        {
		 	 	
           $sql = "SELECT ".$fieldName." FROM ". $this->TableName." ".$cond_id;
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
	
	
    
    // INSERT VALUES IN Subject TABLE
    // @Parameter subject name
    // @Parameter subject description 	
    // @Parameter subject class
	// @Parameter Class id
	// $Parameter Staff_id
    public function Insert($subject_name,$subject_desc,$subject_class,$class_id,$staff_id)
    {
		
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (Subject_name , Subject_description , Subject_in_classes , Class_id , Staff_id) VALUES ("'.$subject_name.'",'.$subject_desc.',"'.$subject_class.'",'.$class_id.','.$staff_id.')';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // UPDATE ACCOUNT
    // @Parameter $Class id  
    // @Parameter $class Name  
    // @Parameter $class Status  
    // @Parameter $Class Description  
    // @Parameter $Section Shift  
    public function Update($subject_name=false,$subject_desc=false,$subject_class=false,$class_id=false,$staff_id=false,$WHERE)
    {	
		
		
        global $db;
        $subject_name = trim($subject_name);
        $subject_desc = trim($subject_desc);
        //$ClassDescription = trim($ClassDescription);
      // $Section_Shift = trim($Section_Shift);
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
			if ($subject_name != "") {
            $Sql .= " Subject_name = '".$subject_name."'";
			}
       
            if ($subject_desc != "") {
                $Sql .= ", Subject_description = '".$subject_desc."'";
            }
            if ($subject_class != "") {
                 $Sql .= ", Subject_in_classes = '".$subject_class."'";
            }
            
            if ($staff_id != "") {
                $Sql .= " , Staff_id = ".$staff_id."";
            }
            if ($class_id != "") {
                $Sql .= " , Class_id = ".$class_id."";
            }
        
        try{
            $Sql .= " ".$WHERE; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC ClASS
    //@Parameter CLASS ID For Specific CLASS
    public function DeleteClass($WHERE)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName ." ".$WHERE;
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