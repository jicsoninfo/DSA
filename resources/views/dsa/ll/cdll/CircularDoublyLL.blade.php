<?php

//cdll //route for circular doubly linked list
//use CDLLNode as GlobalCDLLNode;

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
            echo "<br />The list contains: <br />";
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
                }
                    $newNode->next = $temp->next;
                    $newNode->next->prev = $newNode;
                    $newNode->prev = $temp;
                    $temp->next = $newNode;
                //}
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

    //Delete last node of the list
    public function pop_back(){
        if($this->head != null){
            if($this->head->next == $this->head){
                $this->head = null;
            }else{
                $temp = new CDLLNode();
                $temp = $this->head;
                while($temp->next->next != $this->head){
                    $temp = $temp->next;
                }
                $temp->next = $this->head;
                $this->head->prev = $temp;
            }
        }
    }

    //Delete an element at the given position
    public function pop_at($position){
        //$nodeToDelete = $this->head;
        $temp = $this->head;
        $NoOfElements = 0;
        if($temp != null){
            $NoOfElements++;
            $temp = $temp->next;
        }
        while($temp != $this->head){
            $NoOfElements++;
            $temp = $temp->next;
        }
        if($position < 1 || $position > $NoOfElements){
            echo "<br />\nInvalid position for delete.<br/>";
        }else if($position == 1){
            if($this->head->next == $this->head){
                $this->head = null;
            } else{
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }
                $this->head = $this->head->next;
                $temp->next = $this->head;
                $this->head->prev = $temp;
                //$nodeToDelete = null;
            }
        }else{
            $temp = $this->head;
            for($i=1; $i<$position-1; $i++){
                $temp =$temp->next;
                //$nodeToDelete = $temp->next;
            }
            $temp->next = $temp->next->next;
            $temp->next->prev = $temp;
            //$nodeToDelete = null;
        }
    }


    //Delete all nodes of the list
    public function deleteAllNodes(){
        if($this->head != null){
            $temp = new CDLLNode();
            $current = new CDLLNode();
            $current = $this->head->next;
            while($current != $this->head){
                $temp = $current->next;
                $current = null;
                $current = $temp;
            }
            $this->head = null;
            echo "<br/> All nodes are deleted successfully <br/>";

        }else{
            echo "<br/> the list is empty <br />";
        }
    }

    //Count nodes in the list
    public function countNodes(){
        $temp = new CDLLNode();
        $temp = $this->head;
        $i=0;
        if($temp != null){
            $i++;
            $temp = $temp->next;
        }
        while($temp != $this->head){
            $i++;
            $temp = $temp->next;
        }
        echo "<br/ > Total number of node is = " .$i;
        //return $i;
    }

    //Delete even nodes of the list
    public function deleteEvenNodes(){
        if($this->head != null || $this->head->next != $this->head ){
            $oddNode = $this->head;
            $evenNode = $this->head->next;
            $temp =  new CDLLNode();
            while(true){
                $temp = $oddNode;
                $oddNode->next = $evenNode->next;
                $oddNode->next->prev = $oddNode;
                $evenNode = null;
                $oddNode = $oddNode->next;
                $evenNode = $oddNode->next;
                if($oddNode == $this->head || $evenNode == $this->head){
                    break;
                }
            }
            if($oddNode == $this->head){
                $temp->next = $this->head;
                $this->head->prev = $temp;
            }else{
                $oddNode->next = $this->head;
                $this->head->prev = $oddNode;
            }
        }
    }

    //Delete odd nodes of the list
    public function deleteOddNodes(){
        if($this->head != null && $this->head->next == $this->head){
            $this->head = null;
        }elseif($this->head != null){
            $temp = $this->head;
            while($temp->next != $this->head){
                $temp = $temp->next;
            }
            $temp->next = $this->head->next;
            $this->head->next->prev = $temp;
            $this->head = null;
            $this->head = $temp->next;
            if($this->head != null && $this->head->next != $this->head){
                $evenNode = $this->head;
                $oddNode = $this->head->next;
                while(true){
                    $temp = $evenNode;
                    $evenNode->next = $oddNode->next;
                    $evenNode->next->prev = $evenNode;
                    $oddNode = null;
                    $evenNode = $evenNode->next;
                    $oddNode = $evenNode->next;
                    if($evenNode == $this->head || $oddNode == $this->head){
                        break;
                    }
                }
                if($evenNode == $this->head){
                    $temp->next = $this->head;
                    $this->head->prev = $temp;
                }else{
                    $evenNode->next = $this->head;
                    $this->head->prev = $evenNode;
                }
            }
        }
    }

    //Search an element in the list
    public function SearchElement($searchValue){
        $temp = new CDLLNode();
        $temp = $this->head;
        $found = 0;
        $i = 0;
        if($temp != null){
            while(true){
                $i++;
                if($temp->data == $searchValue){
                    $found++;
                    break;
                }
                $temp = $temp->next;
                if($temp == $this->head){
                    break;
                }
            }
            if($found == 1){
                echo $searchValue. "is found at index = ".$i." .\n";
            }else{
                echo $searchValue. " is not found in the list . \n";
            }
        }else{
            echo "<br/> The list is empty. <br />.\n";
        }
    }

    //Delete first node by key
    public function pop_first($key){
        if($this->head != null){
            $temp = $this->head;
            $nodeToDelete = $this->head;
            $lastNode = new CDLLNode;
            if($temp->data == $key){
                if($temp->next == $this->head){
                    $this->head = null;
                }else{
                    $lastNode = $this->head->prev;
                    $this->head = $this->head->next;
                    $lastNode->next = $this->head;
                    $this->head->prev = $lastNode;
                    $nodeToDelete = null;
                }
            }else{
                while($temp->next != $this->head){
                    if($temp->next->data == $key){
                        $nodeToDelete = $temp->next;
                        $temp->next = $temp->next->next;
                        $temp->next->prev = $temp;
                        $nodeToDelete = null;
                        break;
                    }
                    $temp = $temp->next;
                }
            }
        }else{
            echo "<br/> The list is empty. <br />.\n";
        }
    }

    //Delete last node by key
    public function pop_last($key){
        if($this->head != null){
            $temp = new CDLLNode();
            $previousToLast = null;
            $lastNode = null;
            if($this->head->data == $key){
                $lastNode = $this->head;
            }
            $temp = $this->head;
            while($temp->next != $this->head){
                if($temp->next->data == $key){
                    $previousToLast = $temp;
                    $lastNode = $temp->next;
                }
                $temp = $temp->next;
            }
            if($lastNode != null){
                if($lastNode == $this->head){
                    if($this->head->next == $this->head){
                        $this->head = null;
                    }else{
                        $this->head->prev->next = $this->head->next;
                        $this->head = $this->head->next;
                    }
                    $lastNode = null;
                }else{
                    $previousToLast->next = $lastNode->next;
                    $previousToLast->next->prev = $previousToLast;
                    $lastNode = null;
                }
            }
        }
    }

    //Delete all nodes by key
    public function pop_all($key){
        $nodeToDelete = new CDLLNode();
        $temp = new CDLLNode();
        while($this->head != null && $this->head->data == $key){
            if($this->head->next == $this->head){
                $this->head = null;
            }else{
                $nodeToDelete = $this->head;
                $temp = $this->head;
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }
                $this->head = $this->head->next;
                $temp->next = $this->head;
                $this->head->prev = $temp;
                $nodeToDelete = null;
            }
        }
        $temp = $this->head;
        if($temp != null){
            while($temp->next != $this->head){
                if($temp->next->data == $key){
                    $nodeToDelete = $temp->next;
                    $temp->next = $temp->next->next;
                    $temp->next->prev = $temp;
                    $nodeToDelete = null;
                }else{
                    $temp = $temp->next;
                }
            }
        }
    }

    //Reverse the list
    public function reverseList(){
        if($this->head != null){
            $prevNode = $this->head;
            $tempNode = $this->head;
            $curNode = $this->head->next;

            $prevNode->next = $prevNode;
            $prevNode->prev = $prevNode;
            while($curNode != $this->head){
                $tempNode = $curNode->next;
                $curNode->next = $prevNode;
                $prevNode->prev = $curNode;
                $this->head->next = $curNode;
                $curNode->prev = $this->head;
                $prevNode = $curNode;
                $curNode = $tempNode;
            }
            $this->head = $prevNode;
        }
    }

    // swap node values in CDLL
    public function swapNodeValues($node1, $node2){
        $temp = new CDLLNode();
        $temp = $this->head;
        $N = 0;
        if($temp != null){
            $N++;
            $temp = $temp->next;
        }
        while($temp != $this->head){
            $N++;
            $temp = $temp->next;
        }
        if($node1 < 1 || $node1>$N || $node2<1 || $node2 >$N){
            return;
        }
        $pos1 = $this->head;
        $pos2 = $this->head;
        for($i = 1; $i < $node1; $i++){
            $pos1 = $pos1->next;
        }
        for($i = 1; $i < $node2; $i++){
            $pos2 = $pos2->next;
        }
        $val = $pos1->data;
        $pos1->data = $pos2->data;
        $pos2->data = $val;
    }







}

$cdll = new cdll();


$data = ['93', '84', '75', '66', '57', '48', '39', '84', '55', '84'];
$ll1 = "";
$ll2 = "";
foreach($data as $key=>$value){
    $ll1 = 'll'.$key;
    if($key == 0){
    $ll1 = new CDLLNode();
    $ll1->data = $value;
    $ll1->prev =  null;
    $ll1->next = null;
    $cdll->head = $ll1;
    $ll1->next =  $cdll->head;
    $cdll->head->prev = $ll1;
    $ll2 = $ll1;
    }
    else{
        $ll1 = new CDLLNode();
        $ll1->data = $value;
        $ll1->next = null;
        $ll1->prev = $ll2;
        $ll2->next = $ll1;
        $ll1->next = $cdll->head;
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

$cdll->push_at(69, 5);

//$cdll->pop_front();
//$cdll->pop_front();

//$cdll->pop_back();
//$cdll->pop_back();

$cdll->pop_at(9);

//$cdll->deleteAllNodes();

$cdll->countNodes();
echo "==================================";
$cdll->PrintList();
//$cdll->deleteEvenNodes();
//$cdll->deleteOddNodes();
//$cdll->SearchElement(84);
//$cdll->pop_first(84);
//$cdll->pop_last(84);
//$cdll->pop_all(84);
//$cdll->reverseList();
$cdll->swapNodeValues(2, 10);
echo "==================================";
$cdll->PrintList();
//$cdll->SearchElement(84);
//$cdll->pop_first(84);


// $cdll->push_at(85, 1);
// $cdll->PrintList();
// $cdll->push_at(87, 1);
// $cdll->PrintList();
// $cdll->push_at(95, 3);
//$cdll->PrintList();



//echo "<pre>";
//print_r($cdll);
?>