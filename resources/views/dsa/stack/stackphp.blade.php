<?php 

class stackarr{
    public $s3;
    //public $s4;
    public function __construct(){
        $this->s3 = [];
        //$this->s4 = [];
    }
    public function enstack($stval){
        array_push($this->s3, $stval);
    }
    public function destack(){
        // while(count($this->s3) != 0){
        //     array_push($this->s4, array_pop($this->s3));
        // }
        // $destackval = array_pop($this->s4);
        // while(count($this->s4) !=0){
        //     array_push($this->s3, array_pop($this->s4) );
        // }
        $destackval = array_pop($this->s3);
        return $destackval;
    }
}


echo "<br />================Stack====================<br />";
$stackphp = new stackarr();
$stackphp->enstack(60);
$stackphp->enstack(65);
$stackphp->enstack(70);
$stackphp->enstack(75);
echo "<pre>";
print_r($stackphp->s3);
//$stackphp->destack();
$destvlue =  $stackphp->destack();
 print_r($destvlue);
 $stackphp->destack();


echo "<br /> ============================Statck through linked list==========================";
class node{
    public $data;
    public $next;
}

class ll{
    public $head;
    
    public function __construct(){
        $this->head = null;
    }
    
    public function front_push($newdata){
        $newnode = new node();
        $newnode->data = $newdata;
        $newnode->next = $this->head;
        $this->head = $newnode;
    }
    
    public function front_pop(){
        if($this->head != null){
            $temp = $this->head;
            $this->head = $this->head->next;
            $temp=null;
        }
    }
}

$singlell = new ll();
$singlell->front_push(12);
$singlell->front_push(16);
$singlell->front_push(19);


$singlell->front_pop();
// $singlell->front_pop();
// $singlell->front_pop();
// $singlell->front_pop();
print_r($singlell);

?>