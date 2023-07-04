<?php

use CDLLNode as GlobalCDLLNode;

echo "Circular Doubly LL";

class CDLLNode{
    public $data;
    public $next;
    public $prev;
}

class cdll{
    public $head;
    // public $head_next;
    // public $head_prev;

    public function __construct()
    {
        $this->head = null;
        // $this->head_next = null;
        // $this->head_prev = null;
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
        
        //Add new element at the start of the list
        public function push_front($newElemnet){
            $newNode = new CDLLNode();
            $newNode->data = $newElemnet;
            $newNode->next = null;
            $newNode->prev = null;

            if($this->head == null){
                $this->head = $newNode;
                $newNode->next = $this->head;
            }else{
                $temp = new CDLLNode();
                $temp = $this->head;
                while($temp->next !== $this->head){
                    $temp = $temp->next;
                }
                $temp->next = $newNode;
                $newNode->next = $this->head;
                $newNode->prev = $temp;
                $this->head->prev = $newNode;
                $this->head = $newNode;
            }

        }

        //Add new element at the end of the list
        public function push_back($newElemnet){
            $newNode = new CDLLNode;
            $newNode->data = $newElemnet;
            $newNode->next = null;
            $newNode->prev = null;

            if($this->head == null){
                $this->head = $newNode;
                $newNode->next = $this->head;
            }else{
                $temp = new CDLLNode;
                $temp = $this->head;
                while($temp->next !== $this->head){
                    $temp = $temp->next;
                }
                $temp->next = $newNode;
                $newNode->next = $this->head;
                $newNode->prev = $temp;
                $this->head->prev = $newNode;

            }
        }

        //Inserts a new element at the given position 
        public function push_at($newElemnet, $position){
            $newNode = new CDLLNode;
            $newNode->data = $newElemnet;
            $newNode->next = null;
            $newNode->prev = null;
            $temp = $this->head;
            $NoOfElements = 0;
            if($temp != null){
                    $NoOfElements++;
                    $temp = $temp->next;
            }
            while($temp != $this->head)
            {
                $NoOfElements++;
                $temp = $temp->next;
            }

            if($position < 1 || $position > ($NoOfElements+1)){
                echo "\nInvalid position.</br>";
            }else if($position == 1){
                if($this->head == null){
                    $this->head = $newNode;
                    $this->head->next = $this->head;
                    $this->head->prev = $this->head;
                }else{
                    while($temp->next !== $this->head){
                        $temp = $temp->next;
                    }
                    $temp->next = $newNode;
                    // $newNode->next = $temp;
                    // $newNode->prev = $this->head;
                    $newNode->next = $this->head;
                    $newNode->prev = $temp;
                    $this->head->prev = $newNode;
                    $this->head = $newNode;
                }
            }else{
                $temp = $this->head;
                for($i=1; $i<$position-1; $i++){
                    $temp = $temp->next;
                    $newNode->next = $temp->next;
                    $newNode->next->prev = $newNode;
                    $newNode->prev = $temp;
                    $temp->next = $newNode;
                }
            }
        }
        
    //Delete first node of the list
    public function pop_front(){
        if($this->head != null){
            if($this->head->next == $this->head){
                $this->head = null;
            }else{
                $temp = $this->head;
                //$firstNode = $this->head;
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }
                $this->head = $this->head->next;
                $this->head->prev = $temp;
                $temp->next = $this->head;
                //$firstNode = null;
            }
            
        }
    }

    //Delete last nost of the list
    public function pop_back(){
        if($this->head != null){
            if($this->head->next == $this->head){
                $this->head = null;
            }else{
                $temp = new CDLLNode();
                $temp = $this->head;
                while($temp->next == $this->head){
                    $temp = $temp->next;
                }
                $temp->next = $this->head;
                $this->head->prev = $temp;
            }
        }
    }



}

$cdll = new cdll();


$data = ['93', '84', '75', '66', '57', '48', '39'];
$ll1 = "";
$ll2 = "";
foreach($data as $key=>$value){
    $ll1 = 'll'.$key;
    if($key == 0){
    $ll1 = new CDLLNode();
    $ll1->data = $value;
    $ll1->prev =  null;
    $ll1->next =  $cdll->head;
    $cdll->head = $ll1;
    $cdll->head->prev = $ll1;
    $ll2 = $ll1;
    }
    else{
        $ll1 = new CDLLNode();
        $ll1->data = $value;
        $ll1->prev = $ll2;
        $ll1->next = $cdll->head;
        $ll2->next = $ll1;
        $cdll->head->prev = $ll2;
        $ll2= $ll1;
    }

}



// $cdll01 = new CDLLNode();
// $cdll01->data = 13;
// $cdll01->next = null;
// $cdll01->prev = null;
// $cdll->head = $cdll01;
// $cdll01->next = $cdll->head;
// $cdll->head->prev = $cdll01;
// //$cdll->head->data = 50;

// $cdll02 = new CDLLNode();
// $cdll02->data = 16;
// $cdll02->next = null;
// $cdll02->prev = $cdll01;
// $cdll01->next = $cdll02;
// $cdll02->next = $cdll->head;
// $cdll->head->prev =  $cdll02;

// $cdll03 = new GlobalCDLLNode();
// $cdll03->data = 19;
// $cdll03->next = null;
// $cdll03->prev = $cdll02;
// $cdll02->next = $cdll03;
// $cdll03->next = $cdll->head;
// $cdll->head->prev = $cdll03;


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

$cdll->push_front(20);
$cdll->push_front(26);

// $cdll->push_back(57);
// $cdll->push_back(59);

//$cdll->push_at(84, 3);

// $cdll->pop_front();
// $cdll->pop_front();


//$cdll->pop_back();
//$cdll->pop_back();

$cdll->PrintList();
// $cdll->push_at(85, 1);
// $cdll->PrintList();
// $cdll->push_at(87, 1);
// $cdll->PrintList();
// $cdll->push_at(95, 3);
//$cdll->PrintList();



//echo "<pre>";
//print_r($cdll);
?>