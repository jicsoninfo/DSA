<?php

?>
<script>
class Node{
    constructor(value){
        this.value = value;
        this.left = null;
        this.right = null;
    }
}
class BST{
    constructor(){
        this.root = null;
    }

    insert(value){
        const newNode = new Node(value)
        if(this.root === null){
            this.root = newNode;
            return this;
        }
        let current = this.root;
        while(true){
            if(value === current.value){
                return undefined;
            }
            if(value < current.value){
                if(current.left === null){
                    current.left = newNode;
                    return this;
                }
                current = current.left;
            }else{
                if(current.right === null){
                    current.right = newNode;
                    return this;
                }
                current = current.right;
            }

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

const BineryST = new BST();
BineryST.insert(60);
BineryST.insert(45);
BineryST.insert(65);
BineryST.insert(40);
BineryST.insert(70);

console.log(BineryST)



</script>