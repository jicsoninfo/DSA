<?php
//phpdq //route
echo "==================Double ended Q ========================";

class NodeDE{
    public $data;
    public $next;
    public $prev;

    public function __construct($data){
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

class DequeDE {
    private $front;
    private $rear;
    private $size;

    public function __construct(){
        $this->front = null;
        $this->rear = null;
        $this->size = 0;
    }

    //Check if the deque is empty
    public function isEmpty() {
        return $this->size === 0;
    }

    //Add an element to the front of the deque
    public function addFirst($data){
        $newNode = new NodeDE($data);
        if($this->isEmpty()){
            $this->front = $this->rear = $newNode;
        }else{
            $newNode->next = $this->front;
            $this->front->prev = $newNode;
            $this->front = $newNode;
        }
        $this->size++;
    }

    //Add an element to the back of the deque
    public function addLast($data){
        $newNode = new NodeDE($data);
        if($this->isEmpty()){
            $this->front = $this->rear = $newNode;
        }else{
            $newNode->prev = $this->rear;
            $this->rear->next = $newNode;
            $this->rear = $newNode;
        }
        $this->size++;
    }

    //Remove an element from the front of the deque
    public function removeFirst(){
        if($this->isEmpty()){
            throw new Exception('Deque is empty');
        }
        $data = $this->front->data;
        if($this->front === $this->rear){
            $this->front = $this->rear = null; // Only one element
        }else{
            $this->front = $this->front->next;
            $this->front->prev = null;
        }
        $this->size-- ;
        return $data;
    }

    //Remove an element from the back of the deque
    public function removeLast(){
        if($this->isEmpty()){
            throw new Exception('Deque is empty');
        }
        $data = $this->rear->data;
        if($this->front === $this->rear){
            $this->front = $this->rear = null; // Only one element
        }else{
            $this->rear = $this->rear->prev;
            $this->rear->next = null;
        }
        $this->size--;
        return $data;
    }

    //Return the element at the front without removing it
    public function peekFirst(){
        if($this->isEmpty()){
            throw new Exception('Deque is empty');
        }
        return $this->front->data;
    }

    // Return the element at the back without removing it
    public function peekLast(){
        if($this->isEmpty()){
            throw new Exception('Deque is empty');
        }
        return $this->rear->data;
    }

    //Get the size of the deque
    public function size(){
        return $this->size;
    }

    // Display all elements in the deque
    public function display(){
        if($this->isEmpty()){
            echo "Deque is empty\n";
            return;
        }
        $current = $this->front;
        while ($current != null){
            echo $current->data . "<->";
            $current = $current->next;
        }
        echo "NULL\n";
    }



}

//Example usage;
$dequede = new DequeDE();


// Adding elements to the front and back
$dequede->addFirst(10);
$dequede->addFirst(20);
$dequede->addLast(30);
$dequede->addLast(40);

echo "<br>";
// Display the deque
$dequede->display(); // Output: 20 <-> 10 <-> 30 <-> 40 <-> NULL

echo "<br>";
// Removing elements from the front and back
echo "Removed from front: " . $dequede->removeFirst() . "\n"; // Output: 20
echo "<br>";
echo "Removed from back: " . $dequede->removeLast() . "\n"; // Output: 40


echo "<br>";
// Display the updated deque
$dequede->display(); // Output: 10 <-> 30 <-> NULL

echo "<br>";
// Peek at the front and back
echo "Peek at front: " . $dequede->peekFirst() . "\n"; // Output: 10
echo "<br>";
echo "Peek at back: " . $dequede->peekLast() . "\n"; // Output: 30




echo "<br>";






echo "==================Double ended Q with Array Implementation: ========================";


    class ArrayDeque {
        private $deque;
        private $front;
        private $rear;
        private $size;
        private $capacity;

        public function __construct($capacity){
            $this->capacity = $capacity;
            $this->deque = array_fill(0, $capacity, null);
            $this->front = -1;
            $this->rear = -1;
            $this->size = 0;
        }

        //Add an element to the front
        public function addFirst($data){
            if($this->size == $this->capacity) {
                throw new Exception("Deque is full");
            }

            if($this->front == -1){ //If the deque is empty
                $this->front = 0;
                $this->rear = 0;
            }elseif ($this->front == 0) {
                $this->front = $this->capacity - 1;
            } else{
                $this->front--; 
            }

            $this->deque[$this->front] = $data;
            $this->size++;
        }

        //Add an element to the back
        public function addLast($data){
            if($this->size == $this->capacity){
                throw new Exceptioni("Deque is full");
            }

            if ($this->rear == -1){ //If the deque is empty
                $this->front = 0;
                $this->rear = 0;
            }else if ($this->rear == $this->capacity -1){
                $this->rear = 0;
            }else{
                $this->rear++;
            }

            $this->deque[$this->rear] = $data;
            $this->size++;
        }

        //Remove an element from the front
        public function removeFirst(){
            if($this->size ==0){
                throw new Exception ("Deque is empty");
            }

            $data = $this->deque[$this->front];
            if($this->size == 1){
                $this->front = -1;
                $this->rear = -1;
            }else{
                $this->front = ($this->front + 1) % $this->capacity;
            }

            $this->size--;
            return $data;
        }

        //Remove an element from the back
        public function removeLast(){
            if($this->size == 0){
                throw new Exception("Deque is empty");
            }

            $data = $this->deque[$this->rear];
            if ($this->size == 1){
                $this->front = -1;
                $this->rear = -1;
            }else{
                $this->rear = ($this->rear - 1 + $this->capacity) % $this->capacity;
            }

            $this->size--;
            return $data;
        }

        //Check if the deque is empty
        public function isEmpty(){
            return $this->size == 0;
        }

        //Get the size of the deque
        public function size(){
            return $this->size;
        }

        //Display the deque
        public function display(){
            if($this->isEmpty()){
                echo "Deque is empty\n";
                return;
            }

            $index = $this->front;
            for($i = 0; $i < $this->size; $i++){
                echo $this->deque[$index] . " ";
                $index = ($index + 1) % $this->capacity;
            }
                
            echo "\n";
        }


    }

    //Example usage:
    $arrayDeque = new ArrayDeque(5);

    $arrayDeque->addFirst(10);
    $arrayDeque->addLast(20);
    $arrayDeque->addFirst(5);
    $arrayDeque->addLast(30);

    echo "<br>";
    $arrayDeque->display(); //Outpur: 5 10 20 30
    echo "<br>";
    echo "Removed from front: " . $arrayDeque->removeFirst() . "\n"; // Output: 5
    echo "<br>";
    echo "Removed from back: " . $arrayDeque->removeLast() . "\n"; // Output: 30

    echo "<br>";
    $arrayDeque->display(); // Output: 10 20
    echo "<br>";








?>