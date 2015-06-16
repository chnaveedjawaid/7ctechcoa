<?php 

class classes {
    
    public  $TableName = "classes";
    
    // GET CLASSES DETAIL 
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
	// @Parameter Where condtion acount_id 
	
	public function SelectField($fieldName,$cond_id)
	
    {
		global $db;
        if($fieldName=="")
        {
            $sql = "SELECT * FROM ".$this->TableName;
        } else
        {
		   $WHERE = "WHERE class_id=".$cond_id; 	 	
           echo $sql = "SELECT ".$fieldName." FROM ". $this->TableName." ".$WHERE;
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
	
	
    
    // INSERT VALUES IN CLASSES TABLE
    // @Parameter Class name
    // @Parameter Status_id	
    // @Parameter class description
    public function Insert($class_name,$status_id,$class_description,$shift)
    {
		
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (Class_name , Status_id , Class_Description , Section_Shift) VALUES ("'.$class_name.'",'.$status_id.',"'.$class_description.'","'.$shift.'")';
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
    public function Update($ClassId ,$ClassName=false, $ClassStatus=false, $ClassDescription=false, $Section_Shift=false)
    {	
		
		
        global $db;
        $ClassName = trim($ClassName);
        $ClassStatus = trim($ClassStatus);
        $ClassDescription = trim($ClassDescription);
        $ClassId = trim($ClassId);
        $Section_Shift = trim($Section_Shift);
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($ClassName != "") {
            $Sql .= " Class_name = '".$ClassName."'";
        }
        if ($ClassStatus != "") {
            if ($ClassName == "") {
                $Sql .= "Status_id = '".$ClassStatus."'";
            }
            else {
                $Sql .=" , Status_id = '".$ClassStatus."'";
            }
        }
        if ($ClassDescription != "") {
            if ($ClassName == "" && $ClassStatus == "") {
                $Sql .="  Class_Description = '".$ClassDescription."'";
            }
            else {
                $Sql .= " , Class_Description = '".$ClassDescription."'";
            }
        }
        if ($Section_Shift != "") {
            if ($ClassName == "" && $ClassStatus == "" && $ClassDescription == "") {
                $Sql .= "  Section_Shift = '".$Section_Shift."'";
            }
            else {
                $Sql .=" , Section_Shift = '".$Section_Shift."'";
            }
        }
        
        try{
            $Sql .= " WHERE class_id=".$ClassId; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC ClASS
    //@Parameter CLASS ID For Specific CLASS
    public function DeleteClass($ClassID)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName ." WHERE Class_id =".$ClassID;
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