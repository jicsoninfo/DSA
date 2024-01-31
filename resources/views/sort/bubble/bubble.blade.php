<?php
//php program for bubble sort on linked list

class Node{
    public $data;
    public $next;
    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList{
    public $head;
    function __construct()
    {
        $this->head = null;
    }

    public function insert($value){
        $node = new Node($value); //Create a new node
        $node->next = $this->head; // Add node at front
        $this->head = $node; //Make new head
    }
    function display(){
        if($this->head != NULL){
            $temp = $this->head;
            while($temp != NULL){
                echo "<br>", $temp->data ."<br>"; // Display node value
                $temp = $temp->next; // visit to next node
            }
        }else{
            echo "Empty Linked list\n";
        }
    }

    function bubblesort(){
        if($this->head != NULL){
            $current = NULL; 
            $status = false; 
            do{
                $current = $this->head; //Start with first node
                $status = false; //Reset working status
                while($current != NULL && $current->next != NULL){
                    if($current->data > $current->next->data){
                        //Swap node values
                        $current->data = $current->data + $current->next->data;
                        $current->next->data = $current->data - $current->next->data;
                        $current->data = $current->data - $current->next->data;
                        $status = true; // When node value change
                    }
                    $current = $current->next; //visit to next node
                }

            } while($status);
        }else{
            echo "Empty Linked list\n";
        }
    }

    public static function run(){
        $task = new LinkedList();
        // Insert element of linked list
        $task->insert(15);
        $task->insert(5);
        $task->insert(42);
        $task->insert(9);
        $task->insert(50);
        $task->insert(7);
        echo " Before sort : ";
        // Display all node
        $task->display();
        $task->bubbleSort();
        echo "\n After sort  : ";
        $task->display();
    }
}

LinkedList::run();
?>