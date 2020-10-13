<?php
/**
     * ID:602110198
     * Name: Jingrong Zhuang
     * WeChat: Rz
     */
Class App{
    private $num;
 function __construct($menuN){
     $this->num=$menuN;
     if ($this->num==1){
        $rn=(int)$_SERVER['argv'][1];
        if ($rn==null||$rn>15) $rn=15;
        $calc= new multiplication($rn);
        printf("Input size: ");
        fscanf(STDIN,"%d",$cn);
        $calc->loop($cn);
     }
     else{
        $filename="ass-03.txt";
        $add_data="5\n10 10 1\n5 3 0\n5 5 0\n10 10 0\n0 20 0\n";
        $calc= new billcalc($filename,$add_data);
        printf("Input usage unit: ");
        $unit=null;
        fscanf(STDIN,"%d",$unit);
        $calc->calcprice($unit);
        
     }
 }
}
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

while (true){
    printf(
        <<<EOT
        1. Multiplication Table
        2. Electricity Bill calculation
        3. exit

        EOT
                    );
    printf("Input menu number: ");
    fscanf(STDIN,"%d",$menuN);
    if($menuN==1||$menuN==2) $apprun= new App($menuN);
    else if($menuN==3) break;
    else printf("Invalid menu number %d!!!\n\n",$menuN);

}
