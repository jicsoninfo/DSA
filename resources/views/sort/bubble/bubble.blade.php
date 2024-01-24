<?php
//php program for bubble sort on linked list

class Node{
    public $data;
    public $next;
    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList{
    public $head;
    function __construct()
    {
        $this->head = null;
    }

    public function insert($value){
        
    }
}


?>