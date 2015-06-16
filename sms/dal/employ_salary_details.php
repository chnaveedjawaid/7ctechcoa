<?php 

class employ_salary_details {
    
    public  $TableName = "employ_salary_details";
    
    // GET Employee Salary Detail 
	// Author Naveed 
    // @Parameter Where condtion Employee id
    
	public function Select($cond)
	
    {
		global $db;
        if($cond=="")
        {
            $sql = "SELECT * FROM ".$this->TableName;
        } else
        {	
		   $where = "WHERE employ_id = ".$cond;		
		   $sql = "SELECT * FROM ". $this->TableName." ".$where;
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
	
	// GET SPECIFIC FIELD Employee Salary Detail
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
		   $WHERE = "WHERE employ_id=".$cond_id; 	 	
           $sql = "SELECT ".$fieldName." FROM ". $this->TableName." ".$WHERE;
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
	
	
    
    // INSERT VALUES IN Employee Salary Detail TABLE
    // @Parameter Class name
    // @Parameter Status_id	
    // @Parameter class description
    public function Insert($salary,$acount_id)
    {
		
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (salary , account_id) VALUES ('.$salary.','.$acount_id.')';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // UPDATE Employee Salary Detail
    // @Parameter $employee id  
    // @Parameter $salary  
    // @Parameter $account_id  
    public function Update($employ_id ,$salary, $account_id=false)
    {	
		
        global $db;
        $salary = trim($salary);
        $account_id = trim($account_id);
        $employ_id = trim($employ_id);
       
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($salary != "") {
            $Sql .= " Salary = ".$salary."";
        }
	
        if ($account_id != "") {
            
                $Sql .=" , account_id = '".$account_id."'";
            
        }
       try{
            $Sql .= " WHERE employ_id=".$employ_id; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC Emplyee salary detail
    //@Parameter Employee_id 
    public function Delete($Employee_id)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName ." WHERE employ_id =".$Employee_id;
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