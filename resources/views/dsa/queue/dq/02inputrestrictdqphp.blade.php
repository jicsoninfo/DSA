<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Toggle</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>

            body {
                background-color: white;
                color: black;
                font-family: Arial, sans-serif;
            }

            header {
                background-color: #f0f0f0;
                color: black;
            }

            button {
                background-color: #e0e0e0;
                color: black;
            }


            body.dark-mode {
                background-color: #121212;  
                color: white; 
            }

            header.dark-mode {
                background-color: #1f1f1f;  
                color: white;
            }

            button.dark-mode {
                background-color: #333; 
                color: white; 
            }

            /* Additional Styles */
            /* h1, p {
                color: inherit; 
            } */


    </style>
</head>
<body>
    <header>
        <button id="dark-mode-toggle">Toggle Dark Mode</button>
    </header>

    <!-- <main>
        <h1>Welcome to Dark Mode</h1>
        <p>This is a simple dark mode toggle implementation.</p>
    </main> -->

    <!-- <script src="script.js"></script> -->

    <script>
    const toggleButton = document.getElementById('dark-mode-toggle');
    const body = document.body;
    const header = document.querySelector('header');
    const button = document.querySelector('button');

   
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
        header.classList.add('dark-mode');
        button.classList.add('dark-mode');
    }

  
    toggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        header.classList.toggle('dark-mode');
        button.classList.toggle('dark-mode');

       
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.removeItem('darkMode');
        }
    });


</script>
</body>
</html>



<?php
//phpinputrestrictdq //route


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


//Input Restricted Queue with Circular Array
class InputRestrictedQueueArray {
    private $queue;
    private $front;
    private $rear;
    private $size;
    private $capacity;

    public function __construct($capacity){
        $this->capacity = $capacity;
        $this->queue = array_fill(0, $capacity, null);
        $this->front = -1;
        $this->rear = -1;
        $this->size = 0;
    }

    //Enqueue operation (only allows inserting at the rear)
    public function enqueue($data){
        if($this->size == $this->capacity){
            throw new Exception("Queue is full");
        }

        if($this->front == -1){
            $this->front = 0;
        }

        $this->rear = ($this->rear + 1) % $this->capacity;
        $this->queue[$this->rear] = $data;
        $this->size++;
    }

    //Dequeue from the front
    public function dequeueFromFront() {
        if($this->size == 0) {
            throw new Exception("Queue is empty");
        }

        $data = $this->queue[$this->front];
        if($this->front == $this->rear){
            $this->front = $this->rear = -1; //Queue become empty
        }else{
            $this->front = ($this->front + 1) % $this->capacity;
        }

        $this->size--;
        return $data;
    }

    //Dequeue from the rear
    public function dequeueFromRear(){
        if($this->size == 0){
            throw new Exception("Queue is empty");
        }

        $data = $this->queue[$this->rear];
        if($this->front == $this->rear){
            $this->front = $this->rear = -1; //Queue become empty
        }else{
            $this->rear = ($this->rear -1 + $this->capacity) % $this->capacity;
        }

        $this->size--;
        return $data;
    }

    //Peek at the front element
    public function peekFront() {
        if($this->size == 0){
            throw new Exception("Queue is empty");
        }

        return $this->queue[$this->front];
    }

    //Peek at the rear element
    public function peekRear(){
        if($this->size == 0){
            throw new Exception("Queue is empty");
        }

        return $this->queue[$this->rear];
    }

    //Check if the queue is empty
    public function isEmpty(){
        return $this->size == 0;
    }

    //Get the size of the queue
    public function size(){
        return $this->size;
    }

    //Display the queue
    public function display(){
        if($this->isEmpty()){
            echo "Queu is empty\n";
            return;
        }

        $i = $this->front;
        while($i != $this->rear){
            echo $this->queue[$i] . " ";
            $i = ($i + 1) % $this->capacity;
        }

        echo $this->queue[$this->rear] . "\n";
    }



}

//Example usage;
echo "<br>";
$queueIRQA = new InputRestrictedQueueArray(5);

$queueIRQA->enqueue(10);
$queueIRQA->enqueue(20);
$queueIRQA->enqueue(30);
$queueIRQA->display();

echo "<br>";
echo "Dequeue from front: " . $queueIRQA->dequeueFromFront() . "\n";
echo "<br>";
$queueIRQA->display();
echo "<br>";

echo "Dequeue from rear: " . $queueIRQA->dequeueFromRear() . "\n";
echo "<br>";
$queueIRQA->display();
echo "<br>";






?>

