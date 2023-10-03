<?php
echo "dll <br>";
class DLLNode{
    public $data;
    public $next;
    public $prev;
}

class dll{
    public $head;
    //public $tail;
    public function __construct(){
        $this->head = null;
        //$this->tail = null;
    }

    public function printdll(){
        //$temp = new DLLNode();
        $temp = $this->head;
        if($temp != null){
            echo "DLL contains <br>";
            while($temp != null){
                echo $temp->data ."<br>";
                $temp = $temp->next;
            }
        }else{
            echo "DLL is empty <br>";
        }
    }


}

 $dll = new dll;

$dllnode01 = new DLLNode();
$dllnode01->data = 45;
$dllnode01->next = null;
$dllnode01->prev = null;
$dll->head = $dllnode01;
//$dllnode01->prev = $dll->head;

$dllnode02 = new DLLNode();
$dllnode02->data = 47;
$dllnode02->next = null;
$dllnode02->prev = $dllnode01;
$dllnode01->next = $dllnode02;

$dllnode03 = new DLLNode();
$dllnode03->data = 49;
$dllnode03->next = null;
$dllnode03->prev = $dllnode02;
$dllnode02->next = $dllnode03;


$dll->printdll();
// echo "<pre>";
// print_r($dll);

?>