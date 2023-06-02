<?php
class qarr{
    public $s1;
    public $s2;
    public function __construct()
    {
        $this->s1 = [];
        $this->s2 = [];
    }
    public function enq($val){
        // while(count($this->s1) != 0){
        //     array_push($this->s2, array_pop($this->s1));
        // }
        // array_push($this->s1, $val);
        // while(count($this->s2)!=0){
        //     array_push($this->s1, array_pop($this->s2));
        // }
        array_unshift($this->s1, $val);
    }
    public function deq(){
        if(count($this->s1) == 0){
            $msg = "Q is empty";
            return $msg;
        }
        // $deqval = array_pop($this->s1);
        // return $deqval;
        // $deval_ = array_shift($this->s1);
        // return $deval_;
        $deval_ = array_pop($this->s1);
        return $deval_;
    }
}

$qphp = new qarr();
$qphp->enq(90);
$qphp->enq(50);
$qphp->enq(40);
$qphp->enq(30);
$qphp->enq(20);

 $deqvalue =  $qphp->deq();
 $deqvalue1 =  $qphp->deq();
 print_r($deqvalue);
 echo "<br />";
 print_r($deqvalue1);

echo "<pre>";
print_r($qphp->s1);



class stackarr{
    public $s3;
    //public $s4;
    public function __construct(){
        $this->s3 = [];
        //$this->s4 = [];
    }
    public function enstack($stval){
        array_push($this->s3, $stval);
    }
    public function destack(){
        // while(count($this->s3) != 0){
        //     array_push($this->s4, array_pop($this->s3));
        // }
        // $destackval = array_pop($this->s4);
        // while(count($this->s4) !=0){
        //     array_push($this->s3, array_pop($this->s4) );
        // }
        $destackval = array_pop($this->s3);
        return $destackval;
    }
}


echo "<br />================Stack====================<br />";
$stackphp = new stackarr();
$stackphp->enstack(60);
$stackphp->enstack(65);
$stackphp->enstack(70);
$stackphp->enstack(75);
echo "<pre>";
print_r($stackphp->s3);
//$stackphp->destack();
$destvlue =  $stackphp->destack();
 print_r($destvlue);
 $stackphp->destack();

//infosecventures
?>
<script>

class qjsarr{
    constructor(){
        this.s1 = [];
        this.s2 = [];
    }

    enq(x){
        while(this.s1.length !=0){
            this.s2.push(this.s1.pop());
        }
        this.s1.push(x);

        while(this.s2.length !=0){
            this.s1.push(this.s2.pop())
        }
    }

    deq(){
        if(this.s1.length == 0){
            console.log("Q is empty");
        }
        let x = this.s1.pop();
        return x;
    }
}

class qjsarr2{
    constructor(){
        this.s3 = [];
        this.s4 = [];
    }

    enq2(x){
        this.s3.push(x);
    }
    deq2(){
        while(this.s3.length !=0){
            this.s4.push(this.s3.pop());
        }
        let x2 = this.s4.pop();

        while(this.s4.length !=0){
            this.s3.push(this.s4.pop())
        }
        return x2;
    }
  
}

let q = new qjsarr(); 
      q.enq(90); 
      q.enq(80); 
      q.enq(60); 
    //console.log(q.s1);
    //console.log(q.s2);
    var deq_val= q.deq();
    // q.deq();
    // q.deq();
    // q.deq();
    //console.log(q.s1);
    //console.log("deq value ="+deq_val);

    let q2 = new qjsarr2(); 
    q2.enq2(95); 
    q2.enq2(86); 
    q2.enq2(67); 
    console.log(q2.s3);

    var deq_val2= q2.deq2();
    console.log(q2.s3);
    console.log("deq value ="+deq_val2);


//Javascript program to implement Queue using linked list
class Nodell{
    constructor(value){
        this.value = value
        this.next = null
    }
}

class Queuell{
    constructor(){
        this.first = null
        this.last = null
        this.size = 0;
    }

    enqueue(val){
        var newNode = new Nodell(val);
        if(!this.first){
            this.first = newNode;
            this.last = newNode;
        }else{
            this.last.next = newNode;
            this.last = newNode;
        }
        return ++this.size;
    }

    dequeue(){
        if(!this.first) return null
        var temp = this.first
        if(this.first === this.last){
            this.last = null;
        }
        this.first = this.first.next
        this.size--
        return temp.value;
    }
}

const quickQueue = new Queuell;
quickQueue.enqueue("50");
quickQueue.enqueue("53");
quickQueue.enqueue("57");
quickQueue.enqueue("59");
quickQueue.enqueue("62");


quickQueue.dequeue();
quickQueue.dequeue(); 
console.log(quickQueue.first);





// // Javascript program to implement Queue using  
// // two stacks with costly enQueue()  
// class Queue{
      
//       constructor()
//       {
//           this.s1 = [];
//           this.s2 = [];
//       }
        
//       enQueue(x)
//       {
            
//           // Move all elements from s1 to s2 
//           while (this.s1.length != 0)
//           { 
//               this.s2.push(this.s1.pop()); 
//               //s1.pop(); 
//           } 
        
//           // Push item into s1 
//           this.s1.push(x); 
        
//           // Push everything back to s1 
//           while (this.s2.length != 0) 
//           { 
//               this.s1.push(this.s2.pop()); 
//               //s2.pop(); 
//           } 
//       }
        
//       // Dequeue an item from the queue  
//       deQueue() 
//       {
            
//           // If first stack is empty 
//           if (this.s1.length == 0) 
//           { 
//               document.write("Q is Empty"); 
//           } 
        
//           // Return top of s1 
//           let x = this.s1[this.s1.length - 1]; 
//           this.s1.pop(); 
//           return x; 
//       }
//       }
        
//       // Driver code
//       let q = new Queue(); 
//       q.enQueue(1); 
//       q.enQueue(2); 
//       q.enQueue(3); 
        
//       document.write(q.deQueue() + "<br>"); 
//       document.write(q.deQueue() + "<br>");
//       document.write(q.deQueue() + "<br>");
        
//       // This code is contributed by rag2127



///===================================================================================================================

// // JS program to implement Queue using
// // two stacks with costly deQueue()
  
// class Queue {
  
//   constructor() {
//       this.s1 = [];
//       this.s2 = [];
//   }

//   enQueue(x) {
//       // Push item into the first stack
//       this.s1.push(x);
//   }

//   // Dequeue an item from the queue
//   deQueue() {
//       // if both stacks are empty
//       if (this.s1.length == 0 && this.s2.length == 0) {
//           console.log("Q is empty");
//           exit(0);
//       }

//       // if s2 is empty, move
//       // elements from s1
//       if (this.s2.length == 0) {
//           while (this.s1.length != 0) {
//               this.s2.push(this.s1[0]);
//               this.s1.shift();
//           }
//       }

//       // return the top item from s2
//       let x = this.s2[0];
//       this.s2.shift();
//       return x;
//   }
// };

// // Driver code
// let q = new Queue;
// q.enQueue(1);
// q.enQueue(2);
// q.enQueue(3);

// console.log(q.deQueue());
// console.log(q.deQueue());
// console.log(q.deQueue());

// // This code is contributed by adityamaharshi21



// <!-- queu in link list in java script -->
// 
//     // We create a class for each node within the queue
// class Node {
//     // Each node has two properties, its value and a pointer that indicates the node that follows
//     constructor(value){
//         this.value = value
//         this.next = null
//     }
// }

// // We create a class for the queue
// class Queue {
//     // The queue has three properties, the first node, the last node and the queue size
//     constructor(){
//         this.first = null
//         this.last = null
//         this.size = 0
//     }
//     // The enqueue method receives a value and adds it to the "end" of the queue
//     enqueue(val){
//         var newNode = new Node(val)
//         if(!this.first){
//             this.first = newNode
//             this.last = newNode
//         } else {
//             this.last.next = newNode
//             this.last = newNode
//         }
//         return ++this.size
//     }
//     // The dequeue method eliminates the element at the "beginning" of the queue and returns its value
//     dequeue(){
//         if(!this.first) return null

//         var temp = this.first
//         if(this.first === this.last) {
//             this.last = null
//         }
//         this.first = this.first.next
//         this.size--
//         return temp.value
//     }
// }

// const quickQueue = new Queue

// quickQueue.enqueue("value1")
// quickQueue.enqueue("value2")
// quickQueue.enqueue("value3")

// console.log(quickQueue.first) /* 
//         Node {
//             value: 'value1',
//             next: Node { value: 'value2', next: Node { value: 'value3', next: null } }
//         }
//     */
// console.log(quickQueue.last) // Node { value: 'value3, next: null }
// console.log(quickQueue.size) // 3

// quickQueue.enqueue("value4")
// console.log(quickQueue.dequeue()) // value1

</script>