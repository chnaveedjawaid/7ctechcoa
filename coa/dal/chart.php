<?php require '../config/db.php';

class chart {

    public $TableName = "chart";
    
    // GET A SPECIFIC CHART OR ALL CHART
    // @Parameter $Condition 
    public function Select($Condition)
    {
        global $db;
        
        if ($Condition == "") {
            $Sql = "SELECT * FROM ".$this->TableName;
        }
        else {
            $Sql = "SELECT * FROM ".$this->TableName." ".$Condition;
        }
        
        try{
        $query = $db->prepare($Sql);
        $query->execute();
                $result['err'] = false;
                $result['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
                $result['err'] = true;
                $result['msg'] = $e->getMessage();
        }

        return $result;
    }
    
    // INSERT CHART
    // @Parameter $ChartName
    // @Parameter $ChartDescription
    public function Add($ChartName,$ChartDescription)
    {
        global $db;
		
        if($ChartName != "" && $ChartDescription != ""){
            $Sql = 'INSTER INTO ' .$this->TableName. '(Name, Description)';
            $Sql = $Sql . 'VALUES("' . $ChartName . '","' . $ChartDescription . '")';
            try{
            $query = $db->prepare($Sql);
            $query->execute();            
            $result = true;
            }catch(PDOException $e){
                $result = $e->getMessage();                
            }
        }else{            
            $result = 'Invalid parameters';
        }
		
	return $result;
        
    }
	 // UPDATE CHART
        // @Parameter $ChartName  
        // @Parameter $ChartDescription  
        // @Parameter $ChartId   
	public function Update($ChartName,$ChartDescription,$ChartId){
            global $db;
            
            if($ChartName != "" && $ChartDescription != "" && $ChartId != ""){
                $Sql = 'UPDATE '.$this->TableName.' SET Name = '.$ChartName.', Description='.$ChartDescription.' WHERE Id ='.$ChartId;
                try{
                $query = $db->prepare($Sql);
                $query->execute();
                        $result = true;
                        
                }catch(PDOException $e){
                        
                        $result = $e->getMessage();
                }
            }else{
                
                $result = 'Invalid parameters';
            }

            return $result;
	}
	
        //DELETE SPECIFIC CHART
        //@Parameter $ChartId
	public function Delete_record($ChartId){
            global $db;
		
            if($ChartId != ""){
                $Sql = "DELETE FROM " . $this->TableName . " WHERE Id =" . $ChartId;
                try{
                $query = $db->prepare($Sql);
                $query->execute();
                    $result = true;
                    
                }catch(PDOException $e){
                    
                    $result = $e->getMessage();
                }
            }else{
                 
                 $result = 'Invalid parameters';
            }

            return $result;
	}


} 