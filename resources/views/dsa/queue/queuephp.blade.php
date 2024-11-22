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
        while(count($this->s1) != 0){
            array_push($this->s2, array_pop($this->s1));
        }
        array_push($this->s1, $val);
        while(count($this->s2)!=0){
            array_push($this->s1, array_pop($this->s2));
        }
        // array_unshift($this->s1, $val);
    }
    public function deq(){
        if(count($this->s1) == 0){
            $msg = "Q is empty";
            return $msg;
        }
        $deqval = array_pop($this->s1);
        return $deqval;
        $deval_ = array_shift($this->s1);
        return $deval_;
        // $deval_ = array_pop($this->s1);
        // return $deval_;
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





echo "=========Queue program through linked list================" . "<br>";
class NodeQ{
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
        $this->next = null; // Initially, the next node is null
    }
}


class QueueLL {
    private $head; //Points to the front of the queue
    private $tail; //Points to the back of the queue
    private $size;

    //Initialize the queue as empty
    public function __construct(){
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    //Check if the queue is empty
    public function isEmpty(){
        return $this->size === 0;
    }

    //Add an item to the back of the queue
    public function enqueue($item){
        $newNode = new NodeQ($item); // Create a new node
        if($this->isEmpty()){
            $this->head = $newNode; // If the queue is empty, both head and tail point to the new node
            $this->tail = $newNode;
        }else{
            $this->tail->next = $newNode; //Attach the new node to the end of the queue
            $this->tail = $newNode; //Update the tail to the new node
        }
        $this->size++; // Increase the size of the queue
    }


    //Remove and return the front item of the queue
    public function dequeue(){
        if(!this->isEmpty()){
            $frontItem = $this->head->data; //Get the data of the front node
            $this->head = $this->head->next; // Move the head pointer to the next node

            //If the queue becomes empty, set the tail to null
            if($this->isEmpty()){
                $this->tail = null;
            }

            $this->size--; // Decrease the size of the queue
            return $frontItem;
        }else{
            throw new Exception ('Dequeue from an empty queue');
        }
            
    }


    //Display the current items in the queue
    public function display(){
        if($this->isEmpty()){
            echo "Queue is empty" .PHP_EOL;
            return;
        }

        $current = $this->head;
        $queueItems = [];

        while($current != null){
            $queueItems[] = $current->data;
            $current = $current->next;
        }

        echo "Queue: " .implode(", ", $queueItems) . PHP_EOL;
    }

    //Return the number of items in the queue
    public function size(){
        return $this->size;
    }

    //Return the front item of the queue without removing it
    public function peek(){
        if(!$this->isEmpty()){
            return $this->head->data;
        }else{
            throw new Exception('Peek from an empty queue');
        }
    }


}

//Example usage of the Queue class

$queuell = new QueueLL();

//Add items to the queue
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