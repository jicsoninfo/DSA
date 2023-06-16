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
}

$mycsll = new csll();

$csll0 = new CSNode();

$csll0->data = 10;
$csll0->next = null;
$mycsll->head = $csll0;

$csll1 = new CSNode();
$csll1->data = 14;
$csll1->next = null;
$csll0->next = $csll1;


echo "<pre>";
print_r($mycsll);

?>