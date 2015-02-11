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
     
     public function NewTransection($AccountId, $Dr, $Cr, $_Verbrose){
         $output = new Output(); 
         $General = new transaction_general_general();
         $result = $General->Add($AccountId, $Dr, $Cr);
         return $output->ReturnOutputCUD($result,$_Verbrose);
     }
}
