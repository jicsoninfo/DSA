<?php

?>
<script>
class Node{
    constructor(val){
        this.key = val;
        this.left = null;
        this.right = null;
    }
}
class BST{
    constructor(){
        this.root = null;
    }

    insert(valu){
        const newNode = new Node(value)
        if(this.root === null){
            this.root = newNode;
            return this;
        }
    }
}
//var root = null;
// function printPostorder(node){
//     if(node == null){return};
//     printPostorder(node.left)
//     printPostorder(node.right);
//     console.warn(node.key + " ");
// }
// root = new Node(1);
// root.left = new Node(2);
// root.right = new Node(3);
// printPostorder(root)


</script>