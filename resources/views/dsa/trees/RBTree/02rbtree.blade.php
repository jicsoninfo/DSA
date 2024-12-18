<?php
echo "R B T Search Delete" . "<br>";
class Node {
    public $data;
    public $color; //0 for Red, 1 for Black
    public $left;
    public $right;
    public $parent;

    public function __construct($data){
        $this->data = $data;
        $this->color = 0; // New node are red
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }
}

class RedBlackTree{

    private $root;
    private $TNULL;

    public function __construct() {
        $this->TNULL = new Node(0);
        $this->TNULL->color = 1; //TNULL is black
        $this->root = $this->TNULL;
    }
}


?>


<?php
/*
Extended Red-Black Tree Implementation in PHP

class Node {
    public $data;
    public $color; // 1 for Red, 0 for Black
    public $left;
    public $right;
    public $parent;

    public function __construct($data) {
        $this->data = $data;
        $this->color = 1; // New nodes are red
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

    private function leftRotate($x) {
        $y = $x->right;
        $x->right = $y->left;
        if ($y->left !== null) {
            $y->left->parent = $x;
        }
        $y->parent = $x->parent;
        if ($x->parent === null) {
            $this->root = $y;
        } elseif ($x === $x->parent->left) {
            $x->parent->left = $y;
        } else {
            $x->parent->right = $y;
        }
        $y->left = $x;
        $x->parent = $y;
    }

    private function rightRotate($y) {
        $x = $y->left;
        $y->left = $x->right;
        if ($x->right !== null) {
            $x->right->parent = $y;
        }
        $x->parent = $y->parent;
        if ($y->parent === null) {
            $this->root = $x;
        } elseif ($y === $y->parent->left) {
            $y->parent->left = $x;
        } else {
            $y->parent->right = $x;
        }
        $x->right = $y;
        $y->parent = $x;
    }

    private function fixInsert($k) {
        while ($k->parent !== null && $k->parent->color === 1) {
            if ($k->parent === $k->parent->parent->left) {
                $u = $k->parent->parent->right;
                if ($u !== null && $u->color === 1) {
                    $k->parent->color = 0;
                    $u->color = 0;
                    $k->parent->parent->color = 1;
                    $k = $k->parent->parent;
                } else {
                    if ($k === $k->parent->right) {
                        $k = $k->parent;
                        $this->leftRotate($k);
                    }
                    $k->parent->color = 0;
                    $k->parent->parent->color = 1;
                    $this->rightRotate($k->parent->parent);
                }
            } else {
                $u = $k->parent->parent->left;
                if ($u !== null && $u->color === 1) {
                    $k->parent->color = 0;
                    $u->color = 0;
                    $k->parent->parent->color = 1;
                    $k = $k->parent->parent;
                } else {
                    if ($k === $k->parent->left) {
                        $k = $k->parent;
                        $this->rightRotate($k);
                    }
                    $k->parent->color = 0;
                    $k->parent->parent->color = 1;
                    $this->leftRotate($k->parent->parent);
                }
            }
        }
        $this->root->color = 0;
    }

    public function insert($data) {
        $newNode = new Node($data);
        $y = null;
        $x = $this->root;

        while ($x !== null) {
            $y = $x;
            if ($newNode->data < $x->data) {
                $x = $x->left;
            } else {
                $x = $x->right;
            }
        }

        $newNode->parent = $y;
        if ($y === null) {
            $this->root = $newNode;
        } elseif ($newNode->data < $y->data) {
            $y->left = $newNode;
        } else {
            $y->right = $newNode;
        }

        $this->fixInsert($newNode);
    }

    public function search($data) {
        return $this->searchHelper($this->root, $data);
    }

    private function searchHelper($node, $data) {
        if ($node === null || $node->data === $data) {
            return $node;
        }

        if ($data < $node->data) {
            return $this->searchHelper($node->left, $data);
        } else {
            return $this->searchHelper($node->right, $data);
        }
    }

    public function delete($data) {
        $nodeToDelete = $this->search($data);
        if ($nodeToDelete !== null) {
            $this->deleteNode($nodeToDelete);
        }
    }

    private function deleteNode($z) {
        $y = $z;
        $yOriginalColor = $y->color;
        $x = null;

        if ($z->left === null) {
            $x = $z->right;
            $this->transplant($z, $z->right);
        } elseif ($z->right === null) {
            $x = $z->left;
            $this->transplant($z, $z->left);
        } else {
            $y = $this->minimum($z->right);
            $yOriginalColor = $y->color;
            $x = $y->right;

            if ($y->parent === $z) {
                $x->parent = $y;
            } else {
                $this->transplant($y, $y->right);
                $y->right = $z->right;
                $y->right->parent = $y;
            }

            $this->transplant($z, $y);
            $y->left = $z->left;
            $y->left->parent = $y;
            $y->color = $z->color;
        }

        if ($yOriginalColor === 0) {
            $this->fixDelete($x);
        }
    }

    private function transplant($u, $v) {
        if ($u->parent === null) {
            $this->root = $v;
        } elseif ($u === $u->parent->left) {
            $u->parent->left = $v;
        } else {
            $u->parent->right = $v;
        }
        if ($v !== null) {
            $v->parent = $u->parent;
        }
    }

    private function minimum($node) {
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node;
    }

    private function fixDelete($x) {
        while ($x !== $this->root && ($x === null || $x->color === 0)) {
            if ($x === $x->parent->left) {
                $w = $x->parent->right;
                if ($w->color === 1) {
                    $w->color = 0;
                    $x->parent->color = 1;
                    $this->leftRotate($x->parent);
                    $w = $x->parent->right;
                }
                if (($w->left === null || $w->left->color === 0) && ($w->right === null || $w->right->color === 0)) {
                    $w->color = 1;
                    $x = $x->parent;
                } else {
                    if ($w->right === null || $w->right->color === 0) {
                        $w->left->color = 0;
                        $w->color = 1;
                        $this->rightRotate($w);
                        $w = $x->parent->right;
                    }
                    $w->color = $x->parent->color;
                    $x->parent->color = 0;
                    $w->right->color = 0;
                    $this->leftRotate($x->parent);
                    $x = $this->root;
                }
            } else {
                $w = $x->parent->left;
                if ($w->color === 1) {
                    $w->color = 0;
                    $x->parent->color = 1;
                    $this->rightRotate($x->parent);
                    $w = $x->parent->left;
                }
                if (($w->right === null || $w->right->color === 0) && ($w->left === null || $w->left->color === 0)) {
                    $w->color = 1;
                    $x = $x->parent;
                } else {
                    if ($w->left === null || $w->left->color === 0) {
                        $w->right->color = 0;
                        $w->color = 1;
                        $this->leftRotate($w);
                        $w = $x->parent->left;
                    }
                    $w->color = $x->parent->color;
                    $x->parent->color = 0;
                    $w->left->color = 0;
                    $this->rightRotate($x->parent);
                    $x = $this->root;
                }
            }
        }
        if ($x !== null) {
            $x->color = 0;
        }
    }

    public function inOrder() {
        $this->inOrderHelper($this->root);
    }

    private function inOrderHelper($node) {
        if ($node !== null) {
            $this->inOrderHelper($node->left);
            echo $node->data . ' ';
            $this->inOrderHelper($node->right);
        }
    }
}

// Example usage
$rbt = new RedBlackTree();
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
$rbt->inOrder(); 
echo PHP_EOL;

// Search for a value
$searchValue = 5;
$result = $rbt->search($searchValue);
if ($result !== null) {
    echo "Found: " . $result->data . PHP_EOL;
} else {
    echo "Not found: " . $searchValue . PHP_EOL;
}

// Delete a value
$rbt->delete(5);
echo "Inorder traversal after deleting 5: ";
$rbt->inOrder();
echo PHP_EOL;

above code giving some error




//===============================================================================================
//Second method

<?php

class Node {
    public $data;
    public $color; // 0 for Red, 1 for Black
    public $left;
    public $right;
    public $parent;

    public function __construct($data) {
        $this->data = $data;
        $this->color = 0; // New nodes are red
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }
}

class RedBlackTree {
    private $root;
    private $TNULL;

    public function __construct() {
        $this->TNULL = new Node(0);
        $this->TNULL->color = 1; // TNULL is black
        $this->root = $this->TNULL;
    }

    // Preorder traversal
    public function preOrderHelper($node) {
        if ($node !== $this->TNULL) {
            echo $node->data . " ";
            $this->preOrderHelper($node->left);
            $this->preOrderHelper($node->right);
        }
    }

    // Balance the tree after deletion
    private function fixDelete($x) {
        while ($x !== $this->root && $x->color == 1) {
            if ($x === $x->parent->left) {
                $sibling = $x->parent->right;
                if ($sibling->color == 0) { // Case 3.1
                    $sibling->color = 1;
                    $x->parent->color = 0;
                    $this->leftRotate($x->parent);
                    $sibling = $x->parent->right;
                }
                if ($sibling->left->color == 1 && $sibling->right->color == 1) { // Case 3.2
                    $sibling->color = 0;
                    $x = $x->parent;
                } else {
                    if ($sibling->right->color == 1) { // Case 3.3
                        $sibling->left->color = 1;
                        $sibling->color = 0;
                        $this->rightRotate($sibling);
                        $sibling = $x->parent->right;
                    }
                    $sibling->color = $x->parent->color; // Case 3.4
                    $x->parent->color = 1;
                    $sibling->right->color = 1;
                    $this->leftRotate($x->parent);
                    $x = $this->root;
                }
            } else {
                $sibling = $x->parent->left;
                if ($sibling->color == 0) { // Case 3.1
                    $sibling->color = 1;
                    $x->parent->color = 0;
                    $this->rightRotate($x->parent);
                    $sibling = $x->parent->left;
                }
                if ($sibling->right->color == 1 && $sibling->left->color == 1) { // Case 3.2
                    $sibling->color = 0;
                    $x = $x->parent;
                } else {
                    if ($sibling->left->color == 1) { // Case 3.3
                        $sibling->right->color = 1;
                        $sibling->color = 0;
                        $this->leftRotate($sibling);
                        $sibling = $x->parent->left;
                    }
                    $sibling->color = $x->parent->color; // Case 3.4
                    $x->parent->color = 1;
                    $sibling->left->color = 1;
                    $this->rightRotate($x->parent);
                    $x = $this->root;
                }
            }
        }
        $x->color = 1;
    }

    private function rbTransplant($u, $v) {
        if ($u->parent === null) {
            $this->root = $v;
        } else if ($u === $u->parent->left) {
            $u->parent->left = $v;
        } else {
            $u->parent->right = $v;
        }
        $v->parent = $u->parent;
    }

    private function deleteNodeHelper($node, $key) {
        $z = $this->TNULL;
        while ($node !== $this->TNULL) {
            if ($node->data === $key) {
                $z = $node;
            }
            if ($node->data <= $key) {
                $node = $node->right;
            } else {
                $node = $node->left;
            }
        }
        if ($z === $this->TNULL) {
            echo "Couldn't find key in the tree\n";
            return;
        }

        $y = $z;
        $yOriginalColor = $y->color;
        if ($z->left === $this->TNULL) {
            $x = $z->right;
            $this->rbTransplant($z, $z->right);
        } else if ($z->right === $this->TNULL) {
            $x = $z->left;
            $this->rbTransplant($z, $z->left);
        } else {
            $y = $this->minimum($z->right);
            $yOriginalColor = $y->color;
            $x = $y->right;
            if ($y->parent === $z) {
                $x->parent = $y;
            } else {
                $this->rbTransplant($y, $y->right);
                $y->right = $z->right;
                $y->right->parent = $y;
            }
            $this->rbTransplant($z, $y);
            $y->left = $z->left;
            $y->left->parent = $y;
            $y->color = $z->color;
        }
        if ($yOriginalColor == 1) {
            $this->fixDelete($x);
        }
    }

    // Balance the tree after insertion
    private function fixInsert($k) {
        while ($k->parent->color == 0) {
            if ($k->parent == $k->parent->parent->left) {
                $u = $k->parent->parent->right;
                if ($u->color == 0) {
                    // case 3.1
                    $k->parent->color = 1;
                    $u->color = 1;
                    $k->parent->parent->color = 0;
                    $k = $k->parent->parent;
                } else {
                    if ($k == $k->parent->right) {
                        // case 3.2.2
                        $k = $k->parent;
                        $this->leftRotate($k);
                    }
                    // case 3.2.1
                    $k->parent->color = 1;
                    $k->parent->parent->color = 0;
                    $this->rightRotate($k->parent->parent);
                }
            } else {
                $u = $k->parent->parent->left;
                if ($u->color == 0) {
                    // mirror case 3.1
                    $k->parent->color = 1;
                    $u->color = 1;
                    $k->parent->parent->color = 0;
                    $k = $k->parent->parent;
                } else {
                    if ($k == $k->parent->left) {
                        // mirror case 3.2.2
                        $k = $k->parent;
                        $this->rightRotate($k);
                    }
                    // mirror case 3.2.1
                    $k->parent->color = 1;
                    $k->parent->parent->color = 0;
                    $this->leftRotate($k->parent->parent);
                }
            }
            if ($k == $this->root) {
                break;
            }
        }
        $this->root->color = 1;
    }

    private function balanceInsert($key) {
        $node = new Node($key);
        $node->parent = null;
        $node->data = $key;
        $node->left = $this->TNULL;
        $node->right = $this->TNULL;

        $y = null;
        $x = $this->root;

        while ($x !== $this->TNULL) {
            $y = $x;
            if ($node->data < $x->data) {
                $x = $x->left;
            } else {
                $x = $x->right;
            }
        }

        $node->parent = $y;
        if ($y === null) {
            $this->root = $node;
        } else if ($node->data < $y->data) {
            $y->left = $node;
        } else {
            $y->right = $node;
        }

        if ($node->parent === null) {
            $node->color = 1;
            return;
        }

        if ($node->parent->parent === null) {
            return;
        }

        $this->fixInsert($node);
    }

    public function insert($key) {
        $this->balanceInsert($key);
    }

    public function deleteNode($data) {
        $this->deleteNodeHelper($this->root, $data);
    }

    public function preOrder() {
        $this->preOrderHelper($this->root);
    }

    // Left rotate
    private function leftRotate($x) {
        $y = $x->right;
        $x->right = $y->left;
        if ($y->left !== $this->TNULL) {
            $y->left->parent = $x;
        }
        $y->parent = $x->parent;
        if ($x->parent === null) {
            $this->root = $y;
        } else if ($x === $x->parent->left) {
            $x->parent->left = $y;
        } else {
            $x->parent->right = $y;
        }
        $y->left = $x;
        $x->parent = $y;
    }

    // Right rotate
    private function rightRotate($x) {
        $y = $x->left;
        $x->left = $y->right;
        if ($y->right !== $this->TNULL) {
            $y->right->parent = $x;
        }
        $y->parent = $x->parent;
        if ($x->parent === null) {
            $this->root = $y;
        } else if ($x === $x->parent->right) {
            $x->parent->right = $y;
        } else {
            $x->parent->left = $y;
        }
        $y->right = $x;
        $x->parent = $y;
    }

    private function minimum($node) {
        while ($node->left !== $this->TNULL) {
            $node = $node->left;
        }
        return $node;
    }
}

// Example usage
$tree = new RedBlackTree();
$tree->insert(55);
$tree->insert(40);
$tree->insert(70);
$tree->insert(20);
$tree->insert(50);
$tree->insert(60);
$tree->insert(80);

echo "Preorder traversal: ";
$tree->preOrder();
echo "\n";

$tree->deleteNode(70);
echo "After deletion of 70: ";
$tree->preOrder();
echo "\n";
?>




//DQueue=======================================================
class Node {
    public $data;
    public $next;
    public $prev;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

class Deque {
    private $front;
    private $rear;
    private $size;

    public function __construct() {
        $this->front = null;
        $this->rear = null;
        $this->size = 0;
    }

    // Add an element to the front of the deque
    public function addFirst($data) {
        $newNode = new Node($data);
        if ($this->isEmpty()) {
            $this->front = $this->rear = $newNode;
        } else {
            $newNode->next = $this->front;
            $this->front->prev = $newNode;
            $this->front = $newNode;
        }
        $this->size++;
    }

    // Add an element to the back of the deque
    public function addLast($data) {
        $newNode = new Node($data);
        if ($this->isEmpty()) {
            $this->front = $this->rear = $newNode;
        } else {
            $newNode->prev = $this->rear;
            $this->rear->next = $newNode;
            $this->rear = $newNode;
        }
        $this->size++;
    }

    // Remove an element from the front of the deque
    public function removeFirst() {
        if ($this->isEmpty()) {
            throw new Exception('Deque is empty');
        }
        $data = $this->front->data;
        if ($this->front === $this->rear) {
            $this->front = $this->rear = null; // Only one element
        } else {
            $this->front = $this->front->next;
            $this->front->prev = null;
        }
        $this->size--;
        return $data;
    }

    // Remove an element from the back of the deque
    public function removeLast() {
        if ($this->isEmpty()) {
            throw new Exception('Deque is empty');
        }
        $data = $this->rear->data;
        if ($this->front === $this->rear) {
            $this->front = $this->rear = null; // Only one element
        } else {
            $this->rear = $this->rear->prev;
            $this->rear->next = null;
        }
        $this->size--;
        return $data;
    }

    // Return the element at the front without removing it
    public function peekFirst() {
        if ($this->isEmpty()) {
            throw new Exception('Deque is empty');
        }
        return $this->front->data;
    }

    // Return the element at the back without removing it
    public function peekLast() {
        if ($this->isEmpty()) {
            throw new Exception('Deque is empty');
        }
        return $this->rear->data;
    }

    // Check if the deque is empty
    public function isEmpty() {
        return $this->size === 0;
    }

    // Get the size of the deque
    public function size() {
        return $this->size;
    }

    // Display all elements in the deque
    public function display() {
        if ($this->isEmpty()) {
            echo "Deque is empty\n";
            return;
        }
        $current = $this->front;
        while ($current != null) {
            echo $current->data . " <-> ";
            $current = $current->next;
        }
        echo "NULL\n";
    }
}

// Example usage:
$deque = new Deque();

// Adding elements to the front and back
$deque->addFirst(10);
$deque->addFirst(20);
$deque->addLast(30);
$deque->addLast(40);

// Display the deque
$deque->display(); // Output: 20 <-> 10 <-> 30 <-> 40 <-> NULL

// Removing elements from the front and back
echo "Removed from front: " . $deque->removeFirst() . "\n"; // Output: 20
echo "Removed from back: " . $deque->removeLast() . "\n"; // Output: 40

// Display the updated deque
$deque->display(); // Output: 10 <-> 30 <-> NULL

// Peek at the front and back
echo "Peek at front: " . $deque->peekFirst() . "\n"; // Output: 10
echo "Peek at back: " . $deque->peekLast() . "\n"; // Output: 30



//===================================
//Implementation of Input Restricted Queue in PHP (Using Doubly Linked List)

class Node {
    public $data;
    public $next;
    public $prev;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

class InputRestrictedQueue {
    private $front;
    private $rear;
    private $size;

    public function __construct() {
        $this->front = null;
        $this->rear = null;
        $this->size = 0;
    }

    // Enqueue operation (only allows inserting at the rear)
    public function enqueue($data) {
        $newNode = new Node($data);
        if ($this->isEmpty()) {
            $this->front = $this->rear = $newNode;
        } else {
            $this->rear->next = $newNode;
            $newNode->prev = $this->rear;
            $this->rear = $newNode;
        }
        $this->size++;
    }

    // Dequeue from the front of the queue
    public function dequeueFromFront() {
        if ($this->isEmpty()) {
            throw new Exception('Queue is empty');
        }

        $data = $this->front->data;
        $this->front = $this->front->next;
        
        if ($this->front != null) {
            $this->front->prev = null;
        } else {
            $this->rear = null; // If the queue is now empty
        }

        $this->size--;
        return $data;
    }

    // Dequeue from the rear of the queue
    public function dequeueFromRear() {
        if ($this->isEmpty()) {
            throw new Exception('Queue is empty');
        }

        $data = $this->rear->data;
        $this->rear = $this->rear->prev;
        
        if ($this->rear != null) {
            $this->rear->next = null;
        } else {
            $this->front = null; // If the queue is now empty
        }

        $this->size--;
        return $data;
    }

    // Peek at the front element
    public function peekFront() {
        if ($this->isEmpty()) {
            throw new Exception('Queue is empty');
        }
        return $this->front->data;
    }

    // Peek at the rear element
    public function peekRear() {
        if ($this->isEmpty()) {
            throw new Exception('Queue is empty');
        }
        return $this->rear->data;
    }

    // Check if the queue is empty
    public function isEmpty() {
        return $this->size === 0;
    }

    // Get the size of the queue
    public function size() {
        return $this->size;
    }

    // Display the elements of the queue
    public function display() {
        if ($this->isEmpty()) {
            echo "Queue is empty\n";
            return;
        }
        $current = $this->front;
        while ($current != null) {
            echo $current->data . " <-> ";
            $current = $current->next;
        }
        echo "NULL\n";
    }
}

// Example usage:

$queue = new InputRestrictedQueue();

// Enqueue elements at the rear (Input Restricted)
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);

// Display the current state of the queue
$queue->display(); // Output: 10 <-> 20 <-> 30 <-> NULL

// Dequeue from the front
echo "Dequeue from front: " . $queue->dequeueFromFront() . "\n"; // Output: 10
$queue->display(); // Output: 20 <-> 30 <-> NULL

// Dequeue from the rear
echo "Dequeue from rear: " . $queue->dequeueFromRear() . "\n"; // Output: 30
$queue->display(); // Output: 20 <-> NULL

// Peek at the front and rear elements
echo "Peek at front: " . $queue->peekFront() . "\n"; // Output: 20
echo "Peek at rear: " . $queue->peekRear() . "\n"; // Output: 20

// Check if the queue is empty
echo "Is the queue empty? " . ($queue->isEmpty() ? "Yes" : "No") . "\n"; // Output: No




//Input Restricted Queue with Circular Array (Alternative Implementation)
class InputRestrictedQueueArray {
    private $queue;
    private $front;
    private $rear;
    private $size;
    private $capacity;

    public function __construct($capacity) {
        $this->capacity = $capacity;
        $this->queue = array_fill(0, $capacity, null);
        $this->front = -1;
        $this->rear = -1;
        $this->size = 0;
    }

    // Enqueue operation (only allows inserting at the rear)
    public function enqueue($data) {
        if ($this->size == $this->capacity) {
            throw new Exception("Queue is full");
        }
        if ($this->front == -1) {
            $this->front = 0;
        }
        $this->rear = ($this->rear + 1) % $this->capacity;
        $this->queue[$this->rear] = $data;
        $this->size++;
    }

    // Dequeue from the front
    public function dequeueFromFront() {
        if ($this->size == 0) {
            throw new Exception("Queue is empty");
        }
        $data = $this->queue[$this->front];
        if ($this->front == $this->rear) {
            $this->front = $this->rear = -1; // Queue becomes empty
        } else {
            $this->front = ($this->front + 1) % $this->capacity;
        }
        $this->size--;
        return $data;
    }

    // Dequeue from the rear
    public function dequeueFromRear() {
        if ($this->size == 0) {
            throw new Exception("Queue is empty");
        }
        $data = $this->queue[$this->rear];
        if ($this->front == $this->rear) {
            $this->front = $this->rear = -1; // Queue becomes empty
        } else {
            $this->rear = ($this->rear - 1 + $this->capacity) % $this->capacity;
        }
        $this->size--;
        return $data;
    }

    // Peek at the front element
    public function peekFront() {
        if ($this->size == 0) {
            throw new Exception("Queue is empty");
        }
        return $this->queue[$this->front];
    }

    // Peek at the rear element
    public function peekRear() {
        if ($this->size == 0) {
            throw new Exception("Queue is empty");
        }
        return $this->queue[$this->rear];
    }

    // Check if the queue is empty
    public function isEmpty() {
        return $this->size == 0;
    }

    // Get the size of the queue
    public function size() {
        return $this->size;
    }

    // Display the queue
    public function display() {
        if ($this->isEmpty()) {
            echo "Queue is empty\n";
            return;
        }
        $i = $this->front;
        while ($i != $this->rear) {
            echo $this->queue[$i] . " ";
            $i = ($i + 1) % $this->capacity;
        }
        echo $this->queue[$this->rear] . "\n";
    }
}

// Example usage:
$queue = new InputRestrictedQueueArray(5);

$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
$queue->display();

echo "Dequeue from front: " . $queue->dequeueFromFront() . "\n";
$queue->display();

echo "Dequeue from rear: " . $queue->dequeueFromRear() . "\n";
$queue->display();

*/
?>