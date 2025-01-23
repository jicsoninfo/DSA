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
///dll01 //Route


//Singly linked list
echo "================================================="."<br>";
echo "Singly linked list" ."<br>";
         class nodesll{
            public $data;
            public $next;

            public function __construct($data){
                $this->data = $data;
                $this->next = null;
            }
         }

         class sll{
            public $head;

            public function __construct(){
                $this->head = null;
            }

            public function sll_add_front($data){
                $newNodeSll = new nodesll($data);
                $newNodeSll->next = $this->head;
                $this->head = $newNodeSll;
            }

            public function sll_push_back($data){
                $newNodeSll = new nodesll($data);
                if($this->head == null){
                   
                    $this->head = $newNodeSll;
                }else{
                    $temp = $this->head;
                    while($temp->next !== null){
                        $temp = $temp->next;
                    }

                    $temp->next = $newNodeSll;
                }
            }


            public function sll_print(){
                if($this->head == null){
                    echo "list is empty";
                }else{
                    $temp = $this->head;
                    while($temp != null){
                        echo $temp->data ."<br>";
                        $temp = $temp->next;
                    }
                }

            }




         }

         $newsll = new sll();
         $newsll->sll_add_front(10);
         $newsll->sll_add_front(12);
         $newsll->sll_add_front(14);
         $newsll->sll_add_front(16);
         $newsll->sll_add_front(18);

         $newsll->sll_push_back(20);
         $newsll->sll_push_back(22);
         $newsll->sll_push_back(24);
         $newsll->sll_push_back(26);

         $newsll->sll_print();
        //  echo "<pre>";
        //  print_r($newsll);

//========================================================
echo "=====================================================" ."<br>";
echo "double linked list" ."<br>";
        class nodedll{
            public $data;
            public $next;
            public $prev;

            public function __construct($data){
                $this->data = $data;
                $this->next = null;
                $this->prev = null;
            }
        }

        class dll{
            public $head;

            public function __construct(){
                $this->head = null;
            }

            public function dll_push_front($data){
                $newNodeDll = new nodedll($data);
                if($this->head == null){
                    $this->head = $newNodeDll;
                }else{
                    $this->head->prev = $newNodeDll;
                    $newNodeDll->next = $this->head;
                    $this->head = $newNodeDll;
                }
            }

            public function dll_push_back($data){
                 $newNodeDll = new nodedll($data);
                if($this->head == null){
                    $this->head = $newNodeDll;
                }else{
                    $temp = $this->head;
                    while($temp->next != null){
                        $temp = $temp->next;
                    }

                    $temp->next = $newNodeDll;
                    $newNodeDll->prev = $temp;
                }
            }

            public function dll_print(){
                if($this->head == null){
                    echo "List is empty";
                }else{
                    $temp = $this->head;
                    while($temp != null){
                        echo $temp->data ."<br>";
                        $temp = $temp->next;
                    }
                }

            }
        }

        $newDll = new dll();
        $newDll->dll_push_front(18);
        $newDll->dll_push_front(20);
        $newDll->dll_push_front(22);
        $newDll->dll_push_front(24);

        $newDll->dll_push_back(26);
        $newDll->dll_push_back(28);
        $newDll->dll_push_back(30);
        $newDll->dll_push_back(32);
        
        $newDll->dll_print();

        // echo "<pre>";
        // print_r($newDll);

  //=======================================================================================
  echo "=====================================================" ."<br>";
  echo "Double linked list with tail variable" ."<br>";

  class nodedllT{
    public $data;
    public $next;
    public $prev;

    public function __construct($data){
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }

  }
    class DllWithTail{
        public $head;
        public $tail;
        public function __construct(){
            $this->head = null;
            $this->tail = null;
        }

        //Insert a node at the end (push back)
        public function dll_push_back($data){
            $newNode = new nodedllT($data);
            //if the list is empty
            if($this->head == null){
                $this->head = $newNode;
                $this->tail = $newNode; //Tail also point to the new node
            }else{
                //Traverse to the end of the list
                $temp = $this->tail;
                $temp->next = $newNode; //Link the last node to the new node
                $newNode ->prev = $temp; //Set the new node's prev to the last node
                $this->tail = $newNode; //Update the tail to the new node
            }
        }
        
        //Insert a node at the front (pust_front)
        public function dll_push_front($data){
            $newNode = new nodedllT($data);

            //If the list is empty
            if($this->head == null){
                $this->head = $newNode;
                $this->tail = $newNode; //Tail points to the node as well
            }else{
                $newNode->next = $this->head; // link the new node to the current head
                $this->head->prev = $newNode; //Set teh lod head's prev to the new node
                $this->head = $newNode; //Update the head to the new node
            }
        }

        //Print the list from the head
        public function dll_print(){
            if($this->head !== null){
                $temp = $this->head;
                while($temp !== null){
                    echo $temp->data . "<br>";
                    $temp = $temp->next;
                }
            }else{
                echo "List is empty";
            }
        }

        //Print the list from the tail (optional)
        public function dll_print_reverse(){
            if($this->tail !== null){
                $temp = $this->tail;
                while ($temp !== null){
                    echo $temp->data . "<br>";
                    $temp = $temp->prev;
                }
            }else{
                echo "List is empty";
            }
        }



    }

    //Example Usage
    $newdlltail = new DllWithTail();

    // Insert nodes at the end
    $newdlltail->dll_push_back(20);
    $newdlltail->dll_push_back(30);
    $newdlltail->dll_push_back(15);
    $newdlltail->dll_push_back(35);
    $newdlltail->dll_push_back(39);

    // Insert nodes at the front
    $newdlltail->dll_push_front(40);
    $newdlltail->dll_push_front(45);
    $newdlltail->dll_push_front(50);

    // Print the list from head to tail
    echo "List from head to tail:<br>";
    $newdlltail->dll_print();

    echo "<br>";

    // Print the list from tail to head (optional)
    echo "List from tail to head:<br>";
    $newdlltail->dll_print_reverse();



/*

 //=======================================================================================
  echo "=====================================================" ."<br>";
  echo "Doubly Circular linked list" ."<br>";

//Node class represents an individual element in the doubly circular linked list
class NodeDcll{
    public $data;
    public $next;
    public $prev;

    //Constructor to initialize node with data
    public function __construct($data){
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

//Doubly Circular Linked List class
class DoublyCircularLinkedList{
    public $head = null;

    //Insert a new node at the end of the list
    public function insert($data){
        $newNode = new NodeDcll($data);

        //If the list is empty, create the first node which points to itself
        if($this->head == null){
            $this->head = $newNode;
            $newNode->next = $newNode;
            $newNode->prev = $newNode;
        }else{
            //Traverse to the last node (the node whose next point to the head)
            $lastNode = $this->head->prev;

            //Insert new node at the end of the list
            $lastNode->next = $newNode;
            $newNode->prev = $lastNode;
            $newNode->next = $this->head;
            $this->head->prev = $newNode;

        }
    }

}













































// Node class represents an individual element in the doubly circular linked list
class Node {
    public $data;
    public $next;
    public $prev;

    // Constructor to initialize node with data
    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

// Doubly Circular Linked List class
class DoublyCircularLinkedList {
    public $head = null;

    // Insert a new node at the end of the list
    public function insert($data) {
        $newNode = new Node($data);

        // If the list is empty, create the first node which points to itself
        if ($this->head === null) {
            $this->head = $newNode;
            $newNode->next = $newNode;
            $newNode->prev = $newNode;
        } else {
            // Traverse to the last node (the node whose next points to the head)
            $lastNode = $this->head->prev;

            // Insert new node at the end of the list
            $lastNode->next = $newNode;
            $newNode->prev = $lastNode;
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
        }
    }

    // Insert a new node at the front of the list
    public function insertAtFront($data) {
        $newNode = new Node($data);

        // If the list is empty, create the first node which points to itself
        if ($this->head === null) {
            $this->head = $newNode;
            $newNode->next = $newNode;
            $newNode->prev = $newNode;
        } else {
            // Insert new node at the front of the list
            $firstNode = $this->head;

            $newNode->next = $firstNode;
            $newNode->prev = $firstNode->prev;
            $firstNode->prev->next = $newNode;
            $firstNode->prev = $newNode;

            // Update the head to the new node
            $this->head = $newNode;
        }
    }

    // Delete a node by value
    public function delete($data) {
        if ($this->head === null) {
            echo "List is empty\n";
            return;
        }

        $current = $this->head;

        // Traverse the list to find the node with the specified data
        do {
            if ($current->data == $data) {
                // If the node to delete is the only node in the list
                if ($current->next == $current) {
                    $this->head = null;
                    unset($current);
                    echo "Node with value $data deleted\n";
                    return;
                }

                // If the node to delete is the head node
                if ($current == $this->head) {
                    $this->head = $this->head->next;
                }

                // Update the next and prev pointers of adjacent nodes
                $current->prev->next = $current->next;
                $current->next->prev = $current->prev;

                unset($current);
                echo "Node with value $data deleted\n";
                return;
            }
            $current = $current->next;
        } while ($current != $this->head);

        echo "Node with value $data not found\n";
    }

    // Display the list (forward traversal)
    public function displayForward() {
        if ($this->head === null) {
            echo "List is empty\n";
            return;
        }

        $current = $this->head;
        do {
            echo $current->data . " -> ";
            $current = $current->next;
        } while ($current != $this->head);

        echo "(head)\n";  // To show that it's circular
    }

    // Display the list (backward traversal)
    public function displayBackward() {
        if ($this->head === null) {
            echo "List is empty\n";
            return;
        }

        $current = $this->head->prev;
        do {
            echo $current->data . " <- ";
            $current = $current->prev;
        } while ($current != $this->head->prev);

        echo "(tail)\n";  // To show that it's circular
    }
}

// Example usage of the Doubly Circular Linked List

// Create a new doubly circular linked list
$list = new DoublyCircularLinkedList();

// Insert some nodes
$list->insert(10);
$list->insert(20);
$list->insert(30);
$list->insert(40);

// Insert a node at the front of the list
$list->insertAtFront(5);

// Display the list forward
echo "Forward traversal:\n";
$list->displayForward();

// Display the list backward
echo "Backward traversal:\n";
$list->displayBackward();

// Delete a node
$list->delete(20);
$list->displayForward();  // Display the list again after deletion

// Delete the head node
$list->delete(10);
$list->displayForward();  // Display the list again after deleting the head

*/


?>

