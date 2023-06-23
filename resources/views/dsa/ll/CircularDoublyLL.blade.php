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
}

$cdll = new cdll();

$cdll01 = new CDLLNode();
$cdll01->data = 13;
//$cdll01->next = null;
//$cdll01->prev = null;
$cdll->head = $cdll01;
$cdll01->next = $cdll->head;
$cdll01->prev = $cdll->head;

$cdll02 = new CDLLNode();
$cdll02->data = 16;
$cdll02->prev = $cdll01;
$cdll01->next = $cdll02;
$cdll02->prev = $cdll->head;

echo "<pre>";
print_r($cdll);
?>