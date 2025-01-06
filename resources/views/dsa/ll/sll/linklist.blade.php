<?php 

// "/" route
echo "Singly LL";
class node{
    public $data;
    public $next;
} 
class ll{
        public $head;
        public function __construct(){
            $this->head = null;
        }

    //display the content of the list
    public function PrintList() {
                    $temp = new Node();
                    $temp = $this->head;
                    //print_r($temp);
                    if($temp != null) {
                    echo "The list contains: "."<br>";
                    while($temp != null) {
                        echo $temp->data."<br>";
                        //print_r($temp->next);
                        $temp = $temp->next;
                        //print_r($temp);
                    }
                    echo "\n";
                    } else {
                    echo "The list is empty.\n";
                    }
    }
    // Insert a new node at the start of the Linked List
    public function push_front($newElement){
        $newNode = new Node();
        $newNode->data = $newElement;
        $newNode->next = $this->head; 
        $this->head = $newNode;
    }

    //Insert a new node at the end of the Linked List
    public function push_back($newElement){
        $newNode = new Node();
        $newNode->data = $newElement;
        $newNode->next = null; 
        if($this->head == null) {
          $this->head = $newNode;
        } else {
          $temp = new Node();
          $temp = $this->head;
          while($temp->next != null) {
            $temp = $temp->next;
          }
          $temp->next = $newNode;
        }    

    }

    //Inserts a new element at the given position
    public function push_at($newElement, $position) {     
        $newNode = new Node(); 
        $newNode->data = $newElement;
        $newNode->next = null;
        if($position < 1) {
            echo "\nposition should be >= 1.";
        } else if ($position == 1) {
            $newNode->next = $this->head;
            $this->head = $newNode;
        } else {
            $temp = new Node();
            $temp = $this->head;
            for($i = 1; $i < $position-1; $i++) {
                if($temp != null) {
                    $temp = $temp->next;
                }
            }
            if($temp != null) {
                $newNode->next = $temp->next;
                $temp->next = $newNode;  
            } else {
                echo "\nThe previous node is null.";
            }       
        }
    } 

    //Delete first node of the list
    public function pop_front() {
        if($this->head != null) {
        $temp = $this->head;
        $this->head = $this->head->next;
        $temp = null;  
        }
    }

    //Delete last node of the list
    public function pop_back() {
        if($this->head != null) {
        if($this->head->next == null) {
            $this->head = null;
        } else {
            $temp = new Node();
            $temp = $this->head;
            while($temp->next->next != null)
            $temp = $temp->next;
            $lastNode = $temp->next;
            $temp->next = null; 
            $lastNode = null;
        }
        }
    }

    //Delete an element at the given position
    public function pop_at($position) {     
        if($position < 1) {
        echo "\nposition should be >= 1.";
        } else if ($position == 1 && $this->head != null) {
        $nodeToDelete = $this->head;
        $this->head = $this->head->next;
        $nodeToDelete = null;
        } else {
        $temp = new Node();
        $temp = $this->head;
        for($i = 1; $i < $position-1; $i++) {
            if($temp != null) {
            $temp = $temp->next;
            }
        }
        if($temp != null && $temp->next != null) {
            $nodeToDelete = $temp->next;
            $temp->next = $temp->next->next;
            $nodeToDelete = null; 
        } else {
            echo "\nThe node is already null.";
        }       
        }
    } 


  //delete all nodes of the list
    public function deleteAllNodes() {
        $temp = new Node();
        while($this->head != null) {
        $temp = $this->head;
        $this->head = $this->head->next;
        $temp = null;
        }
        echo "All nodes are deleted successfully.\n"; 
    }
    
    //count nodes in the list
    public function countNodes() {
        $temp = new Node();
        $temp = $this->head;
        $i = 0;
        while($temp != null) {
        $i++;
        $temp = $temp->next;
        }
        return $i;  
    }
    
    //delete even nodes of the list
    public function deleteEvenNodes() {
        if($this->head != null) {
            $oddNode = $this->head;
            $evenNode = $this->head->next; 
            while($oddNode != null && $evenNode != null) {
                $oddNode->next = $evenNode->next;
                $evenNode = null;
                $oddNode = $oddNode->next;
                if($oddNode != null)
                    $evenNode = $oddNode->next;
            }
        }
    }

    //delete odd nodes of the list
    public function deleteOddNodes() {
        if($this->head != null) {
            $temp = $this->head;
            $this->head = $this->head->next;
            $temp = null;
            if($this->head != null) { 
                $evenNode = $this->head;
                $oddNode = $this->head->next; 
                while($evenNode != null && $oddNode != null) {
                    $evenNode->next = $oddNode->next;
                    $oddNode = null;
                    $evenNode = $evenNode->next;
                if($evenNode != null)
                    $oddNode = $evenNode->next;
                }
            }
        }
    } 
    
    //Search an element in the list
    public function SearchElement($searchValue) {
        $temp = new Node();
        $temp = $this->head;
        $found = 0;
        $i = 0;
        if($temp != null) {
            while($temp != null) {
                $i++;
                if($temp->data == $searchValue) {
                    $found++;
                    break;
                }
                $temp = $temp->next;
            }
            if ($found == 1) {
                echo $searchValue." is found at index = ".$i.".\n";
            } else {
                echo $searchValue." is not found in the list.\n";
            }
        } else {
            echo "The list is empty.\n";
        }
    }
    
     //Delete first node by key
    public function pop_first($key) {     
        $temp = $this->head;
            if($temp != null) {
                if($temp->data == $key) {
                    $nodeToDelete = $this->head;
                    $this->head = $this->head->next;
                    $nodeToDelete = null;
                } else {
                    while($temp->next != null) {
                        if($temp->next->data == $key) {
                            $nodeToDelete = $temp->next;
                            $temp->next = $temp->next->next;
                            $nodeToDelete = null;
                            break; 
                        }
                        $temp = $temp->next;
                    }
                }
            }
    }


     //Delete last node by key
    public function pop_last($key) {       
        if($this->head != null) {
            $temp = new Node(); 
            $previousToLast = null;
            $lastNode = null;
            if($this->head->data == $key) 
                $lastNode = $this->head;
            $temp = $this->head;
            while($temp->next != null) {
                if($temp->next->data == $key) {
                    $previousToLast = $temp;
                    $lastNode = $temp->next;
                }
                $temp = $temp->next;
            }
        
            if($lastNode != null) {
                if($lastNode == $this->head) {
                    $this->head = $this->head->next;
                    $lastNode = null;
                } else {
                    $previousToLast->next = $lastNode->next;
                    $lastNode = null;
                }
            }
        }
    }
    
    
    //Delete all nodes by key
    public function pop_all($key) {     
        $nodeToDelete = new Node();
        while($this->head != null && $this->head->data == $key) {
            $nodeToDelete = $this->head;
            $this->head = $this->head->next;
            $nodeToDelete = null;
        } 
        $temp = $this->head;        
        if($temp != null) {
            while($temp->next != null) {
                if($temp->next->data == $key) {
                    $nodeToDelete = $temp->next;
                    $temp->next = $temp->next->next;
                    $nodeToDelete = null;
                } else {
                    $temp = $temp->next;
                }
            }
        }
    }
    
    //reverse the list
    public function reverseList() {
        if($this->head != null) {
            $prevNode = $this->head;
            $tempNode = $this->head;
            $curNode = $this->head->next;
          
            $prevNode->next = null;
            while($curNode != null) {
                $tempNode = $curNode->next;
                $curNode->next = $prevNode;
                $prevNode = $curNode;
                $curNode = $tempNode;
            }
            $this->head = $prevNode;
        }
    } 
    
    //swap node values
    public function swapNodeValues($node1, $node2) {
        
        $temp = new Node();
        $temp = $this->head;
        $N = 0;
        while($temp != null) {
            $N++;
            $temp = $temp->next;
        }

        if($node1 < 1 || $node1 > $N || $node2 < 1 || $node2 > $N)
        return;

            $pos1 = $this->head;
            $pos2 = $this->head;
        for($i = 1; $i < $node1; $i++) {
            $pos1 = $pos1->next;
        }
        for($i = 1; $i < $node2; $i++) {
            $pos2 = $pos2->next;
        }

        $val = $pos1->data;
        $pos1->data = $pos2->data;
        $pos2->data = $val;
    }  




            
}



    $myll = new ll();

    $data = ['90', '80', '70', '60', '50', '40', '30'];
    //$data = [];
    //$ll = "ll";
    $ll1 = "";
    $ll2 = "";
   foreach($data as $key=>$value){
       // echo "<pre>";
        //echo $ll.$key.'=>'.$value;
        $ll1 = 'll'.$key;
    
        //echo $ll1;
        if($key == 0){
        $ll1 = new node();
        $ll1->data= $value;
        $ll1->next = null;
        $myll->head = $ll1;
        $ll2= $ll1;
        }
        else{
            // $key_value = ($key-1);
            // $last_key = $last_key.$key_value;
            $ll1 = new node();
            $ll1->data= $value;
            $ll1->next = null;
            $ll2->next = $ll1;
            $ll2= $ll1;
        }
        print_r($ll2->next);
        //$ll.$key = new node();
   }

   $myll->PrintList();
   $myll->push_front(66);
   $myll->push_front(92);
   $myll->push_back(32);
   $myll->push_at(52, 5);
   //$myll->pop_front();
   $myll->PrintList();
   $total_node = $myll->countNodes();
   echo $total_node;
   //$myll->deleteEvenNodes();
   //echo "<br>==============After deleting all even nodes=======================<br>";
   //$myll->PrintList();

   //$myll->deleteOddNodes();
   //echo "<br>==============After deleting all odd nodes=======================<br>";
   //$myll->PrintList();

   //$myll->SearchElement(32);
   //$myll->SearchElement(32);
   
   //$myll->pop_last(32);
   //$myll->PrintList();
   
   //$myll->reverseList();
   //$myll->PrintList();
   
   $myll->swapNodeValues(1, 4);
   $myll->PrintList();

    // echo "<pre>";
    // print_r($myll);
    // die();




    // $data_11 = ['90', '80', '70', '60', '50', '40', '30'];
    // $data_12 = ['92', '82', '72', '62', '52', '42', '32'];
    // $data_13 = ['93', '83', '73', '63', '53', '43', '33'];
    // $data_14 = ['94', '84', '74', '64', '54', '44', '34'];

    // $id = 13;
    // $data_dynamic = "data_".$id;
    // $data_dynamic_data = $$data_dynamic;
    // foreach($data_dynamic_data as $data){
    //     echo "<pre>";
    //     echo $data;
    // }
?>