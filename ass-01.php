<?php
/**
     * ID:602110198
     * Name: Jingrong Zhuang
     * WeChat: Rz
     */

Class multiplication
{
    private $row;
    private $column;

    function __construct($rn){
       $this->row=$rn;
    }
    function loop($cn){
      $this->column=$cn;
     for ($i=1;$i<=$this->row;$i++){
       for ($j=2;$j<=$this->column;$j++){
         printf("%5d",$i*$j);
       }
       echo"\n";
     }}  
}

$rn=(int)$_SERVER['argv'][1];
if ($rn==null||$rn>12) $rn=12;
$calc= new multiplication($rn);
while(true){
printf("Input size(0 for exit): ");
$cn=null;
fscanf(STDIN,"%d",$cn);
if ($cn=="0") break;
else $calc->loop($cn);
}