<?php 

class staff {
    
    public  $TableName = "staff";
    
    // GET staff
	// Author Naveed 
    // @Parameter Where condtion 
    
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
	
	// GET SPECIFIC FIELD staff
	// @Parameter $field_name  Specific column  
	// @Parameter Where condtion fee_concession id 
	
	public function SelectField($fieldName,$cond_id)
	
    {
		global $db;
        if($cond_id=="")
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
	
	
    
    // INSERT VALUES IN staff  TABLE
    // @Parameter Expense name
    // @Parameter Expense Description	
    // @Parameter Acount id
    public function Insert($First_name,$Middle_name,$Last_name,$Father_name,$NIC_No,$Adress,$Status_id,$P_id,$School_id,$Type_id,$contact_no,$Email)
    {
		
        global $db;
		$Sql = 'INSERT INTO '.$this->TableName.' (First_name , Middle_name , Last_name , Father_name , NIC_No , Adress , Status_id , P_id , School_id , Type_id , contact_no , Email)
		VALUES ("'.$First_name.'","'.$Middle_name.'","'.$Last_name.'","'.$Father_name.'","'.$NIC_No.'","'.$Adress.'","'.$Status_id.'","'.$P_id.'","'.$School_id.'",'.$Type_id.','.$contact_no.',"'.$Email.'")';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // UPDATE staff
    // @Parameter Expense id  
    // @Parameter Expense name  
    // @Parameter Expense descryption  
    // @Parameter Expense acount id 
    public function Update($First_name,$Middle_name,$Last_name,$Father_name,$NIC_No,$Adress,$Status_id,$P_id,$School_id,$Type_id,$contact_no,$Email,$where)
    {	
		
        global $db;
       
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($First_name != "") {
            $Sql .= " First_name = '".$First_name."'";
        }
		if ($Middle_name != "") {
          
                $Sql .= " , Middle_name = '".$Middle_name."'";
          
        }
        if ($Last_name != "") {
          
                $Sql .= " , Last_name = '".$Last_name."'";
          
        }
		if ($Father_name != "") {
          
                $Sql .= " , Father_name = '".$Father_name."'";
          
        }
		if ($NIC_No != "") {
          
                $Sql .= " , NIC_No = '".$NIC_No."'";
          
        }
		if ($Adress != "") {
          
                $Sql .= " , Adress = '".$Adress."'";
          
        }
		if ($Status_id != "") {
          
                $Sql .= " , Status_id = '".$Status_id."'";
          
        }
		if ($P_id != "") {
          
                $Sql .= " , P_id = '".$P_id."'";
          
        }
		if ($School_id != "") {
          
                $Sql .= " , School_id = '".$School_id."'";
          
        }
		if ($Type_id != "") {
          
                $Sql .= " , Type_id = '".$Type_id."'";
          
        }
		if ($contact_no != "") {
          
                $Sql .= " , contact_no = '".$contact_no."'";
          
        }
		if ($Email != "") {
          
                $Sql .= " , Email = '".$Email."'";
          
        }
        
        try{
            $Sql .= " ".$where; 
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