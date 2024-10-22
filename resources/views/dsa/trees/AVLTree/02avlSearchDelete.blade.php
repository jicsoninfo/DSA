<?php 


class AVLNode{
    public $key;
    public $height;
    public $left;
    public $right;

    public function __construct($key){
        $this->key = $key;
        $this->height = 1; //New node is initially added at leaf
        $this->left = null;
        $this->right = null;
    }
        
}


class AVLTree{
    private $root;

    public function __construct(){
        $this->root = null;
    }

    //Get height of node
    private function getHeight($node){
        return $node ? $node->height : 0 ;
    }

    //Get balance factor of node
    private function getBalance($node){
        return $node ? $this->getHeight($node->left) - $this->getHeight($node->right) : 0 ;
    }

    //Right rotate
    private function rightRotate($y){
        $x = $y->left;
        $T2 = $x->right;

        $x->right = $y;
        $y->left = $T2;

        $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;

        return $x;
    }

    //Left rotate
    private function leftRotate($x){
        $y = $x->right;
        $T2 = $y->left;

        $y->left = $x;
        $x->right = $T2;

        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;
        $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;
        

        return $y;
    }

    //Insert a node
    public function insert($key){
        $this->root = $this->insertNode($this->root, $key);
    }

    private function insertNode($node, $key){
        //Perform normal BST insert
        if(!$node) return new AVLNode($key);

        if($key < $node->key){
            $node->left = $this->insertNode($node->left, $key);
        }else if($key > $node->key){
            $node->right = $this->insertNode($node->right, $key);        
        }else{
            return $node; //Duplicate keys are not allowed
        }

        //Update height
        $node->height = max($this->getHeight($node->left), $this->getHeight($node->right)) + 1;

        //Check balance
        return $this->balanceNode($node);

    }

    //Balance the node
    private function balanceNode($node){
        $balance = $this->getBalance($node);

        //Left Left Case
        if($balance > 1 && $this->getBalance($node->left) >= 0){
            return $this->rightRotate($node);
        }

        //Right Right Case
        if($balance < -1 && $this->getBalance($node->right) <= 0){
            return $this->leftRotate($node);
        }

        //Left Right Case
        if($balance > 1 && $this->getBalance($node->left) < 0){
            $node->left = $this->leftRotate($node->left);
            return $this->rightRotate($node);
        }

        //Right Left Case
        if($balance < -1 && $this->getBalance($node->right) > 0){
            $node->right = $this->rightRotate($node->right);
            return $this->leftRotate($node);
        }

        return $node; //No balanceing needed
    }

    //Function to print the tree (inorder)
    public function inorder(){
        $this->inorderTraversal($this->root);
    }

    private function inorderTraversal($node){
        if($node){
            $this->inorderTraversal($node->left);
            echo $node->key . " ";
            $this->inorderTraversal($node->right);
        }
    }
    
    //Delete a node
    public function delete($key){
        $this->root = $this->deleteNode($this->root, $key);
    }

    private function deleteNode($node, $key){
        //Perform standard BST delete
        if(!$node) return $node;

        if($key < $node->key){
            $node->left = $this->deleteNode($node->left, $key);
        } else if ($key > $node->key){
            $node->right = $this->deleteNode($node->right, $key); 
        }else{
            //Node with only one chile or no child
            if(!$node->left) return $node->right;
            else if(!$node->right) return $node->left;

            //Node with two children: Get the inorder successor
            $temp = $this->minValueNode($node->right);
            $node->key = $temp->key;
            $node->right = $this->deleteNode($node->right, $temp->key);
        }
         //Update height
         $node->height = max($this->getHeight($node->left), $this->getHeight($node->right)) + 1;

         //Check balance
         return $this->balanceNode($node);
    }

    //Find the node with the minimum value
    private function minValueNode($node){
        $current = $node;
        while ($current->left){
            $current = $current->left;
        }
        return $current;
    }


    //search for a key
    public function search($key){
        return $this->searchNode($this->root, $key);
    }

    private function searchNode($node, $key){
        if(!$node || $node->key == $key){
            return $node; //Found or not found
        }

        if($key < $node->key){
            return $this->searchNode($node->left, $key);
        }else{
            return $this->searchNode($node->right, $key);
        }
    }

    



}



    $avl = new AVLTree();
    $avl->insert(10);
    $avl->insert(20);
    $avl->insert(30);
    $avl->insert(40);
    $avl->insert(50);
    $avl->insert(25);

    echo "Inorder traversal before deletion: ";
    $avl->inorder(); // Output: 10 20 25 30 40 50
    echo PHP_EOL;


    $avl->delete(40);
    echo "<br>" ."Inorder traversal after deleting 40: ";
    $avl->inorder(); // Output: 10 20 25 30 50

    // Search for a value
    $searchKey = 30;
    $result = $avl->search($searchKey);
    if ($result) {
        echo "<br>" ."Found: " . $result->key . PHP_EOL;
    } else {
        echo "<br>" ."$searchKey not found in the AVL tree." . PHP_EOL;
    }

    // Search for a non-existing value
    $searchKey = 100;
    $result = $avl->search($searchKey);
    if ($result) {
        echo "<br>" ."Found: " . $result->key . PHP_EOL;
    } else {
        echo "<br>" ."$searchKey not found in the AVL tree." . PHP_EOL;
    }

    // echo "<pre>";
    // print_r($avl);
    

?>

<?php
/*
 class AVLNode {
        public $key;
        public $height;
        public $left;
        public $right;

        public function __construct($key) {
            $this->key = $key;
            $this->height = 1; // New node is initially added at leaf
            $this->left = null;
            $this->right = null;
        }
    }




    class AVLTree {
        private $root;

        public function __construct() {
            $this->root = null;
        }

        // Get height of node
        private function getHeight($node) {
            return $node ? $node->height : 0;
        }

        // Get balance factor of node
        private function getBalance($node) {
            return $node ? $this->getHeight($node->left) - $this->getHeight($node->right) : 0;
        }

        // Right rotate
        private function rightRotate($y) {
            $x = $y->left;
            $T2 = $x->right;

            $x->right = $y;
            $y->left = $T2;

            $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;
            $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;

            return $x;
        }

        // Left rotate
        private function leftRotate($x) {
            $y = $x->right;
            $T2 = $y->left;

            $y->left = $x;
            $x->right = $T2;

            $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;
            $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;

            return $y;
        }

        // Insert a node
        public function insert($key) {
            $this->root = $this->insertNode($this->root, $key);
        }

        private function insertNode($node, $key) {
            // Perform normal BST insert
            if (!$node) return new AVLNode($key);

            if ($key < $node->key) {
                $node->left = $this->insertNode($node->left, $key);
            } else if ($key > $node->key) {
                $node->right = $this->insertNode($node->right, $key);
            } else {
                return $node; // Duplicate keys are not allowed
            }

            // Update height
            $node->height = max($this->getHeight($node->left), $this->getHeight($node->right)) + 1;

            // Check balance
            return $this->balanceNode($node);
        }

        // Delete a node
        public function delete($key) {
            $this->root = $this->deleteNode($this->root, $key);
        }

        private function deleteNode($node, $key) {
            // Perform standard BST delete
            if (!$node) return $node;

            if ($key < $node->key) {
                $node->left = $this->deleteNode($node->left, $key);
            } else if ($key > $node->key) {
                $node->right = $this->deleteNode($node->right, $key);
            } else {
                // Node with only one child or no child
                if (!$node->left) return $node->right;
                else if (!$node->right) return $node->left;

                // Node with two children: Get the inorder successor
                $temp = $this->minValueNode($node->right);
                $node->key = $temp->key;
                $node->right = $this->deleteNode($node->right, $temp->key);
            }

            // Update height
            $node->height = max($this->getHeight($node->left), $this->getHeight($node->right)) + 1;

            // Check balance
            return $this->balanceNode($node);
        }

        // Find the node with the minimum value
        private function minValueNode($node) {
            $current = $node;
            while ($current->left) {
                $current = $current->left;
            }
            return $current;
        }

        // Balance the node
        private function balanceNode($node) {
            $balance = $this->getBalance($node);

            // Left Left Case
            if ($balance > 1 && $this->getBalance($node->left) >= 0) {
                return $this->rightRotate($node);
            }

            // Right Right Case
            if ($balance < -1 && $this->getBalance($node->right) <= 0) {
                return $this->leftRotate($node);
            }

            // Left Right Case
            if ($balance > 1 && $this->getBalance($node->left) < 0) {
                $node->left = $this->leftRotate($node->left);
                return $this->rightRotate($node);
            }

            // Right Left Case
            if ($balance < -1 && $this->getBalance($node->right) > 0) {
                $node->right = $this->rightRotate($node->right);
                return $this->leftRotate($node);
            }

            return $node; // No balancing needed
        }

        // Search for a key
        public function search($key) {
            return $this->searchNode($this->root, $key);
        }

        private function searchNode($node, $key) {
            if (!$node || $node->key == $key) {
                return $node; // Found or not found
            }

            if ($key < $node->key) {
                return $this->searchNode($node->left, $key);
            } else {
                return $this->searchNode($node->right, $key);
            }
        }




        // Function to print the tree (inorder)
        public function inorder() {
            $this->inorderTraversal($this->root);
        }

        private function inorderTraversal($node) {
            if ($node) {
                $this->inorderTraversal($node->left);
                echo $node->key . " ";
                $this->inorderTraversal($node->right);
            }
        }
    }



    $avl = new AVLTree();
    $avl->insert(10);
    $avl->insert(20);
    $avl->insert(30);
    $avl->insert(40);
    $avl->insert(50);
    $avl->insert(25);

    echo "Inorder traversal before deletion: ";
    $avl->inorder(); // Output: 10 20 25 30 40 50
    echo PHP_EOL;

    $avl->delete(40);
    echo "Inorder traversal after deleting 40: ";
    $avl->inorder(); // Output: 10 20 25 30 50


    // Search for a value
        $searchKey = 30;
        $result = $avl->search($searchKey);
        if ($result) {
            echo "Found: " . $result->key . PHP_EOL;
        } else {
            echo "$searchKey not found in the AVL tree." . PHP_EOL;
        }

        // Search for a non-existing value
        $searchKey = 100;
        $result = $avl->search($searchKey);
        if ($result) {
            echo "Found: " . $result->key . PHP_EOL;
        } else {
            echo "$searchKey not found in the AVL tree." . PHP_EOL;
        }

*/
?>