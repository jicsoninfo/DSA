<?php
//phpinputrestrictdq


echo "==================Input Restricted Queue ========================";


// Implementation of Input Restricted Queue in PHP (Usering Dounly Linked List)
class NodeIRDQ{
    public $data;
    public $next;
    public $prev;

    public function __construct($data){
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

class InputRestrictedQueue {
    private $front;
    private $rear;
    private $size;

    public function __construct() {
        $this->front = null;
        $this->rear = null;
        $this->size = 0;
    }

    //Enqueue operation (only allows inserting at the rear)
    public function enqueue ($data){
        $newNode = new NodeIRDQ($data);
        if($this->isEmpty()){
            $this->front = $this->rear = $newNode;
        }else{
            $this->rear->next = $newNode;
            $newNode->prev = $this->rear;
            $this->rear = $newNode;
        }
        $this->size++;
    }



    //Dequeue from the front of the queue
    public function dequeueFromfront() {
        if($this->isEmpty()){
            throw new Exception('Queue is empty');
        }

        $data = $this->front->data;
        $this->front = $this->front->next;

        if($this->front != null){
            $this->front->prev = null;
        }else{
            $this->rear = null; //If the queue is now empty
        }

        $this->size--;
        return $data;
    }

    //Dequeue from the rear of the queue
    public function dequeueFromRear(){
        if($this->isEmpty()){
            throw new Exception('Queue is empty');
        }

        $data = $this->rear->data;
        $this->rear = $this->rear->prev;

        if($this->rear != null){
            $this->rear->next = null;
        }else{
            $this->front = null; // If the queue is now empty
        }

        $this->size--;
        return $data;
    }

    //Peek at the front element
    public function peekFront(){
        if($this->isEmpty()){
            throw new Exception('Queue is empty');
        }

        return $this->front->data;
    }

    //Peek at the rear element
    public function peekRear(){
        if($this->isEmpty()){
            throw new Exception('Queue is empty');
        }

        return $this->rear->data;
    }

    // Check if the queue is empty
    public function isEmpty() {
        return $this->size === 0;
    }

    // Get the size of the queue
    public function size() {
        return $this->size;
    }

    // Display the elements of the queue
    public function display(){
        if($this->isEmpty()){
            echo "Queuw is empty\n";
            return;
        }

        $current = $this->front;
        while ($current != null){
            echo $current->data . "<-> ";
            $current = $current->next;
        }

        echo "NULL\n";
    }



}

//Example usage:
echo "<br>";
$queue = new InputRestrictedQueue();

//Enqueue element at the rear (Input Restricted)
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);

//Display the current state of the queue
echo "<br>";
$queue->display(); // Output: 10 <-> 20 <-> 30 <-> NULL

//Dequeue from the front
echo "<br>";
echo "Dequeue from front: " . $queue->dequeueFromfront() . "\n"; // Output: 10
echo "<br>";
$queue->display(); // Output: 20 <-> 30 <-> NULL

// Dequeue from the rear
echo "<br>";
echo "Dequeue from rear: " . $queue->dequeueFromRear() . "\n"; // Output: 30
echo "<br>";
$queue->display(); // Output: 20 <-> NULL

// Peek at the front and rear elements
echo "<br>";
echo "Peek at front: " . $queue->peekFront() . "\n"; // Output: 20
echo "<br>";
echo "Peek at rear: " . $queue->peekRear() . "\n"; // Output: 20
echo "<br>";

// Check if the queue is empty
echo "<br>";
echo "Is the queue empty? " . ($queue->isEmpty() ? "Yes" : "No") . "\n"; // Output: No
echo "<br>";





//===========================================================================

echo "==================Input Restricted Queue with Circular Array: ========================";





?>