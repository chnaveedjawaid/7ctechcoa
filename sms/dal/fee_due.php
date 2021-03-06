<?php 

class fee_due {
    
    public  $TableName = "fee_due";
    
    // GET fee_concession
	// Author Naveed 
    // @Parameter Where condtion Fee Id
    ///////
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
	
	// GET SPECIFIC FIELD fee_concession
	// @Parameter $field_name  Specific column  
	// @Parameter Where condtion fee_concession id 
	
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
	
	
    
    // INSERT VALUES IN fee_concession  TABLE
    // @Parameter Expense name
    // @Parameter Expense Description	
    // @Parameter Acount id
    public function Insert($Student_id,$Fee_id,$Status_id,$account_id)
    {
		
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (Student_Id , Fee_id , Status_Id , account_id) VALUES ('.$Student_id.','.$Fee_id.','.$Status_id.','.$account_id.')';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // UPDATE fee_concession
    // @Parameter Expense id  
    // @Parameter Expense name  
    // @Parameter Expense descryption  
    // @Parameter Expense acount id 
    public function Update($Where ,$Student_Id=false, $Status_Id=false,$account_id=false)
    {	
		
        global $db;
       
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($Student_Id != "") {
            $Sql .= " Student_Id = '".$Student_Id."'";
        }
	
        if ($account_id != "") {
            
                $Sql .=" , account_id = '".$account_id."'";
            
        }
        if ($Status_Id != "") {
          
                $Sql .= " , Status_Id = '".$Status_Id."'";
          
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
    
    //DELETE SPECIFIC fee_concession
    //@Parameter fee_concession ID For Specific fee_concession table
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