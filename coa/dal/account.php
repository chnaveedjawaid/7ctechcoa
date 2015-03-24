<?php require '../config/db.php';

class account {
    
    public  $TableName = "account";
    public  $DrcrTableName = "account_dr_cr";

    public function account()
    {

    }
    
    // GET DEBIT CREDIT OF SPECIFIC ACCOUNT OR ALL ACOUNT
    // @Parameter $accountid 
    public function Select_Drcr($accountid)
    {
        global $db;
        if($accountid=="")
        {
            $sql = "SELECT * FROM ".$this->DrcrTableName;
        } else
        {
           $sql = "SELECT * FROM ". $this->DrcrTableName." where Account_id= ".$accountid;
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
    
    // INSERT DEBIT CREDIT IN AN ACCOUNT
    // @Parameter $accountid Account Id
    // @Parameter $dr DEBIT
    // @Parameter $cr CREDIT
    public function Insert_Drcr($acountid,$dr,$cr)
    {
        global $db;
        $Sql = 'INSERT INTO '.$this->DrcrTableName.' (Account_id , Debit , Credit) VALUES ('.$acountid.','.$dr.','.$cr.')';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
    // SELECT ACCOUNT
    // @Parameter $Condtion (Optional) for Selecting Specific account    
    public function Select($Condtion)
    {
        global $db;
        $arr = array();
        if ($Condtion == "") {
             $Sql = "SELECT * FROM ".$this->TableName;
        }
        else {
             $Sql = "SELECT * FROM ".$this->TableName." ". $Condtion;
        }
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            $arr['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
            $arr['err'] = false;
        } catch(PDOException $e){
            $arr['err'] = true;
            $arr['msg'] = $e->getMessage();
        }
        return $arr;
    }

    //
    // SELECT FORMATTED ACCOUNT With All Types
    // @Parameter $Condtion (Optional) for Selecting Specific accountq
    public function SelectFormated($Condtion)
    {
        global $db;
        if($Condtion == "")
        {
            $Sql = "SELECT account.Id , account.Name as 'ac_name' , account.Description, account.Parent_id, chart.Name as 'type_name' FROM `account` ,  `chart` WHERE (account.Chart_id = chart.id)";
        }
        else {
            $Sql = "SELECT account.Id ,account.Name as 'ac_name' , account.Description,account.Parent_id, chart.Name as 'type_name' FROM `account` ,  `chart` WHERE (account.Chart_id = chart.Id AND ".$Condtion.")";
        }
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            $arr['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
            $arr['err'] = false;
        } catch(PDOException $e){
            $arr['err'] = true;
            $arr['msg'] = $e->getMessage();
        }
        return $arr;
    }

    //
    // ADD ACCOUNT
    // @Parameter $AccountName  
    // @Parameter $AccountDescription  
    // @Parameter $parent_id  
    // @Parameter $AccountTypeId  
    public function Add($AccountName, $AccountDescription, $parent_id, $AccountTypeId,$UserId)
    {
        global $db;
        $sql = "INSERT INTO ".$this->TableName." (Name, Description, Chart_id,Parent_id,User_id)";
        $sql .= 'VALUES("'.$AccountName.'","'.$AccountDescription.'",'.$AccountTypeId.','.$parent_id.','.$UserId.')'; 
        try{
            $query = $db->prepare($sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }        
    }
    
    // UPDATE ACCOUNT
    // @Parameter $AccountName  
    // @Parameter $AccountDescription  
    // @Parameter $parent_id  
    // @Parameter $AccountTypeId  
    // @Parameter $AccountId  
    public function Update($AccountName, $AccountDescription, $AccountTypeId, $parent_id, $AccountId , $UserId)
    {
        global $db;
        $AccountName = trim($AccountName);
        $AccountDescription = trim($AccountDescription);
        $AccountTypeId = trim($AccountTypeId);
        $AccountId = trim($AccountId);
        $parent_id = trim($parent_id);
        $UserId = trim($UserId);
        $ChartId = trim($ChartId);
        
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($AccountName != "") {
            $Sql .= " Name = '".$AccountName."'";
        }
        if ($AccountDescription != "") {
            if ($AccountName == "") {
                $Sql .= "Description = '".$AccountDescription."'";
            }
            else {
                $Sql .=" , Description = '".$AccountDescription."'";
            }
        }
        if ($AccountTypeId != "") {
            if ($AccountName == "" && $AccountDescription == "") {
                $Sql .="  Chart_id = ".$AccountTypeId."";
            }
            else {
                $Sql .= " , Chart_id = ".$AccountTypeId."";
            }
        }
        if ($parent_id != "") {
            if ($AccountName == "" && $AccountDescription == "" && $AccountTypeId == "") {
                $Sql .= "  Parent_id = ".$parent_id."";
            }
            else {
                $Sql .=" , Parent_id = ".$parent_id."";
            }
        }
        if ($UserId != "") {
            if ($AccountName == "" && $AccountDescription == "" && $AccountTypeId == "" && $parent_id == "") {
                $Sql .= "  User_id = ".$UserId."";
            }
            else {
                $Sql .=" , User_id = ".$UserId."";
            }
        }
        try{
            $Sql .= " WHERE Id=".$AccountId; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    //DELETE SPECIFIC RECORD
    //@Parameter AccountId For Specific Account
    public function Delete_record($AccountId)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName + " WHERE Id =".$AccountId;
        try
        {
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();                    
        }
    }
	
	//CREATE VIEW
    //@Parameter userid For Specific user
	public function Create_view($userid){
		 global $db;
		 $Sql = "CREATE VIEW account_view AS SELECT * FROM ".$this->TableName + " WHERE User_id = '$userid'";
			try
			{
				$query = $db->prepare($Sql);
				$query->execute();
				return true;
			} catch(PDOException $e){
				return $e->getMessage();                    
			}
	}
	
	public function Select_view(){
		global $db;
        $sql = "SELECT * FROM account_view";
        
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

} 