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
        // echo $this->getHeight($node->left) . "<br>";
        // echo $this->getHeight($node->right) ."<br>";

        // Get the balance factor
        $balance = $this->getBalance($node);
        // echo "balance" .$balance ."<br />";

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


    //Function to perform inorder traversal
    public function inorderTraversal ($node){
        if($node !== null){
            $this->inorderTraversal($node->left);
            echo $node->data . " ";
            $this->inorderTraversal($node->right);
        }
    }

    //Function to perform preorder traversal
    public function preorder ($node){
        if($node !== null){
            echo $node->data . " ";
            $this->preorder($node->left);
            $this->preorder($node->right);
        }
    }

    //Function to perform postorder traversal
    public function postorder ($node){
        if($node !== null){
            $this->postorder($node->left);
            $this->postorder($node->right);
            echo $node->data . " ";
        }
    }




}

    $avl = new AVLT();
    $avl->insert(10);
    $avl->insert(20);
    $avl->insert(30);
    $avl->insert(40);
    $avl->insert(50);
    $avl->insert(25);


echo "Inorder traversal of the AVL T:\n" ."<br>";
$avl->inorderTraversal($avl->root) ; // Output should be in sorted order

echo "<br>" ."Preorder traversal of the AVL T:\n" ."<br>";
$avl->preorder($avl->root);

echo "<br>" ."Postorder traversal of the AVL T:\n" ."<br>";
$avl->postorder($avl->root);

// echo "<pre>";
// print_r($avl);


?>


<?php
/*

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