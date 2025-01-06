<?php
// dll //route for doubly linked list
echo "Doubly LL";

    class DNode{
        public $data;
        public $next;
        public $prev;
    }

    class dll{
        public $head;
        public function __construct()
        {
         $this->head=null;   
        }


        //Display the content of the list
        public function PrintList(){
          $temp = new DNode();
          $temp = $this->head;
          if($temp != null){
            echo "The list contains: <br>";
            while($temp != null){
                echo $temp->data. " <br>";
                $temp = $temp->next;
            }
            echo "<br>";
          }else{
            echo "The list is empty.\n";
          }  
        }

        //Add new element at the start of the list
        public function push_front($newElement){
            $newNode = new DNode();
            $newNode->data = $newElement;
            $newNode->next = null;
            $newNode->prev = null;
            if($this->head == null){
                $this->head = $newNode;
            }else{
                //$newNode->next = $this->head->next;
                $this->head->prev = $newNode;
                $newNode->next = $this->head;
                $this->head = $newNode;
            }
        }

        //Add new element at the end of the list DLL
        public function push_back($newElement){
            $newNode = new DNode();
            $newNode->data = $newElement;
            $newNode->next = null;
            $newNode->prev = null;
            if($this->head == null){
                $this->head = $newNode;
            }else{
                $temp = new DNode();
                $temp = $this->head;
                while($temp->next != null){
                    $temp = $temp->next;
                }
                $temp->next = $newNode;
                $newNode->prev = $temp;
            }
        }

        //Insert a new element at the given position
        public function pust_at($newElement, $position){
            $newNode = new DNode();
            $newNode->data = $newElement;
            $newNode->next = null;
            $newNode->prev = null;

            if($position < 1){
                echo "\nposition should be >= 1.";
            }else if($position == 1){
                    $this->head->prev = $newNode;
                    $newNode->next = $this->head;
                    $this->head = $newNode;
                }
            else{
                $temp = new DNode();
                $temp = $this->head;
                for($i=1; $i < $position-1; $i++){
                    if($temp != null){
                        $temp = $temp->next;
                    }
                }
                if($temp != null){
                    $newNode->next = $temp->next;
                    $newNode->prev = $temp;
                    $temp->next = $newNode;
                    if($newNode->next != null){
                        $newNode->next->prev = $newNode;
                    }else{
                        echo "\n The previious node is null";
                    }
                }else{
                    echo "\n The position is greater then total node is null";
                }
            }
            
        }

        //Delete first node of the list in DLL
        public function pop_front(){
            if($this->head != null){
                $temp = $this->head;
                $this->head = $this->head->next;
                $temp = null;
                if($this->head != null){
                    $this->head->prev = null;
                }
                //sechond method
                // if($this->head->next == null){
                //     $this->head = null;
                // }else{
                //     $temp = $this->head;
                //     $this->head = $this->head->next;
                //     $this->head->prev = null;
                //     $temp = null;
                // }
            }else{
                echo "\n The list is empty";
            }
        }

        //Delete last node of the list in DLL
        public function pop_back(){
            if($this->head != null){
                if($this->head->next == null){
                    $this->head = null;
                }else{
                    $temp = new DNode();
                    $temp = $this->head;
                    while($temp->next->next != null){
                        $temp = $temp->next;
                        //$lastNode = $temp->next;
                    }
                    $temp->next = null;
                    //$lastNode = null;
                }
            }else{
                echo "\n The list is empty";
            }
        }

        // Delete an element at the given position
        public function pop_at($position){
            if($position < 1){
                echo "\nposition should be >1 .";
            }else if ($position ==1 && $this->head != null){
                $nodeToDelete = $this->head;
                $this->head = $this->head->next;
                $nodeToDelete = null;
                if($this->head != null){
                    $this->head->prev = null;
                }
            }else{
                $temp = new DNode();
                $temp = $this->head;
                for($i=1; $i < $position -1; $i++){
                    if($temp != null){
                        $temp = $temp->next;
                    }
                }
                if($temp != null && $temp->next != null){
                    $nodeToDelete = $temp->next;
                    $temp->next = $temp->next->next;
                    //$nodeToDelete = null;
                    if($temp->next->next != null){
                        $temp->next->next->prev = $temp->next;
                        $nodeToDelete = null;
                    }
                }else{
                    echo "\nThe node already null.";
                }

            }
        }

        //delete all nodes of the list 
        public function deleteAllNodes(){
           $temp = new DNode();
            while($this->head != null){
                $temp = $this->head;
                $this->head = $this->head->next;
                $temp = null;
           }
           echo "<br>All nodes are deleted successfully. <br>\n";
        }

        //count nodes in the list
        public function countNodes(){
            $temp = new DNode();
            $temp = $this->head;
            $i = 0;
            while($temp != null){
                $i++;
                $temp = $temp->next;
            }
            //return $i;
            echo "Total node in the list = ".$i;
        }


        //delete even nodes of the list
        public function deleteEvenNodes(){
            if($this->head != null){
                $oddNode = $this->head;
                $evenNode = $this->head->next;
                while($oddNode != null && $evenNode != null){
                    $oddNode->next = $evenNode->next;
                    $evenNode = null;
                    $temp = $oddNode;
                    $oddNode = $oddNode->next;
                    if($oddNode != null){
                        $oddNode->prev = $temp;
                        $evenNode = $oddNode->next;
                    }
                }
            }
        }

        //delete odd nodes of the list
        public function deleteOddNodes(){
            if($this->head != null){
                $temp = $this->head;
                $this->head = $this->head->next;
                $temp= null;
                if($this->head != null){
                    $this->head->prev = null;
                    $evenNode = $this->head;
                    $oddNode = $this->head->next;
                    while($evenNode != null && $oddNode != null){
                        $evenNode->next = $oddNode->next;
                        $oddNode = null;
                        $temp = $evenNode;
                        $evenNode = $evenNode->next;
                        if($evenNode != null){
                            $evenNode->prev = $temp;
                            $oddNode = $evenNode->next;
                        } 
                    }
                }
            }
        }

        //Search an element in the list
        public function SearchElement($searchValue){
            $temp = new DNode();
            $temp = $this->head;
            $found = 0;
            $i = 0;
            if($temp != null){
                while($temp != null){
                    $i++;
                    if($temp->data == $searchValue){
                        $found++;
                        break;
                    }
                    $temp = $temp->next;
                }
                if($found == 1){
                    echo $searchValue." is found at index = " .$i.".\n<br>";
                }else{
                    echo $searchValue. " is not fount in the list. \n <br>";
                }
            }else{
                echo "The list is empty.\n<br>";
            }
        }

        //Delete first node by key
        public function pop_first($key){
            $temp = $this->head;
            if($temp != null){
                if($temp->data == $key){
                    $nodeToDelete = $this->head;
                    $this->head = $this->head->next;
                    $nodeToDelete = null;
                    if($this->head != null){
                        $this->head->prev = null;
                    }
                }else{
                    while($temp->next != null){
                        if($temp->next->data == $key){
                            $nodeToDelete = $temp->next;
                            $temp->next = $temp->next->next;
                            if($temp->next != null){
                                $temp->next->prev = $temp;
                                $nodeToDelete = null;
                                break;
                            }
                        }
                        $temp = $temp->next;
                    }
                }
            }else{
                echo "<br> The list is empty <br>";
            }
        }

        //Delete last node by key
        public function pop_last($key){
            if($this->head != null){
                $temp = new DNode();
                $previousToLast = null;
                $lastNode = null;

                if($this->head->data == $key){
                    $lastNode = $this->head;
                }
                $temp = $this->head;
                while($temp->next != null){
                    if($temp->next->data == $key){
                        $previousToLast = $temp;
                        $lastNode = $temp->next;
                    }
                    $temp = $temp->next;
                }

                if($lastNode != null){
                    if($lastNode == $this->head){
                        $this->head = $this->head->next;
                        $lastNode = null;
                    }else{
                        $previousToLast->next = $lastNode->next;
                        if($previousToLast->next != null){
                            $previousToLast->next->prev = $previousToLast;
                        }
                        $lastNode = null;
                    }
                }

            }
        }

        //Delete all nodes by key
        public function pop_all($key){
            $nodeToDelete = new DNode();
            while($this->head != null && $this->head->data == $key){
                $nodeToDelete = $this->head;
                $this->head = $this->head->next;
                $nodeToDelete = null;
                if($this->head != null){
                    $this->head->prev = null;
                }
            }

            $temp = $this->head;
            if($temp != null){
                while($temp->next != null){
                    if($temp->next->data == $key){
                        $nodeToDelete = $temp->next;
                        $temp->next = $temp->next->next;
                        if($temp->next != null){
                            $temp->next->prev = $temp;
                            $nodeToDelete = null;
                        }
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
                $prevNode->next = null;
                $prevNode->prev = null;
                while($curNode != null){
                    $tempNode = $curNode->next;;
                    $curNode->next = $prevNode;
                    $prevNode->prev = $curNode;
                    $prevNode = $curNode;
                    $curNode = $tempNode;
                }
                $this->head = $prevNode;
            }
        }

        //swap node values
        public function swapNodeValues($node1, $node2){
            $temp = new DNode();
            $temp = $this->head;
            $N = 0;
            while($temp != null){
                $N++;
                $temp =  $temp->next;
            }
            if($node1 < 1 || $node1 > $N || $node2 < 1 || $node2 > $N){
                return;
            }
            $pos1 = $this->head;
            $pos2 = $this->head;
            for($i = 1; $i < $node1; $i++){
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

    


    $dll = new dll();

    // $dn01 = new DNode();
    // $dn01->data = 9;
    // $dn01->next = null;
    // $dn01->prev =  null;
    // $dll->head = $dn01;

    // $dn02 = new DNode();
    // $dn02->data = 13;
    // $dn02->next = null;
    // $dn02->prev = $dn01;
    // $dn01->next = $dn02;
    // //$dll->head = $dn01;

    // $dn03 = new DNode();
    // $dn03->data = 17;
    // $dn03->next = null;
    // $dn03->prev =  $dn02;
    // $dn02->next = $dn03;
    // //$dll->head = $dn01;



$data = ['91', '81', '72', '63', '54', '45', '36', '63', '81', '81', '81'];
$ll1 = "";
$ll2 = "";
foreach($data as $key=>$value){
    $ll1 = 'll'.$key;
    if($key == 0){
    $ll1 = new DNode();
    $ll1->data = $value;
    $dll->head = $ll1;
    $ll1->next =  null;
    $ll1->prev = null;
    $ll2 = $ll1;
    }
    else{
        $ll1 = new DNode();
        $ll1->data = $value;
        $ll1->next = null;
        $ll1->prev = $ll2;
        $ll2->next = $ll1;
        $ll2= $ll1;
    }
    //print_r($ll2->next);
}
    // echo "<pre>";
    // print_r($dll);

    $dll->push_front(101);
    $dll->push_back(103);
    $dll->pust_at(105,8);
    $dll->pop_front();
    $dll->pop_back();
    $dll->pop_at(8);
    //$dll->deleteAllNodes();
    //$dll->countNodes();
    //$dll->PrintList();

    echo "<br />=============Original list============= <br />";
    $dll->PrintList();

    // $dll->deleteEvenNodes();
    // echo "</ br>======delete even Node======</br >";
    // $dll->PrintList();

    // $dll->deleteOddNodes();
    // echo "</ br>======delete odd Node======</br >";
    // $dll->PrintList();

    $dll->SearchElement(75);

    // $dll->pop_first(81);
    // echo "<br />=============After pop first============= <br />";
    // $dll->PrintList();

    // $dll->pop_last(81);
    // echo "<br />=============After pop last============= <br />";
    // $dll->PrintList();

    // $dll->pop_all(81);
    // echo "<br />=============After pop all============= <br />";
    // $dll->PrintList();

    $dll->reverseList();
    echo "<br />=============After reverse the list============= <br />";
    $dll->PrintList();

    $dll->swapNodeValues(5, 9);
    echo "<br />=============After swap the value in list============= <br />";
    $dll->PrintList();
    
    echo "</ br>======Total Node======</br >";
    $dll->countNodes();
    
?>