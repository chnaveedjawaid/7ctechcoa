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
	
	// GET SPECIFIC FIELD Employee Salary Detail
	// @Parameter $field_name  Specific column  
	// @Parameter Where condtion acount_id 
	
	public function SelectField($fieldName,$cond_id)
	
    {
		global $db;
        if($fieldName=="" && $cond_id="")
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
    public function Update($employ_id=false ,$salary=false, $Where=false)
    {	
		
        global $db;
        $salary = trim($salary);
        $employ_id = trim($employ_id);
       
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($salary != "") {
            $Sql .= " salary = ".$salary."";
        }
		if ($employ_id != "") {
            $Sql .= " employ_id = ".$employ_id."";
        }
	
       
       try{
            $Sql .= $Where; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC Emplyee salary detail
    //@Parameter Employee_id 
    public function Delete($Where)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName .$Where;
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