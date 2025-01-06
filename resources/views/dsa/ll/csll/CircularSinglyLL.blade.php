<?php 

// csll //route for circular singly linked list
echo "Circular Singly LL";

class CSNode{
    public $data;
    public $next;
}

class csll{
    public $head;
    public function __construct()
    {
        $this->head = null;
    }

    //display the content of the list
    public function PrintList() {
        $temp = new CSNode();
        $temp = $this->head;
        if($temp != null) {
        echo "The list contains: <br />";
        while(true) {
            //echo $temp->data." ";
            echo $temp->data."<br />";
            $temp = $temp->next;
            if($temp == $this->head)
            break;        
        }
        echo "\n";
        } else {
        echo "The list is empty.\n";
        }
    }

    //add new element at the start of the CSLL list
    public function push_front($newElement){
        $newNode = new CSNode();
        $newNode->data = $newElement;
        $newNode->next = null;
        if($this->head == null){
            $this->head = $newNode;
            $newNode->next = $this->head;
        }else{
            $temp = new CSNode();
            $temp = $this->head;
            while($temp->next !== $this->head){
                $temp = $temp->next;
            }
            $temp->next = $newNode;
            $newNode->next = $this->head;
            $this->head = $newNode;
        }
    }

    //add new element at the end of the CSLL list
    public function push_back($newElement){
        $newNode = new CSNode();
        $newNode->data = $newElement;
        $newNode->next = null;
        if($this->head == null){
            $this->head = $newNode;
            $newNode->next = $this->head;
        }else{
            $temp = new CSNode();
            $temp = $this->head;
            while($temp->next !== $this->head){
                $temp = $temp->next;
            }
            $temp->next = $newNode;
            $newNode->next = $this->head;
        }
    }


    //Insert a new element at the given position
    public function push_at($newElement, $position){
        $newNode = new CSNode();
        $newNode->data = $newElement;
        $newNode->next = null;
        $temp = $this->head;
        $NoOfElements = 0;
        if($temp != null){
            $NoOfElements++;
            $temp = $temp->next;
        }
        while($temp->next !== $this->head){
            $NoOfElements++;
            $temp = $temp->next;
        }

        if($position < 1 || $position > $NoOfElements){
            echo "\n Invalid position";
        }else if($position == 1){
            if($this->head == null){
                $this->head = $newNode;
                //$this->head->next = $this->head;
                $newNode->next = $this->head;
            }else{
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }
                //$temp->next = $this->head;
                $newNode->next = $this->head;
                $this->head = $newNode;
                $temp->next = $this->head;                
            }
        }else{
            $temp = $this->head;
            for($i = 1; $i < $position-1; $i++){
                $temp = $temp->next;
            }
            $newNode->next = $temp->next;
            $temp->next = $newNode; 
        }

    }

    //delete first node of the CSLL list
    public function pop_front(){
        if($this->head != null){
            if($this->head->next == $this->head){
                $this->head = null;
            }else{
                //$temp = new CSNode();
                $temp = $this->head;
                //$firstNode = $this->head;
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }
                $this->head = $this->head->next;
                $temp->next = $this->head;
                //$firstNode = null;
            }
        }else{
            "\n list is empty";
        }
    }

    //delete last node of the CSLL list
    public function pop_back(){
        if($this->head != null){
            if($this->head->next == $this->head){
                $this->head = null;
            }else{
                $temp = new CSNode();
                $temp = $this->head;
                while($temp->next->next != $this->head){
                    $temp = $temp->next;
                    //$lastNode = $temp->next;
                }
                $temp->next = $this->head;
                //$lastNode = null; 
            }
        }else{
            "\n list is empty";
        }
    }

    //delete an element at the given position in csll
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
            echo "\Invalid Position";
        }else if($position == 1){
            if($this->head->next = $this->head){
                $this->head = null;
            }else{
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }
                $this->head = $this->head->next;
                $temp->next = $this->head;
                //$nodeToDelete = null;
            }
        }else{
            $temp = $this->head;
            for($i=1; $i<$position-1; $i++){
                $temp = $temp->next;
            }
            //$nodeToDelete = $temp->next;
            $temp->next = $temp->next->next;
        }
    }

    //Delete all nodes of the csll
    public function deleteAllNodes(){
        if($this->head != null){
            $temp = new CSNode();
            $current = new CSNode();
            //$temp = $this->head;
            $current = $this->head->next;
            while($current != $this->head){
                $temp = $current->next;
                $current = null;
                $current =$temp;
            }
            $this->head = null;
        }else{
            echo "\n List is allready empty";
        }
    }

    //Count nodes in the csll list
    public function countNodes(){
        $temp = new CSNode();
        $temp = $this->head;
        $i = 0;
        if($temp != null){
            $i++;
            $temp = $temp->next;
        }
        while($temp != $this->head){
            $i++;
            $temp = $temp->next;
        }
        //return $i;
        echo "Total node in the list = ".$i;
    }

    //Delete even nodes of the list in csll
    public function deleteEvenNodes(){
        if($this->head != null && $this->head->next != $this->head){
            $oddNode = $this->head;
            $evenNode = $this->head->next;
            $temp = new CSNode();
            while(true){
                $temp = $oddNode;
                $oddNode->next = $evenNode->next;
                $evenNode = null;
                $oddNode = $oddNode->next;
                $evenNode = $oddNode->next;
                if($oddNode == $this->head || $evenNode == $this->head){
                    break;
                }
                if($oddNode == $this->head){
                    $temp->next = $this->head;
                }else{
                    $oddNode->next = $this->head;
                }
            }
        }
    }

    //Delete odd nodes of the list in csll
    public function deleteOddNodes(){
        if($this->head != null && $this->head->next == $this->head){
            $this->head = null;
        }
        else if($this->head != null){
            $temp = $this->head;
            while($temp->next != $this->head){
                $temp = $temp->next;
            }
            $temp->next = $this->head->next;
            $this->head = null;
            $this->head = $temp->next;
            if($this->head != null && $this->head->next != $this->head){
                $evenNode = $this->head;
                $oddNode = $this->head->next;
                while(true){
                    $temp = $evenNode;
                    $evenNode->next = $oddNode->next;
                    $oddNode = null;
                    $evenNode = $evenNode->next;
                    $oddNode = $evenNode->next;
                    if($evenNode == $this->head || $oddNode == $this->head){
                        break;
                    }
                }
                if($evenNode == $this->head){
                    $temp->next = $this->head;
                }else{
                    $evenNode->next = $this->head;
                }
            }
        }
        
    }

    //Search an element in the list csll
    public function SearchElement($searchValue){
        $temp = new CSNode();
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
                echo $searchValue. " is found at index = ".$i.".\n";
            }else{
                echo $searchValue. " is not found in list.\n";
            }
        }else{
            echo "The list is empty.\n";
        }
    }


    //Delete first node by key
    public function pop_first($key){
        if($this->head != null){
            $temp = $this->head;
            //$nodeToDelete = $this->head;
            if($temp->data == $key){
                if($temp->next == $this->head){
                    $this->head = null;
                }else{
                    while($temp->next != $this->head){
                        $temp = $temp->next;
                    }
                    $this->head = $this->head->next;
                    $temp->next = $this->head;
                    //$nodeToDelete = null;
                }
            }else{
                while($temp->next != $this->head){
                    if($temp->next->data == $key){
                        //$nodeToDelete = $temp->next;
                        $temp->next = $temp->next->next;
                        //$nodeToDelete = null;
                        break;
                    }
                    $temp = $temp->next;
                }
            }
        }else{
            echo "The list is empty.\n";
        }
    }

    //Delete last node by key
    public function pop_last($key){
        if($this->head != null){
            $temp = new CSNode();
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
                        $this->head = $this->head->next;
                        $lastNode = null;
                    }
                }else{
                    $previousToLast->next = $lastNode->next;
                    $lastNode = null;
                }
            }
        }else{
            echo "The list is empty.\n";
        }
    }

    //Delete all nodes by key
    public function pop_all($key){
        $nodeToDelete = new CSNode();
        $temp = new CSNode();
        while($this->head != null && $this->head->data == $key ){
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
                $nodeToDelete = null;
            }
        }
            $temp = $this->head;
            if($temp != null){
                while($temp->next != $this->head){
                    if($temp->next->data == $key){
                        $nodeToDelete = $temp->next;
                        $temp->next = $temp->next->next;
                        $nodeToDelete = null;
                    }else{
                        $temp = $temp->next;
                    }
                }
            }
    }

    //Reverse the list CSLL
    public function reverseList(){
        if($this->head != null){
            $prevNode = $this->head;
            $tempNode = $this->head;
            $curNode = $this->head->next;
            $prevNode->next = $prevNode;
            while($curNode != $this->head){
                $tempNode = $curNode->next;
                $curNode->next = $prevNode;
                $this->head->next = $curNode;
                $prevNode = $curNode;
                $curNode = $tempNode;
            }
            $this->head = $prevNode;
        }else{
            echo "The list is empty.\n";
        }
    }

    //swap node values
    public function swapNodeValues($node1, $node2){
        $temp = new CSNode();
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
        if($node1 < 1 || $node1 > $N || $node2 < 1 || $node2 > $N){
            return;
        }
        $pos1 = $this->head;
        $pos2 = $this->head;

        for($i =1; $i < $node1; $i++){
            $pos1 = $pos1->next;
        }
        for($i =1; $i < $node2; $i++){
            $pos2 = $pos2->next;
        }
        $val = $pos1->data;
        $pos1->data = $pos2->data;
        $pos2->data = $val;
    }





}

$mycsll = new csll();

// $csll0 = new CSNode();

// $csll0->data = 10;
// //$mycsll->head = $csll0;
// $csll0->next = $mycsll->head;
// $mycsll->head = $csll0;
// //$mycsll->head = $csll0;

// $csll1 = new CSNode();
// $csll1->data = 14;
// $csll1->next = $mycsll->head;
// $csll0->next = $csll1;

// $csll2 = new CSNode();
// $csll2->data = 18;
// $csll2->next = $mycsll->head;
// $csll1->next = $csll2;


 $data = ['91', '81', '72', '63', '54', '45', '36', '63'];
//$data = ['91', '81'];
//$data = ['91'];
$ll1 = "";
$ll2 = "";
foreach($data as $key=>$value){
    $ll1 = 'll'.$key;
    if($key == 0){
    $ll1 = new CSNode();
    $ll1->data = $value;
    $mycsll->head = $ll1;
    $ll1->next =  $mycsll->head;
    $ll2 = $ll1;
    }
    else{
        // $key_value = ($key-1);
        // $last_key = $last_key.$key_value;
        $ll1 = new CSNode();
        $ll1->data = $value;
        $ll1->next = $mycsll->head;
        $ll2->next = $ll1;
        $ll2= $ll1;
    }
    //print_r($ll2->next);
}


// $mycsll->push_front(89);
// $mycsll->push_back(93);
// $mycsll->push_at(95, 8);
// $mycsll->pop_front();
// $mycsll->pop_back();
// $mycsll->pop_at(6);
// // $mycsll->deleteAllNodes();
// //$mycsll->deleteEvenNodes();
echo "<br />=============Original list============= <br />";
$mycsll->PrintList();
//$mycsll->deleteEvenNodes();
//echo "</ br>======delete even Node======</br >";

// $mycsll->deleteOddNodes();
// echo "</ br>======delete odd Node======</br >";

//$mycsll->PrintList();

//$mycsll->SearchElement(63);

// $mycsll->pop_first(63);
// echo "</ br>====== After pop first ======</br >";
// $mycsll->pop_last(63);
// echo "</ br>====== After pop Last ======</br >";
//$mycsll->PrintList();

// $mycsll->pop_all(63);
// echo "</ br>====== After pop all by key ======</br >";
// $mycsll->PrintList();

$mycsll->reverseList();
echo "</ br>====== reverse the list ======</br >";
$mycsll->PrintList();

$mycsll->swapNodeValues(3, 7);
echo "</ br>====== after swap the node value in the list ======</br >";
$mycsll->PrintList();

//echo "</ br>======Total Node======</br >";
//$mycsll->countNodes();
// echo "<pre>";
// print_r($mycsll);

?>