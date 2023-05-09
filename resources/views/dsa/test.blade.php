<?php
        /*
        function selection_sort(&$arr, $n)
        {
            for($i = 0; $i < $n ; $i++)
            {
                $low = $i;
                // echo "<br>";
                // echo $low;
                // echo "-----------";
                for($j = $i + 1; $j < $n ; $j++)
                {
                    if ($arr[$j] < $arr[$low])
                    {
                        $low = $j;
                        // echo "<br>";
                        // echo $low;
                        // echo "*********";
                    }
                }
                 
                // swap the minimum value to $ith node
                if ($arr[$i] > $arr[$low])
                {
                    $tmp = $arr[$i];
                    $arr[$i] = $arr[$low];
                    $arr[$low] = $tmp;
                }
            }
        }
         
        // Driver Code
        $arr = array(64, 25, 5, 12, 22, 11, 5, 10, 5);
        $len = count($arr);
        selection_sort_php($arr, $len);
        echo "<br>";
        for ($i = 0; $i < $len; $i++)
            echo $arr[$i] . " ";
         

        function selection_sort_php(&$arr, $n){
            //print_r($arr);
            for($i = 0; $i < $n; $i++){
                $low =$i;
               for($j=$i+1 ; $j<$n; $j++){
                if ($arr[$j] < $arr[$low])
                {
                    $low = $j;
                    // $tmp = $arr[$i];
                    // $arr[$i] = $arr[$low];
                    // $arr[$low] = $tmp;
                }

               } 
               
                if($arr[$i] > $arr[$low]){
                    $tmp = $arr[$i];
                    $arr[$i] = $arr[$low];
                    $arr[$low] = $tmp;
                }
               
                
            }
        }
       */

        
        ?>


        <?php

            
                class node{
                    public $data;
                    public $next;
                } 
                class ll{
                    public $head;

                    public function __construct(){
                        $this->head = null;
                    }
                }

               

            //     $myll = new ll();

            //     $data = ['90', '80', '70', '60', '50', '40'];
            //     $ll = "ll";
            //     $ll1 = "";
            //     $ll2 = "ll";
            //    foreach($data as $key=>$value){
            //        // echo "<pre>";
            //         //echo $ll.$key.'=>'.$value;
            //         $ll1 = $ll.$key;
                    
            //         echo $ll1;
            //         if($key == 0){
            //         $ll1 = new node();
            //         $ll1->data= $value;
            //         $ll1->next = null;
            //         $myll->head = $ll1;
            //         $ll2= $ll1;
            //         }
            //         else{
            //             // $key_value = ($key-1);
            //             // $last_key = $last_key.$key_value;
            //             $ll1 = new node();
            //             $ll1->data= $value;
            //             $ll1->next = null;
            //             $ll2->next = $ll1;
            //             $ll2= $ll1;
            //         }

            //         //$ll.$key = new node();
            //    }

            //     echo "<pre>";
            //     print_r($myll);
            //     die();

                //$data = ['90', '80'];
                //$key = "1";
                // $ll1 = new node();
                // $ll1->data=10;
                // $ll1->next = null;
                // $myll->head = $ll1;

                // $ll2 = new node();
                // $ll2->data=20;
                // $ll2->next = null;
                // $ll1->next = $ll2;

                // $ll3 = new node();
                // $ll3->data=30;
                // $ll3->next = null;
                // $ll2->next = $ll3;


                // $ll4 = new node();
                // $ll4->data=40;
                // $ll4->next = null;
                // $ll3->next = $ll4;
                

                // echo "<pre>";
                // //print_r($ll1);
                // print_r($myll);
                // die();
        
                // //node structure
                // class Node {
                // public $data;
                // public $next;
                // }

                // class LinkedList {
                // public $head;

                // //constructor to create an empty LinkedList
                // public function __construct(){
                //     $this->head = null;
                // }
                
                // //display the content of the list
                // public function PrintList() {
                //     $temp = new Node();
                //     $temp = $this->head;
                //     print_r($temp);
                //     if($temp != null) {
                //     echo "The list contains: ";
                //     while($temp != null) {
                //         echo $temp->data." ";
                //         $temp = $temp->next;
                //         //print_r($temp);
                //     }
                //     echo "\n";
                //     } else {
                //     echo "The list is empty.\n";
                //     }
                // }   
                // };

                // // test the code  
                // //create an empty LinkedList
                // $MyList = new LinkedList();

                // //Add first node.
                // $first = new Node();
                // $first->data = 10;
                // $first->next = null;
                // //linking with head node
                // $MyList->head = $first;

                // //Add second node.
                // $second = new Node();
                // $second->data = 20;
                // $second->next = null;
                // //linking with first node
                // $first->next = $second;

                // //Add third node.
                // $third = new Node();
                // $third->data = 30;
                // $third->next = null;
                // //linking with second node
                // $second->next = $third;

                // //print the content of list
                // $MyList->PrintList();   
        ?>



<script type="text/javascript">
    const js_arr = ['7', '5', '9', '4', '2', '0'];
    const length = js_arr.length;
    //console.log(length);

   var after_sorted =  selection_sort_js(js_arr, length);
   //console.log(after_sorted);

    function selection_sort_js(arr, len){
        let arr01 = []; 
        var low = '';
        var i="", j="";
        for(i=0; i<len; i++){
            low = i;
            for(j=i+1; j<len;j++){
                if(arr[j]<arr[low]){
                low=j;
                // var temp = arr[i];
                // arr[i] = arr[low];
                // arr[low] = temp;
                }
            }
            if(js_arr[i]>js_arr[low]){
                var temp = arr[i];
                arr[i] = arr[low];
                arr01.push(arr[low]);
                arr[low] = temp;
                arr01.push(temp);
            }
            
        }
        //console.log(arr)
        return arr;
    }



//     // Javascript program for implementation of selection sort
// function swap(arr,xp, yp)
// {
//     var temp = arr[xp];
//     arr[xp] = arr[yp];
//     arr[yp] = temp;
// }
 
// function selectionSort(arr,  n)
// {
//     var i, j, min_idx;
 
//     // One by one move boundary of unsorted subarray
//     for (i = 0; i < n-1; i++)
//     {
//         // Find the minimum element in unsorted array
//         min_idx = i;
//         for (j = i + 1; j < n; j++)
//         if (arr[j] < arr[min_idx])
//             min_idx = j;
 
//         // Swap the found minimum element with the first element
//         swap(arr,min_idx, i);
//     }
// }
 
// function printArray( arr,  size)
// {
//     var i;
//     for (i = 0; i < size; i++)
//         document.write(arr[i] + " ");
//     document.write(" <br>");
// }
 
// var arr = [64, 25, 12, 22, 11];
//     var n = 5;
//     selectionSort(arr, n);
//     document.write("Sorted array: <br>");
//     printArray(arr, n);
 
// This code is contributed by akshitsaxenaa09.




// function swap(arr, xp, yp)
// {
//     var temp = arr[xp];
//     arr[xp] = arr[yp];
//     arr[yp] = temp;
// }
 
// // An optimized version of Bubble Sort
// function bubbleSort( arr, n)
// {
// var i, j;
// for (i = 0; i < n-1; i++)
// {
    
//     for (j = 0; j < n-i-1; j++)
//     {
        
//         if (arr[j] > arr[j+1])
//         {
//         swap(arr,j,j+1);
         
//         }
//     }
 
// }
// }
 
// /* Function to print an array */
// function printArray(arr, size)
// {
//     var i;
//     for (i=0; i < size; i++)
//     console.log(arr[i]);
//     //     document.write(arr[i]+ " ");
//     // document.write("\n");
// }
 
// // Driver program to test above functions
//   var arr = [5, 1, 4, 2, 8];
//     var n = arr.length;
//     //document.write("UnSorted array: \n");
//     console.log("UnSorted array: \n");
//     printArray(arr, n);
 
//     bubbleSort(arr, n);
//     //document.write("Sorted array: \n");
//     console.log("Sorted array: \n");
//     printArray(arr, n);
 

//let catalogue_id = ['5', '7', '3', '6', '2', '0']
let catalogue_id = ['3', '6', '7', '8', '11', '17']
let catalogue_length = catalogue_id.length;
var i;
let rev_catalogue=[];
// for(i=catalogue_length-1; i>=0; i-- ){
//     rev_catalogue.push(catalogue_id[i]);
// }
//console.log(rev_catalogue);

let cata_value = "60";
let cata_pos = 2
// console.log(catalogue_id);
// console.log(cata_pos);
// console.log(cata_value);
// console.log(catalogue_length);
n = removearr(catalogue_id, catalogue_length, cata_value, cata_pos);

console.log(n);
//console.log(catalogue_id);

//n = insertSorted(arr, n, key, capacity);
function insertSorted( arr, n, x, pos )

    {
        //var i =0;
        for (i=n-1; i >= pos; i--)
        {
            arr[i + 1] = arr[i];
        }
        arr[pos] = x;
        return arr;
    }

    function removearr( arr, n, x, pos )

    {
        //var i =0;
        //delete arr[pos];
        for (i=pos; i<n-1; i++)
        {
            arr[i] = arr[i+1];
        }
        //delete arr[n-1];
        arr.pop();
        //var filtered = arr;
        //var filtered = arr.filter(elm => elm);

        //var arr = [1,2,,3,,-4,"",null,,0,,false,undefined,5,,-5,6,"",7,,];
        // function myFilter(elm){
        //     return (elm != null && elm !== false && elm !== "");
        // }
        //// Performing filtration
        //var filtered = arr.filter(myFilter);
        //console.log(filtered); // Prints: [1, 2, 3, -4, 0, 5, -5, 6, 7]

        //return filtered;
        return arr;
    }



//     // javascript Program to Insert an element
// // at a specific position in an Array
// function insertElement(arr, n, x, pos)
//     {
     
//         // shift elements to the right
//         // which are on the right side of pos
//         var i =0;
//         for (i; i >= pos; i--)
//         {
//             arr[i + 1] = arr[i];
//         }
//         arr[pos] = x;
//     }
     
//         var arr = Array(15).fill(0);
//         arr[0] = 2;
//         arr[1] = 4;
//         arr[2] = 1;
//         arr[3] = 8;
//         arr[4] = 5;
//         var n = 5;
//         var x = 10;
//         var pos = 2;
//         console.log("Before Insertion: ");
//         var i = 0;
//         for (i; i < n; i++)
//         {
//             console.log(arr[i] + " ");
//         }
         
//         // Inserting key at specific position
//         insertElement(arr, n, x, pos);
//         n += 1;
//         console.log("\n\nAfter Insertion: ");
//         i = 0;
//         for (i; i < n; i++)
//         {
//             console.log(arr[i] + " ");
//         }
         
//         // This code is contributed by sourabhdalal0001.

   

//=========================== Uses of Inorder Traversal:


// javascript program for different tree traversals
 
/* Class containing left and right child of current
   node and key value*/
   class Node {
    constructor(val) {
        this.key = val;
        this.left = null;
        this.right = null;
    }
}
 
    // Root of Binary Tree
    var root = null;
 
     
    /*
     * Given a binary tree, print its nodes according to the "bottom-up" postorder
     * traversal.
     */
    function printPostorder(node) {
        if (node == null)
            return;
 
        // first recur on left subtree
        printPostorder(node.left);
 
        // then recur on right subtree
        printPostorder(node.right);
 
        // now deal with the node
        document.write(node.key + " ");
    }
 
    /* Given a binary tree, print its nodes in inorder */
    function printInorder(node) {
        if (node == null)
            return;
 
        /* first recur on left child */
        printInorder(node.left);
 
        /* then print the data of node */
        document.write(node.key + " ");
 
        /* now recur on right child */
        printInorder(node.right);
    }
 
    /* Given a binary tree, print its nodes in preorder */
    function printPreorder(node) {
        if (node == null)
            return;
 
        /* first print data of node */
        document.write(node.key + " ");
 
        /* then recur on left subtree */
        printPreorder(node.left);
 
        /* now recur on right subtree */
        printPreorder(node.right);
        
    }
 
 
 
    // Driver method
     
     
        root = new Node(1);
        root.left = new Node(2);
        root.right = new Node(3);
        root.left.left = new Node(4);
        root.left.right = new Node(5);
 
        document.write("Preorder traversal of binary tree is <br/>");
        printPreorder(root);
 
        document.write("<br/>Inorder traversal of binary tree is <br/>");
        printInorder(root);
 
        document.write("<br/>Postorder traversal of binary tree is <br/>");
        printPostorder(root);
 
// This code is contributed by aashish1995

//============================



//========================================================== Insertion in a Binary Tree in level order


// javascript program to insert element in binary tree
 
    /*
     * A binary tree node has key, pointer to left child and a pointer to right
     * child
     */
    class Node {
    constructor(val) {
        this.key = val;
        this.left = null;
        this.right = null;
    }
}
 
    var temp;
 
    /* Inorder traversal of a binary tree */
    function inorder(temp) {
        if (temp == null)
            return;
 
        inorder(temp.left);
        document.write(temp.key + " ");
        inorder(temp.right);
    }
 
    /* function to insert element in binary tree */
    function insert(temp , key) {
 
        if (temp == null) {
            root = new Node(key);
            return;
        }
        var q = [];
        q.push(temp);
 
        // Do level order traversal until we find
        // an empty place.
        while (q.length!=0) {
            temp = q.shift();
             
 
            if (temp.left == null) {
                temp.left = new Node(key);
                break;
            } else
                q.push(temp.left);
 
            if (temp.right == null) {
                temp.right = new Node(key);
                break;
            } else
                q.push(temp.right);
        }
    }
 
    // Driver code
        var root = new Node(10);
        root.left = new Node(11);
        root.left.left = new Node(7);
        root.right = new Node(9);
        root.right.left = new Node(15);
        root.right.right = new Node(8);
 
        document.write("Inorder traversal before insertion:");
        inorder(root);
 
        var key = 12;
        insert(root, key);
 
        document.write("<br\>Inorder traversal after insertion:");
        inorder(root);
 
// This code is contributed by umadevi9616

//================================================================

</script>




<?php
    
// Iterative function to
// reverse digits of num
function reversDigits($num) {
    $rev_num = 0;
    while($num > 1) {
        $rev_num = $rev_num * 10 + $num % 10;
        $num = (int)$num / 10;
    }
    return $rev_num;
}
  
// Driver Code
$num = 456213;
echo "Original number is :".$num;
echo "\r\n";
echo "Reverse of no. is ", reversDigits($num);
?>