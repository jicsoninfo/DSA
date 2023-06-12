<?php

//use CreateQueue as GlobalCreateQueue;

class CreateQueue{
    public $front;
    public $rear;
    public $queuephp = [];

    public function __construct()
    {
        $this->rear = -1;
        $this->front = -1;
    }

    public function EnQueue($envalue){
        $this->queuephp[++$this->rear] = $envalue;
    }

    public function DeQueue(){
        if($this->rear == $this->front){
            echo "Queue is empty.\n";
        }else{
            $deqvalue = $this->queuephp[++$this->front];
            unset($this->queuephp[$this->front]);
            echo $deqvalue."is deleted from the queue. \n";
        }
    }
}

$myqueue = new CreateQueue();
$myqueue->EnQueue(55);
$myqueue->EnQueue(58);
$myqueue->EnQueue(54);
$myqueue->EnQueue(53);

$myqueue->DeQueue();

echo "<pre>";
print_r($myqueue);

echo "==================second method===============================";

class qarr{
    public $s1;
    public $s2;
    public function __construct()
    {
        $this->s1 = [];
        $this->s2 = [];
    }
    public function enq($val){
        // while(count($this->s1) != 0){
        //     array_push($this->s2, array_pop($this->s1));
        // }
        // array_push($this->s1, $val);
        // while(count($this->s2)!=0){
        //     array_push($this->s1, array_pop($this->s2));
        // }
        array_unshift($this->s1, $val);
    }
    public function deq(){
        if(count($this->s1) == 0){
            $msg = "Q is empty";
            return $msg;
        }
        // $deqval = array_pop($this->s1);
        // return $deqval;
        // $deval_ = array_shift($this->s1);
        // return $deval_;
        $deval_ = array_pop($this->s1);
        return $deval_;
    }
}

$qphp = new qarr();
$qphp->enq(90);
$qphp->enq(50);
$qphp->enq(40);
$qphp->enq(30);
$qphp->enq(20);

 $deqvalue =  $qphp->deq();
 $deqvalue1 =  $qphp->deq();
 print_r($deqvalue);
 echo "<br />";
 print_r($deqvalue1);

echo "<pre>";
print_r($qphp->s1);
?>