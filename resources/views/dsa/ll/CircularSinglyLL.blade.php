<?php 
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


$data = ['91', '81', '72', '63', '54', '45', '36'];
$ll1 = "";
$ll2 = "";
foreach($data as $key=>$value){
    $ll1 = 'll'.$key;
    if($key == 0){
    $ll1 = new CSNode();
    $ll1->data = $value;
    $ll1->next =  $mycsll->head;
    $mycsll->head = $ll1;
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

$mycsll->PrintList();
// echo "<pre>";
// print_r($mycsll);

?>