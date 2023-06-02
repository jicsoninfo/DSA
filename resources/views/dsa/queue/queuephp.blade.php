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

?>