<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of general_logic
 *
 * @author Faizan
 */
class general_logic {
     public $Verbrose = true;
     ////long
      
     public function NewTransection_($TransactionId,$AccountId, $Dr, $Cr, $_Verbrose){
         $output = new Output(); 
         $General = new transaction_general_general();
         $result = $General->Add($TransactionId,$AccountId, $Dr, $Cr);
         return $output->ReturnOutputCUD($result,$_Verbrose);
     }
     ////long
     public function NewTransection($parm)
	 {
		 $TransactionId = $parm["TransactionId"];
		 $AccountId = $parm["AccountId"];
		 $Dr = $parm["Dr"];
		 $Cr = $parm["Cr"];
		 $_Verbrose = $parm["_Verbrose"];
		 
         $output = new Output(); 
         $General = new transaction_general_general();
         $result = $General->Add($TransactionId,$AccountId, $Dr, $Cr);
         return $output->ReturnOutputCUD($result,$_Verbrose);
     }
}
