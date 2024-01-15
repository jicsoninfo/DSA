<?php
//echo "<h1>BST in PHP</h1>"

class Node{
    public $value = null;
    public $left = null;
    public $right = null;
    // public $value;
    // public $left;
    // public $right;

    // public function __construct($data){
    //     $this->value = $data;
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

    //Inorder traversal in php
    public function inorder(){
        $result = array();
        //$node = new Node();
        //$node = $this->root;
        function traverse($node,&$result){
            //print_r($node->value);
            if($node->left) { traverse($node->left,$result); };
                array_push($result, $node->value);
            // echo "<pre>";
            // echo ($node->value);
            if($node->right){ traverse($node->right,$result);};
        }
        if($this->root != null){
            traverse($this->root,$result);
            //print_r($result);
            return $result;
        }else{
            echo "No data found";
        }
        
    }

    //Pre-order traversal in php
    public function preOrder(){
        $result = array();
        function pre_traverse($node, &$result){
            array_push($result, $node->value);
            // echo "<pre>";
            // echo ($node->value);
            if($node->left){pre_traverse($node->left,$result);}
            if($node->right){pre_traverse($node->right,$result);}
        }
        if($this->root != null){
            pre_traverse($this->root, $result);
            print_r($result);
            //return $result;
        }else{
            echo "No data found";
        }
    }

    public function postOrder(){
        $result = array();
        function post_traverse($node, &$result){
            if($node->left){post_traverse($node->left,$result);}
            if($node->right){post_traverse($node->right,$result);}
            array_push($result, $node->value);
            // echo "<pre>";
            // echo ($node->value);
        }
        if($this->root != null){
            post_traverse($this->root, $result);
            print_r($result);
            //return $result;
        }else{
            echo "No data found";
        }
    }

    public function bstfind($value){
        if($this->root === null){
            //return false;
            return "value not found";
        }
        $current = $this->root;
        while($current){
            if($value == $current->value){
                return $current;
                //echo "value found";
            }
            if($value < $current->value){
                $current = $current->left;
            }else{
                $current = $current->right;
            }
        }
        //return false;
        return "value not found";
        //echo "value not found";
    }



}

$BST = new BinaryST();
// $BST->insert(10);
// // $BST->insert(9);
// // $BST->insert(8);
// //$BST->insert(8); //duplicate is not allowed
// $BST->insert(5);
// $BST->insert(15);
// $BST->insert(3);
// $BST->insert(7);
// $BST->insert(12);
// $BST->insert(18);

$bst_array = [10, 5, 15, 3, 7, 12, 18];
foreach($bst_array as $key=>$data){
    $BST->insert($data);
    
    // $newNode->value = $data;
    // $newNode->left = null;
    // $newNode->right = null;
    //if($key === 0){
    // if($BST->root === null){
    //     $newNode = new node();
    //     $newNode->value = $data;
    //     $newNode->left = null;
    //     $newNode->right = null;
    //     $BST->root = $newNode;
    //     $current = $BST->root;
    // }else{

    // }
}

//print_r($BST);

// $BST->inorder();
 $inorder_data = $BST->inorder();
echo "<pre>";
echo "===========Data==========";
print_r($BST);
echo "===========Inorder==========";
print_r($inorder_data);
echo "===========Pre-order==========";
$BST->preOrder();
echo "===========Post-Order==========";
$BST->postOrder();

$is_valiue = $BST->bstfind(8);
print_r($is_valiue);
//die();
?>


<?php 
// Php programs for binery search tree

echo "<br />Binery search tree other methods in php <br />";

class TreeNode{
    public $data;
    public $left;
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree{
    public $root;
    public function __construct()
    {
        $this->root = null;
    }

    // Insertion in binary search tree by using recursion
    public function addNode($node, $data){
        
        if($node != null){
            if($node->data > $data){
                $node->left = $this->addNode($node->left, $data);
            }else{
                $node->right = $this->addNode($node->right, $data);
            }
            return $node;
        }else{
            return new TreeNode($data);
        }
    }

    public function insertNode($data){
        $this->root = $this->insertNodeStore($this->root, $data);
    }

    private function insertNodeStore($node, $data){
        if($node === null){
            return new TreeNode($data);
        }

        if($data < $node->data){
            $node->left = $this->insertNodeStore($node->left, $data);
        }elseif($data > $node->data){
            $node->right = $this->insertNodeStore($node->right, $data);
        }
        return $node;
    }

    //display preorder
    public function preorder($node){
        if($node != NULL){
            echo " ".strval($node->data); // Display node value
            $this->preorder($node->left); // Visit to left subtree
            $this->preorder($node->right); // Visit to right subtree
        }
    }

    public function inorder($node){
        if($node != NULL){
            $this->inorder($node->left); // Visit to left subtree
            echo " ".strval($node->data); // Display node value
            $this->inorder($node->right); // Visit to right subtree
        }
    }

    public function postorder($node){
        if($node != NULL){
            $this->postorder($node->left); // Visit to left subtree
            $this->postorder($node->right); // Visit to right subtree
            echo " ".strval($node->data); // Display node value
        }
    }

    public static function main(){
        $tree = new BinarySearchTree();
        $tree->root = $tree->addNode($tree->root, 10);
        //$tree->addNode($tree->root, 10);
        $tree->addNode($tree->root, 4);
        $tree->addNode($tree->root, 3);
        $tree->addNode($tree->root, 5);
        $tree->addNode($tree->root, 15);
        $tree->addNode($tree->root, 12);
        
        // Display tree nodes
        echo "\nPreorder\n";
        $tree->preorder($tree->root);
        echo "<br />";
        echo "\nInorder\n";
        $tree->inorder($tree->root);
        echo "<br />";
        echo "\nPostorder\n";
        $tree->postorder($tree->root);
        echo "<br />";
    }
}

// $tree = new BinarySearchTree();
// $tree->root = $tree->addNode($tree->root, 10);
// //$tree->addNode($tree->root, 10);
// $tree->addNode($tree->root, 4);
// $tree->addNode($tree->root, 3);
// $tree->addNode($tree->root, 5);
// $tree->addNode($tree->root, 15);
// $tree->addNode($tree->root, 12);

// // Display tree nodes
// echo "Preorder\n";
// $tree->preorder($tree->root);
// echo "<br />";
// echo "\nInorder\n";
// $tree->inorder($tree->root);
// echo "<br />";
// echo "\nPostorder\n";
// $tree->postorder($tree->root);
// echo "<br />";
// echo "<pre>";
// print_r($tree);
BinarySearchTree::main();
echo "============recursive function 2nd method =================";
$bst = new BinarySearchTree();
$bst->insertNode(10);
$bst->insertNode(5);
$bst->insertNode(15);
$bst->insertNode(3);
$bst->insertNode(7);

 // Display tree nodes
 echo "Preorder\n";
 $bst->preorder($bst->root);
 echo "<br />";
 echo "\nInorder\n";
 $bst->inorder($bst->root);
 echo "<br />";
 echo "\nPostorder\n";
 $bst->postorder($bst->root);
 echo "<br />";


// echo "<pre>";
// print_r($bst);
// die();
?>
