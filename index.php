<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require 'coa/accesspoint/accesspoint.php';
        $caller = new accessPoint();
        $cname= $_GET['cname'];
        $fname = $_GET['fname'];
        $param = $_GET['param'];
        $resp = $caller->MainCall($cname, $fname,NULL, $param);
        echo $resp;
        ?>
    </body>
</html>
