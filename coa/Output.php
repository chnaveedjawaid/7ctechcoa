<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Output
 *
 * @author Faizan
 */
class Output {
    public function ReturnOutputCUD($result,$Verbarose){
        
       
        if($Verbarose===true){
            if($result === true){
                $arr['resoult'] = 'Process completed successfuly';
                $arr['msg'] = true;
            } else {
                $arr['resoult'] = 'Process failed';
                $arr['msg'] = false;
                $arr['err_msg'] = $result;
            }
            echo json_encode($arr);
            return json_encode($arr);
        }
    }
    
    public function ReturnOutputV($result){
        print_r($result);
        if($result['err'] == false){
            $arr['resoult'] = $result['rows'];
            $arr['msg'] = true;
        } else {
            $arr['resoult'] = 'Process failed';
            $arr['msg'] = false;
            $arr['err_msg'] = $result['msg'];
        }
        return json_encode($arr);
    }
}
