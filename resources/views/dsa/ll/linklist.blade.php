<?php 

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