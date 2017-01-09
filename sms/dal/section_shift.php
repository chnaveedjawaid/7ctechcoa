<?php 

class section_shift {
    
    public  $TableName = "section_shift";
    
    // GET section_shift
	// Author Naveed 
    // @Parameter Where condtion Fee Id
    
	public function Select($cond=false)
	
    {
		global $db;
        if(isset($cond) && $cond=="")
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
	
	// GET SPECIFIC FIELD section_shift
	// @Parameter $field_name  Specific column  
	// @Parameter Where condtion  
	
	public function SelectField($fieldName,$cond)
	
    {
		global $db;
        if($fieldName=="")
        {
            $sql = "SELECT * FROM ".$this->TableName;
        } else
        {
		    	
           $sql = "SELECT ".$fieldName." FROM ". $this->TableName." ".$cond;
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
	
	
    
    // INSERT VALUES IN section_shift  TABLE
    // @Parameter Expense name
    // @Parameter Expense Description	
    // @Parameter Acount id
    public function Insert($Section_Shift_Name,$Section_Description,$Status_id,$S_S_Id)
    {
		
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (Section_Shift_Name , Section_Description , Status_id , S_S_Id) VALUES ("'.$Section_Shift_Name.'","'.$Section_Description.'","'.$Status_id.'",'.$S_S_Id.')';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // UPDATE section_shift
    // @Parameter Expense id  
    // @Parameter Expense name  
    // @Parameter Expense descryption  
    // @Parameter Expense acount id 
    public function Update($Section_Shift_Name,$Section_Description,$Status_id,$S_S_Id,$Where)
    {	
		
        global $db;
       
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($Section_Shift_Name != "") {
            $Sql .= " Section_Shift_Name = '".$Section_Shift_Name."'";
        }
	
        if ($Section_Description != "") {
            
                $Sql .=" , Section_Description = '".$Section_Description."'";
            
        }
        if ($Status_Id != "") {
          
                $Sql .= " , Status_Id = ".$Status_Id."";
          
        }
        if ($S_S_Id != "") {
          
                $Sql .= " , S_S_Id = ".$S_S_Id."";
          
        }
        
        try{
            $Sql .= " ".$Where; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC section_shift
    //@Parameter section_shift where
    public function Delete($Where)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName ." ".$Where;
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