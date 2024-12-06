<?php
echo "==================Circular Q ========================";


    class NodeCQ{
        public $data;
        public $next;

        public function __construct($data){
            $this->data = $data;
            $this->next = null; //Initially, the next node is null
        }
    }

    class CQueueLL{
        private $head; //Points the the front of the queue
        private $tail; //Points to the back of the queue
        private $size; //The number of elements in the queue

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
            $newNode = new NodeCQ($item); // Create a new node
            if($this->isEmpty()){
                $this->head = $newNode; //If the queue is empty, both head and tail point to the new node
                $this->tail = $newNode;
                $this->tail->next = $this->head; // Make the tail point to the head to complete the circular nature
            }else{
                $this->tail->next = $newNode; //Attach the new node to the end of the queue
                $this->tail = $newNode; // Update the tail to the new node
                $this->tail->next = $this->head; // The tail should point to the head
            }
            
            $this->size++; //Increase the size of the queue
        }

        //Remove and return the front item of the queue
        public function dequeue(){
            if(!$this->isEmpty()){
                $frontItem = $this->head->data; // Get the data of the front node
                if($this->head === $this->tail){ //If there's only one node in the queue
                    $this->head = null;
                    $this->tail =null;
                } 
                else{
                    $this->head = $this->head->next; //Move the head pointer to the next node
                    $this->tail->next = $this->head; // The tail should point to the new head
                }

                $this->size--; // Decrease the size of the queue
                return $frontItem;
            }else{
                throw new Exception('Dequeue from an empty queue');
            }

           
        }

        //Display the current items in the queue
        public function display(){
            if($this->isEmpty()){
                echo "Queue is empty" . PHP_EOL;
                return;
            }
            $current = $this->head;
            $queueItems = [];
            do{
                $queueItems[] = $current->data;
                $current = $current->next;
            } while($current !== $this->head); //Stop when we complete on full cycle of the queue

            echo "Queue: " . implode(", ", $queueItems) . PHP_EOL;
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


    // Example usage of the Circular Queue class
$cqueue = new CQueueLL();

// Add items to the queue
$cqueue->enqueue('Task 1');
$cqueue->enqueue('Task 2');
$cqueue->enqueue('Task 3');
echo "<br>";
// Display the current queue
$cqueue->display(); // Queue: Task 1, Task 2, Task 3
echo "<br>";
// Remove and return the front item (dequeue)
echo "Dequeued: " . $cqueue->dequeue() . PHP_EOL;  // Dequeued: Task 1
echo "<br>";
// Display the current queue after dequeue
$cqueue->display(); // Queue: Task 2, Task 3
echo "<br>";
// Peek the front item without removing it
echo "Front item: " . $cqueue->peek() . PHP_EOL;  // Front item: Task 2
echo "<br>";
// Display the current size of the queue
echo "Queue size: " . $cqueue->size() . PHP_EOL;  // Queue size: 2


?>