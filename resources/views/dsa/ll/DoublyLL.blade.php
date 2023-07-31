<?php
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



$data = ['91', '81', '72', '63', '54', '45', '36', '63'];
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
    $dll->PrintList();
    
    echo "</ br>======Total Node======</br >";
    $dll->countNodes();
    
?>