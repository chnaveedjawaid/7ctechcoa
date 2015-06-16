<?php 

class expences {
    
    public  $TableName = "expences";
    
    // GET expences
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
		   $where = "WHERE exp_id = ".$cond;		
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
	
	// GET SPECIFIC FIELD expences
	// @Parameter $field_name  Specific column  
	// @Parameter Where condtion expences id 
	
	public function SelectField($fieldName,$cond_id)
	
    {
		global $db;
        if($fieldName=="")
        {
            $sql = "SELECT * FROM ".$this->TableName;
        } else
        {
		   $WHERE = "WHERE exp_id=".$cond_id; 	 	
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
	
	
    
    // INSERT VALUES IN expences  TABLE
    // @Parameter Expense name
    // @Parameter Expense Description	
    // @Parameter Acount id
    public function Insert($exp_name,$exp_descryption,$account_id)
    {
		
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (exp_name , exp_discription , account_id) VALUES ("'.$exp_name.'","'.$exp_descryption.'",'.$account_id.')';
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
    public function Update($exp_id ,$exp_name=false, $exp_discription=false,$account_id=false)
    {	
		
        global $db;
       
        $exp_name = trim($exp_name);
        $exp_discription = trim($exp_discription);
        //$employ_id = trim($employ_id);
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($exp_name != "") {
            $Sql .= " exp_name = '".$exp_name."'";
        }
	
        if ($exp_discription != "") {
            
                $Sql .=" , exp_discription = '".$exp_discription."'";
            
        }
        if ($account_id != "") {
          
                $Sql .= " , account_id = '".$account_id."'";
          
        }
       
        
        try{
            echo $Sql .= " WHERE exp_id=".$exp_id; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC expences
    //@Parameter expences ID For Specific expences table
    public function Delete($exp_id)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName ." WHERE exp_id =".$exp_id;
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