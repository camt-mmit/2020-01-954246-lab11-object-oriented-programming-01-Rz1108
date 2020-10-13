<?php
/**
     * ID:602110198
     * Name: Jingrong Zhuang
     * WeChat: Rz
     */
    Class billcalc{
    
        private $file;
        private $pricing;
        private $unit;
        private $add;
    
        function __construct($filen,$add_data){
            $this->file=$filen;
            $this->add=$add_data;
        }
        function calcprice($n){
            $source=fopen($this->file,'a+');
            fwrite($source,$this->add);
            fclose($source);
            $source0=fopen($this->file,'r');
            fscanf($source0,"%d",$j);
            for ($i=0;$i<$j;$i++){
                fscanf($source0,"%d %d %d",$this->pricing[$i]['unit'],$this->pricing[$i]['price'],$this->pricing[$i]['isWhole']);
                if ($this->pricing[$i]['isWhole']==1) $this->pricing[$i]['isWhole']=true;
                if ($this->pricing[$i]['isWhole']==0) $this->pricing[$i]['isWhole']=false;
                if ($this->pricing[$i]['unit']==0) $this->pricing[$i]['unit']=PHP_INT_MAX;
            }
    
            $this->unit=$n;
            for($i = 0;$this->unit > 0; $i++) {
            $unitCal = ($this->unit > $this->pricing[$i]['unit'])? $this->pricing[$i]['unit'] : $this->unit;
            $price += ($this->pricing[$i]['isWhole'])? $this->pricing[$i]['price'] : $unitCal * $this->pricing[$i]['price'];
            $this->unit -= $unitCal;
            }
            printf("Price of electricity bill = %d\n", $price);
    }}


$filename=$_SERVER['argv'][1];
$add_data=null;
$calc= new billcalc($filename,$add_data);
while (true){
    printf("Input usage unit(-1 for exit): ");
    $unit=null;
    fscanf(STDIN,"%d",$unit);
    if ($unit==-1) break;
    else $calc->calcprice($unit);

}

