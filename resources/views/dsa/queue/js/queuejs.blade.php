<?php

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


</script>