<?php
echo "==================Priority Q ========================";
echo "<br>";
echo"<pre>";
echo("
Data Structures Used:
Priority queues are typically implemented using heaps (especially binary heaps), but they can also be 
implemented with other structures like sorted lists, or balanced trees.
Binary Heap: A common implementation where elements are arranged in a binary tree-like structure. 
For a max-heap, the highest priority element is always at the root, making it efficient for retrieval.");


echo "<br>";
echo "<br>";
echo "<br>";
echo "=================== Ascending order priority queue: ============================";
class NodePQ {
    public $data;
    public $priority;
    public $next;

    public function __construct($data, $priority){
        $this->data = $data;
        $this->priority = $priority;
        $this->next = null;
    }
}

 class PriorityQueue {
    private $head; //Points to the front of the queue
    private $size; // The number of elements in the queue

    //Initialize the queue as empty
    public function __construct(){
        $this->head = null;
        $this->size = 0;
    }

    //Check if the queue is empty
    public function isEmpty(){
        return $this->size === 0;
    }

    //Add an item to the queue based on priority
    public function enqueue($data, $priority){
        $newNode = new NodePQ($data, $priority); //Create a new node

        //If the queue is empty or the new node has heigher priority then the node
        if($this->isEmpty() || $newNode->priority > $this->head->priority){
            //Insert the node at the front of the queue
            $newNode->next = $this->head;
            $this->head = $newNode;
        } else{
            //Find the correct position for the new node
            $current = $this->head;
            while($current->next != null && $current->next->priority >= $newNode->priority){
                $current = $current->next;
            }
            //Insert the new node after the current node
            $newNode->next = $current->next;
            $current->next = $newNode;
        }
        $this->size++ ; // Increase the size of the queue
    }

    //Remove and return the item with the highest priority
    public function dequeue(){
        if(!$this->isEmpty()){
            $frontItem = $this->head->data; //Get the data of the front node
            $this->head = $this->head->next; //Move the head pointer to the next node
            $this->size--; //Decrease the size of the queue
            return $frontItem;
        }else{
            throw new Exception('Dequeue from an empty queue');
        }
    }

    //Display the current items in the queue
    public function display(){
        if($this->isEmpty()){
            echo "Queue is empty" . PHP_EOL;
            return ;
        }

        $current = $this->head;
        $queueItems = [];

        while($current != null){
            $queueItems[] = $current->data . "(Priority: " . $current->priority . ")";
            $current = $current->next;
        }

        echo "Priority Queue: " .implode(" -> ", $queueItems) . PHP_EOL;
    }

    //Return the number of items in the queue
    public function size(){
        return $this->size;
    }

    //Return the front item of the queue without removing it
    public function peek(){
        if(!$this->isEmpty()){
            return $this->head->data;
        } else{
            throw new Exception('Peek from an empty queue');
        }
    }



 }


 //Example usage of the Priority Queue class

 $priorityQueue = new PriorityQueue();

 // Add items to the queue with priority
 $priorityQueue->enqueue('Task 1', 3); // Priority 3
 $priorityQueue->enqueue('Task 2', 1); // Priority 1
 $priorityQueue->enqueue('Task 3', 2); // Priority 2


  // Add items to the queue with priority
//   $priorityQueue->enqueue('3', 3); // Priority 3
//   $priorityQueue->enqueue('1', 1); // Priority 1
//   $priorityQueue->enqueue('2', 2); // Priority 2

echo "<br>";
 // Display the current queue
$priorityQueue->display(); // Priority Queue: Task 1(Priority: 3) -> Task 3(Priority: 2) -> Task 2(Priority: 1)

echo "<br>";
// Remove and return the front item (dequeue)
echo "Dequeued: " . $priorityQueue->dequeue() . PHP_EOL;  // Dequeued: Task 1

echo "<br>";
// Display the current queue after dequeue
$priorityQueue->display(); // Priority Queue: Task 3(Priority: 2) -> Task 2(Priority: 1)

echo "<br>";
// Peek the front item without removing it
echo "Front item: " . $priorityQueue->peek() . PHP_EOL;  // Front item: Task 3

echo "<br>";
// Display the current size of the queue
echo "Queue size: " . $priorityQueue->size() . PHP_EOL;  // Queue size: 2





echo "<br>";
echo "<br>";
echo "<br>";
echo "=================== Descending order priority queue: ============================";
class NodePDQ {
    public $data;
    public $priority;
    public $next;

    public function __construct($data, $priority){
        $this->data = $data;
        $this->priority = $priority;
        $this->next = null;
    }
}

 class PriorityDescendingQueue {
    private $head; //Points to the front of the queue
    private $size; // The number of elements in the queue

    //Initialize the queue as empty
    public function __construct(){
        $this->head = null;
        $this->size = 0;
    }

    //Check if the queue is empty
    public function isEmpty(){
        return $this->size === 0;
    }

    //Add an item to the queue based on priority
    public function enqueue($data, $priority){
        $newNode = new NodePDQ($data, $priority); //Create a new node

        //If the queue is empty or the new node has heigher priority then the node
        if($this->isEmpty() || $newNode->priority < $this->head->priority){
            //Insert the node at the front of the queue
            $newNode->next = $this->head;
            $this->head = $newNode;
        } else{
            //Find the correct position for the new node
            $current = $this->head;
            while($current->next != null && $current->next->priority <= $newNode->priority){
                $current = $current->next;
            }
            //Insert the new node after the current node
            $newNode->next = $current->next;
            $current->next = $newNode;
        }
        $this->size++ ; // Increase the size of the queue
    }

    //Remove and return the item with the highest priority
    public function dequeue(){
        if(!$this->isEmpty()){
            $frontItem = $this->head->data; //Get the data of the front node
            $this->head = $this->head->next; //Move the head pointer to the next node
            $this->size--; //Decrease the size of the queue
            return $frontItem;
        }else{
            throw new Exception('Dequeue from an empty queue');
        }
    }

    //Display the current items in the queue
    public function display(){
        if($this->isEmpty()){
            echo "Queue is empty" . PHP_EOL;
            return ;
        }

        $current = $this->head;
        $queueItems = [];

        while($current != null){
            $queueItems[] = $current->data . "(Priority: " . $current->priority . ")";
            $current = $current->next;
        }

        echo "Priority Queue: " .implode(" -> ", $queueItems) . PHP_EOL;
    }

    //Return the number of items in the queue
    public function size(){
        return $this->size;
    }

    //Return the front item of the queue without removing it
    public function peek(){
        if(!$this->isEmpty()){
            return $this->head->data;
        } else{
            throw new Exception('Peek from an empty queue');
        }
    }



 }


 

// Example usage of the Priority Queue class

$prioritydescQueue = new PriorityDescendingQueue();

// Add items to the queue with priority
$prioritydescQueue->enqueue('Task 4', 3); 
$prioritydescQueue->enqueue('Task 5', 1); 
$prioritydescQueue->enqueue('Task 6', 2); 
$prioritydescQueue->enqueue('Task 7', 4); 
$prioritydescQueue->enqueue('Task 8', 5); 


// $prioritydescQueue->enqueue('4', 4); 
// $prioritydescQueue->enqueue('5', 5); 
// $prioritydescQueue->enqueue('6', 1); 
// $prioritydescQueue->enqueue('7', 2); 
// $prioritydescQueue->enqueue('8', 3); 

echo "<br>";
// Display the queue
$prioritydescQueue->display(); // Output the current state of the queue

echo "<br>";
// Peek at the front item
echo "Peek: " . $prioritydescQueue->peek() . PHP_EOL; // Should output "Task 5"

echo "<br>";
// Dequeue the front item
echo "Dequeued: " . $prioritydescQueue->dequeue() . PHP_EOL; // Should output "Task 5"

echo "<br>";
// Display the queue after dequeue
$prioritydescQueue->display(); // Output the current state of the queue

echo "<br>";
// Dequeue another item
echo "Dequeued: " . $prioritydescQueue->dequeue() . PHP_EOL; // Should output "Task 6"

echo "<br>";
// Display the queue after the second dequeue
$prioritydescQueue->display(); // Output the current state of the queue

echo "<br>";
// Check the size of the queue
echo "Size: " . $prioritydescQueue->size() . PHP_EOL; // Should output "3"

/*
Priority Queue: Task 8(Priority: 5) -> Task 7(Priority: 4) -> Task 4(Priority: 3) -> Task 6(Priority: 2) -> Task 5(Priority: 1)
Peek: Task 5
Dequeued: Task 5
Priority Queue: Task 8(Priority: 5) -> Task 7(Priority: 4) -> Task 4(Priority: 3) -> Task 6(Priority: 2)
Dequeued: Task 6
Priority Queue: Task 8(Priority: 5) -> Task 7(Priority: 4) -> Task 4(Priority: 3)
Size: 3
*/
?>