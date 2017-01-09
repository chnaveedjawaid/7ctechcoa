<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chart_logic
 *
 * @author Faizan
 */
class chart_logic {
    //put your code here
    public function SelectChart(){
        $chart = new chart();
        $output = new Output();
        $chr = $chart->Select("");
        return $output->ReturnOutputV($chr);
    }
}
