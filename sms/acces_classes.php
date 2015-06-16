<?php
class acces_classes {
    
    public  $TableName = "classes";
    
    // GET CLASSES DETAIL 
    // @Parameter Where condtion 
    
	public function Select_class($cond)
    {
		global $db;
        $cls = new classes();
	
        if($cond=="")
        {
           
		   $ret = $cls->Select();
		   
        } else
        {
           $conds = "WHERE class_id =".$cond;
		   $ret = $cls->Select($conds);
        }
        
        return $ret;
    }
	
	// UPDATE CLASSES VALUES 
    // @Parameter Class Name
	// @Parameter Class Description
	// @Parameter Class Status_id
	// @Parameter Class Section Shift
	
	public function update_class(...$para)
	{
		global $db;
		
		$cls = new classes();
		
		$ret = $cls->Update(...$para);
		//Return 1 or 0
		echo $ret;
		
	}
	
	
}	