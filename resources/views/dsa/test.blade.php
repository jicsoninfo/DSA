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
<?php 
class CreateQueue {
  public $front;
  public $rear;

  public $queue = array();

  function __construct() {
    $this->rear = -1;
    $this->front = -1;
  }

  // create a function to check whether 
  // the queue is empty or not 
  public function isEmpty() {
    if($this->rear == $this->front) {
      echo "Queue is empty. \n";
    } else {
      echo "Queue is not empty. \n";
    }
  }

  //create a function to return size of the queue 
  public function size() {
     return ($this->rear - $this->front);
  }

  //create a function to add new element  
  public function EnQueue($x) {
    $this->queue[++$this->rear] = $x;
    echo $x." is added into the queue. \n";
  }

  //create a function to delete front element  
  public function DeQueue() {
    if($this->rear == $this->front){
      echo "Queue is empty. \n";
    } else {
      $x = $this->queue[++$this->front];
      echo $x." is deleted from the queue. \n";
    }
  }

  //create a function to get front element  
  public function frontElement() {
    if($this->rear == $this->front) {
      echo "Queue is empty. \n";
    } else {
      return $this->queue[$this->front+1];
    }
  }

  //create a function to get rear element   
  public function rearElement() {
    if($this->rear == $this->front) {
      echo "Queue is empty. \n";
    } else {
      return $this->queue[$this->rear];
    }
  }
}

// test the code 
$MyQueue = new CreateQueue();
$MyQueue->EnQueue(10);
$MyQueue->EnQueue(20);
$MyQueue->EnQueue(30);
$MyQueue->EnQueue(40);

$MyQueue->DeQueue();
$MyQueue->isEmpty();


?>

<?php
class CreateStack {
  public $top;
  public $stack = array();

  function __construct() {
    $this->top = -1;
  }

  // create a function to check whether 
  // the stack is empty or not  
  public function isEmpty() {
    if($this->top == -1) {
      echo "Stack is empty. \n";
    } else {
      echo "Stack is not empty. \n";
    }
  }

  //create a function to return size of the stack 
  public function size() { 
     return $this->top+1;
  }

  //create a function to add new element 
  public function push($x) {
    $this->stack[++$this->top] = $x;
    echo $x." is added into the stack. \n"; 
  }

  //create a function to delete top element   
  public function pop() {
    if($this->top < 0){
      echo "Stack is empty. \n";
    } else {
      $x = $this->stack[$this->top--];
      echo $x." is deleted from the stack. \n";
    }    
  }

  public function topElement() {
    if($this->top < 0) {
      echo "Stack is empty. \n";
    } else {
      return $this->stack[$this->top];
    }
  }
}

// test the code 
$MyStack = new CreateStack();
$MyStack->push(10);
$MyStack->push(20);
$MyStack->push(30);
$MyStack->push(40);

$MyStack->pop();
$MyStack->isEmpty();

// The above code will give the following output:

// 10 is added into the stack.
// 20 is added into the stack.
// 30 is added into the stack.
// 40 is added into the stack.
// 40 is deleted from the stack.
// Stack is not empty.
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

<!-- ========================================================================= -->
<!-- queu in link list in java script -->
<script>
    // We create a class for each node within the queue
class Node {
    // Each node has two properties, its value and a pointer that indicates the node that follows
    constructor(value){
        this.value = value
        this.next = null
    }
}

// We create a class for the queue
class Queue {
    // The queue has three properties, the first node, the last node and the queue size
    constructor(){
        this.first = null
        this.last = null
        this.size = 0
    }
    // The enqueue method receives a value and adds it to the "end" of the queue
    enqueue(val){
        var newNode = new Node(val)
        if(!this.first){
            this.first = newNode
            this.last = newNode
        } else {
            this.last.next = newNode
            this.last = newNode
        }
        return ++this.size
    }
    // The dequeue method eliminates the element at the "beginning" of the queue and returns its value
    dequeue(){
        if(!this.first) return null

        var temp = this.first
        if(this.first === this.last) {
            this.last = null
        }
        this.first = this.first.next
        this.size--
        return temp.value
    }
}

const quickQueue = new Queue

quickQueue.enqueue("value1")
quickQueue.enqueue("value2")
quickQueue.enqueue("value3")

console.log(quickQueue.first) /* 
        Node {
            value: 'value1',
            next: Node { value: 'value2', next: Node { value: 'value3', next: null } }
        }
    */
console.log(quickQueue.last) // Node { value: 'value3, next: null }
console.log(quickQueue.size) // 3

quickQueue.enqueue("value4")
console.log(quickQueue.dequeue()) // value1
</script>


<!--======================== singly ll in js================================ -->
<script>
    // We create a class for each node within the list
class Node{
    // Each node has two properties, its value and a pointer that indicates the node that follows
    constructor(val){
        this.val = val
        this.next = null
    }
}

// We create a class for the list
class SinglyLinkedList{
    // The list has three properties, the head, the tail and the list size
    constructor(){
        this.head = null
        this.tail = null
        this.length = 0
    }
    // The push method takes a value as parameter and assigns it as the tail of the list
    push(val) {
        const newNode = new Node(val)
        if (!this.head){
            this.head = newNode
            this.tail = this.head
        } else {
            this.tail.next = newNode
            this.tail = newNode
        }
        this.length++
        return this
    }
    // The pop method removes the tail of the list
    pop() {
        if (!this.head) return undefined
        const current = this.head
        const newTail = current
        while (current.next) {
            newTail = current
            current = current.next
        }
        this.tail = newTail
        this.tail.next = null
        this.length--
        if (this.length === 0) {
            this.head = null
            this.tail = null
        }
        return current
    }
    // The shift method removes the head of the list
    shift() {
        if (!this.head) return undefined
        var currentHead = this.head
        this.head = currentHead.next
        this.length--
        if (this.length === 0) {
            this.tail = null
        }
        return currentHead
    }
    // The unshift method takes a value as parameter and assigns it as the head of the list
    unshift(val) {
        const newNode = new Node(val)
        if (!this.head) {
            this.head = newNode
            this.tail = this.head
        }
        newNode.next = this.head
        this.head = newNode
        this.length++
        return this
    }
    // The get method takes an index number as parameter and returns the value of the node at that index
    get(index) {
        if(index < 0 || index >= this.length) return null
        const counter = 0
        const current = this.head
        while(counter !== index) {
            current = current.next
            counter++
        }
        return current
    }
    // The set method takes an index number and a value as parameters, and modifies the node value at the given index in the list
    set(index, val) {
        const foundNode = this.get(index)
        if (foundNode) {
            foundNode.val = val
            return true
        }
        return false
    }
    // The insert method takes an index number and a value as parameters, and inserts the value at the given index in the list
    insert(index, val) {
        if (index < 0 || index > this.length) return false
        if (index === this.length) return !!this.push(val)
        if (index === 0) return !!this.unshift(val)

        const newNode = new Node(val)
        const prev = this.get(index - 1)
        const temp = prev.next
        prev.next = newNode
        newNode.next = temp
        this.length++
        return true
    }
    // The remove method takes an index number as parameter and removes the node at the given index in the list
    remove(index) {
        if(index < 0 || index >= this.length) return undefined
        if(index === 0) return this.shift()
        if(index === this.length - 1) return this.pop()
        const previousNode = this.get(index - 1)
        const removed = previousNode.next
        previousNode.next = removed.next
        this.length--
        return removed
    }
    // The reverse method reverses the list and all pointers so that the head becomes the tail and the tail becomes the head
    reverse(){
      const node = this.head
      this.head = this.tail
      this.tail = node
      let next
      const prev = null
      for(let i = 0; i < this.length; i++) {
        next = node.next
        node.next = prev
        prev = node
        node = next
      }
      return this
    }
}
</script>



<?php 
///push data on firts node in cirular doubly linked list
//Add new element at the start of the list
public function push_front($newElement) {
    $newNode = new Node();
    $newNode->data = $newElement;
    $newNode->next = null; 
    $newNode->prev = null;
    if($this->head == null) {
      $this->head = $newNode;
      $newNode->next = $this->head;
    } else {
      $temp = new Node();
      $temp = $this->head;
      while($temp->next !== $this->head) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
      $newNode->prev = $temp;
      $newNode->next = $this->head;
      $this->head->prev = $newNode;
      $this->head = $newNode;
    }    
  }
//Add new element at the end of the list
public function push_back($newElement) {
    $newNode = new Node();
    $newNode->data = $newElement;
    $newNode->next = null; 
    $newNode->prev = null;
    if($this->head == null) {
      $this->head = $newNode;
      $newNode->next = $this->head;
    } else {
      $temp = new Node();
      $temp = $this->head;
      while($temp->next !== $this->head) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
      $newNode->next = $this->head;
      $newNode->prev = $temp;
      $this->head->prev = $newNode;
    }    
  }

  //Inserts a new element at the given position 
  public function push_at($newElement, $position) {     
    $newNode = new Node(); 
    $newNode->data = $newElement;
    $newNode->next = null;
    $temp = $this->head;
    $NoOfElements = 0;

    if($temp != null) {
      $NoOfElements++;
      $temp = $temp->next;
    }
    while($temp != $this->head) {
      $NoOfElements++;
      $temp = $temp->next;
    }

    if($position < 1 || $position > ($NoOfElements+1)) {
      echo "\nInvalid position.";
    } else if ($position == 1) {
      if($this->head == null) {
        $this->head = $newNode;
        $this->head->next = $this->head;
        $this->head->prev = $this->head;
      } else {
        while($temp->next != $this->head) {
          $temp = $temp->next;
        }
        $temp->next = $newNode;
        $newNode->prev = $temp;
        $newNode->next = $this->head;
        $this->head->prev = $newNode;
        $this->head = $newNode;
      }
    } else {

      $temp = $this->head;
      for($i = 1; $i < $position-1; $i++) 
        $temp = $temp->next;
      $newNode->next = $temp->next;
      $newNode->next->prev = $newNode;
      $newNode->prev = $temp;
      $temp->next = $newNode;  
    }
  } 

  //Delete first node of the list
  public function pop_front() {
    if($this->head != null) {
      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        $temp = $this->head;
        $firstNode = $this->head;
        while($temp->next != $this->head) {
          $temp = $temp->next;
        }
        $this->head = $this->head->next;
        $this->head->prev = $temp;
        $temp->next = $this->head; 
        $firstNode = null; 
      }
    }
  }

  //Delete last node of the list
  public function pop_back() {
    if($this->head != null) {
      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        $temp = new Node();
        $temp = $this->head;
        while($temp->next->next != $this->head)
        $temp = $temp->next;
        $lastNode = $temp->next;
        $temp->next = $this->head;
        $this->head->prev = $temp; 
        $lastNode = null;
      }
    }
  }

  //Delete an element at the given position
  public function pop_at($position) {     
    $nodeToDelete = $this->head;
    $temp = $this->head;
    $NoOfElements = 0;

    if($temp != null) {
      $NoOfElements++;
      $temp = $temp->next;
    }
    while($temp != $this->head) {
      $NoOfElements++;
      $temp = $temp->next;
    }

    if($position < 1 || $position > $NoOfElements) {
      echo "\nInvalid position.";
    } else if ($position == 1) {
      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        while($temp->next != $this->head)
          $temp = $temp->next;
        $this->head = $this->head->next;
        $temp->next = $this->head; 
        $this->head->prev = $temp;
        $nodeToDelete = null; 
      }
    } else {
      $temp = $this->head;
      for($i = 1; $i < $position-1; $i++) 
        $temp = $temp->next;
      $nodeToDelete = $temp->next;
      $temp->next = $temp->next->next;
      $temp->next->prev = $temp;
      $nodeToDelete = null;  
    }
  } 


  //delete all nodes of the list
  public function deleteAllNodes() {
    if($this->head != null) {
      $temp = new Node();
      $current = new Node();
      $current = $this->head->next;
      while($current != $this->head) {
        $temp = $current->next;
        $current = null;
        $current = $temp;
      }
      $this->head = null;
    }
    echo "All nodes are deleted successfully.\n";  
  }

 //count nodes in the list
  public function countNodes() {
    $temp = new Node();
    $temp = $this->head;
    $i = 0;
    if ($temp != null) {
      $i++;
      $temp = $temp->next;
    }
    while($temp != $this->head) {
      $i++;
      $temp = $temp->next;
    }  
    return $i;  
  }  
//delete even nodes of the list
  public function deleteEvenNodes() {
    if($this->head != null && $this->head->next != $this->head) {
      $oddNode = $this->head;
      $evenNode = $this->head->next; 
      $temp = new Node();
      while(true) {
        $temp = $oddNode;
        $oddNode->next = $evenNode->next;
        $oddNode->next->prev = $oddNode;
        $evenNode = null;
        $oddNode = $oddNode->next;
        $evenNode = $oddNode->next;
        if($oddNode == $this->head || $evenNode == $this->head)
          break;
      }
      if($oddNode == $this->head) {
        $temp->next = $this->head;
        $this->head->prev = $temp;
      } else {
        $oddNode->next = $this->head;
        $this->head->prev = $oddNode;
      }
    }
  } 


  //delete odd nodes of the list
  public function deleteOddNodes() {
    if($this->head != null && $this->head->next == $this->head) {
      $this->head = null;
    } else if($this->head != null) {
     
      $temp = $this->head;
      while($temp->next != $this->head) {
        $temp = $temp->next;
      }
      $temp->next = $this->head->next;
      $this->head->next->prev = $temp;
      $this->head = null;
      $this->head = $temp->next;

      if($this->head != null && $this->head->next != $this->head) {

        $evenNode = $this->head;
        $oddNode = $this->head->next; 
        while(true) {
          $temp = $evenNode;
          $evenNode->next = $oddNode->next;
          $evenNode->next->prev = $evenNode;
          $oddNode = null;
          $evenNode = $evenNode->next;
          $oddNode = $evenNode->next;
          if($evenNode == $this->head || $oddNode == $this->head)
            break;
        }
        
        if($evenNode == $this->head) {
          $temp->next = $this->head;
          $this->head->prev = $temp;
        } else {
          $evenNode->next = $this->head;
          $this->head->prev = $evenNode;
        }
      }
    } 
  } 


  //Search an element in the list
  public function SearchElement($searchValue) {
    $temp = new Node();
    $temp = $this->head;
    $found = 0;
    $i = 0;

    if($temp != null) {
      while(true) {
        $i++;
        if($temp->data == $searchValue) {
          $found++;
          break;
        }
        $temp = $temp->next;
        if($temp == $this->head) {break;}
      }
      if ($found == 1) {
        echo $searchValue." is found at index = ".$i.".\n";
      } else {
        echo $searchValue." is not found in the list.\n";
      }
    } else {
      echo "The list is empty.\n";
    }
  } 
  
   //Delete first node by key
  public function pop_first($key) { 
    if($this->head != null) {
      $temp = $this->head;
      $nodeToDelete = $this->head;
      $lastNode = new Node();
      if($temp->data == $key) {
        if($temp->next == $this->head) {
          $this->head = null;
        } else {
          $lastNode = $this->head->prev;
          $this->head = $this->head->next;
          $lastNode->next = $this->head;
          $this->head->prev = $lastNode;
          $nodeToDelete = null; 
        }
      } else {
        while($temp->next != $this->head) {
          if($temp->next->data == $key) {
            $nodeToDelete = $temp->next;
            $temp->next = $temp->next->next;
            $temp->next->prev = $temp;
            $nodeToDelete = null;
            break; 
          }
          $temp = $temp->next;
        }
      }
    }
  }

  //Delete last node by key
  public function pop_last($key) {       
    if($this->head != null) {
      $temp = new Node();
      $previousToLast = null;
      $lastNode = null;
      
      if($this->head->data == $key) 
        $lastNode = $this->head;
      
      $temp = $this->head;
      while($temp->next != $this->head) {
        if($temp->next->data == $key) {
          $previousToLast = $temp;
          $lastNode = $temp->next;
        }
        $temp = $temp->next;
      }
   
      if($lastNode != null) {
        if($lastNode == $this->head) {
          if($this->head->next == $this->head)
            $this->head = null;
          else {
            $this->head->prev->next = $this->head->next;
            $this->head = $this->head->next;
          }
          $lastNode = null;
        } else {
          $previousToLast->next = $lastNode->next;
          $previousToLast->next->prev = $previousToLast;
          $lastNode = null;
        }
      }
    }
  } 

  //Delete all nodes by key
  public function pop_all($key) {     
    $nodeToDelete = new Node();
    $temp = new Node();
    
    while($this->head != null && $this->head->data == $key) {

      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        $nodeToDelete = $this->head;
        $temp = $this->head;
        while($temp->next != $this->head) {
          $temp = $temp->next;
        } 
        $this->head = $this->head->next;
        $temp->next = $this->head;   
        $this->head->prev = $temp;
        $nodeToDelete = null;
      }
    }

    $temp = $this->head;        
    if($temp != null) {
      while($temp->next != $this->head) {
        if($temp->next->data == $key) {
          $nodeToDelete = $temp->next;
          $temp->next = $temp->next->next;
          $temp->next->prev = $temp;
          $nodeToDelete = null;
        } else {
          $temp = $temp->next;
        }
      }
    }
  } 


  //reverse the list
  public function reverseList() {
    if($this->head != null) {
      $prevNode = $this->head;
      $tempNode = $this->head;
      $curNode = $this->head->next;
      
      $prevNode->next = $prevNode;
      $prevNode->prev = $prevNode;
      
      while($curNode != $this->head) { 
        $tempNode = $curNode->next;

        $curNode->next = $prevNode;
        $prevNode->prev = $curNode;
        $this->head->next = $curNode;
        $curNode->prev = $this->head;

        $prevNode = $curNode;
        $curNode = $tempNode;
      }

      $this->head = $prevNode;
    }
  } 


  //swap node values
  public function swapNodeValues($node1, $node2) {
    
    $temp = new Node();
    $temp = $this->head;
    $N = 0;
    if ($temp != null) {
      $N++;
      $temp = $temp->next;
    }
    while($temp != $this->head) {
      $N++;
      $temp = $temp->next;
    }

    if($node1 < 1 || $node1 > $N || $node2 < 1 || $node2 > $N)
      return;

    $pos1 = $this->head;
    $pos2 = $this->head;
    for($i = 1; $i < $node1; $i++) {
      $pos1 = $pos1->next;
    }
    for($i = 1; $i < $node2; $i++) {
      $pos2 = $pos2->next;
    }

    $val = $pos1->data;
    $pos1->data = $pos2->data;
    $pos2->data = $val;
  }   
?>


<?php
//

//Add first node.
$first = new Node();
$first->data = 10;
//linking with head node
$MyList->head = $first;
//linking next of the node with head
$first->next = $MyList->head;

//Add second node.
$second = new Node();
$second->data = 20;
//linking with first node
$first->next = $second;
//linking next of the node with head
$second->next = $MyList->head;

//Add third node.
$third = new Node();
$third->data = 30;
//linking with second node
$second->next = $third;
//linking next of the node with head
$third->next = $MyList->head;  


 //Add new element at the start of the list
 public function push_front($newElement) {
  $newNode = new Node();
  $newNode->data = $newElement;
  $newNode->next = null; 
  if($this->head == null) {
    $this->head = $newNode;
    $newNode->next = $this->head;
  } else {
    $temp = new Node();
    $temp = $this->head;
    while($temp->next !== $this->head) {
      $temp = $temp->next;
    }
    $temp->next = $newNode;
    $newNode->next = $this->head;
    $this->head = $newNode;
  }    
}

//Add new element at the end of the list
public function push_back($newElement) {
  $newNode = new Node();
  $newNode->data = $newElement;
  $newNode->next = null; 
  if($this->head == null) {
    $this->head = $newNode;
    $newNode->next = $this->head;
  } else {
    $temp = new Node();
    $temp = $this->head;
    while($temp->next !== $this->head) {
      $temp = $temp->next;
    }
    $temp->next = $newNode;
    $newNode->next = $this->head;
  }    
}


//Inserts a new element at the given position
public function push_at($newElement, $position) {     

  $newNode = new Node(); 
   $newNode->data = $newElement;
   $newNode->next = null;
   $temp = $this->head;
   $NoOfElements = 0;

   if($temp != null) {
     $NoOfElements++;
     $temp = $temp->next;
   }
   while($temp != $this->head) {
     $NoOfElements++;
     $temp = $temp->next;
   }

   if($position < 1 || $position > ($NoOfElements+1)) {
     echo "\nInvalid position.";
   } else if ($position == 1) {
 
     if($this->head == null) {
       $this->head = $newNode;
       $this->head->next = $this->head;
     } else {
       while($temp->next != $this->head) {
         $temp = $temp->next;
       }
       $newNode->next = $this->head;
       $this->head = $newNode;
       $temp->next = $this->head;
     }
   } else {
     $temp = $this->head;
     for($i = 1; $i < $position-1; $i++) 
       $temp = $temp->next;
     $newNode->next = $temp->next;
     $temp->next = $newNode;  
   }
 }
 
 
  //Delete first node of the list
  public function pop_front() {
    if($this->head != null) {
      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        $temp = $this->head;
        $firstNode = $this->head;
        while($temp->next != $this->head) {
          $temp = $temp->next;
        }
        $this->head = $this->head->next;
        $temp->next = $this->head; 
        $firstNode = null; 
      }
    }
  }


  //Delete last node of the list
  public function pop_back() {
    if($this->head != null) {
      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        $temp = new Node();
        $temp = $this->head;
        while($temp->next->next != $this->head)
          $temp = $temp->next;
        $lastNode = $temp->next;
        $temp->next = $this->head; 
        $lastNode = null;
      }
    }
  }

   //Delete an element at the given position
   public function pop_at($position) {     

    $nodeToDelete = $this->head;
    $temp = $this->head;
    $NoOfElements = 0;

    if($temp != null) {
      $NoOfElements++;
      $temp = $temp->next;
    }
    while($temp != $this->head) {
      $NoOfElements++;
      $temp = $temp->next;
    }

    if($position < 1 || $position > $NoOfElements) {
      echo "\nInvalid position.";
    } else if ($position == 1) {

      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        while($temp->next != $this->head)
          $temp = $temp->next;
        $this->head = $this->head->next;
        $temp->next = $this->head; 
        $nodeToDelete = null; 
      }
    } else {
      $temp = $this->head;
      for($i = 1; $i < $position-1; $i++) 
        $temp = $temp->next;
      $nodeToDelete = $temp->next;
      $temp->next = $temp->next->next;
      $nodeToDelete = null;  
    }
  } 




  //delete all nodes of the list
  public function deleteAllNodes() {
    if($this->head != null) {
      $temp = new Node();
      $current = new Node();
      $current = $this->head->next;
      while($current != $this->head) {
        $temp = $current->next;
        $current = null;
        $current = $temp;
      }
      $this->head = null;
    }
    echo "All nodes are deleted successfully.\n";  
  }


  //count nodes in the list
  public function countNodes() {
    $temp = new Node();
    $temp = $this->head;
    $i = 0;
    if ($temp != null) {
      $i++;
      $temp = $temp->next;
    }
    while($temp != $this->head) {
      $i++;
      $temp = $temp->next;
    }  
    return $i;  
  }  


  //delete even nodes of the list
  public function deleteEvenNodes() {
    if($this->head != null && $this->head->next != $this->head) {
      $oddNode = $this->head;
      $evenNode = $this->head->next; 
      $temp = new Node();

      while(true) {
        $temp = $oddNode;
        $oddNode->next = $evenNode->next;
        $evenNode = null;
        $oddNode = $oddNode->next;
        $evenNode = $oddNode->next;
        if($oddNode == $this->head || $evenNode == $this->head)
          break;
      }
      if($oddNode == $this->head)
        $temp->next = $this->head;
      else
        $oddNode->next = $this->head;
    }
  } 


   //delete odd nodes of the list
  public function deleteOddNodes() { 
    if($this->head != null && $this->head->next == $this->head) {
      $this->head = null;
    } else if($this->head != null) {
    
      $temp = $this->head;
      while($temp->next != $this->head) {
        $temp = $temp->next;
      }
      $temp->next = $this->head->next;
      $this->head = null;
      $this->head = $temp->next;

      if($this->head != null && $this->head->next != $this->head) {

        $evenNode = $this->head;
        $oddNode = $this->head->next; 
        while(true) {
          $temp = $evenNode;
          $evenNode->next = $oddNode->next;
          $oddNode = null;
          $evenNode = $evenNode->next;
          $oddNode = $evenNode->next;
          if($evenNode == $this->head || $oddNode == $this->head)
            break;
        }

        if($evenNode == $this->head)
          $temp->next = $this->head;
        else
          $evenNode->next = $this->head;
      }
    } 
  } 

  //Search an element in the list
  public function SearchElement($searchValue) {
    $temp = new Node();
    $temp = $this->head;
    $found = 0;
    $i = 0;

    if($temp != null) {
      while(true) {
        $i++;
        if($temp->data == $searchValue) {
          $found++;
          break;
        }
        $temp = $temp->next;
        if($temp == $this->head) {break;}
      }
      if ($found == 1) {
        echo $searchValue." is found at index = ".$i.".\n";
      } else {
        echo $searchValue." is not found in the list.\n";
      }
    } else {
      echo "The list is empty.\n";
    }
  }  


  //Delete first node by key
  public function pop_first($key) { 
    if($this->head != null) {
      $temp = $this->head;
      $nodeToDelete = $this->head;
      if($temp->data == $key) {
        if($temp->next == $this->head) {
          $this->head = null;
        } else {
          while($temp->next != $this->head) {
            $temp = $temp->next;
          }
          $this->head = $this->head->next;
          $temp->next = $this->head; 
          $nodeToDelete = null; 
        }
      } else {
        while($temp->next != $this->head) {
          if($temp->next->data == $key) {
            $nodeToDelete = $temp->next;
            $temp->next = $temp->next->next;
            $nodeToDelete = null;
            break; 
          }
          $temp = $temp->next;
        }
      }
    }
  }


   //Delete last node by key
   public function pop_last($key) {       
    if($this->head != null) {
      $temp = new Node();
      $previousToLast = null;
      $lastNode = null;
      
      if($this->head->data == $key) 
        $lastNode = $this->head;
      
      $temp = $this->head;
      while($temp->next != $this->head) {
        if($temp->next->data == $key) {
          $previousToLast = $temp;
          $lastNode = $temp->next;
        }
        $temp = $temp->next;
      }
   
      if($lastNode != null) {
        if($lastNode == $this->head) {
          if($this->head->next == $this->head)
            $this->head = null;
          else
            $this->head = $this->head->next;
          $lastNode = null;
        } else {
          $previousToLast->next = $lastNode->next;
          $lastNode = null;
        }
      }
    }
  } 


  //Delete all nodes by key
  public function pop_all($key) {     
    $nodeToDelete = new Node();
    $temp = new Node();
    
    while($this->head != null && $this->head->data == $key) {

      if($this->head->next == $this->head) {
        $this->head = null;
      } else {
        $nodeToDelete = $this->head;
        $temp = $this->head;
        while($temp->next != $this->head) {
          $temp = $temp->next;
        } 
        $this->head = $this->head->next;
        $temp->next = $this->head;   
        $nodeToDelete = null;
      }
    }

    $temp = $this->head;        
    if($temp != null) {
      while($temp->next != $this->head) {
        if($temp->next->data == $key) {
          $nodeToDelete = $temp->next;
          $temp->next = $temp->next->next;
          $nodeToDelete = null;
        } else {
          $temp = $temp->next;
        }
      }
    }
  } 

   //reverse the list
   public function reverseList() {
    if($this->head != null) {
      $prevNode = $this->head;
      $tempNode = $this->head;
      $curNode = $this->head->next;
      
      $prevNode->next = $prevNode;
      
      while($curNode != $this->head) { 
        $tempNode = $curNode->next;
        $curNode->next = $prevNode;
        $this->head->next = $curNode;
        $prevNode = $curNode;
        $curNode = $tempNode;
      }

      $this->head = $prevNode;
    }
  } 
  
  
  //swap node values
  public function swapNodeValues($node1, $node2) {
    
    $temp = new Node();
    $temp = $this->head;
    $N = 0;
    if ($temp != null) {
      $N++;
      $temp = $temp->next;
    }
    while($temp != $this->head) {
      $N++;
      $temp = $temp->next;
    } 

    if($node1 < 1 || $node1 > $N || $node2 < 1 || $node2 > $N)
      return;

    $pos1 = $this->head;
    $pos2 = $this->head;
    for($i = 1; $i < $node1; $i++) {
      $pos1 = $pos1->next;
    }
    for($i = 1; $i < $node2; $i++) {
      $pos2 = $pos2->next;
    }

    $val = $pos1->data;
    $pos1->data = $pos2->data;
    $pos2->data = $val;
  }   


  //create an empty LinkedList
//$MyList = new LinkedList();

//Add first node.
$first = new Node();
$first->data = 10;
$first->next = null;
$first->prev = null;
//linking with head node
$MyList->head = $first;

//Add second node.
$second = new Node();
$second->data = 20;
$second->next = null;
//linking with first node
$second->prev = $first;
$first->next = $second;

//Add third node.
$third = new Node();
$third->data = 30;
$third->next = null;
//linking with second node
$third->prev = $second;
$second->next = $third;


 //display the content of the list
  public function PrintList() {
    $temp = new Node();
    $temp = $this->head;
    if($temp != null) {
      echo "The list contains: ";
      while($temp != null) {
        echo $temp->data." ";
        $temp = $temp->next;
      }
      echo "\n";
    } else {
      echo "The list is empty.\n";
    }
  }   

  //Add new element at the start of the list
  public function push_front($newElement) {
    $newNode = new Node();
    $newNode->data = $newElement;
    $newNode->next = null;
    $newNode->prev = null; 
    if($this->head == null) {
      $this->head = $newNode;
    } else {
      $this->head->prev = $newNode;
      $newNode->next = $this->head;
      $this->head = $newNode;
    }    
  }

  //Add new element at the end of the list
  public function push_back($newElement) {
    $newNode = new Node();
    $newNode->data = $newElement;
    $newNode->next = null;
    $newNode->prev = null; 
    if($this->head == null) {
      $this->head = $newNode;
    } else {
      $temp = new Node();
      $temp = $this->head;
      while($temp->next != null) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
      $newNode->prev = $temp;
    }    
  }

  //Inserts a new element at the given position
  public function push_at($newElement, $position) {     
    $newNode = new Node(); 
    $newNode->data = $newElement;
    $newNode->next = null;
    $newNode->prev = null;
    if($position < 1) {
      echo "\nposition should be >= 1.";
    } else if ($position == 1) {
      $newNode->next = $this->head;
      $this->head->prev = $newNode;
      $this->head = $newNode;
    } else {
      $temp = new Node();
      $temp = $this->head;
      for($i = 1; $i < $position-1; $i++) {
        if($temp != null) {
          $temp = $temp->next;
        }
      }
      if($temp != null) {
        $newNode->next = $temp->next;
        $newNode->prev = $temp;
        $temp->next = $newNode; 
        if($newNode->next != null)
          $newNode->next->prev = $newNode; 
      } else {
        echo "\nThe previous node is null.";
      }       
    }
  }  


  //Delete first node of the list
  public function pop_front() {
    if($this->head != null) {
      $temp = $this->head;
      $this->head = $this->head->next;
      $temp = null;
      if($this->head != null) 
        $this->head->prev = null;        
    }
  }


  //Delete last node of the list
  public function pop_back() {
    if($this->head != null) {
      if($this->head->next == null) {
        $this->head = null;
      } else {
        $temp = new Node();
        $temp = $this->head;
        while($temp->next->next != null)
          $temp = $temp->next;
        $lastNode = $temp->next;
        $temp->next = null; 
        $lastNode = null;
      }
    }
  }

  //Delete an element at the given position
  public function pop_at($position) {     
    if($position < 1) {
      echo "\nposition should be >= 1.";
    } else if ($position == 1 && $this->head != null) {
      $nodeToDelete = $this->head;
      $this->head = $this->head->next;
      $nodeToDelete = null;
      if ($this->head != null)
        $this->head->prev = null;
    } else {
      $temp = new Node();
      $temp = $this->head;
      for($i = 1; $i < $position-1; $i++) {
        if($temp != null) {
          $temp = $temp->next;
        }
      }
      if($temp != null && $temp->next != null) {
        $nodeToDelete = $temp->next;
        $temp->next = $temp->next->next;
        if($temp->next->next != null)
          $temp->next->next->prev = $temp->next;   
        $nodeToDelete = null; 
      } else {
        echo "\nThe node is already null.";
      }       
    }
  } 

  //delete all nodes of the list
  public function deleteAllNodes() {
    $temp = new Node();
    while($this->head != null) {
      $temp = $this->head;
      $this->head = $this->head->next;
      $temp = null;
    }
    echo "All nodes are deleted successfully.\n";
  }   

  //count nodes in the list
  public function countNodes() {
    $temp = new Node();
    $temp = $this->head;
    $i = 0;
    while($temp != null) {
      $i++;
      $temp = $temp->next;
    }
    return $i;  
  }  


  //delete even nodes of the list
  public function deleteEvenNodes() {
    if($this->head != null) {
      $oddNode = $this->head;
      $evenNode = $this->head->next;       
      while($oddNode != null && $evenNode != null) {
        $oddNode->next = $evenNode->next;
        $evenNode = null;

        $temp = $oddNode;
        $oddNode = $oddNode->next;
        if($oddNode != null){
          $oddNode->prev = $temp;
          $evenNode = $oddNode->next;
        }
      }
    }
  } 


  //delete odd nodes of the list
  public function deleteOddNodes() {
    if($this->head != null) {
      $temp = $this->head;
      $this->head = $this->head->next;
      $temp = null;
      if($this->head != null) { 
        $this->head->prev = null;
        $evenNode = $this->head;
        $oddNode = $this->head->next; 
        while($evenNode != null && $oddNode != null) {
          $evenNode->next = $oddNode->next;
          $oddNode = null;
          $temp = $evenNode;
          $evenNode = $evenNode->next;
          if($evenNode != null) {
            $evenNode->prev = $temp;
            $oddNode = $evenNode->next;
          }
        }
      }
    }
  }    



   //Search an element in the list
  public function SearchElement($searchValue) {
    $temp = new Node();
    $temp = $this->head;
    $found = 0;
    $i = 0;

    if($temp != null) {
      while($temp != null) {
        $i++;
        if($temp->data == $searchValue) {
          $found++;
          break;
        }
        $temp = $temp->next;
      }
      if ($found == 1) {
        echo $searchValue." is found at index = ".$i.".\n";
      } else {
        echo $searchValue." is not found in the list.\n";
      }
    } else {
      echo "The list is empty.\n";
    }
  }  


  //Delete first node by key
  public function pop_first($key) {     
    $temp = $this->head;
    if($temp != null) {
      if($temp->data == $key) {
        $nodeToDelete = $this->head;
        $this->head = $this->head->next;
        $nodeToDelete = null;
        if ($this->head != null)
          $this->head->prev = null;
      } else {
        while($temp->next != null) {
          if($temp->next->data == $key) {
            $nodeToDelete = $temp->next;
            $temp->next = $temp->next->next;
            if($temp->next != null)
              $temp->next->prev = $temp;   
            $nodeToDelete = null;
            break; 
          }
          $temp = $temp->next;
        }
      }
    }
  } 


  //Delete last node by key
  public function pop_last($key) {       
    if($this->head != null) {
      $temp = new Node();
      $previousToLast = null;
      $lastNode = null;

      if($this->head->data == $key) 
        $lastNode = $this->head;
      
      $temp = $this->head;
      while($temp->next != null) {
        if($temp->next->data == $key) {
          $previousToLast = $temp;
          $lastNode = $temp->next;
        }
        $temp = $temp->next;
      }
   
      if($lastNode != null) {
        if($lastNode == $this->head) {
          $this->head = $this->head->next;
          $lastNode = null;
        } else {
          $previousToLast->next = $lastNode->next;
          if($previousToLast->next != null)
            $previousToLast->next->prev = $previousToLast;
          $lastNode = null;
        }
      }
    }
  } 

  //Delete all nodes by key
  public function pop_all($key) {     
    $nodeToDelete = new Node();
    while($this->head != null && $this->head->data == $key) {
      $nodeToDelete = $this->head;
      $this->head = $this->head->next;
      $nodeToDelete = null;
      if ($this->head != null)
        $this->head->prev = null;
    } 

    $temp = $this->head;        
    if($temp != null) {
      while($temp->next != null) {
        if($temp->next->data == $key) {
          $nodeToDelete = $temp->next;
          $temp->next = $temp->next->next;
          if($temp->next != null)
            $temp->next->prev = $temp;  
          $nodeToDelete = null;
        } else {
          $temp = $temp->next;
        }
      }
    }
  } 




  //reverse the list
  public function reverseList() {
    if($this->head != null) {
      $prevNode = $this->head;
      $tempNode = $this->head;
      $curNode = $this->head->next;
      
      $prevNode->next = null;
      $prevNode->prev = null;
      
      while($curNode != null) {
        $tempNode = $curNode->next;
        $curNode->next = $prevNode;
        $prevNode->prev = $curNode;
        $prevNode = $curNode;
        $curNode = $tempNode;
      }

      $this->head = $prevNode;
    }
  } 

  //swap node values
  public function swapNodeValues($node1, $node2) {
    
    $temp = new Node();
    $temp = $this->head;
    $N = 0;
    while($temp != null) {
      $N++;
      $temp = $temp->next;
    }  

    if($node1 < 1 || $node1 > $N || $node2 < 1 || $node2 > $N)
      return;

    $pos1 = $this->head;
    $pos2 = $this->head;
    for($i = 1; $i < $node1; $i++) {
      $pos1 = $pos1->next;
    }
    for($i = 1; $i < $node2; $i++) {
      $pos2 = $pos2->next;
    }

    $val = $pos1->data;
    $pos1->data = $pos2->data;
    $pos2->data = $val;
  } 
  



?>

<script>
  //https://www.freecodecamp.org/news/data-structures-in-javascript-with-examples/#binary-trees
// We create a class for each node within the tree
class Node{
    // Each node has three properties, its value, a pointer that indicates the node to its left and a pointer that indicates the node to its right
    constructor(value){
        this.value = value
        this.left = null
        this.right = null
    }
}
// We create a class for the BST
class BinarySearchTree {
    // The tree has only one property which is its root node
    constructor(){
        this.root = null
    }
    // The insert method takes a value as parameter and inserts the value in its corresponding place within the tree
    insert(value){
        const newNode = new Node(value)
        if(this.root === null){
            this.root = newNode
            return this
        }
        let current = this.root
        while(true){
            if(value === current.value) return undefined
            if(value < current.value){
                if(current.left === null){
                    current.left = newNode
                    return this
                }
                current = current.left
            } else {
                if(current.right === null){
                    current.right = newNode
                    return this
                } 
                current = current.right
            }
        }
    }
    // The find method takes a value as parameter and iterates through the tree looking for that value
    // If the value is found, it returns the corresponding node and if it's not, it returns undefined
    find(value){
        if(this.root === null) return false
        let current = this.root,
            found = false
        while(current && !found){
            if(value < current.value){
                current = current.left
            } else if(value > current.value){
                current = current.right
            } else {
                found = true
            }
        }
        if(!found) return undefined
        return current
    }
    // The contains method takes a value as parameter and returns true if the value is found within the tree
    contains(value){
        if(this.root === null) return false
        let current = this.root,
            found = false
        while(current && !found){
            if(value < current.value){
                current = current.left
            } else if(value > current.value){
                current = current.right
            } else {
                return true
            }
        }
        return false
    }
}



//
class Node {
  constructor(val) {
    this.val = val;
    this.right = null;
    this.left = null;
    this.count = 0;
  };
};

class BST {
  constructor() {
    this.root = null;
  }
  create(val) {
    const newNode = new Node(val);
    if (!this.root) {
      this.root = newNode;
      return this;
    };
    let current = this.root;

    const addSide = side => {
      if (!current[side]) {
        current[side] = newNode;
        return this;
      };
      current = current[side];
    };

    while (true) {
      if (val === current.val) {
        current.count++;
        return this;
      };
      if (val < current.val) addSide('left');
      else addSide('right');
    };
  };
};

let tree = new BST();
tree.add(10);
tree.add(4);
tree.add(4);
tree.add(12);
tree.add(2);
console.log(tree);


///////////////////
class Node{
   constructor(data) {
      this.data = data;
      this.left = null;
      this.right = null;
   };
};
class BinarySearchTree{
   constructor(){
      this.root = null;
   }
   insert(data){
      var newNode = new Node(data);
      if(this.root === null){
         this.root = newNode;
      }else{
         this.insertNode(this.root, newNode);
      };
   };
   insertNode(node, newNode){
      if(newNode.data < node.data){
         if(node.left === null){
            node.left = newNode;
         }else{
            this.insertNode(node.left, newNode);
         };
      } else {
         if(node.right === null){
            node.right = newNode;
         }else{
            this.insertNode(node.right,newNode);
         };
      };
   };
};
const BST = new BinarySearchTree();
BST.insert(1);
BST.insert(3);
BST.insert(2);



///////////////////////////////

class Node {
  constructor(value) {
    this.value = value;
    this.left = null;
    this.right = null;
  }
}

class BinarySearchTree {
  constructor() {
    this.root = null;
  }

  insert(value) {
    const newNode = new Node(value);
    if (this.root === null) {
      this.root = newNode;
      return this;
    }
    let current = this.root;
    while (true) {
      if (value === current.value) {
        return undefined; // Duplicate values are not allowed
      }
      if (value < current.value) {
        if (current.left === null) {
          current.left = newNode;
          return this;
        }
        current = current.left;
      } else {
        if (current.right === null) {
          current.right = newNode;
          return this;
        }
        current = current.right;
      }
    }
  }

  find(value) {
    if (this.root === null) {
      return undefined;
    }
    let current = this.root;
    while (current) {
      if (value === current.value) {
        return current;
      }
      if (value < current.value) {
        current = current.left;
      } else {
        current = current.right;
      }
    }
    return undefined; // Value not found
  }

  // In-order traversal
  inOrder() {
    const result = [];
    function traverse(node) {
      if (node.left) traverse(node.left);
      result.push(node.value);
      if (node.right) traverse(node.right);
    }
    traverse(this.root);
    return result;
  }

  // Pre-order traversal
  preOrder() {
    const result = [];
    function traverse(node) {
      result.push(node.value);
      if (node.left) traverse(node.left);
      if (node.right) traverse(node.right);
    }
    traverse(this.root);
    return result;
  }

  // Post-order traversal
  postOrder() {
    const result = [];
    function traverse(node) {
      if (node.left) traverse(node.left);
      if (node.right) traverse(node.right);
      result.push(node.value);
    }
    traverse(this.root);
    return result;
  }
}

// Example usage:
const tree = new BinarySearchTree();
tree.insert(10);
tree.insert(5);
tree.insert(15);
tree.insert(3);
tree.insert(7);
tree.insert(12);
tree.insert(18);

console.log("In-order traversal:", tree.inOrder()); // [3, 5, 7, 10, 12, 15, 18]
console.log("Pre-order traversal:", tree.preOrder()); // [10, 5, 3, 7, 15, 12, 18]
console.log("Post-order traversal:", tree.postOrder()); // [3, 7, 5, 12, 18, 15, 10]

console.log("Find 5:", tree.find(5)); // Node { value: 5, left: Node { ... }, right: Node { ... } }
console.log("Find 8:", tree.find(8)); // undefined
</script>

<?php
//https://www.kalkicode.com/insertion-in-binary-search-tree-using-recursion-in-php
// Php program for
// Insertion in binary search tree by using recursion
class TreeNode
{
	public $data;
	public $left;
	public $right;
	public	function __construct($data)
	{
		$this->data = $data;
		$this->left = NULL;
		$this->right = NULL;
	}
}
class BinarySearchTree
{
	public $root;
	public	function __construct()
	{
		$this->root = NULL;
	}
	// Insert a node element
	public	function addNode($node, $data)
	{
		if ($node != NULL)
		{
			if ($node->data >= $data)
			{
				// When new element is smaller or
				// equal to current node
				$node->left = 
                  $this->addNode($node->left, $data);
			}
			else
			{
				// When new element is higher to current node
				$node->right = 
                  $this->addNode($node->right, $data);
			}
			// important to manage root node
			return $node;
		}
		else
		{
			return new TreeNode($data);
		}
	}

  // insert a element without recursive
	public	function addNode($data)
	{
		// Create a new node
		$node = new TreeNode($data);
		if ($this->root == NULL)
		{
			// When adds a first node in bst
			$this->root = $node;
		}
		else
		{
			$find = $this->root;
			// Add new node to proper position
			while ($find != NULL)
			{
				if ($find->data >= $data)
				{
					if ($find->left == NULL)
					{
						// When left child empty
						// So add new node here
						$find->left = $node;
						return;
					}
					else
					{
						// Otherwise
						// Visit left sub-tree
						$find = $find->left;
					}
				}
				else
				{
					if ($find->right == NULL)
					{
						// When right child empty
						// So add new node here
						$find->right = $node;
						return;
					}
					else
					{
						// Visit right sub-tree
						$find = $find->right;
					}
				}
			}
		}
	}


	// Display preorder
	public	function preorder($node)
	{
		if ($node != NULL)
		{
			// Display node value
			echo "  ".strval($node->data);
			// Visit to left subtree
			$this->preorder($node->left);
			// Visit to right subtree
			$this->preorder($node->right);
		}
	}
	public	function inorder($node)
	{
		if ($node != NULL)
		{
			// Visit to left subtree
			$this->inorder($node->left);
			// Display node value
			echo "  ".strval($node->data);
			// Visit to right subtree
			$this->inorder($node->right);
		}
	}
	public	function postorder($node)
	{
		if ($node != NULL)
		{
			// Visit to left subtree
			$this->postorder($node->left);
			// Visit to right subtree
			$this->postorder($node->right);
			// Display node value
			echo "  ".strval($node->data);
		}
	}
	public static function main()
	{
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
		$tree->root = $tree->addNode($tree->root, 10);
		$tree->addNode($tree->root, 4);
		$tree->addNode($tree->root, 3);
		$tree->addNode($tree->root, 5);
		$tree->addNode($tree->root, 15);
		$tree->addNode($tree->root, 12);
		// Display tree nodes
		echo "Preorder\n";
		$tree->preorder($tree->root);
		echo "\nInorder\n";
		$tree->inorder($tree->root);
		echo "\nPostorder\n";
		$tree->postorder($tree->root);
	}
}
BinarySearchTree::main();
?>

 


<?php
//Php program for Sum of alternate leaf nodes in bst. Here mentioned other language solution.
// Php program for
// Sum of alternate leaf nodes in bst
class TreeNode
{
	public $data;
	public $left;
	public $right;
	public	function __construct($data)
	{
		$this->data = $data;
		$this->left = NULL;
		$this->right = NULL;
	}
}
class BinarySearchTree
{
	public $root;
	public $alternate;
	public	function __construct()
	{
		$this->root = NULL;
		$this->alternate = false;
	}
	// Insert a new node element
	public	function addNode($data)
	{
		// Create a new node
		$node = new TreeNode($data);
		if ($this->root == NULL)
		{
			// When add first node in bst
			$this->root = $node;
		}
		else
		{
			$find = $this->root;
			// Add new node to proper position
			while ($find != NULL)
			{
				if ($find->data >= $data)
				{
					if ($find->left == NULL)
					{
						// When left child empty
						// So add new node here
						$find->left = $node;
						return;
					}
					else
					{
						// Otherwise
						// Visit to left sub-tree
						$find = $find->left;
					}
				}
				else
				{
					if ($find->right == NULL)
					{
						// When right child empty
						// So add new node here.
						$find->right = $node;
						return;
					}
					else
					{
						// Visit to right sub-tree
						$find = $find->right;
					}
				}
			}
		}
	}
	public	function leafSum($node)
	{
		if ($node != NULL)
		{
			if ($node->left == NULL && $node->right == NULL)
			{
				// Case A
				// When node is leaf node.
				// Change status.
				$this->alternate = !$this->alternate;
				// Check node is alternate or not.
				if ($this->alternate)
				{
					// When get alternate node.
					return $node->data;
				}
			}
			else
			{
				// Case B
				// When node is internal
				// Visit left and right subtree and
				// Find alternate node.
				return $this->leafSum($node->left) + 
                  $this->leafSum($node->right);
			}
		}
		return 0;
	}
	public	function alternateLeafSum()
	{
		// Reset alternate leaf node status
		$this->alternate = false;
		return $this->leafSum($this->root);
	}
	public static function main()
	{
		$tree = new BinarySearchTree();
		/*
			Binary search tree
		    -------------------
		       5
		      /  \  
		     /    \ 
		    /      \
		   3        19
		  / \     /   \
		 2   4   8     31
		       / \    / \
		      7   15 25  50  
		*/
		// Add tree node
		$tree->addNode(5);
		$tree->addNode(3);
		$tree->addNode(19);
		$tree->addNode(2);
		$tree->addNode(4);
		$tree->addNode(8);
		$tree->addNode(31);
		$tree->addNode(7);
		$tree->addNode(25);
		$tree->addNode(15);
		$tree->addNode(50);
		// Test
		printf("%d\n", $tree->alternateLeafSum());
	}
}
BinarySearchTree::main();
?>