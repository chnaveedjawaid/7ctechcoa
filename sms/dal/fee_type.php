<?php 

class fee_type {
    
    public  $TableName = "fee_type";
    
    // GET fee_concession
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
		   $where = "WHERE Fee_id = ".$cond;		
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
	
	// GET SPECIFIC FIELD fee_concession
	// @Parameter $field_name  Specific column  
	// @Parameter Where condtion fee_concession id 
	
	public function SelectField($fieldName,$cond_id)
	
    {
		global $db;
        if($fieldName=="")
        {
            $sql = "SELECT * FROM ".$this->TableName;
        } else
        {
		   $WHERE = "WHERE Fee_id = ".$cond_id; 	 	
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
	
	
    
    // INSERT VALUES IN fee_concession  TABLE
    // @Parameter Expense name
    // @Parameter Expense Description	
    // @Parameter Acount id
    public function Insert($Fee_Id,$Name,$Fee_description,$Late_Fee,$Fee_Applicable,$Class_Id,$Threshold)
    {
		
        global $db;
		$Sql = 'INSERT INTO '.$this->TableName.' (Fee_Id , Name , Fee_description , Late_Fee , Fee_Applicable , Class_Id , Threshold)
		VALUES ('.$Fee_Id.','.$Fee_id.','.$Recived_Amount.',NOW())';
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
    public function Update($Fee_id ,$Student_Id=false, $Recived_Amount=false)
    {	
		
        global $db;
       
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($Student_Id != "") {
            $Sql .= " Student_Id = '".$Student_Id."'";
        }
	
        
        if ($Recived_Amount != "") {
          
                $Sql .= " , Recived_Amount = '".$Recived_Amount."'";
          
        }
       
        
        try{
            $Sql .= " WHERE Fee_id=".$Fee_id; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC fee_concession
    //@Parameter fee_concession ID For Specific fee_concession table
    public function Delete($Fee_ID)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName ." WHERE Fee_ID =".$Fee_ID;
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