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


echo "=========Queue program through array================" . "<br>";


class Queue {
    private $items = [];
    //Initialize an empty queue
    public function __construct(){
        $this->items = [];
    }

    //Check if the queue is empty
    public function isEmpty(){
        return count($this->items) === 0;
    }

    //Add an item to the back of the queue
    public function enqueue($item){
        $this->items[] = $item;
    }

    //Remove and return the front item of the queue
    public function dequeue(){
        if(!$this->isEmpty()){
            return array_shift($this->items); //Removes the first item
        }else{
            throw new Exception('Dequeue from an empty queue');
        }
    }

    //Display the current items in the queue
    public function display() {
        echo "Queue: " . implode(", ", $this->items) . PHP_EOL;
    }

    //Return the number of items in the queue
    public function size(){
        return count($this->items);
    }

    //Return the front item of the queue without removing
    public function peek(){
        if(!$this->isEmpty()){
            return $this->items[0]; //the first item in the array
        }else{
            throw new Exception("Peek from an empty queus");
        }
    }
}


// Example usage of the Queue class
$queue = new Queue();

// Add items to the queue
$queue->enqueue('Task 1');
$queue->enqueue('Task 2');
$queue->enqueue('Task 3');

// Display the current queue
$queue->display();  // Queue: Task 1, Task 2, Task 3

// Remove and return the front item (dequeue)
echo "Dequeued: " . $queue->dequeue() . PHP_EOL;  // Dequeued: Task 1

// Display the current queue after dequeue
$queue->display();  // Queue: Task 2, Task 3

// Peek the front item without removing it
echo "Front item: " . $queue->peek() . PHP_EOL;  // Front item: Task 2

// Display the current size of the queue
echo "Queue size: " . $queue->size() . PHP_EOL;  // Queue size: 2


?>