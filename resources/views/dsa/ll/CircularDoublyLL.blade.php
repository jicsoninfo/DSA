<?php
echo "Circular Doubly LL";

class CDLLNode{
    public $data;
    public $next;
    public $prev;
}

class cdll{
    public $head;
    public function __construct()
    {
        $this->head = null;
    }

     //display the content of the list
        public function PrintList() {
            $temp = new CDLLNode();
            $temp = $this->head;
            if($temp != null) {
            echo "The list contains: <br />";
            while(true) {
                echo $temp->data."<br /> ";
                $temp = $temp->next;
                if($temp == $this->head)
                break;        
            }
            echo "\n";
            } else {
            echo "The list is empty.\n";
            }
        }    
    
}

$cdll = new cdll();


$cdll01 = new CDLLNode();
$cdll01->data = 13;
$cdll01->next = null;
$cdll01->prev = null;
$cdll->head = $cdll01;
$cdll01->next = $cdll->head;
$cdll01->prev = $cdll->head;

$cdll02 = new CDLLNode();
$cdll02->data = 16;
$cdll02->prev = $cdll01->next;
$cdll01->next = $cdll02->prev;
$cdll02->next = $cdll01->prev;


/*
//Add first node.
$first = new CDLLNode();
$first->data = 10;
$first->next = null;
$first->prev = null;
//linking with head node
$cdll->head = $first;
//linking next of the node with head
$first->next = $cdll->head;
//linking prev of the head 
$cdll->head->prev = $first;


//Add second node.
$second = new CDLLNode();
$second->data = 20;
$second->next = null;
//linking with first node
$second->prev = $first;
$first->next = $second;
//linking next of the node with head
$second->next = $cdll->head;
//linking prev of the head 
$cdll->head->prev = $second;

//Add third node.
$third = new CDLLNode();
$third->data = 30;
$third->next = null;
//linking with second node
$third->prev = $second;
$second->next = $third;
//linking next of the node with head
$third->next = $cdll->head;
//linking prev of the head 
$cdll->head->prev = $third;

$cdll->PrintList();
*/

$cdll->PrintList();
echo "<pre>";
print_r($cdll);
?>