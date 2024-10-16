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
    public $alternate; // added this varibale for function program for sum of alternate leaf nodes in bst
    public function __construct()
    {
        $this->root = null;
        $this->alternate = false; // added this varibale for function program for sum of alternate leaf nodes in bst
    }

    // Insertion in binary search tree by using recursion 1st method start
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
    // Insertion in binary search tree by using recursion 1st method end

    // Insertion in binary search tree by using recursion 2nd method start
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
    // Insertion in binary search tree by using recursion 2nd method end

    // Insertion in binary search tree without recursion 1st emthod start
        public function addNodeWithoutRecursionMethod01($data){
            //create a new node
            $node = new TreeNode($data); // create a new node
            if($this->root == null){
                $this->root = $node; // When adds a frist node in bst
            }else{
                $find = $this->root;
                while($find != null){
                    if($find->data >= $data){
                        if($find->left == null){
                            $find->left = $node; // When left child empty so add new node here
                            return;
                        }else{
                            $find = $find->left; // otherwise visit left sub-tree
                        }
                    }else{
                        if($find->right == null){
                            $find->right = $node; // when right child empty so add new node here;
                            return;
                        }else{
                            $find = $find->right; // Visit right sub-tree
                        }
                    }
                }

            }
        }
    // Insertion in binary search tree without recursion 1st emthod start


    //display preorder start
    public function preorder($node){
        if($node != NULL){
            echo " ".strval($node->data); // Display node value
            $this->preorder($node->left); // Visit to left subtree
            $this->preorder($node->right); // Visit to right subtree
        }
    }
    //display preorder end

    //display inorder start
    public function inorder($node){
        if($node != NULL){
            $this->inorder($node->left); // Visit to left subtree
            echo " ".strval($node->data); // Display node value
            $this->inorder($node->right); // Visit to right subtree
        }
    }
    //display inorder end

    //display postorder start
    public function postorder($node){
        if($node != NULL){
            $this->postorder($node->left); // Visit to left subtree
            $this->postorder($node->right); // Visit to right subtree
            echo " ".strval($node->data); // Display node value
        }
    }
    //display postorder end

    //Program for sum of alternate leaf nodes in bst start
        public function alternateLeafSum(){
            $this->alternate = false;
            return $this->leafSum($this->root);
            //print_r($this->leafSum($this->root));
            //echo($this->leafSum($this->root));
        }
        public function leafSum($node){
            //print_r($node);
            if($node != null){
                if($node->left == null && $node->right == null){
                    $this->alternate = !$this->alternate; //Case A when node is leaf node. change status
                    if($this->alternate){
                        //print_r($node->data."<br>");
                        return $node->data; // when get alternate node.
                    }
                }else{
                    // print_r($this->leafSum($node->left)  ."<br>");
                    // print_r($this->leafSum($node->right) ."<br>");
                    //print_r($this->leafSum($node->left) + $this->leafSum($node->right) ."<br>");
                    return $this->leafSum($node->left) + $this->leafSum($node->right); // Case B when node is internal visit left and right subtree and find alternate node.
                }
            }
            return 0;
        }
    //Program for sum of alternate leaf nodes in bst start

    // static function main method for 1st method recursive start 
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
    // static function main method for 1st method recursive end 

    // static function method for 1st method without recursive start 
    public static function withoutrecursive(){
        $tree = new BinarySearchTree();
		/*
		         10
		        / \
		       /   \
		      4     15
		     / \   /
		    3   5 12
		    -------------
		    Build binary search tree

		*/
		$tree->addNodeWithoutRecursionMethod01(10);
		$tree->addNodeWithoutRecursionMethod01(4);
		$tree->addNodeWithoutRecursionMethod01(3);
		$tree->addNodeWithoutRecursionMethod01(5);
		$tree->addNodeWithoutRecursionMethod01(15);
		$tree->addNodeWithoutRecursionMethod01(12);
		// Display tree nodes
		echo "\nPreorder \n";
        echo "<br />";
		$tree->preorder($tree->root);
		echo "\nInorder \n";
        echo "<br />";
		$tree->inorder($tree->root);
		echo "\nPostorder \n";
        echo "<br />";
		$tree->postorder($tree->root);
         echo "<br />";
       
    }
    // static function method for 1st method without recursive end 

     // static function method for prgram for sum of alternate leaf nodes in bst start
        public static function alternateLeafSummain(){
            $tree = new BinarySearchTree();
            $tree->insertNode(5);
            $tree->insertNode(3);
            $tree->insertNode(19);
            $tree->insertNode(2);
            $tree->insertNode(4);
            $tree->insertNode(8);
            $tree->insertNode(31);
            $tree->insertNode(7);
            $tree->insertNode(25);
            $tree->insertNode(15);
            $tree->insertNode(50);
            
            
            //test
            printf("\n%d\n", $tree->alternateLeafSum());
        }
     // static function method for prgram for sum of alternate leaf nodes in bst end 
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


 echo "============ with out recursive function 1st method =================";
 BinarySearchTree::withoutrecursive();

 echo "============ program for sum of alternate leaf nodes in bst =================";
 BinarySearchTree::alternateLeafSummain();
// echo "<pre>";
// print_r($bst);
// die();
?>
