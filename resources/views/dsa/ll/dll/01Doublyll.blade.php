<?php
///dll01 //Route

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

