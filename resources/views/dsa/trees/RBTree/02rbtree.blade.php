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

*/


//circular queue
/*
class NodeQ {
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
        $this->next = null; // Initially, the next node is null
    }
}

class QueueLL {
    private $head; // Points to the front of the queue
    private $tail; // Points to the back of the queue
    private $size; // The number of elements in the queue

    // Initialize the queue as empty
    public function __construct(){
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    // Check if the queue is empty
    public function isEmpty(){
        return $this->size === 0;
    }

    // Add an item to the back of the queue
    public function enqueue($item){
        $newNode = new NodeQ($item); // Create a new node
        if($this->isEmpty()){
            $this->head = $newNode; // If the queue is empty, both head and tail point to the new node
            $this->tail = $newNode;
            $this->tail->next = $this->head; // Make the tail point to the head to complete the circular nature
        } else {
            $this->tail->next = $newNode; // Attach the new node to the end of the queue
            $this->tail = $newNode; // Update the tail to the new node
            $this->tail->next = $this->head; // The tail should point to the head
        }
        $this->size++; // Increase the size of the queue
    }

    // Remove and return the front item of the queue
    public function dequeue(){
        if(!$this->isEmpty()){
            $frontItem = $this->head->data; // Get the data of the front node
            if($this->head === $this->tail){ // If there's only one node in the queue
                $this->head = null;
                $this->tail = null;
            } else {
                $this->head = $this->head->next; // Move the head pointer to the next node
                $this->tail->next = $this->head; // The tail should point to the new head
            }
            $this->size--; // Decrease the size of the queue
            return $frontItem;
        } else {
            throw new Exception('Dequeue from an empty queue');
        }
    }

    // Display the current items in the queue
    public function display(){
        if($this->isEmpty()){
            echo "Queue is empty" . PHP_EOL;
            return;
        }

        $current = $this->head;
        $queueItems = [];

        do {
            $queueItems[] = $current->data;
            $current = $current->next;
        } while($current !== $this->head); // Stop when we complete one full cycle of the queue

        echo "Queue: " . implode(", ", $queueItems) . PHP_EOL;
    }

    // Return the number of items in the queue
    public function size(){
        return $this->size;
    }

    // Return the front item of the queue without removing it
    public function peek(){
        if(!$this->isEmpty()){
            return $this->head->data;
        } else {
            throw new Exception('Peek from an empty queue');
        }
    }
}

// Example usage of the Circular Queue class
$queue = new QueueLL();

// Add items to the queue
$queue->enqueue('Task 1');
$queue->enqueue('Task 2');
$queue->enqueue('Task 3');

// Display the current queue
$queue->display(); // Queue: Task 1, Task 2, Task 3

// Remove and return the front item (dequeue)
echo "Dequeued: " . $queue->dequeue() . PHP_EOL;  // Dequeued: Task 1

// Display the current queue after dequeue
$queue->display(); // Queue: Task 2, Task 3

// Peek the front item without removing it
echo "Front item: " . $queue->peek() . PHP_EOL;  // Front item: Task 2

// Display the current size of the queue
echo "Queue size: " . $queue->size() . PHP_EOL;  // Queue size: 2



//priority queue
class NodeQ {
    public $data;
    public $priority;
    public $next;

    public function __construct($data, $priority){
        $this->data = $data;
        $this->priority = $priority;
        $this->next = null;
    }
}

class PriorityQueue {
    private $head; // Points to the front of the queue
    private $size; // The number of elements in the queue

    // Initialize the queue as empty
    public function __construct(){
        $this->head = null;
        $this->size = 0;
    }

    // Check if the queue is empty
    public function isEmpty(){
        return $this->size === 0;
    }

    // Add an item to the queue based on priority
    public function enqueue($data, $priority){
        $newNode = new NodeQ($data, $priority); // Create a new node

        // If the queue is empty or the new node has higher priority than the head node
        if($this->isEmpty() || $newNode->priority > $this->head->priority){
            // Insert the node at the front of the queue
            $newNode->next = $this->head;
            $this->head = $newNode;
        } else {
            // Find the correct position for the new node
            $current = $this->head;
            while ($current->next != null && $current->next->priority >= $newNode->priority) {
                $current = $current->next;
            }
            // Insert the new node after the current node
            $newNode->next = $current->next;
            $current->next = $newNode;
        }
        $this->size++; // Increase the size of the queue
    }

    // Remove and return the item with the highest priority
    public function dequeue(){
        if(!$this->isEmpty()){
            $frontItem = $this->head->data; // Get the data of the front node
            $this->head = $this->head->next; // Move the head pointer to the next node
            $this->size--; // Decrease the size of the queue
            return $frontItem;
        } else {
            throw new Exception('Dequeue from an empty queue');
        }
    }

    // Display the current items in the queue
    public function display(){
        if($this->isEmpty()){
            echo "Queue is empty" . PHP_EOL;
            return;
        }

        $current = $this->head;
        $queueItems = [];

        while($current != null){
            $queueItems[] = $current->data . "(Priority: " . $current->priority . ")";
            $current = $current->next;
        }

        echo "Priority Queue: " . implode(" -> ", $queueItems) . PHP_EOL;
    }

    // Return the number of items in the queue
    public function size(){
        return $this->size;
    }

    // Return the front item of the queue without removing it
    public function peek(){
        if(!$this->isEmpty()){
            return $this->head->data;
        } else {
            throw new Exception('Peek from an empty queue');
        }
    }
}

// Example usage of the Priority Queue class
$priorityQueue = new PriorityQueue();

// Add items to the queue with priority
$priorityQueue->enqueue('Task 1', 3); // Priority 3
$priorityQueue->enqueue('Task 2', 1); // Priority 1
$priorityQueue->enqueue('Task 3', 2); // Priority 2

// Display the current queue
$priorityQueue->display(); // Priority Queue: Task 1(Priority: 3) -> Task 3(Priority: 2) -> Task 2(Priority: 1)

// Remove and return the front item (dequeue)
echo "Dequeued: " . $priorityQueue->dequeue() . PHP_EOL;  // Dequeued: Task 1

// Display the current queue after dequeue
$priorityQueue->display(); // Priority Queue: Task 3(Priority: 2) -> Task 2(Priority: 1)

// Peek the front item without removing it
echo "Front item: " . $priorityQueue->peek() . PHP_EOL;  // Front item: Task 3

// Display the current size of the queue
echo "Queue size: " . $priorityQueue->size() . PHP_EOL;  // Queue size: 2
*/
?>