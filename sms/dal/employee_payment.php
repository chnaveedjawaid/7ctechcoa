<?php 

class Employee_payment {
    
    public  $TableName = "employ_payments";
    
    // GET Employee DETAIL 
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
	
	
    
    // INSERT VALUES IN CLASSES TABLE
    // @Parameter Class name
    // @Parameter Status_id	
    // @Parameter class description
    public function Insert($extra_alounce_amount,$alownce_descryption,$tottal_amount_paied)
    {
		
        global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (extra_alounce_amount , alownce_descryption , tottal_amount_paied) VALUES ('.$extra_alounce_amount.',"'.$alownce_descryption.'","'.$tottal_amount_paied.'")';
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
    public function Update($extra_alounce_amount, $alownce_descryption=false, $tottal_amount_paied=false,$where)
    {	
		
        global $db;
        //$extra_alounce_amount = trim(extra_alounce_amount);
        $alownce_descryption = trim($alownce_descryption);
        $tottal_amount_paied = trim($tottal_amount_paied);
        $employ_id = trim($employ_id);
       // $Section_Shift = trim($Section_Shift);
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($extra_alounce_amount != "") {
            $Sql .= " extra_alounce_amount = ".$extra_alounce_amount."";
        }
	
        if ($alownce_descryption != "") {
            if ($extra_alounce_amount == "") {
                $Sql .= "alownce_descryption = '".$alownce_descryption."'";
            }
            else {
                $Sql .=" , alownce_descryption = '".$alownce_descryption."'";
            }
        }
        if ($tottal_amount_paied != "") {
            if ($extra_alounce_amount == "" && $alownce_descryption == "") {
                $Sql .="  tottal_amount_paied = '".$tottal_amount_paied."'";
            }
            else {
                $Sql .= " , tottal_amount_paied = '".$tottal_amount_paied."'";
            }
        }
       
        
        try{
            $Sql .= $where; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC ClASS
    //@Parameter CLASS ID For Specific CLASS
    public function DeleteEmployeePayment($WHERE)
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