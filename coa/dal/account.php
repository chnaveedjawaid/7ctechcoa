<?php require 'config/db.php';

class account {

    public  $TableName = "account";
    public  $DrcrTableName = "account_dr_cr";

    public function account()
    {

    }

    public function Select_Drcr($accountid)
    {
        global $db;
        if($accountid=="")
        {
            $sql = "SELECT * FROM ".$this->DrcrTableName;
        } else
        {
           $sql = "SELECT * FROM ". $this->DrcrTableName."  where account_id= ".$accountid;
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

    public function Insert_Drcr($acountid,$dr,$cr)
    {
        global $db;
        $Sql = 'INSERT INTO '.$this->DrcrTableName.' VALUES ('.$acountid.','.$dr.','.$cr.')';
        try{
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function Select($Condtion)
    {
        global $db;
        $arr = array();
        if ($Condtion == "") {
            echo $Sql = "SELECT * FROM ".$this->TableName;
        }
        else {
            echo $Sql = "SELECT * FROM ".$this->TableName." ". $Condtion;
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

    public function SelectFormated($Condtion)
    {
        global $db;
        if($Condtion == "")
        {
            $Sql = "SELECT account.id , account.name as 'ac_name' , account.description,account.parent_id, chart.name as 'type_name' FROM  `account` ,  `chart` WHERE (account.type_id = chart.id)";
        }
        else {
            $Sql = "SELECT account.id ,account.name as 'ac_name' , account.description,account.parent_id, chart.name as 'type_name' FROM  `account` ,  `chart` WHERE (account.type_id = chart.id AND ".$Condtion.")";
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

    public function Add($AccountName, $AccountDescription, $parent_id, $AccountTypeId)
    {
        global $db;
        $sql = "INSERT INTO ".$this->TableName." (name, description, type_id,parent_id)";
        $sql .= 'VALUES("'.$AccountName.'","'.$AccountDescription.'",'.$AccountTypeId.','.$parent_id.')'; 
        try{
            $query = $db->prepare($sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }        
    }
    
    public function Update($AccountName, $AccountDescription, $AccountTypeId, $parent_id, $AccountId)
    {
        global $db;
        $AccountName = trim($AccountName);
        $AccountDescription = trim($AccountDescription);
        $AccountTypeId = trim($AccountTypeId);
        $AccountId = trim($AccountId);
        $parent_id = trim($parent_id);
        
        
        $Sql = "UPDATE ".$this->TableName." SET ";
        
        if ($AccountName != "") {
            $Sql .= " name = '".$AccountName."'";
        }
        if ($AccountDescription != "") {
            if ($AccountName == "") {
                $Sql .= "description = '".$AccountDescription."'";
            }
            else {
                $Sql .=" , description = '".$AccountDescription."'";
            }
        }
        if ($AccountTypeId != "") {
            if ($AccountName == "" && $AccountDescription == "") {
                $Sql .="  type_id = ".$AccountTypeId."";
            }
            else {
                $Sql .= " , type_id = ".$AccountTypeId."";
            }
        }
        if ($parent_id != "") {
            if ($AccountName == "" && $AccountDescription == "" && $AccountTypeId == "") {
                $Sql .= "  parent_id = ".$parent_id."";
            }
            else {
                $Sql .=" , parent_id = ".$parent_id."";
            }
        }
        try{
            $Sql .= " WHERE id=".$AccountId; 
            $query = $db->prepare($Sql);
            $query->execute();
            return true;
        } catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    
    public function Delete_record($AccountId)
    {
        global $db;
        $Sql = "DELETE FROM ".$this->TableName + " WHERE id =".$AccountId;
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