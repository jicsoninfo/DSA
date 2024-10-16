<?php
                    // create BST using methods recursive and non recuresive
                      class node{
                        public $data;
                        public $left;
                        public $right;
                        public function __construct($data){
                            $this->data = $data;
                            $this->left = null;
                            $this->right = null;
                        }
                      }

                      class BST{
                        public $root;

                        public function __construct(){
                            $this->root = null;
                        }

                        public function insert($value){
                            $newnode = new node($value);

                            if($this->root == null){
                                $this->root = $newnode;
                            }

                            $current = $this->root;
                            while(true){
                                if($value == $current->data){
                                    return false;
                                }
                                if($value < $current->data){
                                    if($current->left === null){
                                        $current->left = $newnode;
                                        return $this;
                                    }
                                    $current = $current->left;
                                }else{
                                    if($current->right === null){
                                        $current->right = $newnode;
                                    return $this;
                                   }
                                   $current = $current->right;
                                }
                            }

                        }


                        public function insert02($value){
                            $newnode02 = new node($value);
                            if($this->root === null){
                                $this->root = $newnode02;
                            }else{
                                $this->insertnode02($this->root, $newnode02);
                            }
                        }

                        public function insertnode02($current, $newnode02){
                            if($newnode02->data < $current->data){
                                if($current->left == null){
                                    $current->left = $newnode02;
                                }else{
                                    $this->insertnode02($current->left, $newnode02);
                                }
                            }else{
                                if($current->right == null){
                                    $current->right = $newnode02;
                                }else{
                                    $this->insertnode02($current->right, $newnode02);
                                }
                            }
                        }

                        //created bst through recursive;
                        public function addnode($value){
                            $this->root  = $this->addNodeInsert($this->root, $value);
                        }
                        public function addNodeInsert($node, $value){
                            if($node == null){
                                return new node($value);
                            }
                            if($value < $node->data){
                                $node->left = $this->addNodeInsert($node->left, $value);
                            }else if($value > $node->data){
                                $node->right = $this->addNodeInsert($node->right, $value);
                            }
                            return $node;
                        }


                      }

                      $newbst = new BST();
                      $newbst->insert(23);
                      $newbst->insert(20);
                      $newbst->insert(25);
                      $newbst->insert(30);
                      $newbst->insert(15);
                      echo "<pre>";
                      print_r($newbst);

                      $newbst01 = new BST();
                      $newbst01->insert02(23);
                      $newbst01->insert02(20);
                      $newbst01->insert02(25);
                      $newbst01->insert02(30);
                      $newbst01->insert02(15);
                      echo "<pre>";
                      print_r($newbst01);


                    $newbst02 = new BST();
                    $newbst02->addnode(23);
                    $newbst02->addnode(20);
                    $newbst02->addnode(25);
                    $newbst02->addnode(30);
                    $newbst02->addnode(15);
                    echo "<pre>";
                    print_r($newbst02);

                    ?>