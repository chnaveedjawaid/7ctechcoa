<?php
class student{
    
    public  $TableName = "student";
    
    // GET teachers_for_classes
	// Author MOhiUddin 
 
    
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
	
    // INSERT VALUES IN teachers_for_classes TABLE
    // @Parameter `First_name``Middle_name``Last_name``Father_name``Address``Joining_date``Status_id``P_id``School_id``Contact_no` Gender dob

    
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
	
	
    public function Insert($First_name, $Middle_name, $Last_name, $Father_name, $Address, $Status_id, $P_id, $School_id, $Contact_no, $Gender, $dob){  
	

		global $db;
        $Sql = 'INSERT INTO '.$this->TableName.' (First_name, Middle_name, Last_name, Father_name, Address, Status_id, P_id, School_id, Contact_no, Gender, dob)
		VALUES ("'.$First_name.'","'.$Middle_name.'","'.$Last_name.'","'.$Father_name.'","'.$Address.'",'.$Status_id.','.$P_id.','.$School_id.','.$Contact_no.',"'.$Gender.'",'.$dob.')';
		
		
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    

	 public function Update($First_name, $Middle_name, $Last_name, $Father_name, $Address, $Status_id, $P_id, $School_id, $Contact_no, $Gender, $dob,$where)
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
		if ($Address != "") {
          
                $Sql .= " , Address = '".$Address."'";
          
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
		if ($Contact_no != "") {
          
                $Sql .= " , Contact_no = '".$Contact_no."'";
          
        }
		if ($dob != "") {
          
                $Sql .= " , dob = '".$dob."'";
          
        }
		if ($Gender != "") {
          
                $Sql .= " , Gender = '".$Gender."'";
          
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