<?php
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



?>