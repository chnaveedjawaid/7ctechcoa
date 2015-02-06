<?php

class account {

    public  $TableName = "account";
    public $DrcrTableName = "account_dr_cr";

    public function account()
    {
///tariq test..
    }

    public function Select_Drcr($accountid = 0)
    {
        global $db;
        if($accountid==0)
        {
            $sql = "SELECT * FROM ".$this->DrcrTableName;
        } else
        {
           $sql = "SELECT * FROM ". $this->DrcrTableName."  where account_id= ".$accountid;
        }
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Insert_Drcr($acountid,$dr,$cr)
    {
        global $db;
        $Sql = 'INSERT INTO '.$this->DrcrTableName.' VALUES ('.$acountid.','.$dr.','.$cr.')';
        $query = $db->prepare($Sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Select($Condtion = 0)
    {
        global $db;
        if ($Condtion == 0) {
            $Sql = "SELECT * FROM ".$this->TableName;
        }
        else {
            $Sql = "SELECT * FROM ".$this->TableName." ". $Condtion;
        }

        $query = $db->prepare($Sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function SelectFormated($Condtion = 0)
    {
        global $db;
        if($Condtion == 0)
        {
            $Sql = "SELECT account.id , account.name as 'ac_name' , account.description,account.parent_id, chart.name as 'type_name' FROM  `account` ,  `chart` WHERE (account.type_id = chart.id)";
        }
        else {
            $Sql = "SELECT account.id ,account.name as 'ac_name' , account.description,account.parent_id, chart.name as 'type_name' FROM  `account` ,  `chart` WHERE (account.type_id = chart.id AND ".$Condtion.")";
        }

        $query = $db->prepare($Sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function Add($AccountName, $AccountDescription, $parent_id, $AccountTypeId)
    {
        global $db;
        //if()
    }

} 