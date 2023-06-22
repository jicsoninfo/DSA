<?php
echo "Doubly Singly LL";

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
    }


    $dll = new dll();

    $dn01 = new DNode();
    $dn01->data = 9;
    $dn01->next = null;
    $dn01->prev =  null;
    $dll->head = $dn01;

    $dn02 = new DNode();
    $dn02->data = 13;
    $dn02->next = null;
    $dn02->prev = $dn01;
    $dn01->next = $dn02;
    //$dll->head = $dn01;

    $dn03 = new DNode();
    $dn03->data = 17;
    $dn03->next = null;
    $dn03->prev =  $dn02;
    $dn02->next = $dn03;
    //$dll->head = $dn01;

    echo "<pre>";
    print_r($dll);
?>