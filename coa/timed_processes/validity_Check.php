<?php 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
 class validity_Check {
	 
	// Check User Logedin time
	 public function __construct(){
		$logedin = new logedin();
		$loginUsers = $logedin->Select("");
		foreach($loginUsers['rows'] as $row){
			if(time() - $row['logintime'] > $row['validity']) { 
				$delUsers = $logedin->Delete($row['userID']);
			}
		}
	 }
	 
 }


