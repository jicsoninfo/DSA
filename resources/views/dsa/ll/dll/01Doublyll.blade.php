<?php
///dll01 //Route


//Singly linked list
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

// class Node {
//     public $data;
//     public $next;
//     public $prev;

//     public function __construct($data) {
//         $this->data = $data;
//         $this->next = null;
//         $this->prev = null;
//     }
// }

// class DLL {
//     public $head;
//     public $tail;

//     public function __construct() {
//         $this->head = null;
//         $this->tail = null;
//     }

//     // Insert a node at the end (push_back)
//     public function dll_push_back($data) {
//         $newNode = new Node($data);
        
//         // If the list is empty
//         if ($this->head == null) {
//             $this->head = $newNode;
//             $this->tail = $newNode; // Tail also points to the new node
//         } else {
//             // Traverse to the end of the list
//             $temp = $this->tail;
//             $temp->next = $newNode; // Link the last node to the new node
//             $newNode->prev = $temp; // Set the new node's prev to the last node
//             $this->tail = $newNode; // Update the tail to the new node
//         }
//     }

//     // Insert a node at the front (push_front)
//     public function dll_push_front($data) {
//         $newNode = new Node($data);
        
//         // If the list is empty
//         if ($this->head == null) {
//             $this->head = $newNode;
//             $this->tail = $newNode; // Tail points to the new node as well
//         } else {
//             $newNode->next = $this->head; // Link the new node to the current head
//             $this->head->prev = $newNode; // Set the old head's prev to the new node
//             $this->head = $newNode; // Update the head to the new node
//         }
//     }

//     // Print the list from the head
//     public function dll_print() {
//         if ($this->head !== null) {
//             $temp = $this->head;
//             while ($temp !== null) {
//                 echo $temp->data . "<br>";
//                 $temp = $temp->next;
//             }
//         } else {
//             echo "List is empty";
//         }
//     }

//     // Print the list from the tail (optional)
//     public function dll_print_reverse() {
//         if ($this->tail !== null) {
//             $temp = $this->tail;
//             while ($temp !== null) {
//                 echo $temp->data . "<br>";
//                 $temp = $temp->prev;
//             }
//         } else {
//             echo "List is empty";
//         }
//     }
// }

// // Example Usage
// $newsdll = new DLL();

// // Insert nodes at the end
// $newsdll->dll_push_back(20);
// $newsdll->dll_push_back(30);
// $newsdll->dll_push_back(15);
// $newsdll->dll_push_back(35);
// $newsdll->dll_push_back(39);

// // Insert nodes at the front
// $newsdll->dll_push_front(40);
// $newsdll->dll_push_front(45);
// $newsdll->dll_push_front(50);

// // Print the list from head to tail
// echo "List from head to tail:<br>";
// $newsdll->dll_print();

// echo "<br>";

// // Print the list from tail to head (optional)
// echo "List from tail to head:<br>";
// $newsdll->dll_print_reverse();



?>

