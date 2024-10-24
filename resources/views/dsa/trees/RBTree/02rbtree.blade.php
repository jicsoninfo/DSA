<?php
echo "R B T Search Delete" . "<br>";




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
*/


?>