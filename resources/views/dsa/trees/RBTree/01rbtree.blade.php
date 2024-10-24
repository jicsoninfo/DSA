<?php 
echo "R B T" . "<br>";


class RBNode{
    public $key;
    public $color; //'red' or 'black'
    public $left;
    public $right;
    public $parent;

    public function __construct($key){
        $this->key = $key;
        $this->color = 'red'; // New nodes are red by default
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }
}

class RedBlackTree {
    private $root;

    public function __construct(){
        $this->root = null;
    }

    public function insert($key){
        $newNode = new RBNode($key);
        $this->root = $this->bstInsert($this->root, $newNode);
        $this->fixViolation($newNode);
    }

    private function bstInsert($root, $node){
        if($root === null){
            return $node;
        }
        
        if($node->key < $root->key){
            $root->left = $this->bstInsert($root->left, $node);
            $root->left->parent = $root;
        }else{
            $root->right = $this->bstInsert($root->right, $node);
            $root->right->parent = $root;
        }

        return $root;
    }

    
    private function fixViolation($node){
        while($node !== null && $node !== $this->root && $node->parent->color == 'red'){
            $parent = $node->parent;
            $grandparent = $parent->parent;

            //Case: Parent is left child of grandparent
            if($parent === $grandparent->left){
                $uncle = $grandparent->right;

                if($uncle && $uncle->color == 'red'){
                    //Case 1: Uncle is red
                    $grandparent->color = 'red';
                    $parent->color = 'black';
                    $uncle->color = 'black';
                    $node =  $grandparent;
                }else{
                    //Case 2: Node is right child
                    if($node === $parent->right){
                        $this->rotateLeft($parent);
                        $node = $parent;
                        $parent = $node->parent;
                    }

                    //Case 3: Node is left child
                    $this->rotateRight($parendparent);
                    $parent->color = 'black';
                    $grandparent->color = 'red';
                    break;
                }
            }else{
                //Mirror cases
                $uncle = $grandparent->left;

                if($uncle && $uncle->color === 'red'){
                    //Case 1: Uncle is red
                    $grandparent->color = 'red';
                    $parent->color = 'black';
                    $uncle->color = 'black';
                    $node = $grandparent;
                }else{
                    //Case 2: Node is left child
                    if($node === $parent->left){
                        $this->rotateRight($parent);
                        $node = $parent;
                        $parent = $node->parent;
                    }

                    //Case 3: Node is right child
                    $this->rotateLeft($grandparent);
                    $parent->color = 'black';
                    $grandparent->color = 'red';
                    break;
                }
            }
        }

        $this->root->color = 'black'; //Ensure root is black
    }

    private function rotateLeft($node){
        $newRoot = $node->right;
        $node->right = $newRoot->left;

        if($newRoot->left != null){
            $newRoot->left->parent = $node;
        }

        $newRoot->parent = $node->parent;

        if($node->parent === null){
            $this->root = $newRoot;
        }else if($node === $node->parent->left){
            $node->parent->left = $newRoot;
        }else{
            $node->parent->right = $newRoot;
        }

        $newRoot->left = $node;
        $node->parent = $newRoot;
    }

    private function rotateRight($node){
        $newRoot = $node->left;
        $node->left = $newRoot->right;

        if($newRoot->right != null){
            $newRoot->right->parent = $node;
        }

        $newRoot->parent = $node->parent;

        if($node->parent === null){
            $this->root = $newRoot;
        }else if($node === $node->parent->right){
            $node->parent->right = $newRoot;
        }else{
            $node->parent->left = $newRoot;
        }

        $newRoot->right = $node;
        $node->parent = $newRoot;
    }

    

    public function inorder(){
        $this->inorderTraversal($this->root);
    }

    private function inorderTraversal($node){
        if($node !== null){
            $this->inorderTraversal($node->left);
            echo $node->key. " ";
            // echo "<pre>";
            // print_r($node->parent) . " ";
            $this->inorderTraversal($node->right);
        }
    }

  
}

  

$rbt = new RedBlackTree();
// $rbt->insert(10);
// $rbt->insert(20);
// $rbt->insert(30);
// $rbt->insert(15);
// $rbt->insert(25);

$rbt->insert(1);
$rbt->insert(2);
$rbt->insert(3);
$rbt->insert(4);
$rbt->insert(5);
$rbt->insert(6);
$rbt->insert(7);
$rbt->insert(8);
$rbt->insert(9);

echo "Inorder traversal of the Red-Black Tree: ";
$rbt->inorder(); // Output: 10 15 20 25 30
echo PHP_EOL;

echo "<pre>";
print_r($rbt);


?>

<?php
/*
class RBNode {
    public $key;
    public $color; // 'red' or 'black'
    public $left;
    public $right;
    public $parent;

    public function __construct($key) {
        $this->key = $key;
        $this->color = 'red'; // New nodes are red by default
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }
}


class RedBlackTree {
    private $root;

    public function __construct() {
        $this->root = null;
    }

    public function insert($key) {
        $newNode = new RBNode($key);
        $this->root = $this->bstInsert($this->root, $newNode);
        $this->fixViolation($newNode);
    }

    private function bstInsert($root, $node) {
        if ($root === null) {
            return $node;
        }

        if ($node->key < $root->key) {
            $root->left = $this->bstInsert($root->left, $node);
            $root->left->parent = $root;
        } else {
            $root->right = $this->bstInsert($root->right, $node);
            $root->right->parent = $root;
        }

        return $root;
    }

    private function fixViolation($node) {
        while ($node !== null && $node !== $this->root && $node->parent->color === 'red') {
            $parent = $node->parent;
            $grandparent = $parent->parent;

            // Case: Parent is left child of grandparent
            if ($parent === $grandparent->left) {
                $uncle = $grandparent->right;

                if ($uncle && $uncle->color === 'red') {
                    // Case 1: Uncle is red
                    $grandparent->color = 'red';
                    $parent->color = 'black';
                    $uncle->color = 'black';
                    $node = $grandparent;
                } else {
                    // Case 2: Node is right child
                    if ($node === $parent->right) {
                        $this->rotateLeft($parent);
                        $node = $parent;
                        $parent = $node->parent;
                    }
                    // Case 3: Node is left child
                    $this->rotateRight($grandparent);
                    $parent->color = 'black';
                    $grandparent->color = 'red';
                    break;
                }
            } else {
                // Mirror cases
                $uncle = $grandparent->left;

                if ($uncle && $uncle->color === 'red') {
                    // Case 1: Uncle is red
                    $grandparent->color = 'red';
                    $parent->color = 'black';
                    $uncle->color = 'black';
                    $node = $grandparent;
                } else {
                    // Case 2: Node is left child
                    if ($node === $parent->left) {
                        $this->rotateRight($parent);
                        $node = $parent;
                        $parent = $node->parent;
                    }
                    // Case 3: Node is right child
                    $this->rotateLeft($grandparent);
                    $parent->color = 'black';
                    $grandparent->color = 'red';
                    break;
                }
            }
        }

        $this->root->color = 'black'; // Ensure root is black
    }

    private function rotateLeft($node) {
        $newRoot = $node->right;
        $node->right = $newRoot->left;

        if ($newRoot->left !== null) {
            $newRoot->left->parent = $node;
        }

        $newRoot->parent = $node->parent;

        if ($node->parent === null) {
            $this->root = $newRoot;
        } else if ($node === $node->parent->left) {
            $node->parent->left = $newRoot;
        } else {
            $node->parent->right = $newRoot;
        }

        $newRoot->left = $node;
        $node->parent = $newRoot;
    }

    private function rotateRight($node) {
        $newRoot = $node->left;
        $node->left = $newRoot->right;

        if ($newRoot->right !== null) {
            $newRoot->right->parent = $node;
        }

        $newRoot->parent = $node->parent;

        if ($node->parent === null) {
            $this->root = $newRoot;
        } else if ($node === $node->parent->right) {
            $node->parent->right = $newRoot;
        } else {
            $node->parent->left = $newRoot;
        }

        $newRoot->right = $node;
        $node->parent = $newRoot;
    }

    public function inorder() {
        $this->inorderTraversal($this->root);
    }

    private function inorderTraversal($node) {
        if ($node !== null) {
            $this->inorderTraversal($node->left);
            echo $node->key . " ";
            $this->inorderTraversal($node->right);
        }
    }
}


// Example Usage
// Here’s how you can use the RedBlackTree class:

$rbt = new RedBlackTree();
$rbt->insert(10);
$rbt->insert(20);
$rbt->insert(30);
$rbt->insert(15);
$rbt->insert(25);

echo "Inorder traversal of the Red-Black Tree: ";
$rbt->inorder(); // Output: 10 15 20 25 30
echo PHP_EOL;
// Explanation
// Node Structure: Each node has a key, color, pointers to left and right children, and a pointer to its parent.
// Insertion: Inserting a node follows the rules of a binary search tree, and then the tree is fixed to maintain Red-Black properties.
// Rotations: Left and right rotations are performed to maintain balance during insertion.
// Traversal: Inorder traversal prints the keys in sorted order.
// This implementation provides a solid foundation for a Red-Black Tree in PHP, including insertion and inorder traversal. You can expand this implementation further by adding deletion and search functionalities if needed!
*/
?>