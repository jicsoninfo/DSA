<?php
echo "<h1>AVL</h1>";
class AVLNode{
    public $data;
    public $left;
    public $right;
    public $height;
    public function __construct($data){
        $this->data = $data;
        $this->left = null;
        $this->right = null;
        $this->height = 1;
    }
}

class AVLT{
    public $root;
    public function __construct(){
        $this->root = null;
    }

    public function insert($value){
        $this->root = $this->insertNode($this->root, $value);
    }

    public function insertNode($node, $value){
        if($node === null){
            return new AVLNode($value);
        }
        if($value < $node->data){
            $node->left = $this->insertNode($node->left, $value);
        }else if($value > $node->data){
            $node->right = $this->insertNode($node->right, $value);
        }else{
            return $node;
        }
        // Update height of this ancestor node
        //$node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));
        $node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));
        // echo $node->height ."node->value" .$node->data ."<br>";
        echo $this->getHeight($node->left) . "<br>";
        echo $this->getHeight($node->right) ."<br>";

        // Get the balance factor
        $balance = $this->getBalance($node);
        echo "balance" .$balance ."<br />";

        //Left Left case
        if($balance > 1 && $value < $node->left->data){
            return $this->rightRotate($node);
        }
        //Left right case
        if($balance > 1 && $value > $node->left->data){
            $node->left =  $this->leftRotate($node->left);
            return $this->rightRotate($node);
        }
        //Right right case
        if($balance < -1 && $value > $node->right->data){
            return $this->leftRotate($node);
        }
        //Right Left Case
        if($balance < -1 && $value < $node->right->data){
            $node->right = $this->rightRotate($node->right);
            return $this->leftRotate($node);
        }





        return $node;
    }

    public function getHeight($node){
        return $node ? $node->height : 0 ;
    }
    //get the balance factor of the node
    public function getBalance($node){
        if($node === null){
            return 0;
        }
        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    public function rightRotate($z){
        $y = $z->left; // y is now the left child of z
        $T3 = $y->right; // T3 is the right subtree of y

        //perform rotation
        $y->right = $z; //y takes z as its right child
        $z->left = $T3; // T3 becomes the left child of z

        //update heights
        $z->height = 1 + max($this->getHeight($z->left), $this->getHeight($z->right));
        $y->height = 1 + max($this->getHeight($y->left), $this->getHeight($y->right));

        //return new root
        return $y;
    }

    public function leftRotate($z){
        $y = $z->right; // y is now the right child of z
        $T2 = $y->left; // T2 is the left subtree of y

        //perform rotation
        $y->left = $z; //y takes z as its left child
        $z->right = $T2; //T2 becomes the right child of z

        //update heights
        $z->height = 1 + max($this->getHeight($z->left), $this->getHeight($z->right));
        $y->height = 1 + max($this->getHeight($y->left), $this->getHeight($y->right));

        //return new root
        return $y;
    }




}

$avl = new AVLT();
// $avl->insert(30);
// $avl->insert(20);
// $avl->insert(10);

$avl->insert(10);
$avl->insert(20);
$avl->insert(30);


$avl->insert(40);
//$avl->insert(10);
$avl->insert(25);




echo "<pre>";
print_r($avl);


?>


<?php
/*
AVL Tree Implementation in PHP
php
Copy code
class AVLNode {
    public $data;
    public $left;
    public $right;
    public $height;

    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
        $this->height = 1; // New node is initially added at leaf
    }
}

class AVLTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    // Get the height of the node
    private function getHeight($node) {
        return $node ? $node->height : 0;
    }

    // Right rotate the subtree rooted with y
    private function rightRotate($y) {
        $x = $y->left;
        $T2 = $x->right;

        // Perform rotation
        $x->right = $y;
        $y->left = $T2;

        // Update heights
        $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;

        // Return new root
        return $x;
    }

    // Left rotate the subtree rooted with x
    private function leftRotate($x) {
        $y = $x->right;
        $T2 = $y->left;

        // Perform rotation
        $y->left = $x;
        $x->right = $T2;

        // Update heights
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;
        $y->height = max($this->getHeight(y->left), $this->getHeight($y->right)) + 1;

        // Return new root
        return $y;
    }

    // Get the balance factor of the node
    private function getBalance($node) {
        if ($node === null) {
            return 0;
        }
        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    // Insert a node in the AVL tree
    public function insert($data) {
        $this->root = $this->insertNode($this->root, $data);
    }

    private function insertNode($node, $data) {
        // Normal BST insertion
        if ($node === null) {
            return new AVLNode($data);
        }

        if ($data < $node->data) {
            $node->left = $this->insertNode($node->left, $data);
        } else if ($data > $node->data) {
            $node->right = $this->insertNode($node->right, $data);
        } else {
            // Duplicates are not allowed
            return $node;
        }

        // Update height of this ancestor node
        $node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));

        // Get the balance factor
        $balance = $this->getBalance($node);

        // If the node becomes unbalanced, then there are 4 cases

        // Left Left Case
        if ($balance > 1 && $data < $node->left->data) {
            return $this->rightRotate($node);
        }

        // Right Right Case
        if ($balance < -1 && $data > $node->right->data) {
            return $this->leftRotate($node);
        }

        // Left Right Case
        if ($balance > 1 && $data > $node->left->data) {
            $node->left = $this->leftRotate($node->left);
            return $this->rightRotate($node);
        }

        // Right Left Case
        if ($balance < -1 && $data < $node->right->data) {
            $node->right = $this->rightRotate($node->right);
            return $this->leftRotate($node);
        }

        // Return the (unchanged) node pointer
        return $node;
    }

    // Function to perform inorder traversal
    public function inorderTraversal($node) {
        if ($node !== null) {
            $this->inorderTraversal($node->left);
            echo $node->data . " ";
            $this->inorderTraversal($node->right);
        }
    }
}

// Example usage
$avl = new AVLTree();
$avl->insert(30);
$avl->insert(20);
$avl->insert(40);
$avl->insert(10);
$avl->insert(25);

echo "Inorder traversal of the AVL tree:\n";
$avl->inorderTraversal($avl->root); // Output should be in sorted order



Implementation of Right Rotation in PHP

Visual Example:

Before Rotation:

markdown

      z
     /
    y
   /
  x
After Right Rotation:

markdown

      y
     / \
    x   z


private function rotateRight($z) {
    $y = $z->left;      // y is now the left child of z
    $T3 = $y->right;    // T3 is the right subtree of y

    // Perform rotation
    $y->right = $z;     // y takes z as its right child
    $z->left = $T3;     // T3 becomes the left child of z

    // Update heights
    $z->height = 1 + max($this->getHeight($z->left), $this->getHeight($z->right));
    $y->height = 1 + max($this->getHeight($y->left), $this->getHeight($y->right));

    // Return new root
    return $y;
}



Implementation of Left Rotation in PHP
php
Visual Example:

Before Rotation:

markdown

    z
     \
      y
       \
        x
After Left Rotation:

markdown

      y
     / \
    z   x



private function rotateLeft($z) {
    $y = $z->right;     // y is now the right child of z
    $T2 = $y->left;     // T2 is the left subtree of y

    // Perform rotation
    $y->left = $z;      // y takes z as its left child
    $z->right = $T2;    // T2 becomes the right child of z

    // Update heights
    $z->height = 1 + max($this->getHeight($z->left), $this->getHeight($z->right));
    $y->height = 1 + max($this->getHeight($y->left), $this->getHeight($y->right));

    // Return new root
    return $y;
}


*/
?>