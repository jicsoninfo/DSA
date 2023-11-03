<?php
//echo "<h1>BST in PHP</h1>"

class Node{
    public $value = null;
    public $left = null;
    public $right = null;
    // public $value;
    // public $left;
    // public $right;

    // public function __construct(){
    //     $this->value = null;
    //     $this->left = null;
    //     $this->right = null;
    // }
}

class BinaryST{
    public $root;
    public function __construct(){
        $this->root = null;
    }

    public function insert($value){
        $newNode = new node();
        $newNode->value = $value;
        $newNode->left = null;
        $newNode->right = null;
        if($this->root === null){
            $this->root = $newNode;
            //return $this->root;
        }
        $current = $this->root;
        while(true){
            if($value === $current->value){
                return false; // Duplicate values are not allowed
            }
            if($value < $current->value){
                if($current->left === null){
                    $current->left = $newNode;
                    return $this;
                }
                $current = $current->left;
            }else{
                if($current->right == null){
                    $current->right = $newNode;
                    return $this;
                }
                $current = $current->right;
            }
        }
    }

    public function inorder(){
        $result = [];
        function traverse(){
            
        }
    }
}

$BST = new BinaryST();
$BST->insert(10);
$BST->insert(9);
$BST->insert(8);

$BST->insert(5);
$BST->insert(15);
$BST->insert(3);
$BST->insert(7);
$BST->insert(12);
$BST->insert(18);

echo "<pre>";
print_r($BST);
die();
?>
